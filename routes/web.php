<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuanLyTaiKhoanController;
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
    return view('master');
});
Route::prefix('/admin')->group(function () {
    Route::get('/index', [QuanLyTaiKhoanController::class, 'index'])
        ->name('index');


    Route::get('/add', [QuanLyTaiKhoanController::class, 'themMoi'])
        ->name('Admin.add');

    // Route::post('/start-add', [QuanLyTaiKhoanController::class, 'xuLyThemMoi'])
    //     ->name('start-add');

    Route::get('/update', [QuanLyTaiKhoanController::class, 'capNhat'])// nho la update id
        ->name('Admin.update');

    // Route::post('/start-update/{id}', [QuanLyTaiKhoanController::class, 'xuLyCapNhat'])
    //     ->name('start-update');

    // Route::post('/delete/{id}', [QuanLyTaiKhoanController::class, 'xoa'])
    //     ->name('delete-detail');
});

Route::prefix('/user')->group(function () {
    Route::get('/index', [UserController::class, 'index'])
        ->name('user.index');


    // Route::get('/add', [UserController::class, 'themMoi'])
    //     ->name('add');

    // Route::post('/start-add', [UserController::class, 'xuLyThemMoi'])
    //     ->name('start-add');

    // Route::get('/update/{id}', [UserController::class, 'capNhat'])
    //     ->name('update');

    // Route::post('/start-update/{id}', [UserController::class, 'xuLyCapNhat'])
    //     ->name('start-update');

    // Route::post('/delete/{id}', [UserController::class, 'xoa'])
    //     ->name('delete-detail');
});
Route::prefix('/products')->name('products.')->group(function () {
    // Route::get('/index', [SanPhamController::class, 'danhSach'])
    //     ->name('index');

    // Route::get('/detail/{id}', [SanPhamController::class, 'chiTiet'])
    //     ->name('detail');

    // Route::get('/add', [SanPhamController::class, 'themMoi'])
    //     ->name('add');

    // Route::post('/start-add', [SanPhamController::class, 'xuLyThemMoi'])
    //     ->name('start-add');

    // Route::get('/update/{id}', [SanPhamController::class, 'capNhat'])
    //     ->name('update');

    // Route::post('/start-update/{id}', [SanPhamController::class, 'xuLyCapNhat'])
    //     ->name('start-update');

    // Route::get('/delete/{id}', [SanPhamController::class, 'xoa'])
    //     ->name('delete');

    // Route::get('/index/seach', [SanPhamController::class, 'timKiem'])
    //     ->name('search');

    // Route::get('/index/stock', [SanPhamController::class, 'sanPhamCon'])
    //     ->name('index-stock');

    // Route::get('/index/sold-out', [SanPhamController::class, 'sanPhamHet'])
    //     ->name('index-sold-out');
});

