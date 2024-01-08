<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/frontend/images/logo/logo.png') }}">
    <title>Farah Bakers</title>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{ asset('assets/backend/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/backend/dist/css/adminlte.min.css') }}">
    <script src="{{ asset('assets/backend/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/jquery-validation/additional-methods.min.js') }}"></script>
	<link rel="stylesheet" href="{{ asset('assets/frontend/css/style.css') }}">
    <style>
        body {
            /* background-image:url('{{ asset('assets/frontend/images/logo/logo.png') }}') !im
            background-repeat: no-repeat;
            background-size: cover; */

            position: relative;

        }

        body::after {
            content: "";
            /* background-image: url('{{ asset('assets/frontend/images/logo/logo.png')}}'); */
            background-repeat: no-repeat;
            background-size: cover;
            opacity: 0.9;
            /* Adjust the opacity value (0.0 to 1.0) */
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            background-color: black;
        }

        .sidenav {
            /* background-color: cyan; */
            /* overflow-x: hidden; */
            /* background-color : #00A95C; */
            /* background-color: #202e58; */
        }

        /* .main{
        background-color: azure;
      } */
        .form-data {
            overflow-x: hidden;
        }

        .login-main-text {
            padding: 40px;
        }

        .invalid-feedback {
            color: #fff;
        }

        @media (min-width: 768px) {
            .sidenav {
                height: 100vh !important;
            }

            .login-main-text {
                padding: 60px;
                /* margin-top: 30vh; */
            }

            .form-data {
                margin-top: 25vh;
                margin-left: 20%;
            }
        }

        .heading {
            font-size: 50px !important;
        }
    </style>
</head>

<body style="">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-md-6 sidenav">
                <div class="login-main-text text-center">
                    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
                    <img class="banner_keyframes_animation wow" src="{{ asset('assets/frontend/images/others/banner_product.png') }}" alt="">
                    <h1 class="text-light heading"><strong>Farah Bakers</strong></h1>
                    <p class="text-light heading font-weight-bold">Sign in to start your session</p>
                </div>
            </div>
            <div class="col-12 col-md-6 main">
                <div class="row form-data">
                    <div class="col-12 col-sm-10 mx-sm-auto col-md-8 mx-md-0 col-lg-8 mx-lg-0 col-xl-6 mx-xl-6">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('assets/backend/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/backend/dist/js/adminlte.min.js') }}"></script>
    @yield('scripts')
</body>

</html>
