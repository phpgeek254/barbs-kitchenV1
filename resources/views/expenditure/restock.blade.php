<!-- Modal Structure -->
<div id="restock_{{ $item->id }}" class="modal">
	<div class="modal-content">
		<h4> Restock {{ $item->name }}</h4>
		{!! Form::open(['route'=>['restock'], 'method'=>'PATCH']) !!}
		{!! Form::hidden('user_id', Auth::user()->id) !!}
		{!! Form::hidden('stock_id', $item->id) !!}
		{!! Form::hidden('transaction_type', 'restock') !!}
		<div class="input-field col s12">
			{!! Form::number('quantity', null) !!}
			{!! Form::label('quantity', 'Enter Restock Amount') !!}
		</div>
	</div>
	<div class="modal-footer">
		{!! Form::submit('Save', ['class'=>'btn', 'style'=>'float:left;']) !!}
		<a href="#" class="waves-effect waves-green btn-flat modal-action modal-close">Cancel</a>
		{!! Form::close() !!}
	</div>
</div>