@extends('admin.layouts.master')
@section('content')
<div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Quản lý sách</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Chỉnh sửa sách "{{ $book->name }}"
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <form action="{{ route('updateBooks', $book->id) }}" method="POST" enctype="multipart/form-data">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <div class="col-lg-3">
                                                <img id="showImage" src="{{ asset('uploads/'.$book->img) }}" style="width: 270px;height: 364px">
                                                <div class="form-group">
                                                    <label>Hình ảnh</label>
                                                    <input id="fileimg" name="img" type="file">
                                                </div>
                                            </div>
                                            <div class="col-lg-9">
                                                
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
                                                <div class="form-group">
                                                    <label>Tên sách</label>
                                                    <input name="name" value="{{ $book->name }}" type="text" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label>Tên tác giả</label>
                                                    <input name="author" value="{{ $book->author }}" type="text" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label>Năm xuất bản</label>
                                                    <input name="published_year" value="{{ $book->published_year }}" type="text" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label>Danh mục</label>
                                                    <select name="categories_id" class="form-control">
                                                        @foreach($categories as $row)
                                                        <option value="{{ $row->id }}" {{ $row->id == $book->categories_id ? 'selected' : ''  }}>{{ $row->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>Số lượng</label>
                                                    <input name="quantity" type="number" class="form-control" min="1" value="{{ $book->quantity }}">
                                                </div>
                                                <div class="form-group">
                                                    <label>Giá cho thuê</label>
                                                    <input name="price" type="number" class="form-control" min="0" value="{{ $book->price }}">
                                                </div>
                                                <div class="form-group">
                                                    <label>Mô tả</label>
                                                    <textarea name="describes" class="form-control" rows="3">{{ $book->describes }}</textarea>
                                                </div>
                                                <button type="submit" class="btn btn-primary btn-lg btn-block">Sửa sách</button>
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
    $(function () {
        $("#fileimg").change(function () {
            if (this.files && this.files[0]) {
                var reader = new FileReader();
                reader.onload = imageIsLoaded;
                reader.readAsDataURL(this.files[0]);
            }
        });
    });
    function imageIsLoaded(e) {
        $('#showImage').attr('src', e.target.result);
    };
</script>
@endsection