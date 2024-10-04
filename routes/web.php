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
    return view('clients.home.index');
});

// Dashboards
Route::get('wp-admin', function () { return view('admins.dashboards.index');});


//Route resource quản ý người dùng
Route::resource('user', App\Http\Controllers\admins\UserController::class);
// Route Quản lý sản phẩm
Route::resource('product', App\Http\Controllers\admins\ProductController::class);
// Route Quản lý danh mục
Route::resource('category', App\Http\Controllers\admins\CategoryController::class);
// Route Quản lý đế giày
Route::resource('sole',App\Http\Controllers\admins\SoleController::class);
// Route Quản lý chất lượng
Route::resource('material', App\Http\Controllers\admins\MaterialController::class);
// Route Quản lý thương hiệu
Route::resource('trademark', App\Http\Controllers\admins\TrademarkController::class);
