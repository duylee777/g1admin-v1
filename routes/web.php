<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/dashboard', function () {
    return view('admin.dashboard');
});
Route::get('/login', function () {
    return view('admin.auth.login');
});
Route::get('/forgot-password', function () {
    return view('admin.auth.forgot_password');
});
Route::get('/reset-password', function () {
    return view('admin.auth.reset_password');
});
Route::get('/position', function () {
    return view('admin.position.index');
});
