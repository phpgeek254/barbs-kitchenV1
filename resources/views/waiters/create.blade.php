<div id="add_waiter" class="modal">
<div class="modal-content">
{!! Form::open(['route'=>['waiters.store'], 'files'=>true]) !!}
@include('waiters._form')
</div>

    <div class="button" style="margin: 10px;">
{!! Form::submit('Save', ['class'=>'btn']) !!}
<a href="#!" style="float: right;" class="modal-action modal-close btn">Cancel</a>

{!! Form::close() !!}
</div>
</div>