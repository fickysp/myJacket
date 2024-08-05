<?php

use App\Http\Controllers\BuyingController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PesanController;
use Illuminate\Support\Facades\Route;


Route::resource('/posts', \App\Http\controllers\PostController::class);
Route::get('/',[HomeController::class, 'index']);

// autentikasi
Route::get('/login',[AuthController::class,'index'])->name('auth');
Route::post('/login',[AuthController::class,'login']);
Route::get('/reg',[AuthController::class,'create'])->name('registrasi');
Route::post('/reg',[AuthController::class,'register']);
Route::get('/logout',[AuthController::class,'logout'])->name('logout');

// login user dan admin
Route::get('/admin',[BuyingController::class,'index'])->name('admin');
Route::get('/user',[UserController::class,'show'])->name('user');
//pembelian
Route::get('/beli',[BuyingController::class,'create'])->name('beli');
Route::post('/pembelian',[BuyingController::class,'store'])->name('pembelian');
//verify key
Route::get('/verify/{verify_key}',[AuthController::class,'verify']);
//pesanan
Route::get('pesan/{id}',[PesanController::class,'index']);
Route::post('pesan/{id}',[PesanController::class,'pesan']);
Route::get('check-out',[PesanController::class,'check_out']);
Route::post('check-out/{id}', [PesanController::class,'delete']);
Route::get('konfirmasi-check-out', [PesanController::class,'konfirmasi']);
Route::get('pembayaran', [PesanController::class,'pembayaran']);




?> 

