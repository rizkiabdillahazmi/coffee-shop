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
        // $product = Product::find($id);
        
        // $cart =new Cart;
        // $cart->user_id = $user_id;
        // $cart->product_id = $id;
        // $cart->jumlah = $request->jumlah;
        // $cart->sub_total =12000;
        // $cart->save();

        $cart = Cart::create([
            'user_id' => $user_id,
            'product_id' => $id,
            'jumlah' => 1,
            'sub_total' => 12000,
        ]);

        if($cart){
            return redirect('/produk');
        }
    }

    public function cartDetail()
    {
        $user_id = auth()->user()->id;
        $carts = Cart::where('user_id', $user_id)->get();
        return view('cart-details', [
            'title' => 'Keranjang',
            'carts' => $carts,
        ]);
    }
}
