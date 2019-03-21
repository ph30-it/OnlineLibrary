@extends('layouts.main')

@section('page-title')
Trang chủ
@endsection

@section('custom-css')
<link rel="stylesheet" type="text/css" href="{{URL::asset('vendor/slick/slick.css')}}"/>
<link rel="stylesheet" type="text/css" href="{{URL::asset('vendor/slick/slick-theme.css')}}"/>
<link rel="stylesheet" type="text/css" href="{{URL::asset('css/Home/home.css')}}">
@endsection

@section('page-content')
<div class="category-container">
	<div class="row">
		<div class="col-md-4 col-12">
			<div class="category-list">
				<ul class="list-group">
					<li class="list-group-item cat-item text-left" style="background-color: #e74c3c;color: white">Categories</li>
					@foreach($data['categories'] as $category)
					<li class="list-group-item cat-item">
						<a href="/category={{$category->id}}">
							{{$category->name}}
						</a>
					</li>
					@endforeach

				</ul>
			</div>
		</div>
		<div class="col-md-8 d-none d-lg-block">
			<!-- Picture slider -->
			<div class="picture-slider-container">
				<div>
					<img src="https://images.pexels.com/photos/1252869/pexels-photo-1252869.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" class="slide-item">
				</div>
				<div>
					<img src="https://images.unsplash.com/photo-1534448177492-6d698f12a59a?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&w=1000&q=80" class="slide-item">
				</div>
			</div>
		</div>
	</div>
</div>

<div class="product-container">
	<div class="row d-flex justify-content-center">
		<div class="col-10">
			@for ($i = 0; $i < sizeof($data['categories']); $i++)
		<div class="product-by-category-container">
			<div class="category-name">
				<a href="/category={{$data['books'][$i][0]->category->id}}">{{$data['books'][$i][0]->category->name}}</a>
			</div>
			<div class="book-container">
				<div class="row d-flex justify-content-center">
					<div class="col-md-11 col-12 book-list">
						@foreach ($data['books'][$i] as $book)
						<div class="book-item">
							<div class="book-cover">
								<img src="{{$book->img}}">
							</div>
							<div class="book-info">
								<div class="book-name">
									<a href="get_book={{$book->id}}">{{$book->name}}</a>
								</div>
								<div class="book-quantity">
									Remaining: {{$book->quantity}} books
								</div>
								<div class="book-price">
									{{number_format($book->price)}} VND
								</div>
								<div class="book-buy">
									<button class="get-book-btt" data-book-id="{{$book->id}}">Get it now</button>
								</div>
							</div>
						</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>

		<hr>

	@endfor
		</div>
	</div>

	
</div>
@endsection

@section('custom-js')
<script type="text/javascript" src="{{URL::asset('vendor/slick/slick.min.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('js/Home/home.js')}}"></script>
@endsection