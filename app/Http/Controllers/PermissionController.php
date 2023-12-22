<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dataView = [];
        $permissions = Permission::paginate(10);
        $dataView['permissions'] = $permissions;
        return view('admin.permission.index', $dataView);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.permission.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $newPermissionData = [
            "code" => $request->code,
            "name" => $request->name,
        ];
        Permission::create($newPermissionData);
        return redirect()->route('permission.index')->with(['msg' => 'Thêm mới dữ liệu thành công !']);
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
    public function edit($id)
    {
        $dataView = [];
        $permission = Permission::find($id);
        $dataView['permission'] = $permission;
        return view('admin.permission.edit', $dataView);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $updatePermissionData = [
            "code" => $request->code,
            "name" => $request->name,
        ];
        Permission::where('id', $id)->update($updatePermissionData);
        return redirect()->route('permission.index')->with(['msg' => 'Cập nhật dữ liệu thành công !']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Permission $permission)
    {
        $permission->delete();
        return redirect()->route('permission.index')->with(['msg' => 'Xóa dữ liệu thành công !']);
    }
}
