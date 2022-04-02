@extends('layouts.main')

@section('content')
{{-- {{ dd($transaction_details) }} --}}
<section class="max-w-full bg-stone-100 mt-[8rem] min-h-screen">
    <div class="max-w-screen-xl mx-auto">
        @include('notifikasi')
        <span class="block text-2xl font-bold text-teal-600 mb-4">Transaksi</span>
        <div class="w-full mx-auto rounded-md overflow-hidden">
            @if (\App\Models\Invoice::where('user_id', Auth::user()->id)->count() !== 0)
            <div
                class="grid grid-cols-[0.2fr_repeat(3,_1fr)_0.4fr] justify-items-center items-center border-b-2 border-slate-300 uppercase px-4 py-3 text-white bg-teal-600 font-semibold">
                <div>
                    No
                </div>
                <div>
                    No Transaksi
                </div>
                <div>
                    Tanggal Order
                </div>
                <div>
                    Status
                </div>
                <div>
                    #
                </div>
            </div>
            @foreach ($transactions as $index => $transaction)
            <div class="dropdown__wrapper py-4 even:bg-white odd:bg-slate-200">
                <div
                    class="dropdown__cell grid grid-cols-[0.2fr_repeat(3,_1fr)_0.4fr] justify-items-center items-center px-4">
                    <div>
                        {{ $index + 1 }}
                    </div>
                    <div>
                        {{ $transaction->invoice }}
                    </div>
                    <div>
                        {{ $transaction->created_at }}
                    </div>
                    <div>
                        @if ($transaction->status == 1)
                        <span class="bg-red-400 py-2 px-4 rounded-full text-xs font-bold text-white">Menunggu
                            Konfirmasi</span>
                        @elseif ($transaction->status == 2)
                        <span class="bg-yellow-500 py-2 px-4 rounded-full text-xs font-bold text-white">Sedang
                            Diproses</span>
                        @elseif ($transaction->status == 3)
                        <span class="bg-green-600 py-2 px-4 rounded-full text-xs font-bold text-white">Selesai</span>
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
        @else
        <div class="h-[30rem] flex flex-col justify-center items-center">
            <div>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-32 w-32" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                </svg>
            </div>
            <div class="mt-10 text-3xl font-semibold">Ops Anda Belum Pernah Belanja, Silahkan lihat <a href="/produk"
                    class="text-green-600 hover:text-green-500">Produk</a> untuk Berbelanja</div>
        </div>
        @endif
    </div>
</section>

<script src="{{ asset('js/dropdown-table.js') }}"></script>

@endsection
