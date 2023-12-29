<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SpecTypeController;
use App\Http\Controllers\UserController;

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
Route::get('/forgot-password', function () {
    return view('admin.auth.forgot_password');
});
Route::get('/reset-password', function () {
    return view('admin.auth.reset_password');
});

Route::prefix('admin') -> group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/login', [AdminController::class, 'login'])->name('admin.login');
    Route::post('/login', [AdminController::class, 'loginPost'])->name('admin.loginPost');
    Route::get('/logout', [AdminController::class, 'logout'])->name('admin.logout');
   

    Route::middleware('superadmin')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
        Route::resource('/role', RoleController::class);
        Route::resource('/group', GroupController::class);
        Route::resource('/permission', PermissionController::class);
        Route::resource('/user', UserController::class);
        Route::resource('/category', CategoryController::class);
        Route::resource('/product', ProductController::class);
        Route::resource('/spec-type', SpecTypeController::class);
    });
});