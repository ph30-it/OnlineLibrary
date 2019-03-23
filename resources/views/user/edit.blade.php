@extends('user.layouts.master')

@section('page-title')
{{Auth::user()->firstname}} - Edit Account
@endsection

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
            
        </div>
    </div>
</div>
@endsection