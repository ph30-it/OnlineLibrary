@extends('layouts.main')

@section('page-title','Edit Account')

@section('custom-css')
<link rel="stylesheet" type="text/css" href="{{ asset('css/user.css') }}">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
@endsection

@section('page-content')
<ol class="breadcrumb">
	<li class="breadcrumb-item"><a href="{{ route('home') }}">
		<i class="fas fa-home"></i>
	</a></li>
	<li class="breadcrumb-item"><a href="{{ route('account_profile') }}">Account</a></li>
	<li class="breadcrumb-item active">Cancelled Order</li>
</ol>

<div class="row accountcontainer">
	<div class="col-3">
		@include('user.layouts.menu')
	</div>
	<div class="col-9 infocontainer">
		<h1>History Orders</h1>
		<table id="example" class="display text-center" style="width:100%">
			<thead>
				<tr>
					<th>ID Order</th>
					<th>Price</th>
					<th>Borrow Date</th>
					<th>Give Back Date</th>
					<th>Note</th>
					<th>Details</th>
				</tr>
			</thead>
			<tbody>
				@foreach($orders as $order)
				<tr>
					<td>{{ $order->id }}</td>
					<td>{{ number_format($order->price)}} VND</td>
					<td>{{ $order->date_borrow }}</td>
					<td>{{ $order->date_give_back}}</td>
					<td>{{ $order->note}}</td>
					<td><button type="button" class="btn btn-warning">View Details</button></td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
@endsection

@section('custom-js')
<script>
	$(document).ready(function() {
		$('#example').DataTable( {
			"lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
		} );
	} );
</script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
@endsection