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

    <div class="add-product">
        <div>
            <a href="">
                <i class='bx bxs-file-plus bx-sm'></i>
                <span class="text">Tambah Produk</span>
            </a>
        </div>
    </div>

    <div class="table-data">

        <div class="order">
            <div class="head">
                <h3>Semua Produk</h3>
                <i class='bx bx-search'></i>
                <i class='bx bx-filter'></i>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>Nama Produk</th>
                        <th>Kategori</th>
                        <th>Jenis</th>
                        <th>Harga</th>
                        <th>Diskon</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                    <tr>
                        <td>
                            <img src="{{ $product["gambar"] }}">
                            <p>{{ $product["nama"] }}</p>
                        </td>
                        <td>{{ $product["kategori"] }}</td>
                        <td>{{ $product["jenis"] }}</td>
                        <td>Rp. {{ $product["harga"] }}</td>
                        <td>{{ $product["diskon"] }}</td>
                        <td>Edit | Hapus</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
</main>
<!-- MAIN -->
@endsection
