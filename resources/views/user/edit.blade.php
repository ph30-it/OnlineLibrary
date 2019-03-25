@extends('user.layouts.master')

@section('page-title','Edit Account')

@section('link')
Account / Edit
@endsection

@section('content')
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Edit Account</h1>
	</div>
</div><!--/.row-->
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<form class="form-horizontal" action="{{ route('account_update') }}" method="post">
				@csrf
				<br>
				@if($errors->any())
				<div class="alert alert-danger alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
					@foreach($errors->all() as $err)
					<li>{{$err}}</li>
					@endforeach
				</div>
				@endif
				@if(session('class'))
				<div class="alert alert-{{session('class')}}">
					<li>{{session('message')}}</li>
				</div>
				@endif
				<br>
				<fieldset>
					<div class="form-group">
						<label class="col-md-3 control-label" for="name">E-Mail</label>
						<div class="col-md-6">
							<input id="email" name="email" type="text" placeholder="Your name" class="form-control" readonly="readonly" value="{{ Auth::user()->email }}">
						</div>
					</div><br>
					<div class="form-group">
						<label class="col-md-3 control-label" for="email">First Name</label>
						<div class="col-md-6">
							<input id="firstname" name="firstname" type="text" placeholder="Your FirstName" class="form-control" value="{{ Auth::user()->firstname }}">
						</div>
					</div><br>
					<div class="form-group">
						<label class="col-md-3 control-label" for="message">Last Name</label>
						<div class="col-md-6">
							<input id="lastname" name="lastname" type="text" placeholder="Your LastName" class="form-control" value="{{ Auth::user()->lastname }}">
						</div>
					</div><br>
					<div class="form-group">
						<label class="col-md-3 control-label" for="message">Phone</label>
						<div class="col-md-6">
							<input id="phone" name="phone" type="text" placeholder="Your Phone" class="form-control" value="{{ Auth::user()->phone }}">
						</div>
					</div><br>
					<div class="form-group">
						<label class="col-md-3 control-label" for="message">Address</label>
						<div class="col-md-6">
							<input id="address" name="address" type="text" placeholder="Your Address" class="form-control" value="{{ Auth::user()->address }}">
						</div>
					</div><br>
					<div class="form-group">
						<label class="col-md-3 control-label" for="message">Gender</label>
						<div class="col-md-6">
							<div class="radio">
								<label>
									<input type="radio" name="gender" id="optionsRadios1" value="1" {{ Auth::user()->gender == 0 ? 'checked' : '' }}>Male
								</label>
							</div>
							<div class="radio">
								<label>
									<input type="radio" name="gender" id="optionsRadios2" value="0" {{ Auth::user()->gender == 0 ? 'checked' : '' }}>Female
								</label>
							</div>
						</div>
					</div><br>

					<div class="form-group">
						<div class="col-md-9 widget-right">
							<button type="submit" class="btn btn-default btn-md pull-right">Save Change</button>
						</div>
					</div>
				</fieldset>
				<br>
			</form>
		</div>
	</div>
</div>
@endsection