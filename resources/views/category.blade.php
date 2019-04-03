@extends('layouts.main')

@section('page-title')
{{$data[0]->categories->name}}
@endsection

@section('custom-css')
<link rel="stylesheet" type="text/css" href="{{ asset('css/category.css') }}">
@endsection

@section('page-content')
<div class="product-container">
	<div class="row">
		<div class="col-3">
			<div class="category-list">
				<ul class="list-group">
					<li class="list-group-item cat-item text-left" style="background-color: #e74c3c;color: white">Categories</li>
					@foreach($categories as $category)
					<a href="{{ route('category', $category->id) }}">
						<li class="list-group-item cat-item">
							{{$category->name}}
						</li>
					</a>
					@endforeach
				</ul>
			</div>
		</div>
		<div class="col-9">
			<div>
				<ol class="breadcrumb">
					<li class="breadcrumb-item">
						<a href="{{ route('home') }}">
							<i class="fas fa-home"></i>
						</a>
					</li>
					<li class="breadcrumb-item active">{{$data[0]->categories->name}}</li>
				</ol>
			</div>
			<select class="browser-default custom-select custom-select-md" style="display: inline;" id="pagination-select" data-category-id="{{$data[0]->categories->id}}">
				<option {{ ($page_selection == 10) ? 'selected' : "" }} value="10">Show 10 books</option>
				<option {{ ($page_selection == 15) ? 'selected' : "" }} value="15">Show 15 books</option>
				<option {{ ($page_selection == 20) ? 'selected' : "" }} value="20">Show 20 books</option>
				<option {{ ($page_selection == 0) ? 'selected' : "" }} value="0">Show All books</option>
			</select>
			<hr>	
			<div id="paginate">
				<div class="all-products-container" id="product-container">
					@foreach ($data as $book)
					<div class="product-container container shadow-hover" id="#example">
						<div class="row">
							<div class="col-md-6 col-12">
								<div class="product-image">
									<img src="{{$book->img}}">
								</div>
							</div>
							<div class="col-md-6 col-12">
								<div class="product-info">
									<div class="book-name">
										<a href="{{ route('book',$book->id) }}"><b></b>{{$book->name}}</a>
									</div>
									<div class="book-info-panel">
										<div class="book-quantity">
											Remaining: {{$book->quantity}} books
										</div>
										<div class="book-describes">
											Describes : {{substr($book->describes,0,40)}}...
										</div>
										<button class="get-book-btt" data-book-id="{{$book->id}}">
											Get it now
										</button>
									</div>
								</div>
							</div>
						</div>
					</div>
					@endforeach
				</div>
				<hr>
				<div style="width: 100%;" class="d-flex justify-content-center">
					{!! $data->appends(request()->query())->links() !!}
				</div>

			</div>
		</div>
	</div>
</div>
@endsection

@section('custom-js')
<script type="text/javascript" src="{{ asset('js/main.js') }}"></script>
<script>
	$(document).ready(function(){
		// if ($("select option)
		$("select#pagination-select").change(function(){
			let selectedItem = $(this).val();
			let categoryId = $(this).attr("data-category-id");
			let token = $("meta[name='csrf-token']").attr("content");
			$.ajax({
				type:'POST',
				url:'/category/'+categoryId,
				data:{
					'category':categoryId,
					'pagination':selectedItem,
					'_token':token
				},
				success:function(data){
					$("#paginate").empty().append($(data).hide().fadeIn(500));
				},
				error:function(jqXHR,exception){
					console.log(jqXHR.responseText);
				}
			});
		});
	});
</script>
@endsection
