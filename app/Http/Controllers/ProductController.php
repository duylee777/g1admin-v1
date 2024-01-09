<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\ExtendProduct;
use App\Models\Product;
use App\Models\SpecType;
use App\Models\ProductSpec;
use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dataView = [];
        $products = Product::orderBy('id', 'ASC')->paginate(10);
        $dataView['products'] = $products;
        return view('admin.product.index', $dataView);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $dataView = [];
        $isCategories = count(Category::get());
        if($isCategories != 0) {
            $categories = Category::get();
        }
        else {
            $categories = null;
        }
        $specTypes = SpecType::get();
        $brands = Brand::get();
        $units = Unit::get();

        $dataView['units'] = $units;
        $dataView['brands'] = $brands;
        $dataView['specTypes'] = $specTypes;
        $dataView['categories'] = $categories;
        return view('admin.product.create', $dataView);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $slug = Parent::to_slug($request->name);
        $active = $request->active ? 1 : 0;
        $featured = $request->featured ? 1 : 0;
      
        $getCodeProduct = [];
        foreach( Product::get() as $product) {
            $getCodeProduct[] = $product->code;
        }
        
        if(!in_array($request->code, $getCodeProduct)) {
            $newProductData = [
                "code" => $request->code,
                "name" => $request->name,
                "slug" =>  $slug,
                "active" => $active,
                "featured" => $featured,
                "description" => $request->description,
                "category_id" => $request->category_id,
                "brand_id" => $request->brand_id,
                "unit_id" => $request->unit_id,
                "origin" => $request->origin,
            ];

            $listImageName = [];
            $listImage[] = $request->file('images'); 

            foreach($request->file('images') as $inputImage) {
                $imageName = time().'_'.$inputImage->getClientOriginalName();
                $linkStorage = "public/products/".$request->code."/";
                $inputImage->storeAs($linkStorage, $imageName);
                $listImageName[] =  $imageName;
            }
            $newProductData["images"] = json_encode($listImageName);

            Product::create($newProductData);

            $product = Product::where('code', $request->code)->first();

            $categoryIdByProduct = $request->category_id;
            $specListByCategory = SpecType::where('category_id', $categoryIdByProduct)->get();
            for($i = 0; $i < count($specListByCategory); $i++) {
                $product->specTypes()->attach($specListByCategory[$i]->id, ['value' => '']);
            }

            $newExpandProductData = [
                "product_id" => $product->id,
                "document" => json_encode(''),
                "software" => json_encode(''),
                "driver" => json_encode(''),
            ];
            ExtendProduct::create($newExpandProductData);

            return redirect()->route('product.index')->with(['msg' => 'Tạo mới sản phẩm thành công !']);
 
        }
        else {
            // Storage::deleteDirectory('public/products/'.$request->code);
            return redirect()->route('product.create')->with(['error' => 'Mã sản phẩm đã tồn tại !']);
        }

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return redirect()->route('product.edit', $id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $dataView = [];
        $isCategories = count(Category::get());
        if($isCategories != 0) {
            $categories = Category::get();
        }
        else {
            $categories = null;
        }
        
        $product = Product::find($id);
        $extendProduct = ExtendProduct::where('product_id',$id)->first();
        $brands = Brand::get();
        $units = Unit::get();

        $dataView['units'] = $units;
        $dataView['brands'] = $brands;
        $dataView['categories'] = $categories;
        $dataView['product'] = $product;
        $dataView['extendProduct'] = $extendProduct;
        
        return view('admin.product.edit', $dataView);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $product = Product::find($id);

        $slug = Parent::to_slug($request->name);
        $active = $request->active ? 1 : 0;
        $featured = $request->featured ? 1 : 0;
        
        $updateProductData = [
            "name" => $request->name,
            "slug" =>  $slug,
            "active" => $active,
            "featured" => $featured,
            "description" => $request->description,
            "category_id" => $request->category_id,
            "brand_id" => $request->brand_id,
            "unit_id" => $request->unit_id,
            "origin" => $request->origin,
        ];

        if($request->file('images') != null) {
            Storage::deleteDirectory('public/products/'.$product->code);
            $listImageName = [];
            $listImage[] = $request->file('images'); 
    
            foreach($request->file('images') as $inputImage) {
                $imageName = time().'_'.$inputImage->getClientOriginalName();
                $linkStorage = "public/products/".$product->code."/";
                $inputImage->storeAs($linkStorage, $imageName);
                $listImageName[] =  $imageName;
            }
            $updateProductData["images"] = json_encode($listImageName);
        }

        Product::where('id', $id)->update($updateProductData);
        return redirect()->route('product.edit', $id)->with(['msg' => 'Đã cập nhật sản phẩm !']);   
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->specTypes()->detach();
        $product->delete();
        return redirect()->route('product.index')->with(['msg' => 'Xóa sản phẩm thành công !']);
    }

}

