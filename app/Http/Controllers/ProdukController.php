<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        $products = Product::adminGetProducts();
        return view('admin.produk', [
            'title' => 'Produk',
            'total_product' => Product::count(),
            'discount_products' => Product::where('diskon', '!=', 0)->count(),
            'products' => $products,
        ]);
    }

    public function tambahProduk()
    {
        return view('admin.produk.add', [
            'title' => 'Tambah Produk',
        ]);
    }

    public function store(Request $request)
    {
        Product::addProduct($request);
        return redirect('/admin/produk')->with('sukses','Produk berhasil ditambahkan');
    }

    public function editProduk(Request $request)
    {
        // dd($request->id);
        $product = Product::getAProduct($request->id);
        // dd(Product::getAProduct($request->id));
        return view('admin.produk.edit', [
            'title' => 'Edit Produk',
            'product' => $product,
        ]);
    }

    public function update(Request $request)
    {
        Product::updateProduct($request);
        return redirect('/admin/produk')->with('sukses','Produk berhasil diupdate');
    }

    public function destroy(Request $request)
    {
        $selectedProduct = Product::find($request->id);
        // dd($selectedProduct->gambar);
        if ($selectedProduct->gambar) {
            Storage::delete($selectedProduct->gambar);
        }
        Product::destroy($request->id);
        return redirect('/admin/produk')->with('sukses','Produk berhasil dihapus');
    }
}
