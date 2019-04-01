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
	{{ $data->links() }}
</div>