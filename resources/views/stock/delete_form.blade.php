<!-- Modal Structure -->
<div id="delete_{{ $item->id }}" class="modal">
	<div class="modal-content">
		<h5> Are You sure you want to delete this item ??</h5>
	</div>
	<div class="modal-footer">
		{!! Form::open(['route'=>['stock.destroy', $item->id], 'method'=>'DELETE']) !!}
		{!! Form::submit('Save', ['class'=>'btn', 'style'=>'float:left']) !!}
		<a href="#" class="waves-effect waves-green btn modal-action modal-close">Cancel</a>
		{!! Form::close() !!}
	</div>
</div>