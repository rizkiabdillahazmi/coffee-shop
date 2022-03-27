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
                   @foreach ($carts as $cart)
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
                               <div id="sub-total" class="text-green-600 text-lg font-bold">@money($cart->sub_total)</div>
                           </div>
                           <div>
                               <form action="{{ url('deletecart', $cart->product_id) }}" method="POST" class="flex justify-between">
                                @csrf
                                   <div class="font-bold flex gap-2 justify-start items-center">
                                       <span>Jumlah :</span>
                                       <input id="jumlah" type="number" min="1" max="" value="{{ $cart->jumlah }}" class="w-10 text-center border-4 rounded-lg">
                                   </div>
                                   <button type="submit" class="flex items-center gap-1 text-xs text-white font-bold bg-red-500 hover:bg-red-600 px-5 py-2 rounded-lg">
                                       <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                           <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                         </svg>
                                       Hapus
                                   </button>
                               </form>
                           </div>
                       </div>
                   </div> 
                   @endforeach
                </div>
                <div class="w-1/3 px-4 py-5 rounded-md bg-white border-4 border-green-400 shadow-md">
                    <div class="text-xl font-bold">Konfirmasi Pesanan</div>
                    <div class="mt-4 mb-8 font-semibold text-slate-600">Silahkan klik tombol konfirmasi untuk melihat jumlah dan harga total produk yang akan dipesan</div>
                    <div class="flex justify-between">
                        <form action="">
                            <button type="submit" class="px-4 py-2 bg-green-600 hover:bg-green-700 rounded-md font-bold text-sm text-white flex items-center gap-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                  </svg>
                                Konfirmasi
                            </button>
                        </form>
                        <a href="/produk" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 rounded-md font-bold text-sm text-white flex gap-1 items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                            </svg>
                            Kembali Belanja
                        </a>
                    </div>
                </div>
            </div>
    
            @else
                <div class="h-[30rem] flex flex-col justify-center items-center">
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-32 w-32" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                        </svg>
                    </div>
                    <div class="mt-10 text-3xl font-semibold">Ops Keranjang Kosong, Silahkan lihat <a href="/produk" class="text-green-600 hover:text-green-500">Produk</a> untuk Berbelanja</div>
                </div>
            @endif
        </div>
    </div>
</section>

<script>
    // ambil elemen2 yang dibutuhkan
    const jumlah = document.getElementById('jumlah');
    const keranjang = document.getElementById('keranjang');
    const sub_total = document.getElementById('sub-total');

    // tambahkan event ketika keyword ditulis
    jumlah.addEventListener('change', function() {

        // buat object ajax
        const xhr = new XMLHttpRequest();

        // cek kesiapan ajax
        xhr.onreadystatechange = function() {
            if( xhr.readyState == 4 && xhr.status == 200 ) {
                keranjang.innerHTML = xhr.responseText;
            }
        }

        // eksekusi ajax
        xhr.open('GET', '/produk', true);
        xhr.send();

    });
</script>

@endsection