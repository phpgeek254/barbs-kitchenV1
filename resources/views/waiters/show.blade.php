@extends('master')

@section('content')
<div class="row  card">
	<div class="col m6 s12">
				<div class="card">
					<div class="card-image">
						<img src="{{ asset($waiter->profile_image) }}">
						<span class="card-title">{{ $waiter->name }}</span>
					</div>
					<div class="card-content">
						<ul class="collection with-header">
							<li class="collection-item"> <h4>Personal Information</h4></li>
							<li class="collection-item">Name : {{ $waiter->name }}</li>
							<li class="collection-item">PF Number : {{ $waiter->pf_number }}</li>
							<li class="collection-item">Phone Number : {{ $waiter->phone_number }}</li>
						</ul>
					</div>
					<div class="card-action">

						@if (Auth::check() and Auth::user()->user_level == 'admin' )
						@include('waiters.delete_waiter', ['some' => 'data'])
						@endif
						
					</div>
				</div>
			</div>
	<div class="col m6 s12">
		<h4 class="center"> Performance Criterion</h4>
		<ul class="collection with-header">
			<li class="collection-item"> <h4>Sales</h4></li>
			<li class="collection-item">Rank : 4</li>
			<li class="collection-item">Sales Per Month: 23</li>
			<li class="collection-item">Sales Per Day : 10</li>
		</ul>

		 <div class="row">
			<div class="col s12">
				<div class="card medium purple lighten-4">
					<div class="card-content white-text">
						<span class="card-title">Sales Progress (past month)</span>
						{!! $chart->render() !!}
					</div>
					<div class="card-action">

					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection