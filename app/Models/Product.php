<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

    public static function isProductCategory($product, $jenis)
    {
        if($product->jenis == $jenis){
            return true;
        }
        return false;
    }
}
