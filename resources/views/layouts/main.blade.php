<!DOCTYPE html>
<html>
<head>
	<title>@yield('page-title')</title>
	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Main Page CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	
	<link rel="stylesheet" href="{{ asset('css/hamburgers') }}">
	<link rel="stylesheet" href="{{ asset('css/main.css') }}">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
	<!-- Custom CSS -->
	@yield('custom-css')
</head>
<body>
	<div class="header-top">
		<div class="row d-flex justify-content-center">
			<div class="col-md-8 col-11">
				<div class="d-sm-flex justify-content-between">
					<ul>
						<li><a href="tel:+01432152323"><span class="align-middle"><i class="fas fa-mobile-alt"></i></span>+01432152323</a></li>
						<li><a href="mailto:info@example.com"><span class="align-middle"><i class="fas fa-envelope-open-text"></i></span>info@example.com</a></li>
					</ul>
					<ul>
						@if(Auth::check())

						@if(Auth::user()->roles == 1)
						<li><a href="{{ route('admin-home') }}">Admin Controll </a></li>
						@endif
						<li><a href="{{ route('account_profile') }}">Hello , <?php echo Auth::user()->firstname ?></a></li>
						<li><a href="{{ route('logout') }}">Logout</a></li>
						@else
						<li><a href="{{ route('login') }}">Login</a></li>
						<li><a href="{{ route('register') }}">Register</a></li>
						@endif
					</ul>
				</div>
			</div>
		</div>
	</div>
	<div class="header-middle">
		<div class="row d-flex justify-content-center">
			<div class="col-md-8 col-11">
				<div class="row">
					<div class="col-md-2 col-2">
						<a href="{{ route('home') }}"><img src="https://upload.wikimedia.org/wikipedia/en/b/b8/Mid-Continent_Public_Library_logo.png" alt="" height="100px"></a>
					</div>
					<div class="col-md-8 col-sm-7">
						<div class="wrap">
							<div class="search">
								<input type="text" class="searchTerm" placeholder="What are you looking for?">
								<button type="submit" class="searchButton">
									<i class="fas fa-search"></i>
								</button>
							</div>
						</div>
					</div>
					<div class="col-md-2 col-sm-3">
					</div>
				</div>
			</div>
		</div>
	</div>
	<hr>

	<div class="row d-flex justify-content-center">
		<div class="col-md-8 col-11">
			<!-- Other page contents is here -->
			@yield('page-content')
		</div>
	</div>

	<div class="newsletter">
		<div class="container">
			<div class="row" style="display: flex;justify-content: center;align-items: center;height: 120px">
				<div class="col-10">
					<div class="row">
						<div class="col-md-5 col-12">
							<p class="h2 text-white">Sign up for our newsletter</p>
						</div>
						<div class="col-md-7">
							<form class="input-group">
								<input type="email" class="form-control" name="Email" value="Input your Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}" required="">
								<button class="btn btn-default" type="submit">Submit</button> 
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	

	<!-- JS-->
	<!-- Bootstrap JS-->
	
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

	<!-- Custom JS-->
	@yield('custom-js')	
</body>
</html>