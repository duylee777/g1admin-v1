<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Group;
use App\Models\Role;


class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dataView = [];
        $groups = Group::paginate(10);
        $roles = Role::get();
        $dataView['groups'] = $groups;
        $dataView['roles'] = $roles;
        return view('admin.group.index', $dataView);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $dataView = [];
        $roles = Role::get();
        $dataView['roles'] = $roles;
        return view('admin.group.create', $dataView);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $roleId = (int)$request->roles;
        $newGroupData = [
            "code" => $request->code,
            "name" => $request->name,
            "role_id" => $roleId,
        ];
        
        Group::create($newGroupData);
        return redirect()->route('group.index')->with(['msg' => 'Thêm mới dữ liệu thành công !']);
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
        $group = Group::find($id);
        $roles = Role::get();
        $dataView['group'] = $group;
        $dataView['roles'] = $roles;
        return view('admin.group.edit', $dataView);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $updateGroupData = [
            "code" => $request->code,
            "name" => $request->name,
            "role_id" => (int)$request->roles,
        ];
        Group::where('id', $id)->update($updateGroupData);
        return redirect()->route('group.index')->with(['msg' => 'Cập nhật dữ liệu thành công !']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Group $group)
    {
        $group->delete();
        return redirect()->route('group.index')->with(['msg' => 'Xóa dữ liệu thành công !']);
    }
}
