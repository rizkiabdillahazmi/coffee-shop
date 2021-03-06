<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }} | Coffee Shop</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/glider.min.css') }}" rel="stylesheet">
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