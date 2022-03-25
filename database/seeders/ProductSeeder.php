<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [
            // Signature
            [
                // https://source.unsplash.com/random/160x160/?fried-rice
                'nama' => 'Kopi Americano',
                'gambar' => '/img/produk/americano.jpg',
                'kategori' => 'Minuman',
                'jenis' => 'Coffee',
                'signature' => 1,
                'diskon' => 0.1,
                'harga' => 12000,
            ],
            [
                'nama' => 'Es Kopi Coklat',
                'gambar' => '/img/produk/kopi-coklat.jpg',
                'kategori' => 'Minuman',
                'jenis' => 'Coffee',
                'signature' => 1,
                'diskon' => 0.1,
                'harga' => 18000,
            ],
            [
                'nama' => 'Es Kopi Vanilla',
                'gambar' => '/img/produk/kopi-vanilla.jpg',
                'kategori' => 'Minuman',
                'jenis' => 'Coffee',
                'signature' => 1,
                'harga' => 18000,
            ],
            [
                'nama' => 'Es Kopi Pokat',
                'gambar' => '/img/produk/kopi-pokat.jpg',
                'kategori' => 'Minuman',
                'jenis' => 'Coffee',
                'signature' => 1,
                'harga' => 18000,
            ],
            [
                'nama' => 'Es Kopi Aren',
                'gambar' => '/img/produk/kopi-aren.jpg',
                'kategori' => 'Minuman',
                'jenis' => 'Coffee',
                'signature' => 1,
                'harga' => 16000,
            ],

            // Coffee
            [
                'nama' => 'Sanger Espresso',
                'gambar' => '/img/produk/sanger-espresso.jpg',
                'kategori' => 'Minuman',
                'jenis' => 'Coffee',
                'signature' => 0,
                'harga' => 15000,
            ],

            // Non Coffee
            [
                'nama' => 'Taro',
                'gambar' => '/img/produk/es-taro.jpg',
                'kategori' => 'Minuman',
                'jenis' => 'Non-Coffee',
                'signature' => 0,
                'harga' => 15000,
            ],
            [
                'nama' => 'Chocolate',
                'gambar' => '/img/produk/es-coklat.jpg',
                'kategori' => 'Minuman',
                'jenis' => 'Non-Coffee',
                'signature' => 0,
                'harga' => 15000,
            ],
            [
                'nama' => 'Matcha',
                'gambar' => '/img/produk/es-matcha.jpg',
                'kategori' => 'Minuman',
                'jenis' => 'Non-Coffee',
                'signature' => 0,
                'harga' => 15000,
            ],
            [
                'nama' => 'Red Velvet',
                'gambar' => '/img/produk/es-red-velvet.jpg',
                'kategori' => 'Minuman',
                'jenis' => 'Non-Coffee',
                'signature' => 0,
                'harga' => 15000,
            ],
            [
                'nama' => 'Strawberry',
                'gambar' => '/img/produk/es-strawberry.jpg',
                'kategori' => 'Minuman',
                'jenis' => 'Non-Coffee',
                'signature' => 0,
                'harga' => 15000,
            ],
            // Makanan Ringan
            [
                'nama' => 'Burger Spesial',
                'gambar' => '/img/produk/burger.jpg',
                'kategori' => 'Makanan',
                'jenis' => 'Makanan Ringan',
                'signature' => 0,
                'harga' => 17000,
            ],
            [
                'nama' => 'Dimsum Ayam',
                'gambar' => '/img/produk/dimsum.jpg',
                'kategori' => 'Makanan',
                'jenis' => 'Makanan Ringan',
                'signature' => 0,
                'harga' => 18000,
            ],
            [
                'nama' => 'Bento',
                'gambar' => '/img/produk/bento.jpg',
                'kategori' => 'Makanan',
                'jenis' => 'Makanan Ringan',
                'signature' => 0,
                'harga' => 12000,
            ],
            [
                'nama' => 'Tempe Mendoan',
                'gambar' => '/img/produk/tempe-mendoan.jpg',
                'kategori' => 'Makanan',
                'jenis' => 'Makanan Ringan',
                'signature' => 0,
                'harga' => 10000,
            ],
            [
                'nama' => 'Klappertart',
                'gambar' => '/img/produk/klappertart.jpg',
                'kategori' => 'Makanan',
                'jenis' => 'Makanan Ringan',
                'signature' => 0,
                'harga' => 13000,
            ],
            [
                'nama' => 'Katsu Sando',
                'gambar' => '/img/produk/katsu-sando.jpg',
                'kategori' => 'Makanan',
                'jenis' => 'Makanan Ringan',
                'signature' => 0,
                'harga' => 11000,
            ],
            // Makanan Berat
            [
                'nama' => 'Nasi Goreng Spesial',
                'gambar' => '/img/produk/nasi-goreng.jpg',
                'kategori' => 'Makanan',
                'jenis' => 'Makanan Berat',
                'signature' => 0,
                'harga' => 19000,
            ],
            [
                'nama' => 'Nasi Ayam Penyet',
                'gambar' => '/img/produk/ayam-penyet.jpg',
                'kategori' => 'Makanan',
                'jenis' => 'Makanan Berat',
                'signature' => 0,
                'harga' => 17000,
            ],
            [
                'nama' => 'Indomie Goreng',
                'gambar' => '/img/produk/indomie-goreng.jpg',
                'kategori' => 'Makanan',
                'jenis' => 'Makanan Berat',
                'signature' => 0,
                'harga' => 14000,
            ],
            [
                'nama' => 'Mie Tiaw',
                'gambar' => '/img/produk/mie-tiaw.jpg',
                'kategori' => 'Makanan',
                'jenis' => 'Makanan Berat',
                'signature' => 0,
                'harga' => 15000,
            ],
            [
                'nama' => 'Chicken Katsu',
                'gambar' => '/img/produk/chicken-katsu.jpg',
                'kategori' => 'Makanan',
                'jenis' => 'Makanan Berat',
                'signature' => 0,
                'harga' => 16000,
            ],
            [
                'nama' => 'Chicken Karaage',
                'gambar' => '/img/produk/chicken-karaage.jpg',
                'kategori' => 'Makanan',
                'jenis' => 'Makanan Berat',
                'signature' => 0,
                'harga' => 16000,
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
