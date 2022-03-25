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
}
