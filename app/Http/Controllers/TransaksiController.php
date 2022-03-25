<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TransaksiController extends Controller
{
    public function index()
    {
        $user_id = Auth::user()->id ;
        return view('transaksi', [
            'title' => 'Transaksi',
            'transactions' => Invoice::orderBy('status', 'ASC')->where('user', $user_id)->get(),
            'transaction_details' => DB::table('invoices')
                                ->join('invoices_items', 'invoices.id', '=', 'invoices_items.invoice_id')
                                ->join('products', 'invoices_items.product_id', '=', 'products.id')
                                ->select('invoices_items.invoice_id as id', 'products.nama as nama', 'products.gambar as gambar', 'jumlah', 'sub_total')
                                ->where('user', $user_id)
                                ->get(),
        ]);
    }
}
