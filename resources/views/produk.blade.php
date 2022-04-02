@extends('layouts.main')

@section('content')
<section class="max-w-full bg-stone-100 mt-[8rem]">
    <!-- Kategori -->
    <div class="max-w-screen-xl mx-auto px-4">
        @include('notifikasi')
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
        <div class="relative mt-6">
            <div class="signature">
                @foreach ($signatures as $signature)
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
                            @if ($signature->diskon > 0)
                                <div class="text-white font-semibold -translate-y px-2 py-1 bg-red-500 rounded-lg absolute opacity-70">Diskon {{ $signature->diskon*100 }} %</div>
                            @endif
                            <img src="{{ asset('storage/' . $signature->gambar) }}" alt="" class="object-cover w-40 h-40">
                        </div>
                        <span class="text-green-500">Tersedia</span>
                        <a href="" class="font-bold text-lg text-center">{{ $signature->nama }}</a>
                        <span class="text-teal-600 text-lg font-bold">@money($signature->harga-$signature->harga*$signature->diskon)</span>
                        <div>
                            <form action="{{ url('addcart', $signature->id) }}" method="POST">
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
                <button id="btn-next"
                    class="absolute block rounded-[50%] p-2 bg-green-400 top-[50%] right-5 -translate-y-[50%] translate-x-[50%] shadow z-10 hover:bg-green-500"><svg
                        xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                    </svg>
                </button>
                <button id="btn-prev"
                    class="absolute block rounded-[50%] p-2 bg-green-400 top-[50%] left-5 -translate-y-[50%] -translate-x-[50%] shadow z-10 hover:bg-green-500"><svg
                        xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
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
        <div class="relative mt-6">
            <div class="coffee">
                @foreach ($coffees as $coffee)
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
                            @if ($coffee->diskon > 0)
                                <div class="text-white font-semibold -translate-y px-2 py-1 bg-red-500 rounded-lg absolute opacity-70">Diskon {{ $coffee->diskon*100 }} %</div>
                            @endif
                            <img src="{{ asset('storage/' . $coffee->gambar) }}" alt="" class="object-cover w-40 h-40">
                        </div>
                        <span class="text-green-500">Tersedia</span>
                        <a href="" class="font-bold text-lg text-center">{{ $coffee->nama }}</a>
                        <span class="text-teal-600 text-lg font-bold">@money($coffee->harga-$coffee->harga*$coffee->diskon)</span>
                        <div>
                            <form action="{{ url('addcart', $coffee->id) }}" method="POST">
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
                <button id="btn-next-coffee"
                    class="absolute block rounded-[50%] p-2 bg-green-400 top-[50%] right-5 -translate-y-[50%] translate-x-[50%] shadow z-10 hover:bg-green-500"><svg
                        xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                    </svg>
                </button>
                <button id="btn-prev-coffee"
                    class="absolute block rounded-[50%] p-2 bg-green-400 top-[50%] left-5 -translate-y-[50%] -translate-x-[50%] shadow z-10 hover:bg-green-500"><svg
                        xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                    </svg>
                </button>
            </div>
        </div>

    <!-- Non Coffee -->
        <span class="mt-10 block text-lg font-bold">Minuman Non-Coffee</span>
        <div class="relative mt-6">
            <div class="non-coffee">
                @foreach ($non_coffees as $non_coffee)
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
                            @if ($non_coffee->diskon > 0)
                                <div class="text-white font-semibold -translate-y px-2 py-1 bg-red-500 rounded-lg absolute opacity-70">Diskon {{ $non_coffee->diskon*100 }} %</div>
                            @endif
                            <img src="{{ asset('storage/' . $non_coffee->gambar) }}" alt="" class="object-cover w-40 h-40">
                        </div>
                        <span class="text-green-500">Tersedia</span>
                        <a href="" class="font-bold text-lg text-center">{{ $non_coffee->nama }}</a>
                        <span class="text-teal-600 text-lg font-bold">@money($non_coffee->harga-$non_coffee->harga*$non_coffee->diskon)</span>
                        <div>
                            <form action="{{ url('addcart', $non_coffee->id) }}" method="POST">
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
                <button id="btn-next-non-coffee"
                    class="absolute block rounded-[50%] p-2 bg-green-400 top-[50%] right-5 -translate-y-[50%] translate-x-[50%] shadow z-10 hover:bg-green-500"><svg
                        xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                    </svg>
                </button>
                <button id="btn-prev-non-coffee"
                    class="absolute block rounded-[50%] p-2 bg-green-400 top-[50%] left-5 -translate-y-[50%] -translate-x-[50%] shadow z-10 hover:bg-green-500"><svg
                        xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
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
        <div class="relative mt-6">
            <div class="snack">
                @foreach ($snacks as $snack)
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
                            @if ($snack->diskon > 0)
                                <div class="text-white font-semibold -translate-y px-2 py-1 bg-red-500 rounded-lg absolute opacity-70">Diskon {{ $snack->diskon*100 }} %</div>
                            @endif
                            <img src="{{ asset('storage/' . $snack->gambar) }}" alt="" class="object-cover w-40 h-40">
                        </div>
                        <span class="text-green-500">Tersedia</span>
                        <a href="" class="font-bold text-lg text-center">{{ $snack->nama }}</a>
                        <span class="text-teal-600 text-lg font-bold">@money($snack->harga-$snack->harga*$snack->diskon)</span>
                        <div>
                            <form action="{{ url('addcart', $snack->id) }}" method="POST">
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
                <button id="btn-next-snack"
                    class="absolute block rounded-[50%] p-2 bg-green-400 top-[50%] right-5 -translate-y-[50%] translate-x-[50%] shadow z-10 hover:bg-green-500"><svg
                        xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                    </svg>
                </button>
                <button id="btn-prev-snack"
                    class="absolute block rounded-[50%] p-2 bg-green-400 top-[50%] left-5 -translate-y-[50%] -translate-x-[50%] shadow z-10 hover:bg-green-500"><svg
                        xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                    </svg>
                </button>
            </div>
        </div>

    <!-- Daily Food -->
        <span class="mt-10 block text-lg font-bold">Daily Food</span>
        <div class="relative mt-6">
            <div class="daily-food">
                @foreach ($daily_foods as $daily_food)
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
                            @if ($daily_food->diskon > 0)
                                <div class="text-white font-semibold -translate-y px-2 py-1 bg-red-500 rounded-lg absolute opacity-70">Diskon {{ $daily_food->diskon*100 }} %</div>
                            @endif
                            <img src="{{ asset('storage/' . $daily_food->gambar) }}" alt="" class="object-cover w-40 h-40">
                        </div>
                        <span class="text-green-500">Tersedia</span>
                        <a href="" class="font-bold text-lg text-center">{{ $daily_food->nama }}</a>
                        <span class="text-teal-600 text-lg font-bold">@money($daily_food->harga-$daily_food->harga*$daily_food->diskon)</span>
                        <div>
                            <form action="{{ url('addcart', $daily_food->id) }}" method="POST">
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
                <button id="btn-next-daily-food"
                    class="absolute block rounded-[50%] p-2 bg-green-400 top-[50%] right-5 -translate-y-[50%] translate-x-[50%] shadow z-10 hover:bg-green-500"><svg
                        xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                    </svg>
                </button>
                <button id="btn-prev-daily-food"
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
<script src="{{ asset('js/produk.js') }}"></script>

@endsection
