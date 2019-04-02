@foreach($data as $d)
<div class="other-user-comment">
	<div class="row">
		<div class="col-3">
			<div class="user-info">
				<div>
					<div>
						@if($d->image)
						<img src="{{ asset($d->user->image) }}" class="user-avatar">
						@else
						<img src="{{ asset('images/default.png') }}" class="user-avatar">
						@endif
					</div>
					<div class="text-center" style="font-weight: bold;font-size: 1.1em">
						{{ $d->firstname }}
					</div>
				</div>
			</div>
		</div>
		<div class="col-9">
			<div style="width: 100%;font-weight: bold" class="mt-2">
				{{ $d->firstname }} commented at {{ $d->created_at }} 
			</div>
			<div style="width: 100%;font-weight: bold" class="mt-2">
				@php
				$remaining_rating = 5 - $d->star_number;
				@endphp

				@for($i = 1; $i <= $d->star_number; $i++)
				<i class="fas fa-star" style="color: #f1c40f"></i>
				@endfor

				@for($i = 1; $i <= $remaining_rating; $i++)
				<i class="fas fa-star" style="color: darkgray"></i>
				@endfor

				@if($d->star_number == 1) <b> Angry</b>
				@elseif ($d->star_number == 2) <b> Disappointed</b>
				@elseif ($d->star_number == 3) <b> Neutral</b>
				@elseif ($d->star_number == 4) <b> Good</b>
				@elseif ($d->star_number == 5) <b> Excellent</b>
				@endif					
			</div>

			<div style="width: 100%;font-weight: bold" class="mt-2">
				{{ $d->comment }}
			</div>
		</div>
	</div>
</div>

<br>

@endforeach

<div style="width: 100%;display: flex;justify-content: center;align-items: center">
	{!! $data->appends(request()->query())->links() !!}
</div>