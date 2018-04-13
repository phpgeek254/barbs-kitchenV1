@extends('master')

@section('content')
	<div class="row card">
		<div class="col s12">
		<a href="#add_item" class="btn" style="float: right;"> Add New Item </a>
		</div>
		<div class="col s6">

			@include('stock.create')
		
				@forelse ($stock_items->chunk(4) as $chunk)
				<div class="row">
				@foreach ($chunk as $item)
					@include('stock.restock')
					@include('stock.edit')
					@include('stock.subtract_stock')
					@include('stock.delete_form')
							<div class="col s12 m6">
								<div class="card small darken-1">
									<div class="card-content white-text">
										<span class="card-title center">{{ $item->name }}</span>
										<ul class="collection">
											<li class="collection-item"> Unit Price: KSH{{ $item->cost_per_unit }}</li>
										<li class="collection-item">Units : {{ $item->units }}</li>
										<li class="collection-item">Available : {{ $item->quantity }}</li>
										</ul>
										
										</div>
									<div class="card-action center">

							<a href="#sub_stock_{{ $item->id }}">Take</a>
							<a href="#restock_{{ $item->id }}">Restock</a> <br>
							<a href="#edit_{{ $item->id }}">
							<i class="fa fa-pencil-square-o"></i>
							</a>
										<a href="#delete_{{ $item->id }}">
											<i class="fa fa-trash-o"></i>
										</a>
									</div>
								</div>
							</div>
				@endforeach
				</div>
				@empty

					<li class="center"> There is no stock currently </li>
				@endforelse
				
				
			
		@include('pagination.paginator', ['paginator'=>$stock_items])
	</div>
		<div class="col m6 s12">
			<div class="row">
				<div class="col s12">
					Item Stock Levels
				</div>
				<div class="col s12">
					Most Stocked Items
				</div>
				<div class="col s12">
					Monthly Stock Expenditure
					{{--{!! $chart->render() !!}--}}
				</div>
			</div>
		</div>
		</div>
		
@endsection