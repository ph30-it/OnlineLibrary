@extends('layouts.main')

@section('page-title')
{{$data[0]->categories->name}}
@endsection

@section('custom-css')
<link rel="stylesheet" type="text/css" href="{{ asset('css/category.css') }}">
@endsection

@section('page-content')
<div class="product-container">
	<div class="row d-flex justify-content-center">
		<div class="col-12">
			<div>
				<ol class="breadcrumb">
					<li><a href="{{ route('home') }}">
						<i class="fas fa-home"></i>
					</a></li>
					<li><a href="">Category / </a></li>
					<li class="active"><a href="{{ route('category', $data[0]->categories->id) }}">{{$data[0]->categories->name}}</a></li>
				</ol>
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
									<a href="{{ route('book',$book->id) }}"><b></b>{{$book->name}}</a>
								</div>
								<div class="book-info-panel">
									<div class="book-quantity">
										Remaining: {{$book->quantity}} books
									</div>
									<!-- <div class="book-price">
										Price: {{number_format($book->price)}} VND
									</div> -->
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
		</div>
	</div>
</div>
@endsection

@section('custom-js')
<!-- <script type="text/javascript" src="{{ asset('js/category.js') }}"></script> -->
@endsection
