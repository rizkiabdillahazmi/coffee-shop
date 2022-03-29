<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Invoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

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

    public function addTransaction(Request $request, $user_id){
        // foreach ($request->products as $product) {
        //     dd($product);
        // }
        $invoice = Invoice::create([
            'user_id' => $user_id,
            'invoice' => 'INV/'.date('dmY/His').'/'.$user_id,
            'status' => 1,
        ]);

        foreach ($request->products as $product) {
            $invoice_item = $invoice->hasMany('App\Models\InvoicesItem', 'invoice_id')->create([
                'product_id' => $product['id'],
                'jumlah' => $product['jumlah'],
                'sub_total' => $product['sub_total'],
            ]);
            Cart::where('user_id', $user_id)->where('product_id', $product['id'])->delete();
        }
        // $invoice_item = $invoice->hasMany('App\Models\InvoicesItem', 'invoice_id')->create([
        //     'product_id' => 3,
        //     'jumlah' => 2,
        //     'sub_total' => 2,
        // ]);

        if($invoice_item){
            return redirect('/transaksi')->with('sukses','Produk berhasil dipesan, Silahkan tunggu konfirmasi dari Admin');
        }
    }

    public function konfirmasiPesanan($id)
    {
        $affectedRows = Invoice::konfirmasiPesanan($id);
        if($affectedRows){
            return back()->with('sukses','Pesanan berhasil dikonfirmasi');
        }
    }

    public function selesaikanPesanan($id)
    {
        $affectedRows = Invoice::selesaikanPesanan($id);
        if($affectedRows){
            return back()->with('sukses','Pesanan Telah Selesai');
        }
    }
}
