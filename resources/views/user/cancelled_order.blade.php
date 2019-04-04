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
		<h1>Cancelled Orders</h1>
		<table id="example" class="display text-center" style="width:100%">
			<thead>
				<tr>
					<th>ID Order</th>
					<th>Price</th>
					<th>Create Date</th>
					<th>Cancelled Date</th>
					<th>Note</th>
					<th>Details</th>
				</tr>
			</thead>
			<tbody>
				@foreach($orders as $order)
				<tr>
					<td>{{ $order->id }}</td>
					<td>{{ number_format($order->price)}} VND</td>
					<td>{{ $order->created_at }}</td>
					<td>{{ $order->updated_at}}</td>
					<td>{{ $order->note}}</td>
					<td><a href="javascript:detail_order({{ $order->id }})"><button type="button" class="btn btn-warning">View Details</button></a></td>
				</tr>
				@endforeach
			</tbody>
		</table>
		<!-- Modal -->
		<div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title" id="myModalLabel">Details Order</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>
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
	function detail_order(id){
		$.ajax({
			url: "{{ route('detail_order') }}",
			method: "GET",
			data: {
				id: id
			},
			dataType: "html",
			success: function(data){
				console.log(data);
				$('#detailModal .modal-body').html(data);
			},
			error: function(XMLHttpRequest, textStatus, errorThrown) { 
				$('#detailModal .modal-body').html("Status: " + textStatus +" <br>Error: " + errorThrown);
			}   
		});
		$('#detailModal').modal('show');
	}
</script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
@endsection