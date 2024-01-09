<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dataView = [];
        $brands = Brand::orderBy('id', 'ASC')->paginate(10);
        $dataView['brands'] = $brands;
        return view('admin.brand.index', $dataView);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        // ]);
        $idLastBrand = Brand::latest()->first()->id;
        $idNewBrand =  $idLastBrand + 1;
        $imageName = time().'_'.$request->file('image')->getClientOriginalName();
        $linkStorage = "public/brands/".$idNewBrand."/";
        $request->image->storeAs($linkStorage, $imageName);

        $newBrandData = [
            "slug" => $request->slug,
            "name" => $request->name,
            "image" => $imageName,
        ];
        Brand::create($newBrandData);
        return redirect()->route('brand.index')->with(['msg' => 'Đã thêm thương hiệu mới !']);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return redirect()->route('brand.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $dataView = [];
        $brand = Brand::find($id);
        $dataView['brand'] = $brand;
        return view('admin.brand.edit', $dataView);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $brand = Brand::find($id);

        $updateBrandData = [
            "slug" => $request->slug,
            "name" => $request->name,
        ];

        if($request->file('image') != null) {
            $imageName = time().'_'.$request->file('image')->getClientOriginalName();
            if($imageName != $brand->image) {
                $linkStorage = "public/brands/".$id."/";
                $request->image->storeAs($linkStorage, $imageName);
                $updateBrandData["image"] = $imageName;
            }
        }

        Brand::where('id', $id)->update($updateBrandData);
        return redirect()->route('brand.index')->with(['msg' => 'Cập nhật thương hiệu thành công !']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brand $brand)
    {
        $brand->delete();
        return redirect()->route('brand.index')->with(['msg' => 'Đã xóa thương hiệu !']);
    }
}
