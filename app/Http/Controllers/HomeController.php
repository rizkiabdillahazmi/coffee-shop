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

    public function lokasi()
    {
        return view('lokasi', [
            'title' => 'Lokasi',
        ]);
    }

    public function admin()
    {
        return view('admin.dashboard', [
            'title' => 'Dashboard',
        ]);
    }
}
