@extends('layouts.main')

@section('page-title')
Cart
@endsection

@section('custom-css')
<link rel="stylesheet" type="text/css" href="{{ asset('css/user.css') }}">
@endsection

@section('page-content')
<ol class="breadcrumb">
	<li class="breadcrumb-item"><a href="{{ route('home') }}">
		<i class="fas fa-home"></i>
	</a></li>
	<li class="breadcrumb-item"><a href="{{ route('account_profile') }}">Account</a></li>
	<li class="breadcrumb-item active">Confirmed Order</li>
</ol>
<div class="row accountcontainer">
	<div class="col-3">
		@include('user.layouts.menu')
	</div>
	<div class="col-9 infocontainer">
		<h2>Confirmed Order</h2>
		@if($result == 0)
		<div class="alert alert-danger">
			<li>No data available in here</li>
		</div>
		@else
		<h4>Order number :{{ $order->id }}</h4>
		<div class="alert alert-success">
			<p>Please go to library to get the books !</p>
		</div>
		<table id="cart" class="table table-hover table-condensed">
			<thead>
				<tr>
					<th style="width:60%">Book</th>
					<th style="width:20%">Category</th>
					<th style="width:20%" class="text-center">Price</th>
				</tr>
			</thead>
			<tbody>
				
				@foreach ($data as $book)
				<tr>
					<td>
						<div class="row">
							<div class="col-sm-2 hidden-xs"><img src="{{ $book->img }}" alt="..." class="img-responsive" height="100px" width="70px"/></div>
							<div class="col-sm-10">
								<h4><a class="nomargin" href="{{ route('book',$book->id) }}">{{ $book->name }}</a></h4>
								<p>Describes : {{substr($book->describes,0,90)}} ...</p>
							</div>
						</div>
					</td>
					<td><a href="">{{$book->categories->name}}</a></td>
					<td class="text-center">{{number_format($book->price)}} VND</td>
				</tr>
				@endforeach
			</tbody>
		</table>
		@endif
	</div>
</div>
@endsection