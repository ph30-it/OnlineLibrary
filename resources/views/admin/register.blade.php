@extends('layouts.auth')
@section('content')
<div class="container">
	<div class="signup-content">
		<div class="signup-form">
			<h2 class="form-title">Sign up</h2>
			<form method="POST" class="register-form" id="register-form" action="{{route('register')}}">
				<div class="form-group">
					<label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
					<input type="text" name="email" id="name" placeholder="Your Email"/>
				</div>
				<div class="form-group">
					<label for="pass"><i class="zmdi zmdi-lock"></i></label>
					<input type="password" name="password" id="pass" placeholder="Password"/>
				</div>
				<div class="form-group">
					<label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
					<input type="password" name="re_pass" id="re_pass" placeholder="Repeat your password"/>
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
			<a href="{{ route('form-login')}}" class="signup-image-link">I am already member</a>
		</div>
	</div>
</div>
@endsection