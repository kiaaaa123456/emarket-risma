<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PemasokController;
use App\Http\Controllers\PembelianController;
use App\Http\Controllers\UserController;

// untuk login 
    Route::get('/login',[UserController::Class,'index'])->name('login');
    Route::post('/login/cek',[UserController::Class,'cekLogin'])->name('cekLogin');
    Route::get('/logout',[UserController::Class,'logout'])->name('logout');

//rout untuk yang sudah login 

    Route::group(['middleware' => 'auth'], function(){
    Route::get('/', [HomeController::class, 'home']);
    Route::get('profile', [HomeController::Class, 'profile']);
    Route::get('contact', [HomeController::Class, 'contact']);
    Route::get('faq', [HomeController::Class, 'faq']);

    Route::resource('produk', ProdukController::Class);
    Route::resource('barang', BarangController::Class);
    Route::resource('pelanggan', PelangganController::Class);
    Route::resource('pemasok', PemasokController::Class);
    Route::resource('pembelian', PembelianController::Class);

    });