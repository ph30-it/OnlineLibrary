@extends('admin.layouts.master')
@section('content')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
	<div class="row">
		<ol class="breadcrumb">
			<li><a href="#">
				<em class="fa fa-home"></em>
			</a></li>
			<li>Books Manager</li>
			<li class="active">List Books</li>
		</ol>
	</div><!--/.row-->
	
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">List Books</h1>
		</div>
	</div><!--/.row-->

	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<form action="{{ route('searchBook') }}" method="GET">
						<div class="input-group">
							<input type="text" class="form-control input-md" name="key" placeholder="Search for..." />
							<span class="input-group-btn"><button type="submit" class="btn btn-primary btn-md" >Search</button></span>
						</div>
					</form>
				</div>
				<div class="panel-body">
					<table class="table">
						<thead>
							<tr>
								<th>ID</th>
								<th>Tên Sách</th>
								<th>Tác Giả</th>
								<th>Năm Xuất Bản</th>
								<th>Danh Mục</th>
								<th>Giá Thuê</th>
								<th>Chỉnh Sửa/Xóa</th>
							</tr>
						</thead>
						<tbody>
							@foreach($books as $book)
							<tr id="book-{{$book->id}}">
								<td>{{$book->id}}</td>
								<td>{{$book->name}}</td>
								<td>{{$book->author}}</td>
								<td>{{$book->published_year}}</td>
								<td>{{$book->Category->name}}</td>
								<td>{{ number_format($book->price) }}đ</td>
								<td>
									<a href="{{ route('showEditBook', $book->id) }}" class="btn btn-sm btn-primary">Chỉnh sửa</a>
									<a href="javascript:trashBook({{$book->id}});" class="btn btn-sm btn-danger">Xóa</a>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
				<div class="panel-footer">
					<center>
						{{ $books->links() }}
					</center>
				</div>
			</div>
		</div><!--/.col-->

	</div><!--/.row-->
</div>	<!--/.main-->
@endsection
@section('javascript')
<script type="text/javascript">
    var api_domain = "{{ url('') }}";
    var api_atk = "{{ csrf_token() }}";
</script>
<script type="text/javascript" src="{{ asset('admin_assets/js/bhome.js') }}"></script>
@endsection