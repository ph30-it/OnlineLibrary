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
                                    Danh sách thành viên
                                </div>
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <div>
                                        <table class="table table-striped table-bordered table-hover" id="table">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Họ và tên</th>
                                                    <th>Email</th>
                                                    <th>Số điện thoại</th>
                                                    <th>Chức vụ</th>
                                                    <th>Chỉnh Sửa</th>
                                                    <th>Xóa</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($users as $row)
                                                <tr>
                                                    <td>{{ $row->id }}</td>
                                                    <td>{{ $row->firstname }} {{ $row->lastname }}</td>
                                                    <td>{{ $row->email }}</td>
                                                    <td>{{ $row->phone }}</td>
                                                    <td>{{ $row->roles > 0 ? 'Quản lý' : 'Thành viên' }}</td>
                                                    <td><a href="{{ route('showeditUsers', $row->id) }}" class="btn btn-info">Chỉnh sửa</a></td>
                                                    <td>
                                                        <form action="{{ route('deleteUsers') }}" method="POST" onsubmit="return check_confirm('Chắc Chắn Muốn Xóa?')">
                                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                            <input type="hidden" name="_method" value="DELETE">
                                                            <input type="hidden" name="id" value="{{ $row->id }}">
                                                            <button type="submit" class="btn btn-danger">Xoá</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- /.panel-body -->
                            </div>
                            <!-- /.panel -->
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                </div>
@endsection
@section('javascript')
<script src="{{ asset('admin_assets/js/dataTables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('admin_assets/js/dataTables/dataTables.bootstrap.min.js') }}"></script>
<script>
    function check_confirm(msg){
        if(confirm(msg) == true){
            return true;
        }
        else{
            return false;
        }
    }
    $(document).ready(function() {
        $('#table').DataTable({
                responsive: true
        });
    });
</script>
@endsection