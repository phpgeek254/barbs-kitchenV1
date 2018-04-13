@extends('master')

@section('content')
<div class="row">
	<h4>
	{{ $meal_type->name }}
	</h4>

	@include('meal_types.meals')
	@include('meal_types.add_a_meal')
</div>
	
	<div class="row">
		@if (Auth::check())
			<div class="col m12 s12" style="margin: 10px;">
			<a href="#add_meal_{{ $meal_type->id }}" class="btn">Add A Meal</a>
		</div>
		@endif
		
	</div>
@endsection