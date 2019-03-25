@extends('admin.layouts.master')
@section('content')
<div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Quản lý danh mục</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Thêm danh mục mới
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <form action="{{ route('createCategory') }}" method="POST">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
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
                                            <div class="col-lg-5">
                                                <div class="form-group">
                                                    <label>Tên Danh Mục</label>
                                                    <input name="name" class="form-control">
                                                </div>
                                                <button type="submit" class="btn btn-primary btn-lg btn-block">Thêm danh mục</button>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- /.row (nested) -->
                                </div>
                                <!-- /.panel-body -->
                            </div>
                            <!-- /.panel -->
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                </div>
@endsection