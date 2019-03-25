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
	
	<link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}">
	<!-- Custom CSS -->
	@yield('custom-css')
</head>
<body>
	<!-- Navigation Bar -->
	<!-- Header for mobile -->
	<div class="page-wrapper">
		<header class="header-mobile d-block d-lg-none">
			<div class="header-mobile__bar">
				<div class="container-fluid">
					<div class="header-mobile-inner">

						<a class="logo" href="/">
							<img src="">
						</a>

						<button class="hamburger hamburger--spin js-hamburger" type="button">
							<span class="hamburger-box">
								<span class="hamburger-inner"></span>
							</span>
						</button>
					</div>
				</div>
			</div>

			<nav class="navbar-mobile" id="navbar-mobile">
				<div class="container-fluid">
					<ul class="navbar-mobile__list list-unstyled">
						<li>
							<a href="{{ route('home') }}">Home</a>
						</li>
						@if(Auth::check())
						<li>
							<a href="{{ route('account_profile') }}">User</a>
						</li>
						<li>
							<a href="{{ route('logout') }}">Logout</a>
						</li>
						@else
						<li>
							<a href="{{ route('login') }}">Login</a>
						</li>
						<li>
							<a href="{{ route('register') }}">Register</a>
						</li>
						@endif
					</ul>
				</div>
			</nav>
		</header>

		<!-- For desktop -->
		<aside class="d-none d-lg-block">
			<nav class="navbar navbar-expand-sm">
				<a class="navbar-brand">
					<img src="" alt="logo">
				</a>

				<ul class="navbar-nav ml-auto">
					
					@if(Auth::check())
					<li class="nav-item">
						<a href="{{ route('home') }}" class="nav-link nav-btt">Home</a>
					</li>
					<li class="nav-item">
						<a href="{{ route('account_profile') }}" class="nav-link nav-btt">Hello , <?php echo Auth::user()->firstname ?></a>
					</li>
					<li class="nav-item">
						<a href="{{ route('logout') }}" class="nav-link nav-btt">Logout</a>
					</li>
					@else
					<li class="nav-item">
						<a href="/" class="nav-link nav-btt">Home</a>
					</li>
					<li class="nav-item">
						<a href="{{ route('login') }}" class="nav-link nav-btt">Login</a>
					</li>
					<li class="nav-item">
						<a href="{{ route('register') }}" class="nav-link nav-btt">Register</a>
					</li>
					@endif
				</ul>
			</nav>
		</aside>
		
		<div class="cart-nav-bar">
			<div class="container-fluid">
				<div class="row">
					<div class="col-2">
						<!-- Add logo here -->
					</div>
					<div class="col-md-8 col-sm-7">
						<!-- Search bar -->
						<div class="search-bar-container container">
							<div class="row">
								<div class="col-sm-10 col-md-11">
									<input type="text" id="search-field" placeholder="Search anything !">
								</div>
								<div class="col-sm-2 col-md-1" style="display: flex;justify-content: center;align-items: center">
									<i class="fas fa-search"></i>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-2 col-sm-3 d-flex justify-content-center">
						<!-- Cart -->
						<button id="cart-btt">Your Cart</button>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="page-container container-fluid">
		<!-- Other page contents is here -->
		@yield('page-content')
	</div>

	<div class="newsletter">
		<div class="container">
			<div class="row">
				<div class="col-md-5 col-12">
					<p class="h3 text-white">Sign up for our newsletter</p>
				</div>
				<div class="col-md-7">
					<div class="input-group">
						<input type="email" class="form-control" name="Email" value="Input your Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}" required="">
						<div class="input-group-append">
							<button class="btn btn-danger" type="submit">Submit</button> 
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


	<section id="footer">
		<div class="container">
			<div class="row text-center text-xs-center text-sm-left text-md-left">
				<div class="col-xs-12 col-sm-4 col-md-4">
					<h5>Quick links</h5>
					<ul class="list-unstyled quick-links">
						<li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>Home</a></li>
						<li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>About</a></li>
						<li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>FAQ</a></li>
						<li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>Get Started</a></li>
						<li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>Videos</a></li>
					</ul>
				</div>
				<div class="col-xs-12 col-sm-4 col-md-4">
					<h5>Quick links</h5>
					<ul class="list-unstyled quick-links">
						<li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>Home</a></li>
						<li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>About</a></li>
						<li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>FAQ</a></li>
						<li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>Get Started</a></li>
						<li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>Videos</a></li>
					</ul>
				</div>
				<div class="col-xs-12 col-sm-4 col-md-4">
					<h5>Quick links</h5>
					<ul class="list-unstyled quick-links">
						<li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>Home</a></li>
						<li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>About</a></li>
						<li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>FAQ</a></li>
						<li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>Get Started</a></li>
						<li><a href="https://wwwe.sunlimetech.com" title="Design and developed by"><i class="fa fa-angle-double-right"></i>Imprint</a></li>
					</ul>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 mt-2 mt-sm-5">
					<ul class="list-unstyled list-inline social text-center">
						<li class="list-inline-item"><a href="javascript:void();"><i class="fa fa-facebook"></i></a></li>
						<li class="list-inline-item"><a href="javascript:void();"><i class="fa fa-twitter"></i></a></li>
						<li class="list-inline-item"><a href="javascript:void();"><i class="fa fa-instagram"></i></a></li>
						<li class="list-inline-item"><a href="javascript:void();"><i class="fa fa-google-plus"></i></a></li>
						<li class="list-inline-item"><a href="javascript:void();" target="_blank"><i class="fa fa-envelope"></i></a></li>
					</ul>
				</div></hr>
			</div>	
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 mt-2 mt-sm-2 text-center text-white">
					<p><u><a href="https://www.nationaltransaction.com/">National Transaction Corporation</a></u> is a Registered MSP/ISO of Elavon, Inc. Georgia [a wholly owned subsidiary of U.S. Bancorp, Minneapolis, MN]</p>
					<p class="h6">&copy All right Reversed.<a class="text-green ml-2" href="https://www.sunlimetech.com" target="_blank">Sunlimetech</a></p>
				</div>
			</hr>
		</div>
	</section>
	<!-- Footer-->


	<!-- JS-->
	<!-- Bootstrap JS-->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

	<!-- Custom JS-->
	@yield('custom-js')	
</body>
</html>