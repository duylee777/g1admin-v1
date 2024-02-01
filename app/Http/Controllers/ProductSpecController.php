<?php

namespace App\Http\Controllers;

use App\Models\ProductSpec;
use Illuminate\Http\Request;

class ProductSpecController extends Controller
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
        $productSpecList = ProductSpec::where('product_id', $id)->get();
        for($i = 0; $i < count($productSpecList); $i++) {
            if($request->input('spectype_'.$productSpecList[$i]->type_id) != '') {
                ProductSpec::where('id', $productSpecList[$i]->id)->update(["value"=>$request->input('spectype_'.$productSpecList[$i]->type_id)]);
            } else {
                ProductSpec::where('id', $productSpecList[$i]->id)->update(["value"=>""]);
            }
        }
        return redirect()->route('product.edit', $id)->with(['msg' => 'Đã cập nhật thông số kỹ thuật của sản phẩm !']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function import() {
        echo "ok";
    }
}
