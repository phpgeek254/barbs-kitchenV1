@extends('master')

@section('content')
	<div class="row card">
		<div class="col m6 s12">
			<table class="bordered">
			<caption> <h5 class="center"> All Transactions </h5></caption>
			<thead>
				<tr>
					<th data-field="id"> Date </th>
					<th data-field="name"> Item Name</th>
					<th data-field="price"> Quantity </th>
					<th data-field="price"> Remained </th>
					<th data-field="price"> Transaction Type </th>
					<th data-field="price"> Transaction By </th>
				</tr>
			</thead>
			<tbody>
				@forelse ($transactions as $transaction)
					<tr>
					<td>{{ date('d - m- Y', strtotime($transaction->created_at)) }}</td>
					<td>{{ $transaction->stock->name  }}</td>
					<td>{{ $transaction->quantity_taken }} {{ ucfirst($transaction->stock->units)  }}</td>
					<td> {{  $transaction->remaining }} {{ ucfirst($transaction->stock->units)  }}</td>
					<td>{{ $transaction->transaction_type }}</td>
					<td>{{ $transaction->user->name }}</td>
				</tr>
				@empty
					
				@endforelse
				
			</tbody>
		</table>
		</div>
		<div class='col m6 s12'>
			<div class="row">
			<div class="col s12">
				{!! $stock_chart->render() !!}
			</div>

			<div class="col s12">
				{!! $subtraction_chart->render() !!}
			</div>

		</div>
		</div>
		
	</div>
@endsection