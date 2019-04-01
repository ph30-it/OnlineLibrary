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
				<li class="breadcrumb-item"><a href="{{ route('home') }}">
					<i class="fas fa-home"></i>
				</a></li>
				<li class="breadcrumb-item"><a href="{{ route('category', $book->categories->id) }}">{{$book->categories->name}}</a></li>
				<li class="breadcrumb-item active">{{$book->name}}</li>
			</ol>
		</div>
		<div class="col-5">
			<div class="book-cover">
				<img src="{{$book->img}}">
			</div>
		</div>
		<div class="col-7">
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

<hr>

@if(Auth::check())
<div class="star-container text-center">
	<table class="table table-bordered">
		<thead>
			<tr>
				<th></th>
				<th>Very Bad</th>
				<th>Bad</th>
				<th>Normal</th>
				<th>Like</th>
				<th>Love</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<th>Raiting</th>
				@for($i = 1; $i <= 5;$i++)
				@if($star_number && $star_number == $i)
				<th>
					<input type="radio" name="star" value="{{$i}}" id="rating_radio{{$i}}" class="rating_radio" checked>
					<label class="rating_label" for="rating_radio{{$i}}"></label>
				</th>
				@else
				<th>
					<input type="radio" name="star" class="rating_radio" value="{{$i}}" id="rating_radio{{$i}}">
					<label class="rating_label" for="rating_radio{{$i}}"></label>
				</th>
				@endif
				@endfor
			</tr>
		</tbody>
	</table>
</div>

<hr>

@endif

<div class="comment-container">
	@if(Auth::check())
	<div class="user-sending-comment-container">
		<div class="user-info" id="user-info">
			{{Auth::user()->firstname}}
		</div>

		<div class="body">
			<textarea class="user-sending-area" name="user_comment_content" id="user_comment_content" placeholder="Enter your comment"></textarea>
		</div>
		
		<input type="text" name="book_id" value="{{$book->id}}" style="display: none" id="book_id_input">
		
		<button type="button" class="add-comment-btn" id="comment-submit">Post</button>

		<div style="clear: right">
			
		</div>
	</div>
	<hr>
	@endif
	
	<div class="users-comment-list" id="comment-list">
		@foreach($comments as $comment)
		<div class="comment-container">
			<div class="user-info">
				{{$comment->user->firstname}} commented at {{$comment->created_at}}
			</div>

			<textarea class="comment-content" readonly>
				{{$comment->comment}}
			</textarea>
		</div>

		<hr>
		@endforeach
	</div>
</div>
@endsection

@section('custom-js')
<script type="text/javascript" src="{{ asset('js/book.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/emoji.min.js') }}"></script>
@endsection