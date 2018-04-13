
<div id="add_item" class="modal">
	<div class="modal-content">
		{!! Form::open(['route'=>['stock.store']]) !!}
		{!! Form::hidden('user_id', Auth::user()->id) !!}
		@include('stock.form')
	<div class="modal-footer">
		{!! Form::submit('Save', ['class'=>'btn', 'style'=>'float:left']) !!}
		<a href="#" class="waves-effect waves-green btn modal-action modal-close">Cancel</a>
		{!! Form::close() !!}
	</div>
</div>