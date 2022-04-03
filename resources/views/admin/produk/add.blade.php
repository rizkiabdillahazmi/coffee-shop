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
                    <a href="#">Produk</a>
                </li>
                <li><i class='bx bx-chevron-right'></i></li>
                <li>
                    <a class="active" href="#">{{ $title }}</a>
                </li>
            </ul>
        </div>
    </div>

    <div class="table-data">
        <div class="w-1/2 rounded-md overflow-hidden">
            <form action="/admin/produk/add" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-6 w-full">
                    <label for="nama" class="block mb-2 text-sm font-medium">Nama Produk</label>
                    <input required name="nama" type="text" id="nama" placeholder="Masukkan Nama Produk"
                        class="block w-full p-2.5 bg-transparent border-2 border-gray-300 text-sm rounded-lg focus:outline-none focus:border-blue-500">
                </div>
                <div class="mb-6 w-full flex justify-between gap-20">
                    <div class="w-1/3">
                        <label for="kategori" class="block mb-2 text-sm font-medium">Kategori</label>
                        <select required name="kategori" id="kategori" class="block w-full p-2.5 bg-transparent border-2 border-gray-300 text-sm rounded-lg focus:outline-none focus:border-blue-500">
                            <option value="" selected disabled hidden>Pilih</option>
                            <option id="pilihan-kategori" value="Minuman">Minuman</option>
                            <option id="pilihan-kategori" value="Makanan">Makanan</option>
                        </select>
                    </div>
                    <div class="w-1/3">
                        <label for="jenis" class="block mb-2 text-sm font-medium">Jenis</label>
                        <select required name="jenis" id="jenis" class="block w-full p-2.5 bg-transparent border-2 border-gray-300 text-sm rounded-lg focus:outline-none focus:border-blue-500">
                            <option value="" selected disabled hidden>Pilih</option>
                            <option id="Coffee"  value="Coffee">Coffee</option>
                            <option id="Non-Coffee" value="Non-Coffee">Non-Coffee</option>
                            <option id="Makanan Ringan" value="Makanan Ringan">Makanan Ringan</option>
                            <option id="Makanan Berat" value="Makanan Berat">Makanan Berat</option>
                        </select>
                    </div>
                    <div class="w-1/3">
                        <label for="signature" class="block mb-2 text-sm font-medium">Signature Menu :</label>
                        <select required name="signature" id="jenis" class="block w-full p-2.5 bg-transparent border-2 border-gray-300 text-sm rounded-lg focus:outline-none focus:border-blue-500">
                            <option value="" selected disabled hidden>Pilih</option>
                            <option value="1">Ya</option>
                            <option value="0">Tidak</option>
                        </select>
                    </div>
                </div>
                <div class="mb-6 w-full flex justify-between gap-20">
                    <div class="w-1/2">
                        <label for="harga" class="block mb-2 text-sm font-medium">Harga</label>
                        <input name="harga" type="number" min="0" step="500" required id="harga" placeholder="Masukkan Harga"
                            class="block w-full p-2.5 bg-transparent border-2 border-gray-300 text-sm rounded-lg focus:outline-none focus:border-blue-500">
                    </div>
                    <div class="w-1/3">
                        <label for="diskon" class="block mb-2 text-sm font-medium">Diskon</label>
                        <input name="diskon" type="number" min="0" max="0.9" step="0.05" id="diskon" placeholder="Diskon"
                            class="block w-full p-2.5 bg-transparent border-2 border-gray-300 text-sm rounded-lg focus:outline-none focus:border-blue-500">
                    </div>
                </div>
                <div class="mb-6 w-full">
                    <label for="gambar" class="block mb-2 text-sm font-medium">Gambar</label>
                    <img class="img-preview">
                    <label class="block">
                        <input type="file" id="gambar" name="gambar" required class="block w-full text-sm text-slate-500
                          file:mr-4 file:py-2 file:px-4
                          file:rounded-full file:border-0
                          file:text-sm file:font-semibold
                          file:bg-teal-50 file:text-teal-700
                          hover:file:bg-teal-100
                        " onchange="previewImage()" />
                    </label>
                </div>
                <div class="w-full border-t-2 mb-4"></div>
                <div class="w-full">
                    <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold text-xs py-3 px-2 rounded-lg">Tambah Produk</button>
                </div>
            </form>
        </div>
    </div>
</main>
<!-- MAIN -->
<script src="{{ asset('js/tambah-produk.js') }}"></script>

@endsection
