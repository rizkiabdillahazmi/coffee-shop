<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('home', [
            'title' => 'Home',
        ]);
    }

    public function produk()
    {
        return view('produk', [
            'title' => 'Produk',
        ]);
    }

    public function lokasi()
    {
        return view('lokasi', [
            'title' => 'Lokasi',
        ]);
    }
}
