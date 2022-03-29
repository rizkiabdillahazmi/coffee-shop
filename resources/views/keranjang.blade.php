@extends('layouts.main')

@section('content')
{{-- {{ dd($carts) }} --}}
<section class="max-w-full bg-stone-100 mt-[8rem] min-h-screen">
    <div class="max-w-screen-xl mx-auto">
        @include('notifikasi')
        <span class="block text-2xl font-bold text-teal-600 mb-8">Keranjang Belanja</span>
        <div class="w-full mx-auto">
            @if (\App\Models\Cart::where('user_id', Auth::user()->id)->count() !== 0)
            <div class="flex justify-between items-start">
                <div class="w-1/2">
                    @foreach ($carts as $index => $cart)
                    <div class="mb-8 flex justify-between bg-white rounded-lg">
                        <div class="w-1/3 p-5">
                            <img src="{{ $cart->gambar_produk }}" alt="" class="rounded-md w-40 h-40">
                        </div>
                        <div class="w-2/3 p-5 flex flex-col justify-between">
                            <div>
                                <div class="text-2xl font-bold">{{ $cart->nama_produk }}</div>
                                <div class="mt-1 font-semibold">Harga Satuan : </div>
                                @if ($cart->diskon > 0)
                                <div class="text-red-500 line-through font-bold"> @money($cart->harga) </div>
                                @endif
                                <div id="sub-total" class="text-green-600 text-lg font-bold"
                                    value="{{$cart->sub_total}}">@money($cart->sub_total)
                                </div>
                            </div>
                            <div class="flex justify-between">
                                <div class="font-bold flex gap-2 justify-start items-center">
                                    <span>Jumlah :</span>
                                    <form action="{{ url('updatejumlah', $cart->id) }}" method="POST"
                                        class="flex items-center">
                                        @csrf
                                        <input id="{{ $index }}" type="number" min="1" max="10" name="jumlah"
                                            value="{{ $cart->jumlah }}" onchange="ubahRincian(this.id, this.value)"
                                            onkeydown="return false"
                                            class="w-10 text-center border-4 rounded-lg focus:border-blue-500 outline-none">

                                        <button type="submit"
                                            class="ml-2 flex items-center justify-center gap-1 font-semibold bg-blue-500 hover:bg-blue-600 rounded-md px-2 py-1 text-white"><svg
                                                xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                                            </svg>Update</button>
                                    </form>
                                </div>
                                <form action="{{ url('deletecart', $cart->product_id) }}" method="POST"
                                    class="flex justify-between">
                                    @csrf
                                    <button type="submit"
                                        class="flex items-center gap-1 text-xs text-white font-bold bg-red-500 hover:bg-red-600 px-5 py-2 rounded-lg">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="w-[35%] px-4 py-5 rounded-md bg-white border-4 border-green-600 shadow-md">
                    <span class="text-xl flex justify-center font-bold mb-2">Rincian Pemesanan</span>
                    <div class="flex justify-between font-semibold text-center bg-green-500 py-1 rounded-md text-white">
                        <div class="w-1/6">No</div>
                        <div class="w-2/6">Nama</div>
                        <div class="w-1/6">Jumlah</div>
                        <div class="w-2/6">Sub Total</div>
                    </div>
                    <form action="{{ url('transaksi', Auth::user()->id) }}" method="POST">
                        @csrf
                        @foreach ($carts as $index => $cart)
                        <div class="flex justify-between">
                            {{-- <input type="number" name="product_id[]" value="{{ $cart->product_id }}" id="" hidden>
                            --}}
                            <input type="number" name="products[{{ $index }}][id]" value="{{ $cart->product_id }}" id=""
                                hidden>
                            <input type="number" name="products[{{ $index }}][jumlah]" value="1" min="1" max="10" id=""
                                hidden>
                            <input type="number" name="products[{{ $index }}][sub_total]"
                                class="sub-total w-2/6 outline-none text-center m-0"
                                value="{{ $cart->sub_total *$cart->jumlah }}" id="sub_total-{{ $index }}" hidden>
                            <div class="w-1/6 text-center">{{ $index + 1 }}</div>
                            <div class="w-2/6">{{ $cart->nama_produk }}</div>
                            <div class="w-1/6 flex justify-center gap-1">
                                <div id="jumlah-{{ $index }}">{{ $cart->jumlah }}</div>
                                <div>Item</div>
                            </div>
                            <div class="w-2/6 text-center" id="sub-total-{{ $index }}">@money($cart->sub_total
                                *$cart->jumlah)</div>
                        </div>
                        @endforeach
                        <div class="mt-2 flex justify-between font-bold text-center rounded-lg bg-slate-400">
                            <div class="w-4/6">Total</div>
                            <div id="total_harga" class="w-2/6"></div>
                        </div>

                        <div class="w-full border-b-4 mt-5 mb-3"></div>
                        <div class="text-xl font-bold">Konfirmasi Pesanan</div>
                        <div class="mt-1 mb-4 font-semibold text-slate-600">Silahkan klik tombol konfirmasi untuk
                            melakukan Pemesanan</div>
                        <div class="flex justify-between">

                            <button type="submit"
                                class="px-4 py-2 bg-green-600 hover:bg-green-700 rounded-md font-bold text-sm text-white flex items-center gap-1">
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z">
                                    </path>
                                </svg>
                                Konfirmasi
                            </button>

                            <a href="/produk"
                                class="px-4 py-2 bg-blue-600 hover:bg-blue-700 rounded-md font-bold text-sm text-white flex gap-1 items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                                </svg>
                                Kembali Belanja
                            </a>
                        </div>
                    </form>
                </div>
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
                <div class="mt-10 text-3xl font-semibold">Ops Keranjang Kosong, Silahkan lihat <a href="/produk"
                        class="text-green-600 hover:text-green-500">Produk</a> untuk Berbelanja</div>
            </div>
            @endif
        </div>
    </div>

</section>

<style>
    input[type='number'].sub-total::-webkit-inner-spin-button,
    input[type='number'].sub-total::-webkit-outer-spin-button {
        -webkit-appearance: none;
        /* margin: 0; */
    }
</style>

<script>
    let elements = document.querySelectorAll('#sub-total');
    const harga = [];
    let total_harga = 0;

    const rupiah = (number)=>{
        return new Intl.NumberFormat("id-ID", {
            style: "currency",
            currency: "IDR",
            maximumSignificantDigits: Math.trunc(Math.abs(number)).toFixed().length,
        }).format(number);
    }

    document.addEventListener('DOMContentLoaded', function() {
        // alert("Ready!");
        for (let i = 0; i < elements.length; i++) {
            harga.push(Number(elements[i].getAttribute('value')));
            total_harga += Number(document.getElementById(`sub_total-${i}`).getAttribute('value'));
        }
        document.getElementById(`total_harga`).innerHTML = rupiah(total_harga);
    }, false);

    function ubahRincian(id, jumlah){
        let jumlah_awal = Number(document.getElementById(`jumlah-${id}`).innerHTML)

        let sub_total;
        sub_total = jumlah * harga[id];
        document.getElementById(`sub_total-${id}`).value = sub_total;
        document.getElementById(`sub-total-${id}`).innerHTML = rupiah(sub_total);
        document.getElementById(`jumlah-${id}`).innerHTML = jumlah;

        document.getElementsByName(`products[${id}][jumlah]`)[0].value = jumlah;
        document.getElementsByName(`products[${id}][sub_total]`).value = sub_total;
        // document.getElementsByName(`products[${id}][jumlah]`).value = jumlah;

        if(jumlah>jumlah_awal){
            document.getElementById(`total_harga`).innerHTML = rupiah(total_harga+harga[id]);
            total_harga = total_harga+harga[id];
            // console.log(this.total_harga_awal+harga[id]);
        }
        else {
            document.getElementById(`total_harga`).innerHTML = rupiah(total_harga-harga[id]);
            total_harga = total_harga-harga[id];
        }

    }
</script>

@endsection