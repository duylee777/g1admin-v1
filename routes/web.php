<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

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
// Route::get('/dashboard', function () {
//     $name = Route::getRoutes();
//     $route_name = [];
//     foreach ($name as $name) {
//         $action = $name->getAction();
//         if (array_key_exists('as', $action)) {
//             $route_name[] = $action['as'];
//         }
//     }
//     return view('admin.dashboard', compact('route_name'));
    
// })->name('ss');

Route::get('/forgot-password', function () {
    return view('admin.auth.forgot_password');
});
Route::get('/reset-password', function () {
    return view('admin.auth.reset_password');
});
Route::get('/position', function () {
    return view('admin.position.index');
});

Route::prefix('admin') -> group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/login', [AdminController::class, 'login'])->name('admin.login');
    Route::post('/login', [AdminController::class, 'loginPost'])->name('admin.loginPost');
    Route::get('/logout', [AdminController::class, 'logout'])->name('admin.logout');
    Route::group(['middleware' => 'user'], function() {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    });
});