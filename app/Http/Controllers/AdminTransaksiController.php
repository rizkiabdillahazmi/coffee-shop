<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminTransaksiController extends Controller
{
    public function index()
    {
        return view('admin.transaksi', [
            'title' => 'Transaksi',
            'transactions' => Invoice::join('users', 'user', '=', 'users.id')
                            ->orderBy('status', 'ASC')
                            ->select('users.name as nama', 'invoices.id as id', 'invoices.invoice as invoice', 'invoices.created_at as tanggal_order', 'invoices.status as status')
                            ->get(),
            'transaction_details' => DB::table('invoices')
                                ->join('invoices_items', 'invoices.id', '=', 'invoices_items.invoice_id')
                                ->join('products', 'invoices_items.product_id', '=', 'products.id')
                                ->select('invoices_items.invoice_id as id', 'products.nama as nama', 'products.gambar as gambar', 'jumlah', 'sub_total', 'invoices.invoice as no_transaksi', 'invoices.created_at as tanggal_order', 'invoices.status as status')
                                ->get(),
        ]);
    }
}
