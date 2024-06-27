<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\SuppliersController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;


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
    // return view('login');
    return view('master');
});

// QUẢN LÝ ADMIN
Route::prefix('/admin')->group(function () {
    Route::get('/index', [AdminController::class, 'index'])
        ->name('index');


    Route::get('/add', [AdminController::class, 'themMoi'])
        ->name('Admin.add');

    Route::post('/start-add', [AdminController::class, 'xuLyThemMoi'])
        ->name('Admin.start-add');

    Route::get('/update/{id}', [AdminController::class, 'capNhat'])// nho la update id
        ->name('Admin.update');

    Route::post('/start-update/{id}', [AdminController::class, 'xuLyCapNhat'])
        ->name('Admin.start-update');

    Route::get('/delete/{id}', [AdminController::class, 'xoa'])
        ->name('delete-detail');
});

// QUẢN LÝ USER
Route::prefix('/user')->group(function () {
    Route::get('/index', [UserController::class, 'index'])
        ->name('user.index');
    Route::get('/add', [UserController::class, 'themMoi'])
        ->name('user.add');
    Route::post('/start-add', [UserController::class, 'xuLyThemMoi'])
        ->name('user.start-add');

    Route::get('/update/{id}', [UserController::class, 'capNhat'])
        ->name('user.update');

    Route::post('/start-update/{id}', [UserController::class, 'xuLyCapNhat'])
        ->name('user.start-update');

    Route::post('/delete/{id}', [UserController::class, 'xoa'])
        ->name('delete-detail');
});

// QUẢN LÝ NHÀ CUNG CẤP

Route::prefix('/suppliers')->group(function () {
    Route::get('/index', [SuppliersController::class, 'index'])
        ->name('suppliers.index');

    Route::get('/add', [SuppliersController::class, 'Themmoi'])
        ->name('suppliers.add');

    Route::post('/start-add', [SuppliersController::class, 'xuLyThemMoi'])
        ->name('suppliers.start-add');

    Route::get('/update/{id}', [SuppliersController::class, 'capNhat'])// nho la update id
        ->name('suppliers.update');

    Route::post('/start-update/{id}', [SuppliersController::class, 'xuLyCapNhat'])
        ->name('suppliers.start-update');

    Route::get('/delete/{id}', [SuppliersController::class, 'xoa'])
        ->name('delete-detail');
});

// QUẢN LÝ ĐƠN HÀNG
Route::prefix('/order')->name('order.')->group(function () {
    Route::get('/index', [OrderController::class, 'index'])
        ->name('index');
    Route::get('/add', [OrderController::class, 'themMoi'])
        ->name('add');
});

// QUẢN LÝ SẢN PHẨM
Route::prefix('/product')->name('product.')->group(function () {
    Route::get('/index', [ProductController::class, 'index'])
        ->name('index');

    Route::get('/detail/{id}', [ProductController::class, 'chiTiet'])
        ->name('detail');

    Route::get('/add', [ProductController::class, 'themMoi'])
        ->name('add');

    Route::post('/start-add', [ProductController::class, 'xuLyThemMoi'])
        ->name('start-add');

    Route::get('/update/{id}', [ProductController::class, 'capNhat'])
        ->name('update');

    Route::post('/start-update/{id}', [ProductController::class, 'xuLyCapNhat'])
        ->name('start-update');

    Route::get('/delete/{id}', [ProductController::class, 'xoa'])
        ->name('delete');

    Route::get('/index/seach', [ProductController::class, 'timKiem'])
        ->name('search');

    Route::get('/index/stock', [ProductController::class, 'sanPhamCon'])
        ->name('index-stock');

    Route::get('/index/sold-out', [ProductController::class, 'sanPhamHet'])
        ->name('index-sold-out');
});
// QUẢN LÝ LOẠI SẢN PHẨM
Route::prefix('/categories')->name('categories.')->group(function () {
    Route::get('/index', [CategoriesController::class, 'index'])
        ->name('index');
    Route::get('/add', [CategoriesController::class, 'themMoi'])
        ->name('add');
    Route::post('/start-add', [CategoriesController::class, 'xuLyThemMoi'])
        ->name('start-add');
});

