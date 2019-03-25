@extends('admin.layouts.master')
@section('content')
<div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Quản lý thành viên</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Chỉnh sửa thành viên "{{ $user->firstname }} {{ $user->lastname }}"
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <form action="{{ route('updateUsers', $user->id) }}" method="POST" enctype="multipart/form-data">
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
                                                            <input name="firstname" value="{{ $user->firstname }}" type="text" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label>Tên</label>
                                                            <input name="lastname" value="{{ $user->lastname }}" type="text" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label>Email</label>
                                                    <input name="email" value="{{ $user->email }}" type="email" class="form-control" disabled="">
                                                </div>
                                                <div class="form-group">
                                                    <label>Giới tính</label>
                                                    <label class="checkbox-inline">
                                                        <input name="gender" value="0" type="radio" {{ $user->gender == 0 ? 'checked' : '' }}> Nam
                                                    </label>
                                                    <label class="checkbox-inline">
                                                        <input name="gender" value="1" type="radio" {{ $user->gender != 0 ? 'checked' : '' }}> Nữ
                                                    </label>
                                                </div>
                                                <div class="form-group">
                                                    <label>Số điện thoại</label>
                                                    <input name="phone"  value="{{ $user->phone }}" type="text" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label>Chức vụ</label>
                                                    <label class="checkbox-inline">
                                                        <input name="roles" value="0" type="radio" {{ $user->roles == 0 ? 'checked' : '' }}> Thành viên
                                                    </label>
                                                    <label class="checkbox-inline">
                                                        <input name="roles" value="1" type="radio" {{ $user->roles != 0 ? 'checked' : '' }}> Quản Lý
                                                    </label>
                                                </div>
                                                <div class="form-group">
                                                    <label>Thay đổi mật khẩu </label>
                                                    <input id="newpass" type="checkbox" value="1">
                                                </div>
                                                <div id="formnewpass" style="display: none;">
                                                    <div class="form-group">
                                                        <label>Mật khẩu mới</label>
                                                        <input name="password" value="" type="password" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Xác nhận mật khẩu mới</label>
                                                        <input name="confirm_password" value="" type="password" class="form-control">
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label>Địa chỉ</label>
                                                    <textarea name="address" class="form-control" rows="3">{{ $user->address }}</textarea>
                                                </div>
                                                <button type="submit" class="btn btn-primary btn-lg btn-block">Thêm thành viên</button>
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
@section('javascript')
<script type="text/javascript">
    $(document).ready(function(){
        $('#newpass').click(function() {
            if($('#newpass').is(':checked')) {
                $('#formnewpass').show('slow');
            }
            else{
                $('#formnewpass').hide('slow');
            }
        });
    });
</script>
@endsection