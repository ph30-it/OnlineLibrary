@extends('user.layouts.master')

@section('page-title')
{{Auth::user()->firstname}} - Info Account
@endsection

@section('link')
Account
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Info Account - {{Auth::user()->firstname}}</h1>
    </div>
</div><!--/.row-->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="tab-content ml-1" id="myTabContent">
                <div class="row">
                    <div class="col-sm-3 col-md-2 col-5">
                        <label style="font-weight:bold;">Full Name</label>
                    </div>
                    <div class="col-md-8 col-6">
                        {{Auth::user()->firstname}} {{Auth::user()->lastname}}
                    </div>
                </div>
                <hr />
                <div class="row">
                    <div class="col-sm-3 col-md-2 col-5">
                        <label style="font-weight:bold;">E-Mail</label>
                    </div>
                    <div class="col-md-8 col-6">
                        {{Auth::user()->email}}
                    </div>
                </div>
                <hr />
                <div class="row">
                    <div class="col-sm-3 col-md-2 col-5">
                        <label style="font-weight:bold;">Phone</label>
                    </div>
                    <div class="col-md-8 col-6">
                        {{Auth::user()->phone}}
                    </div>
                </div>
                <hr />
                <div class="row">
                    <div class="col-sm-3 col-md-2 col-5">
                        <label style="font-weight:bold;">Address</label>
                    </div>
                    <div class="col-md-8 col-6">
                        {{Auth::user()->address}}
                    </div>
                </div>
                <hr />
                <div class="row">
                    <div class="col-sm-3 col-md-2 col-5">
                        <label style="font-weight:bold;">Gender</label>
                    </div>
                    <div class="col-md-8 col-6">
                        <?php if (Auth::user()->gender == 1): ?>
                            Male
                        <?php else: ?>
                            FeMale
                        <?php endif ?>
                    </div>
                </div>
                <hr />
            </div>
        </div>
    </div>
</div>
@endsection