@extends('layouts.main')

@section('content')
<!-- Content -->
<section class="max-w-full bg-stone-100 mt-[7rem]">
    <!-- Slider -->
    <div class="mt-36 max-w-screen-xl w-screen mx-auto mb-10">
        @include('notifikasi')
        <div class="relative">
            <div class="jumbotron border-8 rounded-md border-white">
                <div>
                    <img class="object-fill w-full h-96" src="{{ asset('img/banner-1.png') }}" alt="Coffee Shop" />
                </div>
                <div><img class="object-fill w-full h-96" src="{{ asset('img/banner-2.png') }}" alt="Coffee Shop" /></div>
                <div><img class="object-fill w-full h-96" src="{{ asset('img/banner-3.png') }}" alt="Coffee Shop" /></div>
            </div>
            <div>
                <button id="btn-next-img"
                    class="absolute block top-[50%] right-10 -translate-y-[50%] translate-x-[50%] z-10"><svg
                        xmlns="http://www.w3.org/2000/svg" class="h-14 w-14 text-green-600 hover:text-green-500" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="3">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                    </svg>
                </button>
                <button id="btn-prev-img"
                    class="absolute block top-[50%] left-10 -translate-y-[50%] -translate-x-[50%] z-10"><svg
                        xmlns="http://www.w3.org/2000/svg" class="h-14 w-14 text-green-600 hover:text-green-500" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="3">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Promo -->
    <div class="mt-16 max-w-screen-xl w-screen mx-auto">
        <span class="block font-medium text-teal-600">Beli Sekarang</span>
        <span class="block text-2xl font-bold">Promo Spesial</span>
        <div class="relative mt-6">
            <div class="promo-produk">
                @foreach ($products as $product)
                <div>
                    <div
                        class="flex flex-col justify-center items-center bg-white px-8 py-6 rounded-md mx-5 border-4 border-transparent hover:border-teal-500">
                        <div class="relative">
                            <span
                                class="absolute bg-green-500 text-white rounded-full p-2 opacity-90 right-0 -translate-y-3 translate-x-3">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                        d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                                </svg>
                            </span>
                            <div class="text-white font-semibold -translate-y px-2 py-1 bg-red-500 rounded-lg absolute opacity-70">Diskon {{ $product->diskon*100 }} %</div>
                            <img src="{{ $product->gambar }}" alt="" class="object-cover w-40 h-40">
                        </div>
                        <span class="text-green-500">Tersedia</span>
                        <a href="" class="font-bold text-lg text-center">{{ $product->nama }}</a>
                        <span class="text-red-500 text-lg font-semibold line-through">@money($product->harga)</span>
                        <span class="text-teal-600 text-lg font-bold">@money($product->harga-$product->harga*$product->diskon)</span>
                        <div>
                            <form action="{{ url('addcart', $product->id) }}" method="POST">
                                @csrf
                                <button class="mt-4 px-3 py-2 text-xs font-bold text-white bg-green-500 rounded-lg hover:bg-green-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline mr-1" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z" />
                                    </svg>
                                Add Cart
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <div>
                <button id="btn-next-promo"
                    class="absolute block rounded-[50%] p-2 bg-green-400 top-[50%] right-5 -translate-y-[50%] translate-x-[50%] shadow z-10 hover:bg-green-500"><svg
                        xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                    </svg>
                </button>
                <button id="btn-prev-promo"
                    class="absolute block rounded-[50%] p-2 bg-green-400 top-[50%] left-5 -translate-y-[50%] -translate-x-[50%] shadow z-10 hover:bg-green-500"><svg
                        xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                    </svg>
                </button>
            </div>

        </div>

    </div>

</section>

<!-- Glider -->
<script src="{{ asset('js/glider.min.js') }}"></script>
<script src="{{ asset('js/glider-autoplay.js') }}"></script>
<script src="{{ asset('js/home.js') }}"></script>

@endsection