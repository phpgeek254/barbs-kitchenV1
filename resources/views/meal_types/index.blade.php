@extends('master')


@section('content')

@include('meal_types.create')

@if ($errors)
    	@foreach ($errors->all() as $error)
    		<p> 	{{ $error }}</p>
    	@endforeach
    @endif

	@forelse( $meal_types as $meal_type)
	@include('meal_types.add_a_meal')
		<div class="row">
			<div class="col s12 m12">
		      <div class="card-stacked" style="background: #420D09; color: white;">
		        <div class="card-content center">
		         <h5 class="header white-text" style="padding: 10px;">{{  $meal_type->name }}</h5>
		        </div>
				  @if(Auth::check())
				  <div class="card-action">
		          <a class="btn-flat" href="#add_meal_{{ $meal_type->id }}">Add A Meal</a>
		        </div>
				  @endif
			  </div>
			@include('meal_types.meals')
		</div>
		</div>
	@empty
		<p> There are no meal types yet.</p>
	@endforelse
@if(Auth::check())
	<div class="row">
		<div class="col m12 s12">
			<a href="#add_meal_type" class="btn"> Add Meal type </a>
		</div>
	</div>
	@endif
@endsection