<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\ExtendProduct;
use App\Models\Product;
use App\Models\SpecType;
use App\Models\ProductSpec;
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

        $dataView['specTypes'] = $specTypes;
        $dataView['categories'] = $categories;
        return view('admin.product.create', $dataView);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $getCodeProduct = [];
        foreach( Product::get() as $product) {
            $getCodeProduct[] = $product->code;
        }
        
        if(!in_array($request->code, $getCodeProduct)) {
            $newProductData = [
                "code" => $request->code,
                "name" => $request->name,
                "slug" => $request->slug,
                "active" => $request->active,
                "description" => $request->description,
                "category_id" => $request->category_id,
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

            $newExpandProductData = [
                "product_id" => $product->id,
            ];

            //tải lên tài liệu
            if($request->file('document_file_input') != null) {
                $listDoumentName = [];
                $listDocument[] = $request->file('document_file_input'); 

                foreach($request->file('document_file_input') as $inputDocument) {
                    $documentName = time().'_'.$inputDocument->getClientOriginalName();
                    $linkStorage = "public/documents/".$request->code."/";
                    $inputDocument->storeAs($linkStorage, $documentName);
                    $listDoumentName[] =  $documentName;
                }
                $newExpandProductData["document"] = json_encode($listDoumentName);
            }
            else {
                $newExpandProductData["document"] = json_encode('');
            }

            //tải lên phần mềm
            if($request->file('software_file_input') != null) {
                $listSoftwareName = [];
                $listSoftware[] = $request->file('software_file_input'); 

                foreach($request->file('software_file_input') as $inputSoftware) {
                    $softwareName = time().'_'.$inputSoftware->getClientOriginalName();
                    $linkStorage = "public/softwares/".$request->code."/";
                    $inputSoftware->storeAs($linkStorage, $softwareName);
                    $listSoftwareName[] =  $softwareName;
                }
                $newExpandProductData["software"] = json_encode($listSoftwareName);
            }
            else {
                $newExpandProductData["software"] = json_encode('');
            }

            ExtendProduct::create($newExpandProductData);

            $listSpecType = SpecType::get();
            for($i = 0; $i < count($listSpecType); $i++) {
                if($request->input('spectype_'.$i+1) != null) {
                    $product->specTypes()->attach($listSpecType[$i]->id, ['value' => $request->input('spectype_'.$i+1)]);
                }
                else {
                    $product->specTypes()->attach($listSpecType[$i]->id, ['value' => '']);
                }
            }

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
        $dataView = [];
        $specTypes = SpecType::get();
        $product = Product::find($id);
        $extendProduct = ExtendProduct::where('product_id',$id)->first();
        $dataView['product'] = $product;
        $dataView['specTypes'] = $specTypes;
        $dataView['extendProduct'] = $extendProduct;
        return view('admin.product.show', $dataView);
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
        
        $updateProductData = [
            "name" => $request->name,
            "slug" => $request->slug,
            "active" => $request->active,
            "description" => $request->description,
            "category_id" => $request->category_id,
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

        $updateExpandProductData = [];
        
        //tải lên tài liệu
        if($request->file('document_file_input') != null) {
            Storage::deleteDirectory('public/documents/'.$product->code);
            $listDoumentName = [];
            $listDocument[] = $request->file('document_file_input'); 

            foreach($request->file('document_file_input') as $inputDocument) {
                $documentName = time().'_'.$inputDocument->getClientOriginalName();
                $linkStorage = "public/documents/".$request->code."/";
                $inputDocument->storeAs($linkStorage, $documentName);
                $listDoumentName[] =  $documentName;
            }
            $updateExpandProductData["document"] = json_encode($listDoumentName);
        }

        //tải lên phần mềm
        if($request->file('software_file_input') != null) {
            Storage::deleteDirectory('public/softwares/'.$product->code);
            $listSoftwareName = [];
            $listSoftware[] = $request->file('software_file_input'); 

            foreach($request->file('software_file_input') as $inputSoftware) {
                $softwareName = time().'_'.$inputSoftware->getClientOriginalName();
                $linkStorage = "public/softwares/".$request->code."/";
                $inputSoftware->storeAs($linkStorage, $softwareName);
                $listSoftwareName[] =  $softwareName;
            }
            $updateExpandProductData["software"] = json_encode($listSoftwareName);
        }

        if(count($updateExpandProductData) != 0) {
            ExtendProduct::where('product_id', $id)->update($updateExpandProductData);
        }
        
        $listSpecType = SpecType::get();
        for($i = 0; $i < count($listSpecType); $i++) {
            if($request->input('spectype_'.$i+1) != null) {
                $product->specTypes()->updateExistingPivot($listSpecType[$i]->id, ['value' => $request->input('spectype_'.$i+1)]);
            }
            else {
                $product->specTypes()->updateExistingPivot($listSpecType[$i]->id, ['value' =>'']);
            }
        }

        
        Product::where('id', $id)->update($updateProductData);
        return redirect()->route('product.show', $id)->with(['msg' => 'Đã cập nhật sản phẩm !']);
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
