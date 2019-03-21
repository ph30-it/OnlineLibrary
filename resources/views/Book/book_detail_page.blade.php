@extends('layouts.main')

@section('page-title')
{{$book->name}}
@endsection

@section('custom-css')
<link rel="stylesheet" type="text/css" href="{{URL::asset('css/Book/book_detail_page.css')}}">
@endsection

@section('page-content')
<div class="book-detail-container container">
	<div class="row">
		<div class="col-md-5 col-12">
			<div class="book-cover">
				<img src="{{$book->img}}">
			</div>
		</div>
		<div class="col-md-7 col-12">
			<div class="book-info-container">
				<div class="book-name">
					<b>{{$book->name}}</b>
				</div>

				<hr>

				<div class="book-author-detail">
					<div class="container">
						<div class="row">
							<div class="col-6">
								Author: {{$book->author}}
							</div>

							<div class="col-6">
								Published: {{$book->published_year}}
							</div>
						</div>
					</div>
				</div>

				<hr>
				
				<div style="width: 100%">
					<div class="container">
						<div class="row">
							<div class="col-6 text-center">
								Price: <b><span style="color: #e74c3c;font-size: 1.5em">{{number_format($book->price)}}</span></b> VND
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
					Description:
					<div>{{$book->describes}}</div>	
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@section('custom-js')
<script type="text/javascript" src="{{URL::asset('js/Book/book_detail_page.js')}}"></script>
@endsection