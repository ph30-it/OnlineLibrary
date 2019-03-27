@extends('layouts.main')

@section('page-title')
{{$book->name}}
@endsection

@section('custom-css')
<link rel="stylesheet" type="text/css" href="{{ asset('css/book.css') }}">
@endsection

@section('page-content')
<div class="book-detail-container">
	
	<div class="row">
		<div class="col-12">
			<ol class="breadcrumb">
				<li><a href="{{ route('home') }}">
					<i class="ti-home"></i>
				</a></li>
				<li class="active"><a href="{{ route('category', $book->categories->id) }}">{{$book->categories->name}}</a></li>
				<li><a href="">{{$book->name}}</a></li>
			</ol>
		</div>
		<div class="col-4">
			<div class="book-cover">
				<img src="<!-- {{$book->img}} -->">
			</div>
		</div>
		<div class="col-8">
			<div class="book-info-container">
				<div class="book-name">
					<b>{{$book->name}}</b>
				</div>

				<hr>

				<div class="book-author-detail">
					<div class="container">
						<div class="row">
							<div class="col-6 text-center">
								Author: {{$book->author}}
							</div>

							<div class="col-6 text-center">
								Published: {{$book->published_year}}
							</div>
						</div>
					</div>
				</div>

				<hr>
				
				<div class="book-author-detail">
					<div class="container">
						<div class="row">
							<div class="col-6 text-center">
								Price: <b><span style="color: #e74c3c">{{number_format($book->price)}}</span></b> VND
							</div>

							<div class="col-6 text-center" id="quantity-field">
								Remaining: {{$book->quantity}} books
							</div>
						</div>
					</div>
				</div>
				
				<hr>

				<div class="d-flex justify-content-center" style="width: 100%">
					<button class="get-book-btt" data-book-id="{{$book->id}}">Get it now</button>
				</div>

				<hr>
				
				<div class="description-section">
					Book Description:
					<div>{{$book->describes}}</div>	
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@section('custom-js')
@endsection