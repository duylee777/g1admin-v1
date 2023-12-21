<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use App\Models\RolePermission;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dataView = [];
        $roles = Role::paginate(10);
        $permissions = Permission::get();
        $dataView['roles'] = $roles;
        $dataView['permissions'] = $permissions;
        return view('admin.role.index', $dataView);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.role.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Role::create($request->all());
        return redirect()->route('role.index')->with(['msg' => 'Thêm mới dữ liệu thành công !']);
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
        $role = Role::find($id);
       
        $permissions = Permission::get();
        $dataView['role'] = $role;
        $dataView['permissions'] = $permissions;
        return view('admin.role.edit', $dataView);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $listIdPermissionRequest = [];
        $dataRolePermission = [];
        $permissions = $request->input('permissions');
        foreach($permissions as $permission) {
            array_push($listIdPermissionRequest, $permission);
        }
        
        $checkRole = RolePermission::where('role_id', $id)->get();
        foreach($checkRole as $checkRole) {
            $checkRole->delete();
        }

        foreach($listIdPermissionRequest as $idPermissionRequest) {
            $dataRolePermission = [
                "role_id" => (int)$id,
                "permission_id" => (int)$idPermissionRequest,
            ];
            RolePermission::create($dataRolePermission);
        }
        
        $updateRole = [
            "name" => $request->name,
        ];
        Role::where('id', $id)->update($updateRole);

        return redirect()->route('role.index')->with(['msg' => 'Cập nhật dữ liệu thành công !']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        $checkRole = RolePermission::where('role_id', $role->id)->get();
        foreach($checkRole as $checkRole) {
            $checkRole->delete();
        }
        $role->delete();
        return redirect()->route('role.index')->with(['msg' => 'Xóa dữ liệu thành công !']);
    }
}
