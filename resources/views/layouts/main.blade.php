<!DOCTYPE html>
<html>
<head>
	<title>@yield('page-title')</title>
	<!-- CSRF Token -->
  	<meta name="csrf-token" content="{{ csrf_token() }}">
	<meta charset="utf-8">
  	<meta http-equiv="X-UA-Compatible" content="IE=edge">
  	<meta name="viewport" content="width=device-width, initial-scale=1">

  	<!-- Master Page CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	
	<link href="{{URL::asset('vendor/font-awesome-5/css/fontawesome-all.min.cs')}}s" rel="stylesheet" media="all">

	<link rel="stylesheet" type="text/css" href="{{URL::asset('css/Third-CSS/hamburgers.css')}}">
	
	<link rel="stylesheet" type="text/css" href="{{URL::asset('css/MainLayout/main.css')}}">
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
						<a href="/">Home</a>
					</li>
					@if(Auth::check())
					<li>
						<a href="/user">User</a>
					</li>
					<li>
						<a href="/logout">Logout</a>
					</li>
					@else
					<li>
						<a href="/login">Login</a>
					</li>
					<li>
						<a href="/register">Register</a>
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
				<li class="nav-item">
					<a href="/" class="nav-link nav-btt">Home</a>
				</li>
				@if(Auth::check())
				<li class="nav-item">
					<a href="/user" class="nav-link nav-btt">User</a>
				</li>
				<li class="nav-item">
					<a href="/logout" class="nav-link nav-btt">Logout</a>
				</li>
				@else
				<li class="nav-item">
					<a href="/login" class="nav-link nav-btt">Login</a>
				</li>
				<li class="nav-item">
					<a href="/register" class="nav-link nav-btt">Register</a>
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

<!-- Footer-->

<!-- Master page JS-->
<!-- jQuery -->
<script src="{{URL::asset('vendor/jquery-3.2.1.min.js')}} "></script>
 <!-- Bootstrap JS-->
<script src="{{URL::asset('vendor/bootstrap-4.1/popper.min.js')}} "></script>
<script src="{{URL::asset('vendor/bootstrap-4.1/bootstrap.min.js')}} "></script>

<script type="text/javascript" src="{{URL::asset('js/MainLayout/main.js')}}"></script>
<!-- Custom JS-->
@yield('custom-js')	
</body>
</html>