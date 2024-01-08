<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Farah Bakers</title>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"> -->
    <!-- <link href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet"> -->
	<link rel="stylesheet" href="{{ asset('assets/frontend/css/animate.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/frontend/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/frontend/css/ionicons.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/frontend/css/jquery-ui.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/frontend/css/magnific-popup.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/frontend/css/nice-select.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/frontend/css/owl.carousel.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/frontend/css/pe-icon-7-stroke.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/frontend/css/slick.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/frontend/css/style.css') }}">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>

<body>
    @include('livewire.frontend.header')

    @yield('content')

    @include('livewire.frontend.footer')

	<!-- <script src="{{ asset('assets/frontend/js/ajax-mail.js') }}"></script> -->
	<script src="{{ asset('assets/frontend/js/bootstrap.bundle.min.js') }}"></script>
	<script src="{{ asset('assets/frontend/js/jquery-3.6.0.min.js') }}"></script>
	<script src="{{ asset('assets/frontend/js/jquery-migrate-3.3.2.min.js') }}"></script>
	<script src="{{ asset('assets/frontend/js/jquery-ui.min.js') }}"></script>
	<script src="{{ asset('assets/frontend/js/jquery.magnific-popup.min.js') }}"></script>
	<script src="{{ asset('assets/frontend/js/jquery.nice-select.js') }}"></script>
	<script src="{{ asset('assets/frontend/js/jquery.scrollup.min.js') }}"></script>
	<script src="{{ asset('assets/frontend/js/jquery.zoom.min.js') }}"></script>
	<script src="{{ asset('assets/frontend/js/mailchimp-ajax.js') }}"></script>
	<script src="{{ asset('assets/frontend/js/main.js') }}"></script>
	<script src="{{ asset('assets/frontend/js/modernizr-3.11.2.min.js') }}"></script>
	<script src="{{ asset('assets/frontend/js/owl.carousel.min.js') }}"></script>
	<script src="{{ asset('assets/frontend/js/slick.min.js') }}"></script>
	<!-- <script src="{{ asset('assets/frontend/js/wow.min.js') }}"></script> -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script> -->
    @livewireScripts
</body>

</html>