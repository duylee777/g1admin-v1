<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\ProductsExport;
use App\Imports\ProductsImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Product;
use App\Models\ExtendProduct;


class ExcelController extends Controller
{
    public function indexExcelProducts() {
        $dataView = [];
        $products = Product::all();
        $extendProduct = ExtendProduct::all();
        $dataView['products'] = $products;
        $dataView['extendProduct'] = $extendProduct;
        return view('admin.excel.excel-products', $dataView);
    }

    public function exportProducts() {
        $data = [];
        $products = Product::orderBy('category_id', 'DESC')->get();
        $dsThongSo = [];
        foreach($products as $product) {
            $urlImg = json_decode($product->images);
            
            foreach($product->specTypes as $key => $type) {
                if($type->category_id == $product->category_id){
                    $dsThongSo[$product->category_id][] = $type->name.':'.$type->pivot->value;
                    // $dsThongso[$product->category->name][] += (string)$type->name.':'.$type->pivot->value;
                }
            }

           
            $t = '';
            foreach($dsThongSo[$product->category_id] as $v) {
                $t = $t.$v.';';
            }
            $data[] = [
                'code'=> $product->code,
                'name'=> $product->name,
                'urlImg'=> $urlImg[1],
                'cate_name'=> $product->category->name,
                'listSpec' => $t,
            ];

            
           
        }
       
        $export = new ProductsExport([$data]);
        
        return Excel::download($export, 'products-export.xlsx');
    } 

    public function importProducts() {
        Excel::import(new ProductsImport,request()->file('file_import'));
        return redirect()->route('product.index')->with(['msg' => 'Tạo mới sản phẩm thành công !']);
    }
}
