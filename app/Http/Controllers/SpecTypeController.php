<?php

namespace App\Http\Controllers;

use App\Models\SpecType;
use Illuminate\Http\Request;

class SpecTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dataView = [];
        $specTypes = SpecType::orderBy('id', 'ASC')->paginate(10);
        $dataView['specTypes'] = $specTypes;
        return view('admin.spec-type.index', $dataView);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.spec-type.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $specTypeName = [];
        foreach(SpecType::get() as $specType) {
            $specTypeName[] = $specType->name;
        }
        if(!in_array($request->name, $specTypeName)) {
            $newSpecTypeData = [
                "name" => $request->name,
            ];

            SpecType::create($newSpecTypeData);
            return redirect()->route('spec-type.index')->with(['msg' => 'Tạo mới loại thông số kỹ thuật thành công !']);
        }
        else {
            return redirect()->route('spec-type.create')->with(['error' => 'Loại thông số đã tồn tại !']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return redirect()->route('spec-type.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $dataView = [];
        $specType = SpecType::find($id);
        $dataView['specType'] = $specType;
        return view('admin.spec-type.edit', $dataView);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $specTypeName = [];
        foreach(SpecType::get() as $specType) {
            $specTypeName[] = $specType->name;
        }
        if(!in_array($request->name, $specTypeName)) {
            $updateSpecTypeData = [
                "name" => $request->name,
            ];
            SpecType::where('id', $id)->update($updateSpecTypeData);
            return redirect()->route('spec-type.index')->with(['msg' => 'Cập nhật loại thông số kỹ thuật thành công !']);
        } 
        else {
            return redirect()->route('spec-type.edit', $id)->with(['error' => 'Loại thông số kỹ thuật đã tồn tại !']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SpecType $specType)
    {
        $specType->delete();
        return redirect()->route('spec-type.index')->with(['msg' => 'Đã xóa loại thông số !']);
    }
}
