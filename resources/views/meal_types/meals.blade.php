@forelse( $meal_type->meals->chunk(3) as $chunk)
	<div class="row">
				@foreach ($chunk as $meal)
			@include('meal_types.edit_meal')
			<div class="col m4 s12 animated fadeInDown">
					<div class="card">
						<div class="card-image">
							{!! Html::image($meal->image_path, null, ['style'=>'max-height:150px;']) !!}
							<span class="card-title">{{ $meal->name }}</span>
						</div>
						<div class="card-content center">
							<p class="chip"> {{ $meal->name }}    
								at KSH. {{ $meal->price }}</p>
							<p>{{ substr($meal->description, 0, 20) }} ...</p>
						</div>
						<div class="card-action center">
							<a href="{{ route('add_to_cart', ['id' =>$meal->id]) }}">Add to tray</a>
							@if(Auth::check())
							<a href="#edit_meal_{{ $meal->id }}">Edit</a>
							<a href="#{{ route('add_to_cart', ['id' =>$meal->id]) }}">Delete</a>
							@endif

						</div>
					</div>
				</div>
			
				@endforeach
				</div>
				@empty
				<p> There are no meal types yet.</p>
			@endforelse