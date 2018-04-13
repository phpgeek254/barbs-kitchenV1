@extends('master')
@section('content')
    @if ($errors)
    	@foreach ($errors->all() as $error)
    		<p> 	{{ $error }}</p>
    	@endforeach
    @endif

    </div>
    <div class="row">
    	<div class="col s12"> <h4> Waiters </h4> <small class="right"> {{ count($waiters) }}</small> </div>
    </div>
	@forelse ($waiters->chunk(4) as $chunk)
	<div class="row">
	@foreach ($chunk as $waiter)
		
			<div class="col s12 m3">
				<div class="card">
					<div class="card-image">
						{!! Html::image(asset($waiter->profile_image), null, ['width'=>150, 'height'=>200]) !!}
						<span class="card-title">{{ $waiter->name }}</span>
					</div>
					<div class="card-content">
						<p></p>
					</div>
					<div class="card-action">
						<a href="#delete_waiter">Delete</a>
						<a href="{{ route('waiters.show', ['id'=> $waiter->id]) }}">View</a>
					</div>
				</div>
			</div>
		
	@endforeach
		</div>
	@empty
		
	@endforelse
@include('waiters.create')
    <div class="row">
        <div class="col  s12 center">
            <a href="#add_waiter" class="btn" id="add_waiter" style="margin: 10px;"> Add Waiter</a>
        </div>
    </div>
@endsection