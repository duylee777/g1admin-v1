<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct() {
        $this->middleware('superadmin');
    }

    public function index()
    {
        $dataView = [];
        $users = User::paginate(10);
        $dataView['users'] = $users;
        return view('admin.user.index', $dataView);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $dataView = [];
        $roles = Role::get();
        $dataView['roles'] = $roles;
        return view('admin.user.create', $dataView);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $avatarName = time().'_'.$request->file('avatar')->getClientOriginalName();
        $linkStorage = "public/users/".$request->username."/";
        $request->avatar->storeAs($linkStorage, $avatarName);

        $newUserData = [
            "name" => $request->name,
            "email" => $request->email,
            "phone" => $request->phone,
            "address" => $request->address,
            "username" => $request->username,
            "password" => Hash::make($request->password),
            "avatar" => $avatarName,
        ];
        User::create($newUserData);
        return redirect()->route('user.index')->with(['msg' => 'Thêm mới dữ liệu thành công !']);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $user = User::find($id);
        $dataView = [];
        
        $dataView['user'] = $user;
        return view('admin.user.show', $dataView);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $dataView = [];
        $roles = Role::get();
        $user = User::find($id);
        $dataView['roles'] = $roles;
        $dataView['user'] = $user;
        return view('admin.user.edit', $dataView);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);

        $updateUserData = [
            "name" => $request->name,
            "email" => $request->email,
            "phone" => $request->phone,
            "address" => $request->address,
        ];

        if($request->file('avatar') != null) {
            $request->validate([
                'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $avatarName = time().'_'.$request->file('avatar')->getClientOriginalName();
            if($avatarName != $user->avatar) {
                $linkStorage = "public/users/".$user->username."/";
                $request->avatar->storeAs($linkStorage, $avatarName);
                $updateUserData["avatar"] = $avatarName;
            }
        }

        if($request->password != null) {
            $inputPassword = $request->password;
            $passwordInDB = $user->password;

            $newPassword = $request->new_password;
            $confirmNewPassword = $request->confirm_new_password;

            if(Hash::check($inputPassword, $passwordInDB)) {
                if($newPassword == $confirmNewPassword && !Hash::check($newPassword, $passwordInDB)) {
                    $updateUserData["password"] = Hash::make( $newPassword);
                }
            }
        }
        
        User::where('id', $id)->update($updateUserData);
        return redirect()->route('user.index')->with(['msg' => 'Cập nhật dữ liệu thành công !']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('user.index')->with(['msg' => 'Xóa dữ liệu thành công !']);
    }
}
