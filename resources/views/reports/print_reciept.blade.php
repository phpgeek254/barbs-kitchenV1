@extends('master')
@section('content')
	<div class="row printmedia">
		<div class="col s12">
			<div class="row">
				<div class="col s12">
					<div class="card">
						<div class="card-content white-text brown darken-4">
							<span class="card-title white-text"> Barbs-Kitchen Receipt </span>
								@include('orders.single_order_loop', $order)
            				<p class="center">
            					
            					 &copy  Barbs Kitchen {{ date('Y') }} <br>
            				
            					Date: {{ date('d - m - Y') }}
            					<br>
            					Order Number {{ random_int(1000, 1000000)}} - {{ $order->id }} - {{ random_int(1000, 1000000)}}
            				</p>
							
						</div>
						<div class="card-action noPrint">
							{{ link_to('#', 'Print Order', ['class'=>'waves btn', 'id'=>'print_order']) }}
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
