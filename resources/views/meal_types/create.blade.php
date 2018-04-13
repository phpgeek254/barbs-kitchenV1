<div id="add_meal_type" class="modal">
	<div class="modal-content">
		<h4>Add Meal type</h4>
		{!! Form::open(['route'=>['meals.store'], 'files'=>true]) !!}
		@include('meal_types.form')
	</div>
	<div class="modal-footer">
	{!! Form::submit('Save', ['class'=>'btn left']) !!}
		<a href="#" class="waves-effect waves-green btn modal-action modal-close">Cancel</a>
	{!! Form::close() !!}
	</div>
</div>