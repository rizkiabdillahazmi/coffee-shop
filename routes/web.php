<?php

use Illuminate\Support\Facades\Route;

// Cara 1 :
Route::prefix('/')->group(function () {
    Route::get('/', function () {
        return view('home', [
            'title' => 'Home',
        ]);
    });
    Route::get('/produk', function () {
        return view('produk', [
            'title' => 'Produk',
        ]);
    });
    Route::get('/lokasi', function () {
        return view('lokasi', [
            'title' => 'Lokasi',
        ]);
    });
    Route::get('/login', function () {
        return view('login', [
            'title' => 'Login',
        ]);
    });
    Route::get('/register', function () {
        return view('register', [
            'title' => 'Register',
        ]);
    });
    Route::view('/about', 'about');
});

Route::prefix('admin')->group(function () {
    Route::get('/', function () {
        return view('admin.dashboard', [
            'title' => 'Dashboard',
        ]);
    });
    Route::get('/produk', function () {
        return view('admin.produk', [
            'title' => 'Produk',
        ]);
    });
    Route::get('/transaksi', function () {
        return view('admin.transaksi', [
            'title' => 'Transaksi',
        ]);
    });
});

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