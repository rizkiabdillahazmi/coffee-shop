<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        return view('keranjang', [
            'title' => 'Keranjang',
        ]);
    }

    public function addCart(Request $request, $id)
    {
        $user_id = auth()->user()->id;
        $harga = Product::find($id)->harga;
        $diskon = Product::find($id)->diskon;
        $sub_total = $harga - ($harga * $diskon);

        // $product = Product::find($id);
        
        // $cart =new Cart;
        // $cart->user_id = $user_id;
        // $cart->product_id = $id;
        // $cart->jumlah = $request->jumlah;
        // $cart->sub_total =12000;
        // $cart->save();

        if (Cart::where('user_id', '=', $user_id)->where('product_id', '=', $id)->exists()) {
            return back()->with('gagal','Ops! Produk yang dipilih sudah ada di keranjang');
        }

        $cart = Cart::create([
            'user_id' => $user_id,
            'product_id' => $id,
            'jumlah' => 1,
            'sub_total' => $sub_total,
        ]);

        if($cart){
            return back()->with('sukses','Produk berhasil ditambahkan ke dalam keranjang');
            // return redirect('/produk')->with('sukses','Produk berhasil ditambahkan ke dalam keranjang');
        }
    }

    public function cartDetail()
    {
        $user_id = auth()->user()->id;
        $carts = Cart::where('user_id', $user_id)
                        ->join('users', 'carts.user_id', '=', 'users.id')
                        ->join('products', 'carts.product_id', '=', 'products.id')
                        ->select('products.gambar as gambar_produk', 'products.nama as nama_produk', 'products.diskon as diskon', 'products.harga as harga', 'carts.id as id', 'jumlah', 'sub_total', 'product_id')
                        ->get();
        return view('keranjang', [
            'title' => 'Keranjang',
            'carts' => $carts,
        ]);
    }

    public function deleteCart($product_id)
    {
        $user_id = auth()->user()->id;
        $affectedRows = Cart::where('user_id', $user_id)->where('product_id', $product_id)->delete();
        if($affectedRows){
            return back()->with('sukses','Produk berhasil dihapus dari keranjang');
        }
    }

    public function updateJumlah(Request $request, $id)
    {
        $affectedRows = Cart::where('id', $id)->update([
            'jumlah' => $request->jumlah,
        ]);
        if($affectedRows){
            return back()->with('sukses','Jumlah Produk berhasil diupdate');
        }
    }
}
