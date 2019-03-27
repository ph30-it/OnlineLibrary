@extends('admin.layouts.master')
@section('content')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
	<div class="row">
		<ol class="breadcrumb">
			<li><a href="#">
				<em class="fa fa-home"></em>
			</a></li>
			<li>Order Manager</li>
			<li class="active">List Orders</li>
		</ol>
	</div><!--/.row-->
	
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Danh sách đơn hàng</h1>
		</div>
	</div><!--/.row-->

	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<form action="{{ route('searchOrder') }}" method="GET">
						<div class="input-group">
							<input type="text" class="form-control input-md" name="key" placeholder="Search for..." />
							<span class="input-group-btn"><button type="submit" class="btn btn-primary btn-md" >Search</button></span>
						</div>
					</form>
				</div>
				<div class="panel-body">
					<table class="table">
						<thead>
							<tr>
								<th>ID</th>
								<th>Tên Độc Giả</th>
								<th>Thời Gian Đăng Ký Thuê</th>
								<th>Tình trạng</th>
								<th>Xem Chi Tiết</th>
								<th>Cho Phép Thuê/Từ Chối</th>
							</tr>
						</thead>
						<tbody>
							@foreach($orders as $order)
							<tr id="order-{{$order->id}}">
								<td>{{$order->id}}</td>
								<td>{{$order->user->firstname.' '.$order->user->lastname}}</td>
								<td>{{$order->created_at}}</td>
								<td class="table-status">
									@switch($order->status)
									    @case(1)
									        <span class="btn-sm btn-warning">Chờ xử lý</span>
									        @break
									    @case(2)
									        <span class="btn-sm btn-warning">Chờ lấy sách</span>
									        @break
									    @case(3)
									        <span class="btn-sm btn-danger">Hủy</span>
									        @break
									    @case(4)
									        <span class="btn-sm btn-primary">Đang thuê</span>
									        @break
									    @default
									        <span class="btn-sm btn-success">Đã trã</span>
									        @break
									@endswitch
								</td>
								<td><a href="javascript:detailOrder({{$order->id}});" class="btn btn-sm btn-info">Xem chi tiết</a></td>
								<td class="table-button">
									@switch($order->status)
									@case(1)
										<a href="javascript:agreeOrder({{$order->id}});" class="btn btn-sm btn-success">Cho phép thuê</a>
										@break
									@case(2)
										<a href="javascript:completedOrder({{$order->id}});" class="btn btn-sm btn-success">Nhận sách</a>
										@break
									@case(4)
										<a href="javascript:returnOrder({{$order->id}});" class="btn btn-sm btn-success">Trã sách</a>
										@break
									@endswitch
									<a href="javascript:cancelOrder({{$order->id}});" class="btn btn-sm btn-danger">Hủy</a>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
				<div class="panel-footer">
					<center>
						{{ $orders->links() }}
					</center>
				</div>
			</div>
		</div><!--/.col-->

	</div><!--/.row-->
</div>	<!--/.main-->

<!-- Detail Order Modal -->
<div id="detail-order" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
    	<div class="panel panel-default">
			<div class="panel-heading">Xem Chi Tiết Đơn Đặt Hàng</div>
			<div class="panel-body">
			</div>
		</div>
    </div>
  </div>
</div>
<!-- END Detail Order Modal -->
@endsection
@section('javascript')
<script type="text/javascript">
	var api_domain = "{{ url('') }}";
	var api_atk = "{{ csrf_token() }}";
</script>
<script type="text/javascript" src="{{ asset('admin_assets/js/bhome.js') }}"></script>
@endsection