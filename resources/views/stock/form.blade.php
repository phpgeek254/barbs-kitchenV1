<h4>Add A New Item In Stock</h4>
		@if (count($errors) > 0)
			@foreach ($errors->all() as $error)
				<span class="error"> {{ $error }}</span>
			@endforeach
		@else
			
		@endif
		<div class="row">
			<div class="input-field col s12">
				{!! Form::text('name', null) !!}
				{!! Form::label('name', 'Item Name') !!}
			</div>
			<div class="input-field col s12">
				{!! Form::number('quantity', null) !!}
				{!! Form::label('quantity', 'Quantity') !!}
			</div>
			<div class="input-field col s12">
				{!! Form::select('units', App\Stock::$units, null, ['class'=>'select']) !!}
				{!! Form::label('units', 'Select Units') !!}
			</div>

			<div class="input-field col s12">
				{!! Form::number('cost_per_unit', null) !!}
				{!! Form::label('cost_per_unit', 'Enter Unit Price') !!}
			</div>
		</div>
		
	</div>