<h4>Add A New Expenditure </h4>
		@if (count($errors) > 0)
			@foreach ($errors->all() as $error)
				<span class="error"> {{ $error }}</span>
			@endforeach
		@else
			
		@endif
		<div class="row">
			<div class="input-field col s12">
				{!! Form::text('amount', null) !!}
				{!! Form::label('amount', 'Enter Amount Used') !!}
			</div>
			<div class="input-field col s12">
				{!! Form::textarea('reason', null, ['class'=>'materialize-textarea']) !!}
				{!! Form::label('reason', 'Please Enter Reason') !!}
			</div>
		</div>
		
