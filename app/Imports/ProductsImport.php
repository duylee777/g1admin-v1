<?php

namespace App\Imports;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\ExtendProduct;
use App\Models\SpecType;
use App\Models\ProductSpec;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class ProductsImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function to_slug($str) {
        $str = trim(mb_strtolower($str));
        $str = preg_replace('/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/', 'a', $str);
        $str = preg_replace('/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/', 'e', $str);
        $str = preg_replace('/(ì|í|ị|ỉ|ĩ)/', 'i', $str);
        $str = preg_replace('/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/', 'o', $str);
        $str = preg_replace('/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/', 'u', $str);
        $str = preg_replace('/(ỳ|ý|ỵ|ỷ|ỹ)/', 'y', $str);
        $str = preg_replace('/(đ)/', 'd', $str);
        $str = preg_replace('/[^a-z0-9-\s]/', '', $str);
        $str = preg_replace('/([\s]+)/', '-', $str);
        return $str;
    }

    public function collection(Collection $rows)
    {

        $listCodeProduct = [];
        foreach(Product::all() as $product) {
            $listCodeProduct[] = $product->code;
        }

        foreach ($rows as $row) 
        {
            
            if($row[0] != 'Mã sản phẩm' && !in_array($row[0], $listCodeProduct)){
                $slug = $this->to_slug($row[1]);
                $categorySlug = $this->to_slug($row[2]);
                $categoryId = Category::where('slug', $categorySlug)->first()->id;
                $brandSlug = $this->to_slug($row[3]);
                $brandId = Brand::where('slug', $brandSlug)->first()->id;
                $newProductData = [
                    'code' => $row[0],
                    'name' => $row[1],
                    'slug' => $slug,
                    "active" => 1,
                    "featured" => 0,
                    "description" => '',
                    "category_id" => $categoryId,
                    "brand_id" => $brandId,
                    "unit_id" => 1,
                    "origin" => $row[4],
                    "images" => json_encode(''),
                ];

                // var_dump($newProductData);
               
                Product::create($newProductData);

                $product = Product::where('code', $row[0])->first();

                $newExpandProductData = [
                    "product_id" => $product->id,
                    "document" => json_encode(''),
                    "software" => json_encode(''),
                    "driver" => json_encode(''),
                ];
                ExtendProduct::create($newExpandProductData);

                $dataSpecPerType =  explode(";", $row[5]);
                // var_dump($dataSpecPerType);
                foreach($dataSpecPerType as $data) {
                    $convertData = explode(":", $data);
                    // var_dump($convertData);

                    SpecType::create(['name' => $convertData[0], 'category_id' => $categoryId]);
                    $typeId = SpecType::where('name', $convertData[0])->first()->id;

                    ProductSpec::create(['product_id' => $product->id, 'type_id' => $typeId, 'value' => $convertData[1]]);
                    
                    // var_dump("Loại: ".$convertData[0]);
                    // var_dump("Giá trị: ".$convertData[1]);
                }
          
            }
        }
        
    }
}
