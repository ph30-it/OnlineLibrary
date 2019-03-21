@extends('layouts.main')

@section('page-title')
Login
@endsection

@section('custom-css')
<link rel="stylesheet" href="{{ asset('css/auth.css') }}">
<link rel="stylesheet" href="{{ asset('css/material-design-iconic-font.min.css') }}">
@endsection

@section('page-content')
<div class="container">
    <div class="signin-content">
        <div class="signin-image">
            <figure><img src="{{ asset('images/signin-image.jpg') }}" alt="sing up image"></figure>
            <a href="{{ route('register') }}" class="signup-image-link">Create an account</a>
        </div>

        <div class="signin-form">
            <h2 class="form-title">LOGIN</h2>
            <form method="POST" class="register-form" id="login-form" action="{{route('login')}}">
                @csrf
                <div class="form-group">
                    <label for="email"><i class="zmdi zmdi-email"></i></label>
                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus placeholder="Your E-Mail">

                    @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="password"><i class="zmdi zmdi-lock"></i></label>
                    <input type="password" name="password" id="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" required placeholder="Your Password">
                    @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                    @endif
                </div>

                <div class="form-group">
                    <input type="checkbox" name="remember" id="agree-term" class="agree-term" />
                    <label for="agree-term" class="label-agree-term"><span><span></span></span>Remember Me</label>
                </div>

                <div class="form-group form-button">
                    <input type="submit" name="signin" id="signin" class="form-submit" value=" {{ __('Login') }}"/>
                    @if (Route::has('password.request'))
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                    @endif
                </div>
            </form>
            <!-- 
            <div class="social-login">
                <span class="social-label">Or login with</span>
                <ul class="socials">
                    <li><a href="#"><i class="display-flex-center zmdi zmdi-facebook"></i></a></li>
                    <li><a href="#"><i class="display-flex-center zmdi zmdi-twitter"></i></a></li>
                    <li><a href="#"><i class="display-flex-center zmdi zmdi-google"></i></a></li>
                </ul>
            </div> -->
        </div>
    </div>
</div>
@endsection 

@section('custom-js')
<script src="{{ asset('js/app.js') }}" defer></script>
@endsection