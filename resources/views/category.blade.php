@extends('layouts.main')

@section('page-title')
{{$data[0]->category->name}}
@endsection

@section('custom-css')
<link rel="stylesheet" type="text/css" href="{{ asset('css/category.css') }}">
@endsection

@section('page-content')
<div class="product-container">
	
	<div class="row d-flex justify-content-center">
		<div class="col-10">
			<div class="category-name">
				<a href="/category={{$data[0]->categories_id}}">{{$data[0]->category->name}}</a>
			</div>
			<div class="all-products-container">

				@foreach ($data as $book)
				<div class="product-container container shadow-hover">
					<div class="row">
						<div class="col-md-6 col-12">
							<div class="product-image">
								<img src="{{$book->img}}">
							</div>
						</div>
						<div class="col-md-6 col-12">
							<div class="product-info">
								<div class="book-name">
									<a href="/get_book={{$book->id}}"><b></b>{{$book->name}}</a>
								</div>
								<div class="book-info-panel">
									<div class="book-quantity">
										Remaining: {{$book->quantity}} books
									</div>
									<div class="book-price">
										Price: {{number_format($book->price)}} VND
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
		</div>
	</div>
</div>
@endsection

@section('custom-js')
@endsection
