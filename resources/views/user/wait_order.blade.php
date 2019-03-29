@extends('layouts.main')

@section('page-title')
Cart
@endsection

@section('custom-css')
<link rel="stylesheet" type="text/css" href="{{ asset('css/user.css') }}">
@endsection

@section('page-content')
<div class="row accountcontainer">
	<div class="col-3">
		@include('user.layouts.menu')
	</div>
	<div class="col-9 infocontainer">
		<h2>Wait Confirmation</h2>
		@if(session('class'))
		<div class="alert alert-{{session('class')}}">
			<li>{{session('message')}}</li>
		</div>
		@endif
		@if($result == 0)
		<h4>Nothing to show</h4>
		@else
		<h4>Order number :{{ $order->id }}</h4>
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
			<tfoot>
				<td colspan="2" class="hidden-xs"></td>
				<td class="hidden-xs text-center">
					<form onsubmit="openModal()" id="myForm">
						<button class="btn btn-danger">Cancel Order</button>
					</form>
					<div class="modal fade" tabindex="-1" role="dialog" id="myModal">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h4 class="modal-title">Cancel Order!</h4>
									<button type="button" class="close" data-dismiss="modal">&times;</button>
								</div>
								<div class="modal-body">
									<p>Confirm cancel order id {{ $order->id }}&hellip;</p>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
									<form action="{{ route('cart_cancel') }}" method="post">
										@csrf
										<input type="hidden" name="id" value="{{ $order->id }}">
										<input type="hidden" name="_method" value="delete" />
										<button type="submit" class="btn btn-danger">Submit Cancel</button>
									</form>
								</div>
							</div>
						</div>
					</div>
				</td>
			</tfoot>
		</table>
		@endif
	</div>
</div>
@endsection

@section('custom-js')
<script>
	$('#myForm').on('submit', function(e){
		$('#myModal').modal('show');
		e.preventDefault();
	});
</script>
@endsection