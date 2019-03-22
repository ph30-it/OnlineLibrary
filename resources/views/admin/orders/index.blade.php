@extends('admin.layouts.master')
@section('content')
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Quản lý đơn hàng</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Danh sách các đơn hàng
                                </div>
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <!-- Nav tabs -->
                                    <ul class="nav nav-tabs">
                                        <li class="active"><a href="#status1" data-toggle="tab">Chờ duyệt</a>
                                        </li>
                                        <li><a href="#status2" data-toggle="tab">Chờ lấy sách</a>
                                        </li>
                                        <li><a href="#status4" data-toggle="tab">Đang mượn sách</a>
                                        </li>
                                        <li><a href="#status5" data-toggle="tab">Đã trả</a>
                                        </li>
                                    </ul>

                                    <!-- Tab panes -->
                                    <div class="tab-content">
                                        <div class="tab-pane fade in active" id="status1">
                                            <h4>Danh sách đơn đặt hàng cần duyệt</h4>
                                            <table class="table table-striped table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Mã Đơn Hàng</th>
                                                    <th>Thành Viên Thuê</th>
                                                    <th>Tổng Giá Tiền</th>
                                                    <th>Ngày Đăng Ký Thuê</th>
                                                    <th>Chi Tiết Đơn Hàng</th>
                                                    <th>Duyệt/ Từ Chối</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($order as $row)
                                                @if($row->status == 1)
                                                <tr>
                                                    <td>{{ $row->id }}</td>
                                                    <td>{{ $row->User->firstname }} {{ $row->User->lastname }}</td>
                                                    <td>{{ number_format($row->price) }} đ</td>
                                                    <td>{{ $row->created_at }}</td>
                                                    <td><a href="javascript:detail_order({{ $row->id }})" class="btn btn-info">Xem chi tiết</a></td>
                                                    <td>
                                                        <form action="{{ route('updateStatus') }}" method="post" onsubmit="return alert_confirm('Bạn chắc chắn?')">
                                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                            <input type="hidden" name="id" value="{{ $row->id }}">
                                                            <button type="submit" class="btn btn-success" name="status" value="2">Duyệt</button>
                                                            <button type="submit" class="btn btn-danger" name="status" value="3">Hủy</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                                @endif
                                                @endforeach
                                            </tbody>
                                        </table>
                                        </div>
                                        <div class="tab-pane fade" id="status2">
                                            <h4>Danh sách đơn đặt cần đến thư viện lấy</h4>
                                            <table class="table table-striped table-bordered table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>Mã Đơn Hàng</th>
                                                        <th>Thành Viên Thuê</th>
                                                        <th>Tổng Giá Tiền</th>
                                                        <th>Ngày Đăng Ký Thuê</th>
                                                        <th>Chi Tiết Đơn Hàng</th>
                                                        <th>Đã lấy sách</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($order as $row)
                                                    @if($row->status == 2)
                                                    <tr>
                                                        <td>{{ $row->id }}</td>
                                                        <td>{{ $row->User->firstname }} {{ $row->User->lastname }}</td>
                                                        <td>{{ number_format($row->price) }} đ</td>
                                                        <td>{{ $row->created_at }}</td>
                                                        <td><a href="javascript:detail_order({{ $row->id }})" class="btn btn-info">Xem chi tiết</a></td>
                                                        <td>
                                                            <form action="{{ route('updateStatus') }}" method="post" onsubmit="return alert_confirm('Bạn chắc chắn?')">
                                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                                <input type="hidden" name="id" value="{{ $row->id }}">
                                                                <button type="submit" class="btn btn-success" name="status" value="4">Đã nhận sách</button>
                                                                <button type="submit" class="btn btn-danger" name="status" value="3">Hủy</button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                    @endif
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="tab-pane fade" id="status4">
                                            <h4>Danh sách đơn hàng đang thuê</h4>
                                            <table class="table table-striped table-bordered table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>Mã Đơn Hàng</th>
                                                        <th>Thành Viên Thuê</th>
                                                        <th>Tổng Giá Tiền</th>
                                                        <th>Ngày nhận sách</th>
                                                        <th>Chi Tiết Đơn Hàng</th>
                                                        <th>Trả Sách</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($order as $row)
                                                    @if($row->status == 4)
                                                    <tr>
                                                        <td>{{ $row->id }}</td>
                                                        <td>{{ $row->User->firstname }} {{ $row->User->lastname }}</td>
                                                        <td>{{ number_format($row->price) }} đ</td>
                                                        <td>{{ $row->date_borrow }}</td>
                                                        <td><a href="javascript:detail_order({{ $row->id }})" class="btn btn-info">Xem chi tiết</a></td>
                                                        <td>
                                                            <form action="{{ route('updateStatus') }}" method="post" onsubmit="return alert_confirm('Bạn chắc chắn?')">
                                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                                <input type="hidden" name="id" value="{{ $row->id }}">
                                                                <button type="submit" class="btn btn-success" name="status" value="5">Trả sách</button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                    @endif
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="tab-pane fade" id="status5">
                                            <h4>Danh sách đơn hàng đã trả</h4>
                                            <table class="table table-striped table-bordered table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>Mã Đơn Hàng</th>
                                                        <th>Thành Viên Thuê</th>
                                                        <th>Tổng Giá Tiền</th>
                                                        <th>Ngày nhận sách</th>
                                                        <th>Ngày trả sách</th>
                                                        <th>Chi Tiết Đơn Hàng</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($order as $row)
                                                    @if($row->status >= 5)
                                                    <tr>
                                                        <td>{{ $row->id }}</td>
                                                        <td>{{ $row->User->firstname }} {{ $row->User->lastname }}</td>
                                                        <td>{{ number_format($row->price) }} đ</td>
                                                        <td>{{ $row->date_borrow }}</td>
                                                        <td>{{ $row->updated_at }}</td>
                                                        <td><a href="javascript:detail_order({{ $row->id }})" class="btn btn-info">Xem chi tiết</a></td>
                                                    </tr>
                                                    @endif
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.panel-body -->
                            </div>
                            <!-- /.panel -->
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title" id="myModalLabel">Xem chi tiết đơn hàng</h4>
                            </div>
                            <div class="modal-body">

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
                <!-- /.modal -->
@endsection
@section('javascript')
<script src="{{ asset('admin_assets/js/dataTables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('admin_assets/js/dataTables/dataTables.bootstrap.min.js') }}"></script>
<script>
    function alert_confirm(msg){
        if(confirm(msg) == true){
            return true;
        }
        else{
            return false;
        }
    }
    function detail_order(id){
        $.ajax({
            url: "{{ route('detail') }}",
            method: "GET",
            data: {
                orderid: id
            },
            dataType: "html",
            success: function(data){
                $('#detailModal .modal-body').html(data);
            }
        });
        $('#detailModal').modal('show');
    }
    $(document).ready(function() {
        $('table').DataTable({
                responsive: true
        });
    });
</script>
@endsection