<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index() {
        return redirect()->route('admin.login');
    }
    public function login(){

        return view('admin.auth.login');
    }

    public function loginPost(Request $request){
        $credentials = $request->only('username', 'password');
        // $isSuperAdmin = Auth::guard('superadmin')->attempt($credentials);
        $isUser = Auth::guard('user')->attempt($credentials);
        // if($isSuperAdmin) {
        //     return redirect()->route('admin.dashboard');
        // }
        // else 
        if($isUser){
            return redirect()->route('admin.dashboard');
        }
        else{
            return redirect()->route('admin.login')->withErrors(['msg' => 'Error !!!']);
        }    
    }

    public function dashboard(){
        return view('admin.dashboard');
    }

    public function logout(){
        Auth::guard('user')->logout();
        return redirect()->route('admin.login');
    }
}
