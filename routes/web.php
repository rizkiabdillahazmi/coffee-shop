<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TransaksiController;

// Cara 1 :
Route::prefix('/')->group(function () {
    Route::get('/', [HomeController::class, 'index']);
    Route::get('/produk', [ProdukController::class, 'produk']);
    Route::get('/lokasi', [HomeController::class, 'lokasi']);
    Route::get('/transaksi', [TransaksiController::class, 'indexUser'])->middleware('auth');
    Route::get('/cart', [CartController::class, 'cartDetail'])->middleware('auth');
    Route::post('/addcart/{id}', [CartController::class, 'addCart'])->middleware('auth');

    Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');

    Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
    Route::post('/login', [LoginController::class, 'authenticate']);
    Route::post('/logout', [LoginController::class, 'logout']);
});

// Route::middleware(['auth', 'role:user'])->prefix('/')->group(function () {
//     Route::get('/', [HomeController::class, 'index']);
// });

Route::middleware('admin')->prefix('admin')->group(function () {
    Route::get('/', [HomeController::class, 'admin']);
    Route::get('/produk', [ProdukController::class, 'produkAdmin']);
    Route::get('/transaksi', [TransaksiController::class, 'indexAdmin']);
});

// Route::middleware(['auth', 'role:karyawan'])->prefix('admin')->group(function () {
//     Route::get('/', [DashboardController::class, 'index']);
//     Route::get('/transaksi', [DashboardController::class, 'transaksi']);
// });

//Cara 2 :
// Route::get('/', fn() => view('home')); //PHP 7.4

//Cara 3 :
// Route::view('/about', 'about');


// Route::get('/about', function () {
//     return view('about', [
//         "name" => "Tes",
//         "email" => "tes@gmail.com"
//     ]);
// });
