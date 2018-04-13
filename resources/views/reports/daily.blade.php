@extends('master')

@section('content')
<div class="row">
    <div class="col m6 s12 card-panel">
        @include('orders.table', $orders)
		@include('pagination.paginator', ['paginator' => $orders])
    </div>
    <div class="col m6 s12 card">
        <div class="row">
            <div class="col s12">
                <h5 class="center"> Sales Chart </h5>
                {!! $salesChart->render() !!}
            </div>
            
            	<div class="col s12 m6">
            		<div class="card">
            			<div class="card-content white-text">
            				<h2 class="center">{{ count($orders) }}</h2>
            			</div>
            			<div class="card-action center">
            				Total Orders
            			</div>
            		</div>
            	</div>
            	<div class="col s12 m6">
            		<div class="card">
            			<div class="card-content white-text">
            				<h2 class="center"> {{ $amount }} /=</h2>
            			</div>
            			<div class="card-action center">
            				Total Total Revenue
            			</div>
            		</div>
            	</div>

            	<div class="col s12 m6">
            		<div class="card">
            			<div class="card-content white-text">
            				<h2 class="center">{{ count($orders)-$pending }} </h2>
            			</div>
            			<div class="card-action center">
            				Confirmed Orders 
            			</div>
            		</div>
            	</div>

            	<div class="col s12 m6">
            		<div class="card">
            			<div class="card-content white-text">
            				<h2 class="center"> {{ $pending? :0 }}</h2>
            			</div>
            			<div class="card-action center">
            				Pending Orders
            			</div>
            		</div>
            	</div>

            	<div class="col s12">
            		<div class="card">
            			<div class="card-content white-text">
            				<h5 class="center"> Waiter Performance </h5>
							{!! $chart->render() !!}
							<br>
            			</div>
            			<div class="card-action center">
            			</div>
            		</div>
            	</div>

        </div>

    </div>
</div>
@endsection