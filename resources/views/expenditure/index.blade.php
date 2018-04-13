@extends('master')

@section('content')
	<div class="row card">
		<div class="col m6 s12">
			<a href="#add_expence" class="btn" style="float: right;"> Add New Expense </a>
			@include('expenditure.create')

		<table class="stripped">
			<caption><h4 class="center"> Expenses </h4></caption>
			<thead>
				<tr>
					<th data-field="name"> Description </th>
					<th data-field="price"> Amount </th>
					<th data-field="price"> Date </th>
					<th data-field="price"> Done By </th>
				</tr>
			</thead>
			<tbody>
			@forelse($expenses as $expense)
				<tr>
					<td>{{ $expense->reason }}</td>
					<td>{{ $expense->amount }}</td>
					<td>{{ date('d - m - Y', strtotime($expense->created_at)) }}</td>
					<td>{{ $expense->user->name }}</td>
				</tr>
				@empty
					<p class="center"> There is no Expenses currently recorded </p>
				@endforelse
			</tbody>
		</table>
	
		@include('pagination.paginator', ['paginator'=>$expenses])
	</div>
		<div class="col m6 s12">
			{!! $monthlyChart->render() !!}
		</div>
</div>
@endsection