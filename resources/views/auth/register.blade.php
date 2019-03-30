@extends('layouts.main')

@section('page-title','Home')

@section('custom-css')
<link rel="stylesheet" type="text/css" href="{{ asset('css/signup.css') }}">
@endsection

@section('page-content')
<div class="signup-content">
    <div class="row d-flex justify-content-center">
        <div class="col-md-6 col-10">
            <h2 class="form-title">Register</h2>

            <form method="POST" class="register-form" id="register-form" action="{{ route('register') }}">
                @csrf
                <div class="form-group">
                    <label for="name"><i class="ti-email"></i>E-Mail</label>
                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus placeholder="Your E-Mail">

                    @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="pass"><i class="ti-lock"></i>Password</label>
                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="Your Password">
                    @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="re-pass"><i class="ti-unlock"></i>Repeat Your Password</label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required placeholder="Repeat Your Password">
                </div>

                <div class="form-group">
                    <label for="lastname"><i class="ti-id-badge"></i>LastName</label>
                    <input id="lastname" type="text" class="form-control" name="lastname" required placeholder="Your LastName">
                </div>

                <div class="form-group">
                    <label for="firstname"><i class="ti-id-badge"></i>FirstName</label>
                    <input id="firstname" type="text" class="form-control" name="firstname" required placeholder="Your FirstName">
                </div>
                <div class="form-group"> 
                    <p>
                        <input type="radio" id="test1" name="male"/>
                        <label for="test1">Male</label>
                    </p>
                    <p>
                        <input type="radio" id="test2" name="female"/>
                        <label for="test2">Female</label>
                    </p>
                </div>
                
                <div class="form-group">
                    <label for="address"><i class="ti-home"></i>Address</label>
                    <input id="address" type="text" class="form-control" name="address" required placeholder="Your Address">
                </div>

                <div class="form-group">
                    <label for="phone"><i class="ti-mobile"></i>Phone</label>
                    <input id="phone" type="text" class="form-control" name="phone" required placeholder="Your Phone Number">
                </div>

                <div class="form-group">
                    <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                    <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in  <a href="#" class="term-service">Terms of service</a></label>
                </div>
                <div class="form-group form-button">
                    <button  type="submit" name="signup" id="signup" class="btn btn-default btn-cons">Register</button>
                </div>
            </form>
        </div>
        <div class="col-md-4 text-center">
            <figure><img src="images/signup-image.jpg" alt="signup image"></figure>
            <a href="{{ route('login') }}" class="signup-image-link">I am already member</a>
        </div>
    </div>
</div>
@endsection