@extends('master')

@section('content')
	<div class="row card-panel">
		<div class="col m6 s12">
			@include('orders.table', $orders)
			@include('pagination.paginator', ['paginator' => $orders])
		</div>
		<div class="col m6 s12">
			<div class="row">
				<div class="col s12"><h5 class="center"> Hourly Sales </h5>
					{!! $chart->render() !!}
				</div>
				<div class="col s12">
					<br>
					<hr class="deep-purple z-depth-3" style="border-bottom: solid mediumpurple 4px;">
				</div>
				<div class="col s12">
					<h5 class="center">
						Top 4 Meals Today
						{!! $meals->render() !!}
					</h5>
				</div>
			</div>


		</div>
	</div>

@endsection