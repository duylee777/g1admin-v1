<?php

namespace App\Exports;

// use Maatwebsite\Excel\Concerns\FromCollection;
use App\Models\Product;
use App\Models\ExtendProduct;
use App\Models\SpecType;
use App\Models\ProductSpec;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithDrawings;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;


// class ProductsExport implements FromView
// {
//     public function view(): View
//     {
//         return view('admin.excel.excel-products', [
//             'products' => Product::all(),
//             'extendProduct' => ExtendProduct::all(),
//             'specType' => SpecType::all(),
//             'productSpec' => ProductSpec::all(),
//         ]);
//     }
// }
class ProductsExport implements FromArray, WithHeadings, ShouldAutoSize, WithDrawings
{
    use Exportable;
    // use RegistersEventListeners;
    public $products;

    public function __construct(array $products)
    {
        

        $this->products = $products;
        // var_dump($this->products);die;
    }

    public function array(): array
    {
        // var_dump($this->products);die;
        return $this->products;
    }

    public function headings(): array
    {
        return [
            'Mã sản phẩm',
            'Tên sản phẩm',
            'Hình ảnh',
            'Danh mục',
            'Thông số kỹ thuật',
        ];
    }

    public function drawings()
    {
        $drawing = [];
        foreach($this->products[0] as $key  => $product) {
           
            $drawing[$key] = new Drawing();
            $drawing[$key]->setName($product['name']);
            $drawing[$key]->setDescription($product['name']);
            $drawing[$key]->setPath(public_path('storage/products/'.$product['code'].'/'.$product['urlImg']));
            $drawing[$key]->setWidth(160);
            $drawing[$key]->setHeight(160);
            $drawing[$key]->setCoordinates('C'.$key+2);
            // $drawing[$key]->setCoordinates2('C'.$key+8);
            
            $drawing[] = $drawing[$key];
        }
        
        array_pop($drawing);
        return $drawing;
    }

    

   

    // public function query()
    // {
    //     return Product::query();
    // }
}
