<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }} | Coffee Shop</title>
    <script src="{{ asset('css/main-tailwind.js') }}"></script>
    <!-- Swiper's CSS -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
</head>

<body class="bg-stone-100">
    <header>
        @include('layouts.navbar')
    </header>

    @yield('content')

    @if(session()->has('success'))
    <script>
        alert('{{ session('success') }}');
    </script>
    @endif

    @if(session()->has('loginError'))
    <script>
        alert('{{ session('loginError') }}');
    </script>
    @endif

    @include('layouts.footer')
</body>

</html>