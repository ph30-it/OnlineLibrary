<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Lumino - Widgets</title>
	<link href="{{ asset('admin_assets/css/bootstrap.min.css') }}" rel="stylesheet">
	<link href="{{ asset('admin_assets/css/font-awesome.min.css') }}" rel="stylesheet">
	<link href="{{ asset('admin_assets/css/datepicker3.css') }}" rel="stylesheet">
	<link href="{{ asset('admin_assets/css/styles.css') }}" rel="stylesheet">
	<!-- alertify -->
	<link href="{{ asset('admin_assets/css/alertify.css') }}" rel="stylesheet">
	<!-- dropify -->
	<link rel="stylesheet" href="{{ asset('admin_assets/css/dropify.min.css') }}">
	
	<!--Custom Font-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

</head>
<body>
	<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span></button>
				<a class="navbar-brand" href="{{route('admin-home')}}"><span>Administrator</span></a>
			</div>
		</div><!-- /.container-fluid -->
	</nav>
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<div class="profile-sidebar">
			<div class="profile-userpic">
				<img src="http://placehold.it/50/30a5ff/fff" class="img-responsive" alt="">
			</div>
			<div class="profile-usertitle">
				<div class="profile-usertitle-name">Administrator</div>
				<div class="profile-usertitle-status"><span class="indicator label-success"></span>Online</div>
			</div>
			<div class="clear"></div>
		</div>
		<div class="divider"></div>
		<ul class="nav menu">
			<li><a href="{{ route('admin-home') }}"><em class="fa fa-dashboard">&nbsp;</em> Dashboard</a></li>
			<li><a href="{{ route('ListCategory') }}"><em class="fa fa-folder-open">&nbsp;</em> Category</a></li>
			<li class="parent "><a data-toggle="collapse" href="#books-item">
				<em class="fa fa-book">&nbsp;</em> Books <span data-toggle="collapse" class="icon pull-right"><em class="fa fa-plus"></em></span>
				</a>
				<ul class="children collapse" id="books-item">
					<li><a class="" href="{{ route('showAddBook') }}">
						<span class="fa fa-arrow-right">&nbsp;</span> Add New Book
					</a></li>
					<li><a class="" href="{{ route('ListBook') }}">
						<span class="fa fa-arrow-right">&nbsp;</span> List Books
					</a></li>
				</ul>
			</li>
			<li class="parent "><a data-toggle="collapse" href="#user-item">
				<em class="fa fa-user">&nbsp;</em> User <span data-toggle="collapse" class="icon pull-right"><em class="fa fa-plus"></em></span>
				</a>
				<ul class="children collapse" id="user-item">
					<li><a class="" href="{{ route('showAddUser') }}">
						<span class="fa fa-arrow-right">&nbsp;</span> Add New User
					</a></li>
					<li><a class="" href="{{ route('ListUser') }}">
						<span class="fa fa-arrow-right">&nbsp;</span> List Users
					</a></li>
				</ul>
			</li>
			<li class="parent "><a data-toggle="collapse" href="#order-item">
				<em class="fa fa-clipboard">&nbsp;</em> Order <span data-toggle="collapse" class="icon pull-right"><em class="fa fa-plus"></em></span>
				</a>
				<ul class="children collapse" id="order-item">
					<!-- <li><a class="" href="{{ route('showAddOrder') }}">
						<span class="fa fa-arrow-right">&nbsp;</span> Add Order
					</a></li> -->
					<li><a class="" href="{{ route('ListOrder') }}">
						<span class="fa fa-arrow-right">&nbsp;</span> List Orders
					</a></li>
				</ul>
			</li>
			
			<li><a href="{{ route('ListComment') }}"><em class="fa fa-comment">&nbsp;</em> Comments</a></li>
			<li><a href="{{route('AdminLogout')}}"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
		</ul>
	</div><!--/.sidebar-->
		
	@yield('content')
	  

	<script src="{{ asset('admin_assets/js/jquery-1.11.1.min.js') }}"></script>
	<script src="{{ asset('admin_assets/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('admin_assets/js/chart.min.js') }}"></script>
	<script src="{{ asset('admin_assets/js/chart-data.js') }}"></script>
	<script src="{{ asset('admin_assets/js/easypiechart.js') }}"></script>
	<script src="{{ asset('admin_assets/js/easypiechart-data.js') }}"></script>
	<script src="{{ asset('admin_assets/js/bootstrap-datepicker.js') }}"></script>
	<script src="{{ asset('admin_assets/js/custom.js') }}"></script>

	<!-- alertify -->
	<script src="{{ asset('admin_assets/js/alertify.js') }}"></script>
	<!-- dropify -->
	<script src="{{ asset('admin_assets/js/dropify.min.js') }}"></script>

	@yield('javascript');
	
</body>
</html>
