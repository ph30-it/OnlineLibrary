@extends('layouts.main')

@section('page-title')
Trang chủ - Home
@endsection

@section('custom-css')
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>
<link rel="stylesheet" type="text/css" href="{{ asset('css/home.css') }}">
@endsection

@section('page-content')
<div class="category-container">
	<div class="row">
		<div class="col-md-3 col-12">
			<div class="category-list">
				<ul class="list-group">
					<li class="list-group-item cat-item text-left" style="background-color: #e74c3c;color: white">Categories</li>
					@foreach($categories as $category)
					<li class="list-group-item cat-item">
						<a href="{{ route('category', $category->id) }}">
							{{$category->name}}
						</a>
					</li>
					@endforeach

				</ul>
			</div>
		</div>
		<div class="col-md-9 d-none d-lg-block">
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
			@for ($i = 0; $i < count($categories); $i++)
			<div class="product-by-category-container">
				<div class="category-name">
					<a href="{{ route('category', $books[$i][0]->categories->id) }}">{{$books[$i][0]->categories->name}}</a>
				</div>
				<div class="book-container">
					<div class="row d-flex justify-content-center">
						<div class="col-md-11 col-12 book-list">
							@foreach ($books[$i] as $book)
							<div class="book-item">
								<figure class="book-cover">
									<a href="{{ route('book',$book->id) }}"><img src="{{$book->img}}" alt="Book Image" hr></a>
								</figure>

								<div class="book-info">
									<div class="book-name">
										<a href="{{ route('book',$book->id) }}">{{$book->name}}</a>
									</div>
									<div class="book-quantity">
										<p>Remaining: {{$book->quantity}} books</p>
									</div>
									<!-- <div class="book-price">
										<p>{{number_format($book->price)}} VND</p>
									</div> -->
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
<script type="text/javascript" src="{{ asset('js/home.js') }}"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
@endsection