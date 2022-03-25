<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class AdminProdukController extends Controller
{
    public function index()
    {
        return view('admin.produk', [
            'title' => 'Produk',
            'total_product' => Product::count(),
            'discount_products' => Product::where('diskon', '!=', 0)->count(),
            'products' => Product::all(),
        ]);
    }
}
