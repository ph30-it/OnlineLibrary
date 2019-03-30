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
                    <labe><i class="required">(*)</i><i class="far fa-envelope"></i>E-Mail</label>
                    <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus placeholder="Your E-Mail">

                    @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                    @endif
                </div>

                <div class="form-group">
                    <label><i class="required">(*)</i><i class="fas fa-lock"></i>Password</label>
                    <input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="Your Password">
                    @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                    @endif
                </div>

                <div class="form-group">
                    <label><i class="required">(*)</i><i class="fas fa-unlock-alt"></i>Repeat Your Password</label>
                    <input type="password" class="form-control" name="password_confirmation" required placeholder="Repeat Your Password">
                     @if ($errors->has('confirm_password'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('confirm_password') }}</strong>
                    </span>
                    @endif
                </div>

                <div class="form-group">
                    <label><i class="required">(*)</i><i class="far fa-id-badge"></i>LastName</label>
                    <input id="lastname" type="text" class="form-control" name="lastname" required placeholder="Your LastName">
                </div>

                <div class="form-group">
                    <label><i class="required">(*)</i><i class="fas fa-id-badge"></i>FirstName</label>
                    <input id="firstname" type="text" class="form-control" name="firstname" required placeholder="Your FirstName">
                </div>
                <div class="form-group"> 
                    <label><i class="required">(*)</i><i class="fas fa-venus-mars"></i>Gender</label>
                    <label class="checkbox-inline">
                        <input type="radio" name="gender"value="0">Male
                        <input type="radio" name="gender" value="1">Female
                    </label>
                </div>
                
                <div class="form-group">
                    <label></i><i class="required">(*)</i><i class="fas fa-address-card"></i>Address</label>
                    <input type="text" class="form-control" name="address" required placeholder="Your Address">
                </div>

                <div class="form-group">
                    <label><i class="required">(*)</i><i class="fas fa-mobile-alt"></i>Phone</label>
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