@extends('admin.layouts.master')
@section('content')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
	<div class="row">
		<ol class="breadcrumb">
			<li><a href="#">
				<em class="fa fa-home"></em>
			</a></li>
			<li>User Manager</li>
			<li class="active">Detail User</li>
		</ol>
	</div><!--/.row-->
	
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">User Manager</h1>
		</div>
	</div><!--/.row-->

	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					Thông tin chi tiết thành viên
				</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-lg-12">
							@if(session('class'))
							<div class="alert bg-{{session('class')}}" role="alert"><em class="fa fa-lg fa-warning">&nbsp;</em>{{session('message')}}</div>
							@endif
							<div class="row">
								<div class="col-lg-6">
									<div class="form-group">
										<label>Họ</label>
										<input class="form-control" type="text" name="firstname" value="{{$user->firstname}}" placeholder="Nhập họ (V/d: Trần)" disabled>
									</div>
								</div>
								<div class="col-lg-6">
									<div class="form-group">
										<label>Tên</label>
										<input class="form-control" type="text" name="lastname" value="{{$user->lastname}}" placeholder="Nhập tên (V/d: Long)" disabled>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label>Giới tính</label>
								<div class="radio">
									<div class="radio">
									<label>{{ $user->gender == 0 ? 'Nam' : 'Nữ' }}</label>
								</div>
								</div>
							</div>
							<div class="form-group">
								<label>Email</label>
								<input class="form-control" type="email" name="email" value="{{$user->email}}" placeholder="Địa chỉ email (V/d: longdeptrai@gmail.com)" disabled>
							</div>
							<div class="form-group">
								<label>Số điện thoại</label>
								<input class="form-control" type="text" name="phone" value="{{$user->phone}}" placeholder="Số điện thoại liên hệ (V/d: 0969999999)" disabled>
							</div>
							<div class="form-group">
								<label>Chức vụ</label>
								<div class="radio">
									<label>{{ $user->roles == 1 ? 'Quản lý' : 'Thành viên' }}</label>
								</div>
							</div>
							<div class="form-group">
								<label>Địa chỉ</label>
								<textarea class="form-control" name="address" rows="3" placeholder="Địa chỉ hiện tại (V/d: Đà Nẵng, Việt Nam,...)" disabled>{{$user->address}}</textarea>
							</div>
							<a href="{{ route('showEditUser', $user->id) }}" class="btn btn-primary">Thay đổi thông tin</a>
							<a href="{{ route('ListUser') }}" class="btn btn-default">Xong</a>
						</div>
					</div>
				</div>
			</div>
		</div><!--/.col-->

	</div><!--/.row-->
</div>	<!--/.main-->
@endsection