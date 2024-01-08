<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Farah Bakers">
	<link rel="apple-touch-icon" href="{{ asset("assets/images/logo9.png") }}">
	<meta name="theme-color" content="#6600ff">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="icon" type="image/png" sizes="16x16" href="{{ asset("assets/images/logo9.png") }}">
	<title> Farah Bakers</title>
	<!-- Google Font: Source Sans Pro StyleSheet -->
	<link rel="stylesheet" href="{{ asset("assets/backend/plugins/font-googleapis/font.css") }}">
	<!-- Font Awesome Icons StyleSheet -->
	<link rel="stylesheet" href="{{ asset("assets/backend/plugins/fontawesome-free/css/all.min.css") }}">


	<!-- Custom StyleSheet -->
	<link rel="stylesheet" href="{{ asset("assets/backend/dist/css/custom.css") }}">


	<!-- jQuery Script -->
	<link rel="stylesheet" href="{{ asset("assets/backend/dist/css/adminlte.min.css") }}">
	<link rel="stylesheet" href="{{ asset("assets/backend/plugins/select2/css/select2.css") }}">
	<link rel="stylesheet" href="{{ asset("assets/frontend/css/style.css") }}">

	@livewireStyles
	@stack("styles")
	@yield("styles")
	<style>
		.ck-editor__editable[role="textbox"] {
			/* editing area */
			min-height: 200px;
		}

		.ck-content .image {
			/* block images */
			max-width: 80%;
			margin: 20px auto;
		}

		.main-sidebar {
			box-shadow: 0 14px 6px rgba(0, 0, 0, .25), 0 10px 10px rgba(0, 0, 0, .22) !important;
		}

		select.form-control {
			border-radius: 0 !important;
		}

		.select2-container {
			border-radius: 0 !important;
		}

		span.select2-selection.select2-selection--single {
			height: 38px !important;
			display: -webkit-box;
			display: -ms-flexbox;
			display: flex;
			-webkit-box-align: center;
			-ms-flex-align: center;
			align-items: center;
			border: 1px solid #ced4da !important;
			background: none !important;
		}

		span.select2-selection__arrow {
			height: 36px !important;
		}

		.select2-container {
			width: 100% !important;
		}

		.select2-selection__choice {
			color: black !important;
			font-weight: 400;
		}

		.select2-container--default .select2-results>.select2-results__options {
			max-height: 500px;
			min-height: 250px;
			overflow-y: auto;
		}

		.skeleton-loader {
			min-height: 40px !important;
			background: #3276bb !important;
			margin: 2px 5px 5px 2px solid;
		}

		/* loader */
		.skeleton {
			animation: skeleton-loading 1s linear infinite alternate;
		}

		@keyframes skeleton-loading {
			0% {
				background-color: hsl(200, 20%, 80%);
			}

			100% {
				background-color: hsl(200, 20%, 95%);
			}
		}

		.skeleton-text {
			width: 100%;
			height: 2rem;
			margin-bottom: 0.5rem;
			border-radius: 0.25rem;
		}
	</style>

</head>

<body class="hold-transition sidebar-mini layout-fixed">
	<div class="wrapper">
		<!-- Navbar Start -->
		@include("layouts.partials.navbar")
		<!-- Navbar End -->

		<!-- Left Sidebar Container Start -->
		@include("layouts.partials.left-sidebar")
		<!-- Left Sidebar Container End -->

		<!-- Page Content Start -->
		<div class="content-wrapper">

			@yield('content')

		</div>
		<!-- Page Content End -->


		<!-- Main Footer Start -->
		@include("layouts.partials.footer")
		<!-- Main Footer End -->

	</div>
	<!-- REQUIRED SCRIPTS -->
	<script src="{{ asset("assets/backend/plugins/jquery/jquery.min.js") }}"></script>

	<!-- jquery-validation -->
	<script src="{{ asset("assets/backend/plugins/select2/js/select2.full.min.js") }}"></script>

	<!-- Bootstrap Script -->
	<script defer src="{{ asset("assets/backend/plugins/bootstrap/js/bootstrap.bundle.min.js") }}"></script>

	<!-- AdminLTE Script -->
	<script defer src="{{ asset("assets/backend/dist/js/adminlte.js") }}"></script>

	<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script> -->
	<!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
	<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

	@stack("scripts")
	<script>
		$(document).ready(function() {
			// $('[data-toggle="tooltip"]').tooltip();
			// $('[data-toggle="popover"]').popover();
			$('.delete-record').on("click", function(e) {
				e.preventDefault();
			});
		});
		document.getElementById("year").innerHTML = new Date().getFullYear();
	</script>

	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<script>
		document.addEventListener('livewire:init', () => {

			Livewire.on('showSuccessMessage', function(message) {
				Swal.fire({
					icon: 'success',
					title: message,
					showConfirmButton: false,
					timer: 2000
				})
			});

			Livewire.on('showErrorMessage', function(message) {
				Swal.fire({
					icon: 'error',
					title: message,
					showConfirmButton: false,
					timer: 2000
				})
			});

			Livewire.on('showConfirmation', function(payload) {
				message = payload[0]['message'];
				callback = payload[0]['callback'];
				model = payload[0]['model'];
				Swal.fire({
					title: 'Are You Sure?',
					text: message,
					icon: 'warning',
					showCancelButton: true,
					confirmButtonColor: '#d33',
					confirmButtonText: 'Confirm'
				}).then((result) => {
					if (result.isConfirmed) {
						Livewire.dispatch(callback, {
							id: model
						});
					}
				});
			});
		});
	</script>
	@livewireScripts

</body>

</html>