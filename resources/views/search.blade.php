@extends('layouts.main')

@section('page-title','Search')

@section('custom-css')
<link rel="stylesheet" type="text/css" href="{{ asset('css/search.css') }}">
@endsection

@section('page-content')

<div class="row accountcontainer">
	<div class="col-3">
		<div id="sidebar-collapse" class="sidebar">
			<form>
				<div class="form-group has-search">
					<span class="fa fa-search form-control-feedback"></span>
					<input type="text" class="form-control" placeholder="search">
				</div>
				<div class="form-group">
					<label for="exampleformcontrolselect1">category</label>
					<select class="form-control" id="exampleformcontrolselect1">
						<option>All</option>
						@foreach($categories as $cate)
						<option>{{$cate->name}}</option>
						@endforeach
					</select>
				</div>
				<div class="form-group">
					<label for="">published_year</label>
					<select class="form-control" id="exampleformcontrolselect2">
						<option>All</option>
						@for($min;$min < $max;$min++)
						<option>{{$min}}</option>
						@endfor
					</select>
				</div>
				<div class="form-group">
					<label for="">Rating</label>
					<select class="form-control" id="exampleformcontrolselect3">
						<option>All</option>
						<option>1.0</option>
						<option>2.0</option>
						<option>3.0</option>
						<option>4.0</option>
						<option>5.0</option>
					</select>
				</div>
				<button type="submit" class="btn btn-primary">search</button>
			</form>
		</div>
	</div>
	<div class="col-9 infocontainer">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="{{ route('home') }}">
				<i class="fas fa-home"></i>
			</a></li>
			<li class="breadcrumb-item active">search</li>
		</ol>

	</div>
</div>
@endsection

@section('custom-js')
@endsection