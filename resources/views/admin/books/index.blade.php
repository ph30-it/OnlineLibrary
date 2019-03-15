@extends('admin.layouts.master')
@section('header')
<div class="header">
    <h1 class="page-header">
      List Books
    </h1>
    <ol class="breadcrumb">
      <li><a href="#">Home</a></li>
      <li><a href="#">Books Manager</a></li>
      <li class="active">List Books</li>
    </ol>
</div>
@endsection
@section('content')
<div class="row">
	<div class="col-md-12">
		<!-- Advanced Tables -->
		<div class="card">
			<div class="card-action">
				Advanced Tables
            </div>
            <div class="card-content">
            	<div class="table-responsive">
            		<table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                        	<tr>
                        		<th>ID</th>
                        		<th>Name</th>
                                <th>Category</th>
                                <th>Author</th>
                                <th>Engine version</th>
                                <th>CSS grade</th>
                            </tr>
                        </thead>
                        <tbody>
                        	@foreach($books as $row)
                        	<tr>
                        		<td>{{ $row->id }}</td>
                        		<td>{{ $row->name }}</td>
                        		<td>{{ $row->categories->name }}</td>
                        		<td>{{ $row->author }}</td>
                        		<td class="center">{{ $row->img }}</td>
                        		<td class="center">X</td>
                        	</tr>
                        	@endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!--End Advanced Tables -->
    </div>
</div>
@endsection
@section('javascript')
<script src="assets/js/dataTables/jquery.dataTables.js"></script>
<script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
<script>
	$(document).ready(function () {
        $('#dataTables-example').dataTable();
    });
</script>
@endsection