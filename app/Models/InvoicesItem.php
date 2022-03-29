<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoicesItem extends Model
{
    use HasFactory;
    protected $fillable = [
        'invoice_id', 'product_id', 'jumlah', 'sub_total'
    ];
}
