<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\APICategoriesController;
use App\Http\Controllers\APIProductController;
use App\Http\Controllers\APIUserController;
use App\Http\Controllers\APICartsDetailController; 
use App\Http\Controllers\APIOrderController; 
use App\Http\Controllers\ChatBoxAIController;
use App\Http\Controllers\APIPaymentController;
use Illuminate\Support\Facades\Auth;




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



Route::get('/san-pham-theo-loai/{id}',[APICategoriesController::class,'sanPhamTheoLoai']);
Route::get('/loai-san-pham',[APICategoriesController::class,'dsLoaiSanPham']);



Route::get('/san-pham-theo-nha-cung-cap/{id}',[APIProductController::class,'sanPhamTheoNhaCungCap']);
Route::get('/thong-tin-san-pham/{id}',[APIProductController::class,'thongTinSanPham']);
Route::get('/san-pham',[APIProductController::class,'dsSanPham']);

//LỌC THEO MÀU 
Route::get('/ds-colors', [APIProductController::class, 'dsColors']);
Route::get('/san-pham-theo-mau/{id}', [APIProductController::class, 'sanPhamTheoMau']);

Route::post('/Them-moi-gio-hang',[APIProductController::class,'sanPhamTheoNhaCungCap']);



Route::get('/User',[APIUserController::class,'getUser']);
Route::post('/Get-user',[APIUserController::class,'Login']);
Route::post('/register', [APIUserController::class, "Register"]);



//cart
Route::get('/cart/{id}',[APICartsDetailController::class,'getCartByIdCustomer']);
Route::post('/Addcarts',[APICartsDetailController::class,'addCart']);
Route::delete('/delCart/{id}',[APICartsDetailController::class,'delCart']);
Route::get('/Get-cart/{id}',[APICartsDetailController::class,'getCart']);
Route::post('/edit-Cart/{id}',[APICartsDetailController::class,'editCartItem']);

//
Route::post('/create-order',[APIOrderController::class,'createOrder']); 
Route::delete('/delete-order',[APIOrderController::class,'deleteCart']);
Route::get('/get-order/{id}',[APIOrderController::class,'getOrder']);   
Route::post('cancel-order/{id}',[APIOrderController::class,'cancelOrder']);


Route::post('/chatbot', [ChatBoxAIController::class, 'sendMessage']);

Route::get('/payments', [APIPaymentController::class, 'index']);
Route::get('/paymentmethods', [APIPaymentController::class, 'paymentMethods']);
