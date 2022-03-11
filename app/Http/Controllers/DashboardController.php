<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'title' => 'Dashboard',
        ]);
    }

    public function produk()
    {
        return view('admin.produk', [
            'title' => 'Produk',
        ]);
    }

    public function transaksi()
    {
        return view('admin.transaksi', [
            'title' => 'Transaksi',
        ]);
    }
}
