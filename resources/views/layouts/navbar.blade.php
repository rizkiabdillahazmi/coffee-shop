<nav class="fixed z-50 top-0 left-0 right-0 bg-white rounded">
    <div class="max-w-full px-8 flex flex-row justify-between items-center border-b-[1px] border-b-gray-300">
        <!-- Title -->
        <div class="flex justify-start items-center space-x-10">
            <div>
                <a href="" class="font-bold">Coffee Shop</a>
            </div>
            <!-- Search -->
            <div class="flex items-center bg-stone-100 rounded-md px-2">
                <input class="bg-transparent h-10 pr-36 text-sm focus:outline-none" type="search" name="search" placeholder="Cari Produk...">
                <button type="submit" class="">
                    <svg class="text-gray-600 h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 56.966 56.966" style="enable-background:new 0 0 56.966 56.966;" xml:space="preserve" width="512px" height="512px">
                        <path d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z" />
                    </svg>
                </button>
            </div>
        </div>
        <!-- Promo, Login, Daftar -->
        <div class="flex justify-center items-center space-x-8 py-4">
            <a href="/" class="hover:text-teal-500 inline-flex items-center"><svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M5 5a3 3 0 015-2.236A3 3 0 0114.83 6H16a2 2 0 110 4h-5V9a1 1 0 10-2 0v1H4a2 2 0 110-4h1.17C5.06 5.687 5 5.35 5 5zm4 1V5a1 1 0 10-1 1h1zm3 0a1 1 0 10-1-1v1h1z" clip-rule="evenodd" />
                    <path d="M9 11H3v5a2 2 0 002 2h4v-7zM11 18h4a2 2 0 002-2v-5h-6v7z" />
                </svg>Promo</a>
                @if (Auth::check())
                @if (auth()->user()->role == 'user')
                <span class="text-black text-xs font-semibold">
                    <a href="" class="text-teal-600 hover:text-teal-400">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>{{ auth()->user()->name }}
                    </a>
                    <form action="/logout" method="post" class="flex justify-end">
                        @csrf
                        <button type="submit" class="flex items-center"><span class="hover:text-red-500 inline-flex items-center"><svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                        </svg>Logout</span></button>
                    </form>
                </span>
                @endif
                @else
                <a href="/login" class="hover:text-teal-500 inline-flex items-center"><svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                </svg>Login</a>
                <a href="/register" class="hover:text-teal-500 inline-flex items-center"><svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                </svg>Daftar</a>
                @endif

        </div>
    </div>
    <!-- Nav 2 -->
    <div class="flex justify-between px-8">
        <div class="flex space-x-8 font-semibold items-center">
            <a href="/" class="py-2 hover:border-y-4 hover:border-t-transparent hover:border-b-teal-500 {{ $title === "Home" ? 'border-y-4 border-t-transparent border-b-teal-500':'' }}">Home</a>
            <a href="/produk" class="py-2 hover:border-y-4 hover:border-t-transparent hover:border-b-teal-500 {{ $title === "Produk" ? 'border-y-4 border-t-transparent border-b-teal-500':'' }}">Produk</a>
            <a href="/lokasi" class="py-2 hover:border-y-4 hover:border-t-transparent hover:border-b-teal-500 {{ $title === "Lokasi" ? 'border-y-4 border-t-transparent border-b-teal-500':'' }}">Lokasi</a>
            @auth
            <a href="/transaksi" class="py-2 hover:border-y-4 hover:border-t-transparent hover:border-b-teal-500 {{ $title === "Transaksi" ? 'border-y-4 border-t-transparent border-b-teal-500':'' }}">Transaksi</a>
            @endauth
        </div>
        <div>
            <a href="" class="inline-block bg-teal-400 px-4 py-4 rounded-sm font-semibold hover:bg-teal-300"><svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline mr-1" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z" />
                </svg>Keranjang</a>
        </div>
    </div>
</nav>