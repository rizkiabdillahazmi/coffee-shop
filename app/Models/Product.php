<?php

namespace App\Models;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama', 'gambar', 'kategori', 'jenis', 'signature', 'harga', 'diskon'
    ];

    public static function getProducts()
    {
        $products = Product::all();

        $jenisRules = ["Coffee", "Non-Coffee", "Makanan Ringan", "Makanan Berat"];
        $result = ['all'=> $products, 'signature' => [], 'Coffee' => [], 'Non-Coffee' => [], 'Makanan Ringan' => [], 'Makanan Berat' => []];

        foreach ($products as $product) {
            if($product->signature == 1){
                array_push($result["signature"], $product);
            }
            foreach ($jenisRules as $rule ) {

                if(Product::isProductCategory($product, $rule)){
                    array_push($result[$rule], $product);
                    // $result->put($rule, $product);
                }
            }

        }
        // dd($result);
        return $result;
    }

    public static function adminGetProducts()
    {
        $products = Product::paginate(10);
        return $products;
    }

    public static function isProductCategory($product, $jenis)
    {
        if($product->jenis == $jenis){
            return true;
        }
        return false;
    }

    public static function addProduct($request)
    {
        $validatedData = $request->validate([
            'nama' => 'required',
            'gambar' => 'image|file|max:512',
            'kategori' => 'required',
            'jenis' => 'required',
            'signature' => 'required',
            'harga' => 'required',
            'diskon' => '',
        ]);

        if ($request->diskon) {
            $validatedData['diskon'] = $request->diskon;
        } else {
            $validatedData['diskon'] = 0;
        }

        $validatedData['gambar'] = $request->file('gambar')->store('img/produk');

        Product::create($validatedData);

        // Product::create([
        //     'nama' => $validatedData['nama'],
        //     'gambar' => $validatedData['gambar'],
        //     'kategori' => $validatedData['kategori'],
        //     'jenis' => $validatedData['jenis'],
        //     'signature' => $validatedData['signature'],
        //     'harga' => $validatedData['harga'],
        //     'diskon' => $request->diskon,
        // ]);
    }
}
