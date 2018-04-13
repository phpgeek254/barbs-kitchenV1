<!-- Modal Trigger -->
						
<!-- Modal Structure -->
<div id="delete_waiter_{{ $waiter->id }}" class="modal">
	<div class="modal-content">
		<h4 class="center">Delete Waiter</h4>
		<p>Are you sure you want to delete this waiter?</p>
	</div>
	<div class="modal-footer">
		{!! Form::open(['route'=>['waiters.destroy', $waiter->id], 'method'=>'DELETE']) !!}
		{!! Form::submit('Delete', ['class'=>'btn', 'style'=>'float:left']) !!}
		{!! Form::close() !!}
		<a href="#" class="waves-effect waves-green btn modal-action modal-close">Cancel</a>
	
	</div>
</div>
	<a href="#delete_waiter_{{ $waiter->id }}" class="btn">Delete</a>