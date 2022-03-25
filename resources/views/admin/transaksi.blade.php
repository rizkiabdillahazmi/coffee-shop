@extends('layouts.admin.main')
@section('content')
<!-- MAIN -->
<main>
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
        <a href="#" class="btn-download">
            <i class='bx bxs-cloud-download'></i>
            <span class="text">Download PDF</span>
        </a>
    </div>

    <ul class="box-info">
        <li>
            <i class='bx bxs-calendar-check'></i>
            <span class="text">
                <h3>1020</h3>
                <p>New Order</p>
            </span>
        </li>
        <li>
            <i class='bx bxs-group'></i>
            <span class="text">
                <h3>2834</h3>
                <p>Visitors</p>
            </span>
        </li>
        <li>
            <i class='bx bxs-dollar-circle'></i>
            <span class="text">
                <h3>$2543</h3>
                <p>Total Sales</p>
            </span>
        </li>
    </ul>

    <div class="table-data">
        <div class="w-full mx-auto rounded-md overflow-hidden">
            <div class="px-4 py-4">
                <div class="head">
                    <h3>Recent Orders</h3>
                    <i class='bx bx-search'></i>
                    <i class='bx bx-filter'></i>
                </div>
                <div
                    class="grid grid-cols-[repeat(2,_0.8fr)_0.6fr_repeat(2,_0.6fr)_0.8fr] justify-items-center item-center border-b border-stone-200 px-4 py-3 font-bold text-sm">
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
                        Aksi
                    </div>
                </div>
                @foreach ($transactions as $transaction)
                <div class="dropdown__wrapper py-4 hover:bg-[#eee] rounded">
                    <div
                        class="dropdown__cell grid grid-cols-[repeat(2,_0.8fr)_0.6fr_repeat(2,_0.6fr)_0.8fr] justify-items-center items-center px-4">
                        <div class="justify-self-start flex items-center gap-3">
                            <img class="rounded-full w-9 h-9 border-2 border-teal-500"
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
                            <span class="bg-red-400 py-2 px-4 rounded-full text-xs font-bold text-white">Butuh
                                Konfirmasi</span>
                            @elseif ($transaction->status == 2)
                            <span class="bg-yellow-500 py-2 px-4 rounded-full text-xs font-bold text-white">Sedang
                                Diproses</span>
                            @elseif ($transaction->status == 3)
                            <span
                                class="bg-green-600 py-2 px-4 rounded-full text-xs font-bold text-white">Selesai</span>
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
                                <p>Rincian</p>
                            </button>
                        </div>
                        <div class="flex gap-2 items-center">
                            <form action="">
                                <button
                                    class="bg-yellow-500 py-2 px-2 rounded-md text-xs text-white font-bold flex items-center gap-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                    </svg>
                                    <span>Konfirmasi</span>
                                </button>
                            </form>
                            <form action="">
                                <button
                                    class="bg-green-600 py-2 px-2 rounded-md text-xs text-white font-bold flex items-center gap-1 bg">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <span>Selesai</span>
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
                                        src="{{ $transaction_detail->gambar }}" alt="">
                                    <div>{{ $transaction_detail->nama }}</div>
                                </div>
                                <div class="w-1/4 text-center">{{ $transaction_detail->jumlah }}</div>
                                <div>{{ $transaction_detail->sub_total }}</div>
                            </div>
                            @endif
                            @endforeach
                            <div class="flex justify-between bg-teal-600 rounded-md mt-2 px-2 py-2 font-semibold">
                                <div>Total</div>
                                <div>Rp. {{ $total }}</div>
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
