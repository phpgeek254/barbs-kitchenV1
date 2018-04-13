<!-- Modal Structure -->
<div id="sub_stock_{{ $item->id }}" class="modal">
	<div class="modal-content">
		<h4> Remove {{ $item->name }}</h4>
		{!! Form::open(['route'=>['remove_stock'], 'method'=>'PATCH']) !!}
		{!! Form::hidden('user_id', Auth::user()->id) !!}
		{!! Form::hidden('stock_id', $item->id) !!}
		{!! Form::hidden('transaction_type', 'subtraction') !!}
		<div class="input-field col s12">
			{!! Form::number('quantity', null) !!}
			{!! Form::label('quantity', 'Enter Amount') !!}
		</div>
	</div>
	<div class="modal-footer">
		{!! Form::submit('Remove', ['class'=>'btn', 'style'=>'float:left;']) !!}
		<a href="#" class="waves-effect waves-green btn-flat modal-action modal-close">Cancel</a>
		{!! Form::close() !!}
	</div>
</div>