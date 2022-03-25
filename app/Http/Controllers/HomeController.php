<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('home', [
            'title' => 'Home',
            'products' => Product::where('diskon', '!=', 0)->get(),
        ]);
    }

    public function produk()
    {
        return view('produk', [
            'title' => 'Produk',
            'signatures' => Product::where('signature',  1)->get(),
            'coffees' => Product::where('kategori',  'Minuman')->where('jenis', 'Coffee')->get(),
            'non_coffees' => Product::where('kategori',  'Minuman')->where('jenis', 'Non-Coffee')->get(),
            'snacks' => Product::where('kategori',  'Makanan')->where('jenis', 'Makanan Ringan')->get(),
            'daily_foods' => Product::where('kategori',  'Makanan')->where('jenis', 'Makanan Berat')->get(),
        ]);
    }

    public function lokasi()
    {
        return view('lokasi', [
            'title' => 'Lokasi',
        ]);
    }

    public function keranjang()
    {
        return view('keranjang', [
            'title' => 'Keranjang',
        ]);
    }
}
