@extends('layouts.main')

@section('content')
<section class="max-w-full bg-stone-100 mt-[8rem]">
    <!-- Kategori -->
    <div class="max-w-screen-xl mx-auto px-4">
        <span class="block font-medium text-teal-600">Belanja Yuk</span>
        <span class="block text-2xl font-bold">Kategori</span>
        <div class="mt-6 flex justify-start space-x-8">
            <div class="">
                <a href="#minuman" class="text-center text-sm font-semibold block px-12 py-6 bg-white rounded-md border-4 border-transparent hover:border-teal-500"><img src="{{ asset('img/drink.png') }}" alt="" class="w-14 h-14 mb-4 block mx-auto">Minuman</a>
            </div>
            <div class="">
                <a href="#makanan" class="text-center text-sm font-semibold block px-12 py-6 bg-white rounded-md border-4 border-transparent hover:border-teal-500"><img src="{{ asset('img/food.png') }}" alt="" class="w-14 h-14 mb-4 block mx-auto"> Makanan</a>
            </div>
        </div>
    </div>
    <!-- Signature -->
    <div class="mt-16 max-w-screen-xl w-screen mx-auto px-4">
        <span class="block font-medium text-teal-600">Untuk Kamu</span>
        <span class="block text-2xl font-bold">Menu Signature</span>
        <div class="swiper productSwiper mt-6">
            <div class="swiper-wrapper">
                @foreach ($signatures as $signature)
                <div class="swiper-slide">
                    <div class="flex flex-col justify-center items-center bg-white px-8 py-6 rounded-md mx-5 border-4 border-transparent hover:border-teal-500">
                        <div class="relative">
                            <span class="absolute bg-teal-400 rounded-full p-2 opacity-60 right-0 -translate-y-3 translate-x-3">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                                </svg></span>
                            <img src="{{ $signature->gambar }}" alt="" class="object-cover w-40 h-40">
                        </div>
                        <span class="text-green-500">Tersedia</span>
                        <a href="" class="font-bold text-lg text-center">{{ $signature->nama }}</a>
                        <span class="text-teal-600 text-lg font-bold">Rp. {{ $signature->harga-$signature->harga*$signature->diskon }}</span>
                        <form action="{{ url('addcart', $signature->id) }}" method="POST">
                            @csrf
                            <button id="tes" class="px-3 py-2 text-white bg-blue-600 rounded-lg hover:bg-blue-900">Add Cart</button>
                        </form>
                        {{-- <button class="px-6 py-2 text-white bg-blue-600 rounded-lg hover:bg-blue-900">Add Cart</button> --}}
                        {{-- <a href="" class="mt-4 inline-block bg-teal-200 px-2 py-2 rounded-md font-semibold hover:bg-teal-300"><svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline mr-1" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z" />
                            </svg>Add to Cart</a> --}}
                    </div>
                </div>
                @endforeach
            </div>

                <div class="swiper-button-next1 text-teal-600">
                    <button id="btn-next" class="absolute block rounded-[50%] p-2 bg-teal-400 top-[50%] right-5 -translate-y-[50%] translate-x-[50%] shadow z-50 hover:bg-teal-500"><svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                    </svg>
                </button>
                </div>
                <div class="swiper-button-prev1 text-teal-600">
                    <button id="btn-prev" class="absolute block rounded-[50%] p-2 bg-teal-400 top-[50%] left-5 -translate-y-[50%] -translate-x-[50%] shadow z-10 hover:bg-teal-500"><svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                    </svg>
                </button>
                </div>

        </div>
    </div>


    <!-- Aneka Minuman -->
    <div class="mt-16 max-w-screen-xl mx-auto px-4 scroll-mt-[8rem]" id="minuman">
        <span class="block text-2xl font-bold text-teal-600">Aneka Minuman</span>
        <!-- Coffee -->
        <span class="block text-lg font-bold">Minuman Coffee</span>
        <div class="swiper productSwiper mt-6">
            <div class="swiper-wrapper">
                @foreach ($coffees as $coffee)
                <div class="swiper-slide">
                    <div class="flex flex-col justify-center items-center bg-white px-8 py-6 rounded-md mx-5 border-4 border-transparent hover:border-teal-500">
                        <div class="relative">
                            <span class="absolute bg-teal-400 rounded-full p-2 opacity-60 right-0 -translate-y-3 translate-x-3">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                                </svg></span>
                            <img src="{{ $coffee->gambar }}" alt="" class="object-cover w-40 h-40">
                        </div>
                        <span class="text-green-500">Tersedia</span>
                        <a href="" class="font-bold text-lg text-center">{{ $coffee->nama }}</a>
                        <span class="text-teal-600 text-lg font-bold">Rp. {{ $coffee->harga-$coffee->harga*$coffee->diskon }}</span>
                        <a href="" class="mt-4 inline-block bg-teal-200 px-2 py-2 rounded-md font-semibold hover:bg-teal-300"><svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline mr-1" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z" />
                            </svg>Add to Cart</a>
                    </div>
                </div>
                @endforeach
            </div>

                <div class="swiper-button-next1 text-teal-600">
                    <button id="btn-next" class="absolute block rounded-[50%] p-2 bg-teal-400 top-[50%] right-5 -translate-y-[50%] translate-x-[50%] shadow z-50 hover:bg-teal-500"><svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                    </svg>
                </button>
                </div>
                <div class="swiper-button-prev1 text-teal-600">
                    <button id="btn-prev" class="absolute block rounded-[50%] p-2 bg-teal-400 top-[50%] left-5 -translate-y-[50%] -translate-x-[50%] shadow z-10 hover:bg-teal-500"><svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                    </svg>
                </button>
                </div>

        </div>

    <!-- Non Coffee -->
        <span class="mt-10 block text-lg font-bold">Minuman Non-Coffee</span>
        <div class="swiper productSwiper mt-6">
            <div class="swiper-wrapper">
                @foreach ($non_coffees as $non_coffee)
                <div class="swiper-slide">
                    <div class="flex flex-col justify-center items-center bg-white px-8 py-6 rounded-md mx-5 border-4 border-transparent hover:border-teal-500">
                        <div class="relative">
                            <span class="absolute bg-teal-400 rounded-full p-2 opacity-60 right-0 -translate-y-3 translate-x-3">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                                </svg></span>
                            <img src="{{ $non_coffee->gambar }}" alt="" class="object-cover w-40 h-40">
                        </div>
                        <span class="text-green-500">Tersedia</span>
                        <a href="" class="font-bold text-lg text-center">{{ $non_coffee->nama }}</a>
                        <span class="text-teal-600 text-lg font-bold">Rp. {{ $non_coffee->harga-$non_coffee->harga*$non_coffee->diskon }}</span>
                        <a href="" class="mt-4 inline-block bg-teal-200 px-2 py-2 rounded-md font-semibold hover:bg-teal-300"><svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline mr-1" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z" />
                            </svg>Add to Cart</a>
                    </div>
                </div>
                @endforeach
            </div>

                <div class="swiper-button-next1 text-teal-600">
                    <button id="btn-next" class="absolute block rounded-[50%] p-2 bg-teal-400 top-[50%] right-5 -translate-y-[50%] translate-x-[50%] shadow z-50 hover:bg-teal-500"><svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                    </svg>
                </button>
                </div>
                <div class="swiper-button-prev1 text-teal-600">
                    <button id="btn-prev" class="absolute block rounded-[50%] p-2 bg-teal-400 top-[50%] left-5 -translate-y-[50%] -translate-x-[50%] shadow z-10 hover:bg-teal-500"><svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                    </svg>
                </button>
                </div>
        </div>

    </div>

    <!-- Aneka Makanan -->
    <div class="mt-16 max-w-screen-xl mx-auto px-4 scroll-mt-[8rem]" id="makanan">
        <span class="block text-2xl font-bold text-teal-600">Aneka Makanan</span>
        <!-- Snack -->
        <span class="block text-lg font-bold">Snack</span>
        <div class="swiper productSwiper mt-6">
            <div class="swiper-wrapper">
                @foreach ($snacks as $snack)
                <div class="swiper-slide">
                    <div class="flex flex-col justify-center items-center bg-white px-8 py-6 rounded-md mx-5 border-4 border-transparent hover:border-teal-500">
                        <div class="relative">
                            <span class="absolute bg-teal-400 rounded-full p-2 opacity-60 right-0 -translate-y-3 translate-x-3">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                                </svg></span>
                            <img src="{{ $snack->gambar }}" alt="" class="object-cover w-40 h-40">
                        </div>
                        <span class="text-green-500">Tersedia</span>
                        <a href="" class="font-bold text-lg text-center">{{ $snack->nama }}</a>
                        <span class="text-teal-600 text-lg font-bold">Rp. {{ $snack->harga-$snack->harga*$snack->diskon }}</span>
                        <a href="" class="mt-4 inline-block bg-teal-200 px-2 py-2 rounded-md font-semibold hover:bg-teal-300"><svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline mr-1" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z" />
                            </svg>Add to Cart</a>
                    </div>
                </div>
                @endforeach
            </div>

                <div class="swiper-button-next1 text-teal-600">
                    <button id="btn-next" class="absolute block rounded-[50%] p-2 bg-teal-400 top-[50%] right-5 -translate-y-[50%] translate-x-[50%] shadow z-50 hover:bg-teal-500"><svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                    </svg>
                </button>
                </div>
                <div class="swiper-button-prev1 text-teal-600">
                    <button id="btn-prev" class="absolute block rounded-[50%] p-2 bg-teal-400 top-[50%] left-5 -translate-y-[50%] -translate-x-[50%] shadow z-10 hover:bg-teal-500"><svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                    </svg>
                </button>
                </div>

        </div>

    <!-- Daily Food -->
        <span class="mt-10 block text-lg font-bold">Daily Food</span>
        <div class="swiper productSwiper mt-6">
            <div class="swiper-wrapper">
                @foreach ($daily_foods as $daily_food)
                <div class="swiper-slide">
                    <div class="flex flex-col justify-center items-center bg-white px-8 py-6 rounded-md mx-5 border-4 border-transparent hover:border-teal-500">
                        <div class="relative">
                            <span class="absolute bg-teal-400 rounded-full p-2 opacity-60 right-0 -translate-y-3 translate-x-3">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                                </svg></span>
                            <img src="{{ $daily_food->gambar }}" alt="" class="object-cover w-40 h-40">
                        </div>
                        <span class="text-green-500">Tersedia</span>
                        <a href="" class="font-bold text-lg text-center">{{ $daily_food->nama }}</a>
                        <span class="text-teal-600 text-lg font-bold">Rp. {{ $daily_food->harga-$daily_food->harga*$daily_food->diskon }}</span>
                        <a href="" class="mt-4 inline-block bg-teal-200 px-2 py-2 rounded-md font-semibold hover:bg-teal-300"><svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline mr-1" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z" />
                            </svg>Add to Cart</a>
                    </div>
                </div>
                @endforeach
            </div>

                <div class="swiper-button-next1 text-teal-600">
                    <button id="btn-next" class="absolute block rounded-[50%] p-2 bg-teal-400 top-[50%] right-5 -translate-y-[50%] translate-x-[50%] shadow z-50 hover:bg-teal-500"><svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                    </svg>
                </button>
                </div>
                <div class="swiper-button-prev1 text-teal-600">
                    <button id="btn-prev" class="absolute block rounded-[50%] p-2 bg-teal-400 top-[50%] left-5 -translate-y-[50%] -translate-x-[50%] shadow z-10 hover:bg-teal-500"><svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                    </svg>
                </button>
                </div>
        </div>

    </div>
</section>
@endsection
