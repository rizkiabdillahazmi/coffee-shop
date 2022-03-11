<!-- NAVBAR -->
<nav>
    <i class='bx bx-menu'></i>
    {{-- <a href="#" class="nav-link">Categories</a> --}}
    <form action="#">
        <div class="form-input">
            <input type="search" placeholder="Search...">
            <button type="submit" class="search-btn"><i class='bx bx-search'></i></button>
        </div>
    </form>
    <input type="checkbox" id="switch-mode" hidden>
    <label for="switch-mode" class="switch-mode"></label>
    <a href="#" class="notification">
        <i class='bx bxs-bell'></i>
        <span class="num">8</span>
    </a>
    <span href="#" class="profile">
        <img src="{{ asset('img/avatar.svg') }}">
        <div class="profile-hello">
            <span>Hello Admin</span>
            <form action="/logout" method="post" class="logout">
                @csrf
                <button type="submit"><i class='bx bxs-log-out-circle'></i>
                    <span class="text">Logout</span></button>
            </form>
        </div>
    </span>
</nav>
<!-- NAVBAR -->