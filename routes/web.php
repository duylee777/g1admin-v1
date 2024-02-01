<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AgencyController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ExcelController;
use App\Http\Controllers\ExtendProductController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\SearchController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductSpecController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\SpecTypeController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UnitController;
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

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/forgot-password', function () {
//     return view('admin.auth.forgot_password');
// });
// Route::get('/reset-password', function () {
//     return view('admin.auth.reset_password');
// });

Route::get('/', [HomeController::class, 'home'])->name('theme.home');
Route::get('/gioi-thieu', [HomeController::class, 'about'])->name('theme.about');
Route::get('/danh-muc/{slug_category?}', [HomeController::class, 'category'])->name('theme.category');
Route::get('/san-pham/{slug_category}/{slug_product?}', [HomeController::class, 'productDetail'])->name('theme.product_detail');
Route::get('/du-an', [HomeController::class, 'project'])->name('theme.project');
Route::get('/du-an/{slug_project?}', [HomeController::class, 'projectDetail'])->name('theme.project_detail');
Route::get('/tin-tuc', [HomeController::class, 'news'])->name('theme.news');
Route::get('/tin-tuc/{slug_news?}', [HomeController::class, 'newsDetail'])->name('theme.news_detail');
Route::get('/dai-ly', [HomeController::class, 'agency'])->name('theme.agency');
Route::get('/ho-tro', [HomeController::class, 'support'])->name('theme.support');
Route::get('/tai-ve', [HomeController::class, 'download'])->name('theme.download');
Route::get('/lien-he', [HomeController::class, 'contact'])->name('theme.contact');
Route::post('/lien-he', [HomeController::class, 'contactPost'])->name('theme.contact_post');
Route::get('/tim-kiem', [SearchController::class, 'search'])->name('theme.search');
Route::get('/thuong-hieu/{slug_brand?}', [HomeController::class, 'brand'])->name('theme.brand');


Route::prefix('admin') -> group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/login', [AdminController::class, 'login'])->name('admin.login');
    Route::post('/login', [AdminController::class, 'loginPost'])->name('admin.loginPost');
    Route::get('/logout', [AdminController::class, 'logout'])->name('admin.logout');
   

    Route::middleware('user')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
        Route::middleware('admin')->group(function () {
            Route::resource('/user', UserController::class);
            Route::resource('/role', RoleController::class);
            Route::resource('/group', GroupController::class);
            Route::resource('/permission', PermissionController::class);
        });
        Route::resource('/user', UserController::class, [
            
                'names' => [
                    'edit' => 'user.edit', 
                    // 'store' => 'user.store', 
                    'update' => 'user.update', 
                    // 'destroy' => 'user.delete'
                ]
        ])->except(['index','create', 'store', 'show', 'delete']);
        Route::post('/import', [ProductSpecController::class, 'import'])->name('admin.import');
        Route::get('/excel-products', [ExcelController::class, 'indexExcelProducts'])->name('admin.index-excel-products');
        Route::get('/excel-products/export', [ExcelController::class, 'exportProducts'])->name('admin.export-products');
        Route::post('/excel-products/import', [ExcelController::class, 'importProducts'])->name('admin.import-products');

        Route::resource('/category', CategoryController::class);
        Route::resource('/product', ProductController::class);
        Route::resource('/product-spec', ProductSpecController::class);
        Route::resource('/extend-product', ExtendProductController::class);
        Route::resource('/spec-type', SpecTypeController::class);
        Route::resource('/tag', TagController::class);
        Route::resource('/article', ArticleController::class);
        Route::resource('/unit', UnitController::class);
        Route::resource('/brand', BrandController::class);
        Route::resource('/agency', AgencyController::class);
        Route::prefix('setting')->group(function() {
            Route::get('/', [SettingController::class, 'index'])->name('setting.index');
        });
    });
});