@extends('admin.layouts.master')
@section('content')
<div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Hồ sơ</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Chỉnh sửa hồ sơ
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <form action="{{ route('createBooks') }}" method="POST" enctype="multipart/form-data">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <div class="col-lg-12">
                                                
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
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label>Họ</label>
                                                            <input name="name" type="text" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label>Tên</label>
                                                            <input name="author" type="text" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                                    
                                                <div class="form-group">
                                                    <label>Năm xuất bản</label>
                                                    <input name="published_year" type="text" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label>Danh mục</label>
                                                    <select name="categories_id" class="form-control">
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>Số lượng</label>
                                                    <input name="quantity" type="number" class="form-control" min="1" value="1">
                                                </div>
                                                <div class="form-group">
                                                    <label>Giá cho thuê</label>
                                                    <input name="price" type="number" class="form-control" min="0" value="0">
                                                </div>
                                                <div class="form-group">
                                                    <label>Mô tả</label>
                                                    <textarea name="describes" class="form-control" rows="3"></textarea>
                                                </div>
                                                <button type="submit" class="btn btn-primary btn-lg btn-block">Thêm sách</button>
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