<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\SuppliersController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\LoginController;
use App\Models\Admin;
use PgSql\Lob;
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
        return view('login');

    });
    Route::get('/home', function () {
        return view('master');
    })->name('home');

    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [LoginController::class, 'login']);
    Route::get('logout', [LoginController::class, 'logout'])->name('logout');

// Route::get('/', function () {
//     return view('/');
// })->middleware('auth')->name('/');
// QUẢN LÝ ADMIN
Route::prefix('/admin')->group(function () {
    Route::get('/index', [AdminController::class, 'index'])
        ->name('Admin.index');

    // Route::post('/email', [AdminController::class, 'submitForm'])
    //     ->name('Admin.emmail');

    Route::get('/add', [AdminController::class, 'themMoi'])
        ->name('Admin.add');

    Route::post('/start-add', [AdminController::class, 'xuLyThemMoi'])
        ->name('Admin.start-add');

    Route::get('/update/{id}', [AdminController::class, 'capNhat'])// nho la update id
        ->name('Admin.update');

    Route::post('/start-update/{id}', [AdminController::class, 'xuLyCapNhat'])
        ->name('Admin.start-update');

    Route::get('/delete/{id}', [AdminController::class, 'xoa'])
        ->name('delete-detaila');

});

// QUẢN LÝ USER
Route::prefix('/user')->group(function () {
    Route::get('/index', [UserController::class, 'index'])
        ->name('user.index');
    Route::GET('/add', [UserController::class, 'themMoi'])->name('user.add');

    Route::post('/start-add', [UserController::class, 'xuLyThemMoi'])->name('user.start-add');

    Route::get('/update/{id}', [UserController::class, 'capNhat'])
        ->name('user.update');

    Route::post('/start-update/{id}', [UserController::class, 'xuLyCapNhat'])
        ->name('user.start-update');

    Route::GET('/delete/{id}', [UserController::class, 'xoa'])
        ->name('delete-detailu');

});

// QUẢN LÝ NHÀ CUNG CẤP

Route::prefix('/suppliers')->group(function () {
    Route::get('/index', [SuppliersController::class, 'index'])
        ->name('suppliers.index');

    Route::get('/add', [SuppliersController::class, 'Themmoi'])
        ->name('suppliers.add');

    Route::post('/start-add', [SuppliersController::class, 'xuLyThemMoi'])
        ->name('suppliers.starts-adds');

    Route::get('/update/{id}', [SuppliersController::class, 'capNhat'])// nho la update id
        ->name('suppliers.update');

    Route::post('/start-update/{id}', [SuppliersController::class, 'xuLyCapNhat'])
        ->name('suppliers.start-update');

    Route::get('/delete/{id}', [SuppliersController::class, 'xoa'])
        ->name('delete-details');
});

// QUẢN LÝ ĐƠN HÀNG
Route::prefix('/order')->name('order.')->group(function () {
    Route::get('/index', [OrderController::class, 'danhSach'])
        ->name('index');

    Route::get('/index-month', [OrderController::class, 'danhSachTrongThang'])
        ->name('index-month');

    Route::get('/detail/{id}', [OrderController::class, 'chiTiet'])
        ->name('detail');

    Route::get('/update/{id}', [OrderController::class, 'capNhat'])
        ->name('update');

    Route::post('/update/{id}', [OrderController::class, 'xuLyCapNhat'])
        ->name('start-update');

    Route::get('/update/{id}', [OrderController::class, 'capNhatChiTiet'])
        ->name('update');

    Route::post('/start-update-detail/{id}', [OrderController::class, 'xuLyCapNhatChiTiet'])
        ->name('start-update-detail');

    Route::get('/delete-detail/{id}', [OrderController::class, 'xoaChiTiet'])
        ->name('delete-detail');

    Route::get('/confirm/{id}', [OrderController::class, 'xacNhan'])
        ->name('confirm');

    Route::get('/confirm-delivery/{id}', [OrderController::class, 'giaoHang'])
        ->name('confirm-delivery');

    Route::get('/confirm-success/{id}', [OrderController::class, 'hoanThanh'])
        ->name('confirm-success');

    Route::get('/cancel/{id}', [OrderController::class, 'huy'])
        ->name('cancel');

    Route::get('/pay/{id}', [OrderController::class, 'thanhToan'])
        ->name('pay');

    Route::get('/index/seach', [OrderController::class, 'timKiem'])
        ->name('search');

});

// QUẢN LÝ SẢN PHẨM
Route::prefix('/product')->group(function () {
    Route::get('/index', [ProductController::class, 'index'])
        ->name('product.index');

    Route::get('/detail/{id}', [ProductController::class, 'chiTiet'])
        ->name('product.detail');

    Route::get('/add', [ProductController::class, 'themMoi'])
        ->name('product.add');

    Route::post('/start-add', [ProductController::class, 'xuLyThemMoi'])
        ->name('product.start-add');

    Route::get('/update/{id}', [ProductController::class, 'capNhat'])
        ->name('product.update');

    Route::post('/start-update/{id}', [ProductController::class, 'xuLyCapNhat'])
        ->name('product.start-update');

    Route::get('/delete/{id}', [ProductController::class, 'xoa'])
        ->name('product.delete');

    Route::get('/index/seach', [ProductController::class, 'timKiem'])
        ->name('product.search');

    Route::get('/index/stock', [ProductController::class, 'sanPhamCon'])
        ->name('product.index-stock');

    Route::get('/index/sold-out', [ProductController::class, 'sanPhamHet'])
        ->name('product.index-sold-out');
});
// QUẢN LÝ LOẠI SẢN PHẨM
Route::prefix('/categories')->name('categories.')->group(function () {
    Route::get('/index', [CategoriesController::class, 'index'])
        ->name('index');

    Route::get('/add', [CategoriesController::class, 'themMoi'])
        ->name('add');

    Route::get('/detail/{id}', [CategoriesController::class, 'chiTiet'])
        ->name('detail');

    Route::post('/add', [CategoriesController::class, 'xuLyThemMoi'])
        ->name('start-add');

    Route::get('/update/{id}', [CategoriesController::class, 'capNhat'])
        ->name('update');

    Route::post('/start-update/{id}', [CategoriesController::class, 'xuLyCapNhat'])
        ->name('start-update');

    Route::get('delete/{id}', [CategoriesController::class, 'xoa'])
        ->name('delete-detailcate');
});

