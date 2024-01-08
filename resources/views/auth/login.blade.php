@extends('layouts.auth')

@section('content')
<!-- Session Message Section Start -->
<div class="card-body">
    @include('layouts.partials.error-message')
</div>
<!-- Session Message Section End -->

<!-- Main Content Start -->
{{--  --}}

<div class="card-body bg-dark" style="text-align: center">
    <img src="{{ asset('assets/frontend/images/logo/logo.png') }}" width="120" style="margin:5px" >
    <p class="login-box-msg" style="font-weight:bold ">Sign In Here</p>

    <form id="loginForm" method="POST" action="{{ route('login') }}">
        {{ csrf_field() }}
        <div class="input-group form-group">
            <input class="form-control" type="email" name="email" placeholder="E-Mail Address" id="email" value="{{ old('email') }}" autofocus>
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-envelope"></span>
                </div>
            </div>
        </div>
        <div class="input-group form-group mb-0">
            <input class="form-control" name="password" id="password" type="password" placeholder="Password">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                </div>
            </div>
        </div>

        <div class="text-right text-sm" style="color:black">
            <a class="text-light" href="{{ route('password.request') }}">Forget password?</a>
        </div>

        <div class="icheck-success">
            <input type="checkbox" id="remember">
            <label for="remember">
                Remember Me
            </label>
        </div>

        <div class="mt-3">
            <button type="submit" class="btn btn-success btn-block">Login</button>
        </div>
    </form>
</div>
<!-- Main Content End -->
@endsection
@section('scripts')
<script>
    $(function () {
        $('#loginForm').validate({
            rules: {
                official_email: {
                    required: true,
                },
                password: {
                    required: true
                }
            },
            messages: {
                official_email: "Official email is required.",
                password: "Password is required."
            },
            errorElement: 'span',
            errorPlacement: function (error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function (element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            }
        });
    });
</script>
@stop
