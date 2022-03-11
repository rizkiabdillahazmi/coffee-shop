<!-- SIDEBAR -->
<section id="sidebar">
    <a href="#" class="brand">
        <i class='bx bxs-smile'></i>
        <span class="text">Coffee Shop</span>
    </a>
    <ul class="side-menu top">
        <li class="{{ $title === "Dashboard" ? 'active' :''}}">
            <a href="/admin">
                <i class='bx bxs-dashboard'></i>
                <span class="text">Dashboard</span>
            </a>
        </li>
        @if (auth()->user()->role == 'admin')
        <li class="{{ $title === "Produk" ? 'active' :''}}">
            <a href="/admin/produk">
                <i class='bx bx-package'></i>
                <span class="text">Produk</span>
            </a>
        </li>
        @endif
        <li class="{{ $title === "Transaksi" ? 'active' :''}}">
            <a href="/admin/transaksi">
                <i class='bx bx-transfer'></i>
                <span class="text">Transaksi</span>
            </a>
        </li>
        <li>
            <a href="#">
                <i class='bx bxs-factory' ></i>
                <span class="text">Inventory</span>
            </a>
        </li>
        <li>
            <a href="#">
                <i class='bx bxs-user-rectangle'></i>
                <span class="text">Karyawan</span>
            </a>
        </li>
        <li>
            <a href="#">
                <i class='bx bxs-group'></i>
                <span class="text">Member</span>
            </a>
        </li>
    </ul>
    <ul class="side-menu">
        <li>
            <a href="#">
                <i class='bx bxs-cog'></i>
                <span class="text">Settings</span>
            </a>
        </li>
    </ul>
</section>
<!-- SIDEBAR -->