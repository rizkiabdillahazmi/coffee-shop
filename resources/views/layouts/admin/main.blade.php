<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
	<link rel="stylesheet" href="{{ asset('assets/style.css') }}">
	<link rel="stylesheet" href="{{ asset('css/app.css') }}">

	<title>Admin | Coffee Shop</title>
</head>

<body>


	@include('layouts.admin.sidebar')



	<!-- CONTENT -->
	<section id="content">
		@include('layouts.admin.navbar')

        @yield('content')

	</section>
	<!-- CONTENT -->


	<script src="{{ asset('assets/script.js') }}"></script>
</body>

</html>
