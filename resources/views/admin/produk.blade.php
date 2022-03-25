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
            <i class='bx bx-package'></i>
            <span class="text">
                <h3>{{ $total_product }}</h3>
                <p>Produk</p>
            </span>
        </li>
        <li>
            <i class='bx bxs-group'></i>
            <span class="text">
                <h3>2834</h3>
                <p>Pelanggan</p>
            </span>
        </li>
        <li>
            <i class='bx bxs-dollar-circle'></i>
            <span class="text">
                <h3>Rp. 15000</h3>
                <p>Total Penjualan</p>
            </span>
        </li>
    </ul>

    <div class="table-data">
        <div class="w-full mx-auto rounded-md overflow-hidden">
            <div class="px-4 py-4">
                <div class="flex justify-end">
                    <a href="">
                        <div class="flex justify-center items-center gap-1 p-2 bg-teal-600 rounded-lg text-xs text-white font-bold">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                              </svg>
                        Tambah Produk</div>
                    </a>
                </div>
                <div class="head">
                    <h3>Semua Produk</h3>
                    <i class='bx bx-search'></i>
                    <i class='bx bx-filter'></i>
                </div>
                <div
                    class="grid grid-cols-[0.8fr_repeat(4,_0.5fr)_0.8fr] justify-items-center item-center border-b border-stone-200 px-4 py-3 font-bold text-sm">
                    <div>
                        Nama Produk
                    </div>
                    <div>
                        Kategori
                    </div>
                    <div>
                        Jenis
                    </div>
                    <div>
                        Harga
                    </div>
                    <div>
                        Diskon
                    </div>
                    <div>
                        Aksi
                    </div>
                </div>
                @foreach ($products as $product)
                <div class="dropdown__wrapper py-4 hover:bg-slate-300 rounded">
                    <div
                        class="dropdown__cell grid grid-cols-[0.8fr_repeat(4,_0.5fr)_0.8fr] justify-items-center items-center px-4">
                        <div class="justify-self-start flex items-center gap-3">
                            <img class="rounded-full w-9 h-9"
                                src="{{ $product->gambar }}">
                            <span>{{ $product->nama }}</span>
                        </div>
                        <div>
                            {{ $product->kategori }}
                        </div>
                        <div>
                            {{ $product->jenis }}
                        </div>
                        <div>
                            {{ $product->harga }}
                        </div>
                        <div>
                            {{ $product->diskon }}
                        </div>
                        <div class="flex gap-2 items-center">
                            <form action="">
                                <button
                                    class="bg-blue-500 py-2 px-4 rounded-md text-xs text-white font-bold flex items-center gap-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                      </svg>
                                    <span>Edit</span>
                                </button>
                            </form>
                            <form action="">
                                <button
                                    class="bg-red-500 py-2 px-2 rounded-md text-xs text-white font-bold flex items-center gap-1 bg">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                      </svg>
                                    <span>Hapus</span>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</main>
<!-- MAIN -->
@endsection
