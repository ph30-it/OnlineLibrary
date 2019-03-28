@extends('layouts.main')

@section('page-title','Home')

@section('custom-css')
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>
<link rel="stylesheet" type="text/css" href="{{ asset('css/home.css') }}">
@endsection

@section('page-content')
<div class="category-container">
	<div class="row">
		<div class="col-lg-3 col-sm-12col-12">
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
		<div class="col-lg-9 d-none d-lg-block">
			<div class="picture-slider-container">
				<div>
					<img src="https://www.houseofbots.com/images/news/4594/cover.png" class="slide-item">
					<div class="carousel-caption d-none d-md-block">
						<h5>MORE BOOK FOR YOU.</h5>
						<p>Have Fun !</p>
					</div>
				</div>
				<div>
					<img src="http://dasaptaerwin.net/wp/wp-content/uploads/2016/02/best-books-book-youll-ever-read.jpg" class="slide-item">
				</div>
			</div>
		</div>
	</div>
</div>

<div class="product-container">
	<div class="row d-flex justify-content-center">
		<div class="col-12">
			@for ($i = 0; $i < 2; $i++)
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
<script type="text/javascript" src="{{ asset('js/main.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/home.js') }}"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
@endsection