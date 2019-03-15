@extends('layouts.auth')
@section('content')
<div class="container">
    <div class="signup-content">
        <div class="signup-form">
            <h2 class="form-title">Register</h2>

            <form method="POST" class="register-form" id="register-form" action="{{ route('register') }}">

                <div class="form-group">
                    <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required placeholder="E-Mail">

                    @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                    @endif
                </div>


                <div class="form-group">
                    <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="Your Password">

                    @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required placeholder="Repeat Your Password">
                </div>

                <div class="form-group">
                    <label for="lastname"><i class="zmdi zmdi-lock-outline"></i></label>
                    <input id="lastname" type="text" class="form-control" name="lastname" required placeholder="Your LastName">
                </div>

                <div class="form-group">
                    <label for="firstname"><i class="zmdi zmdi-lock-outline"></i></label>
                    <input id="firstname" type="text" class="form-control" name="firstname" required placeholder="Your FirstName">
                </div>

                <div class="form-group">
                    <label for="address"><i class="zmdi zmdi-lock-outline"></i></label>
                    <input id="address" type="text" class="form-control" name="address" required placeholder="Your Address">
                </div>

                <div class="form-group">
                    <label for="phone"><i class="zmdi zmdi-lock-outline"></i></label>
                    <input id="phone" type="text" class="form-control" name="phone" required placeholder="Your Phone Number">
                </div>

                <div class="form-group">
                    <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                    <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in  <a href="#" class="term-service">Terms of service</a></label>
                </div>
                <div class="form-group form-button">
                    <input type="submit" name="signup" id="signup" class="form-submit" value="Register"/>
                </div>
            </form>
        </div>
        <div class="signup-image">
            <figure><img src="images/signup-image.jpg" alt="sing up image"></figure>
            <a href="" class="signup-image-link">I am already member</a>
        </div>
    </div>
</div>
@endsection