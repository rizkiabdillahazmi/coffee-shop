<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Invoice extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id', 'invoice'
    ];

    // public function getCreatedAtAttribute()
    // {
    //     return Carbon::parse($this->attributes['created_at'])->translatedFormat('l, d F Y');
    // }

    public static function getTransactions(int $id=null)
    {
        $transactions;
        if ($id) {
            $transactions = Invoice::orderBy('status', 'ASC')->where('user_id', $id)->get();
        } else {
            $transactions = Invoice::join('users', 'user_id', '=', 'users.id')
                            ->orderBy('status', 'ASC')
                            ->select('users.name as nama', 'invoices.id as id', 'invoices.invoice as invoice', 'invoices.created_at as tanggal_order', 'invoices.status as status')
                            ->get();
        }

        return $transactions;
    }

    public static function getOrdersByStatus(String $no_status)
    {
        return Invoice::where('status', '=', $no_status)->count();
    }

    public static function getTransactionDetails(int $id = null)
    {
        $transaction_details;
        $temp = Invoice::join('invoices_items', 'invoices.id', '=', 'invoices_items.invoice_id')
                        ->join('products', 'invoices_items.product_id', '=', 'products.id')
                        ->select('invoices_items.invoice_id as id', 'products.nama as nama', 'products.gambar as gambar', 'jumlah', 'sub_total');

        if ($id) {
            $transaction_details = $temp->where('user_id', $id)->get();
        } else {
            $transaction_details = $temp->get();
        }

        return $transaction_details;
    }
}
