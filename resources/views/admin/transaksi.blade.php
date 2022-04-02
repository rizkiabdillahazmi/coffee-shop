@extends('layouts.admin.main')
@section('content')
<!-- MAIN -->
<main>
    @include('notifikasi')
    <div class="head-title">
        <div class="left">
            <h1>{{ $title }}</h1>
            <ul class="breadcrumb">
                <li>
                    <a href="#">Dashboard</a>
                </li>
                <li><i class='bx bx-chevron-right'></i></li>
                <li>
                    <a class="active" href="#">{{ $title }}</a>
                </li>
            </ul>
        </div>
    </div>

    <div class="box-info">
        <div class="w-full mx-auto flex justify-start items-center gap-16">
            <div
                class="flex justify-between items-center gap-8 p-4 border-l-8 border-red-500 shadow-lg rounded-md w-80">
                <div class="flex flex-col">
                    <span class="font-bold text-2xl">{{ $order_konfirmasi }} Order</span>
                    <span class="mb-2 font-semibold">Butuh Konfirmasi</span>
                </div>
                <div class="p-4 bg-red-300 rounded-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                    </svg>
                </div>
            </div>
            <div
                class="flex justify-between items-center gap-8 p-4 border-l-8 border-yellow-500 shadow-lg rounded-md w-80">
                <div class="flex flex-col">
                    <span class="font-bold text-2xl">{{ $order_proses }} Order</span>
                    <span class="mb-2 font-semibold">Sedang Diproses</span>
                </div>
                <div class="p-4 bg-yellow-300 rounded-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                    </svg>
                </div>
            </div>
            <div
                class="flex justify-between items-center gap-8 p-4 border-l-8 border-green-500 shadow-lg rounded-md w-80">
                <div class="flex flex-col">
                    <span class="font-bold text-2xl">{{ $order_selesai }} Order</span>
                    <span class="mb-2 font-semibold">Selesai</span>
                </div>
                <div class="p-4 bg-green-300 rounded-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
            </div>
        </div>
    </div>

    <div class="table-data">
        <div class="w-full mx-auto rounded-md overflow-hidden">
            <div class="px-4 py-4">
                <div class="head">
                    <h3>Recent Orders</h3>
                </div>
                <div
                    class="mt-5 grid grid-cols-[repeat(2,_0.8fr)_0.8fr_0.8fr_repeat(2,_0.3fr)] 2xl:grid-cols-[repeat(2,_0.8fr)_0.6fr_repeat(2,_0.6fr)_0.8fr] justify-items-center item-center border-b border-stone-200 px-4 py-3 font-bold text-sm">
                    <div>
                        User
                    </div>
                    <div>
                        Invoice
                    </div>
                    <div>
                        Tanggal Order
                    </div>
                    <div>
                        Status
                    </div>
                    <div>
                        Rincian Order
                    </div>
                    <div>
                        Pesanan
                    </div>
                </div>
                @foreach ($transactions as $transaction)
                <div class="dropdown__wrapper py-4 rounded">
                    <div
                        class="dropdown__cell grid grid-cols-[repeat(2,_0.8fr)_0.8fr_0.8fr_repeat(2,_0.3fr)] 2xl:grid-cols-[repeat(2,_0.8fr)_0.6fr_repeat(2,_0.6fr)_0.8fr] justify-items-center items-center px-4">
                        <div class="justify-self-start flex items-center gap-3">
                            <img class="rounded-full w-9 h-9 border-2 border-teal-500 md:w-6 md:h-6 md:border"
                                src="{{ asset('img/avatar.svg') }}">
                            <span>{{ $transaction->nama }}</span>
                        </div>
                        <div>
                            {{ $transaction->invoice }}
                        </div>
                        <div>
                            {{ date('d-m-Y H:m:s', strtotime($transaction->tanggal_order)) }}
                        </div>
                        <div>
                            @if ($transaction->status == 1)
                            <span class="bg-red-400 py-2 px-4 font-semibold rounded-full text-xs text-white">Butuh
                                Konfirmasi</span>
                            @elseif ($transaction->status == 2)
                            <span class="bg-yellow-500 py-2 px-4 font-semibold rounded-full text-xs text-white">Sedang
                                Diproses</span>
                            @elseif ($transaction->status == 3)
                            <span
                                class="bg-green-600 py-2 px-4 font-semibold rounded-full text-xs text-white">Selesai</span>
                            @endif
                        </div>
                        <div class="button-show cursor-pointer" onclick="expandCell(this,event)">
                            <button
                                class="flex items-center gap-1 bg-teal-600 py-2 px-2 rounded-md text-xs text-white font-bold">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                    </path>
                                </svg>
                                <p class="hidden 2xl:block">Rincian</p>
                            </button>
                        </div>
                        <div class="flex gap-2 items-center">
                            <form action="{{ url('/admin/transaksi/konfirmasi', $transaction->id) }}" , method="POST">
                                @csrf
                                <button
                                    class="bg-yellow-500 py-2 px-2 rounded-md text-xs text-white font-bold flex items-center gap-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                    </svg>
                                    <span class="hidden 2xl:block">Konfirmasi</span>
                                </button>
                            </form>
                            <form action=" {{ url('/admin/transaksi/selesai', $transaction->id) }}" , method="POST">
                                @csrf
                                <button
                                    class="bg-green-600 py-2 px-2 2xl:px-5 rounded-md text-xs text-white font-bold flex items-center gap-1 bg">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <span class="hidden 2xl:block">Selesai</span>
                                </button>
                            </form>
                        </div>
                    </div>
                    <div
                        class="dropdown__cell-content transition-all duration-300 ease-[ease] max-h-0 overflow-hidden overflow-y-scroll">
                        <div class="w-full mx-auto px-20">
                            <div class="flex justify-between font-semibold border-t border-teal-500 px-2 py-2">
                                <div class="w-2/4">Nama Produk</div>
                                <div class="w-1/4 text-center">Jumlah</div>
                                <div>Sub Total</div>
                            </div>
                            <?php $total=0; ?>
                            @foreach ($transaction_details as $transaction_detail)
                            @if ($transaction_detail->id == $transaction->id)
                            <?php $total=$total+$transaction_detail->sub_total; ?>
                            <div class="flex justify-between px-2 py-2">
                                <div class="w-2/4 flex gap-3 items-center">
                                    <img class="rounded-full border-2 border-teal-400 w-8"
                                        src="{{ asset('storage/' . $transaction_detail->gambar) }}" alt="">
                                    <div>{{ $transaction_detail->nama }}</div>
                                </div>
                                <div class="w-1/4 text-center">{{ $transaction_detail->jumlah }}</div>
                                <div>@money($transaction_detail->sub_total)</div>
                            </div>
                            @endif
                            @endforeach
                            <div class="flex justify-between bg-teal-600 rounded-md mt-2 px-2 py-2 font-semibold">
                                <div>Total</div>
                                <div>@money($total)</div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</main>

<script src="{{ asset('js/dropdown-table.js') }}"></script>
<!-- MAIN -->
@endsection
