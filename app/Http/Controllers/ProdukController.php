<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function produk()
    {
        $products = Product::getProducts();
        return view('produk', [
            'title' => 'Produk',
            'signatures' => $products["signature"],
            'coffees' => $products["Coffee"],
            'non_coffees' => $products["Non-Coffee"],
            'snacks' => $products["Makanan Ringan"],
            'daily_foods' => $products["Makanan Berat"],
        ]);
    }

    public function produkAdmin()
    {
        $products = Product::getProducts();
        return view('admin.produk', [
            'title' => 'Produk',
            'total_product' => Product::count(),
            'discount_products' => Product::where('diskon', '!=', 0)->count(),
            'products' => $products["all"],
        ]);
    }
}
