<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\APIProductDetailController;
use App\Http\Controllers\APIProductController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/san-pham-theo-nha-cung-cap/{id}',[APISanPhamController::class,'sanPhamTheoNhaCungCap']);
Route::get('/san-pham',[APISanPhamController::class,'dsSanPham']);


Route::get('/san-pham-theo-loai/{id}',[APIProductDetailController::class,'sanPhamTheoLoai']);

Route::get('/san-pham-theo-nha-cung-cap/{id}',[APIProductController::class,'sanPhamTheoNhaCungCap']);
Route::get('/thong-tin-san-pham/{id}',[APIProductController::class,'thongTinSanPham']);
Route::get('/san-pham',[APIProductController::class,'dsSanPham']);
