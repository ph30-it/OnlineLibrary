@extends('admin.layouts.master')
@section('content')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
	<div class="row">
		<ol class="breadcrumb">
			<li><a href="#">
				<em class="fa fa-home"></em>
			</a></li>
			<li>Order Manager</li>
			<li class="active">Add Order</li>
		</ol>
	</div><!--/.row-->
	
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Order Manager</h1>
		</div>
	</div><!--/.row-->

	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					Thêm đơn hàng mới
				</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-lg-12">
							@if(session('class'))
							<div class="alert bg-{{session('class')}}" role="alert"><em class="fa fa-lg fa-warning">&nbsp;</em>{{session('message')}}</div>
							@endif
							<form action="{{ route('addBook') }}" method="post" enctype="multipart/form-data">
								<input type="hidden" name="_token" value="{{ csrf_token() }}">
								<div class="col-lg-12">
									<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
										<label>Tên sách</label>
										<input class="form-control" type="text" name="name" value="{{old('name')}}" placeholder="Tên sách (V/d: Tây du ký">
										@if ($errors->has('name'))
										<span class="text-danger">{{ $errors->first('name') }}</span>
										@endif
									</div>
									<div class="form-group {{ $errors->has('author') ? 'has-error' : '' }}">
										<label>Tên tác giả</label>
										<input class="form-control" type="text" name="author" value="{{old('author')}}" placeholder="Tên của tác giả (V/d: Ngô Thừa Ân)">
										@if ($errors->has('author'))
										<span class="text-danger">{{ $errors->first('author') }}</span>
										@endif
									</div>
									<div class="form-group {{ $errors->has('published_year') ? 'has-error' : '' }}">
										<label>Năm xuất bản</label>
										<input class="form-control" type="text" name="published_year" value="{{old('published_year')}}" placeholder="Năm phát hành (V/d: 1950)">
										@if ($errors->has('published_year'))
										<span class="text-danger">{{ $errors->first('published_year') }}</span>
										@endif
									</div>
									<div class="form-group">
										<div class="book-list">
											<div class="row" data-row="1">
												<div class="col-lg-8">
													<div class="form-group">
														<label>Sách</label>
														<select name="category" class="form-control">
															<option>Sách 01</option>
														</select>
													</div>
												</div>
												<div class="col-lg-3">
													<div class="form-group">
														<label>Số lượng</label>
														<input type="number" class="form-control" name="">
													</div>
												</div>
												<div class="col-lg-1">
													<div class="form-group">
														<label>Remove</label>
														<a href="javascript:void(0);" class="btn btn-lg btn-danger act_del" data-row="1"><em class="fa fa-trash"></em></a>
													</div>
												</div>
											</div>
										</div>
										
										<a href="javascript:void(0);" class="btn btn-success act_add"><em class="fa fa-plus"></em> Thêm sách</a>
									</div>
									<div class="form-group {{ $errors->has('quantity') ? 'has-error' : '' }}">
										<label>Số lượng</label>
										<input class="form-control" type="number" name="quantity" min="1" value="{{old('quantity')}}">
										@if ($errors->has('quantity'))
										<span class="text-danger">{{ $errors->first('quantity') }}</span>
										@endif
									</div>
									<div class="form-group {{ $errors->has('price') ? 'has-error' : '' }}">
										<label>Giá cho thuê</label>
										<input class="form-control" type="number" name="price" min="0" value="{{old('price')}}">
										@if ($errors->has('price'))
										<span class="text-danger">{{ $errors->first('price') }}</span>
										@endif
									</div>
									<div class="form-group">
										<label>Mô tả thêm</label>
										<textarea class="form-control" name="describes" rows="3">{{ old('describes') }}</textarea>
									</div>
									<button type="submit" class="btn btn-primary">Thêm sách</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div><!--/.col-->

	</div><!--/.row-->
</div>	<!--/.main-->
@endsection
@section('javascript')
@endsection