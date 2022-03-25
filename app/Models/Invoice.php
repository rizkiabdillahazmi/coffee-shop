<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Invoice extends Model
{
    use HasFactory;
    protected $fillable = [
        'user', 'invoice'
    ];

    // public function getCreatedAtAttribute()
    // {
    //     return Carbon::parse($this->attributes['created_at'])->translatedFormat('l, d F Y');
    // }
}
