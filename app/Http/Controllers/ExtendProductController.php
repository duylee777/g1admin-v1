<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ExtendProduct;
use Illuminate\Support\Facades\Storage;


class ExtendProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $updateExpandProductData = [];
        
        //tải lên tài liệu
        if($request->file('document_file_input') != null) {
            Storage::deleteDirectory('public/documents/'.$product->code);
            $listDoumentName = [];
            $listDocument[] = $request->file('document_file_input'); 
            if($listDocument == null) {
                $updateExpandProductData["document"] = json_encode("");
            }
            else {
                foreach($request->file('document_file_input') as $inputDocument) {
                    $documentName = time().'_'.$inputDocument->getClientOriginalName();
                    $linkStorage = "public/documents/".$product->code."/";
                    $inputDocument->storeAs($linkStorage, $documentName);
                    $listDoumentName[] =  $documentName;
                }
                $updateExpandProductData["document"] = json_encode($listDoumentName);
            }
        }

        //tải lên phần mềm
        if($request->file('software_file_input') != null) {
            Storage::deleteDirectory('public/softwares/'.$product->code);
            $listSoftwareName = [];
            $listSoftware[] = $request->file('software_file_input'); 

            if($listSoftware == null) {
                $updateExpandProductData["software"] = json_encode("");
            } else {
                foreach($request->file('software_file_input') as $inputSoftware) {
                    $softwareName = time().'_'.$inputSoftware->getClientOriginalName();
                    $linkStorage = "public/softwares/".$product->code."/";
                    $inputSoftware->storeAs($linkStorage, $softwareName);
                    $listSoftwareName[] =  $softwareName;
                }
                $updateExpandProductData["software"] = json_encode($listSoftwareName);
            }
        }

        //tải lên driver
        if($request->file('driver_file_input') != null) {
            Storage::deleteDirectory('public/drivers/'.$product->code);
            $listDriverName = [];
            $listDriver[] = $request->file('driver_file_input'); 

            if($listDriver == null) {
                $updateExpandProductData["driver"] = json_encode("");
            } else {
                foreach($request->file('driver_file_input') as $inputDriver) {
                    $driverName = time().'_'.$inputDriver->getClientOriginalName();
                    $linkStorage = "public/drivers/".$product->code."/";
                    $inputDriver->storeAs($linkStorage, $driverName);
                    $listDriverName[] =  $driverName;
                }
                $updateExpandProductData["driver"] = json_encode($listDriverName);
            }
        }

        if(count($updateExpandProductData) != 0) {
            ExtendProduct::where('product_id', $id)->update($updateExpandProductData);
        }

        return redirect()->route('product.edit', $id)->with(['msg' => 'Đã cập nhật tài liệu & phần mềm của sản phẩm !']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
