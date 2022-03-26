<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TransaksiController extends Controller
{
    public function indexUser()
    {
        $user_id = Auth::user()->id ;
        return view('transaksi', [
            'title' => 'Transaksi',
            'transactions' => Invoice::getTransactions($user_id),
            'transaction_details' => Invoice::getTransactionDetails($user_id),
        ]);
    }

    public function indexAdmin()
    {
        return view('admin.transaksi', [
            'title' => 'Transaksi',
            'order_konfirmasi' => Invoice::getOrdersByStatus('1'),
            'order_proses' => Invoice::getOrdersByStatus('2'),
            'order_selesai' => Invoice::getOrdersByStatus('3'),
            'transactions' => Invoice::getTransactions(),
            'transaction_details' => Invoice::getTransactionDetails(),
        ]);
    }
}
