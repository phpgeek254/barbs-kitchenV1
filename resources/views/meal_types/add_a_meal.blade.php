
<!-- Modal Structure -->
<div id="add_meal_{{ $meal_type->id }}" class="modal">
    {!! Form::open(['route'=>['meal.store'], 'files'=>true]) !!}
    {!! Form::hidden('meal_type_id', $meal_type->id) !!}
    @include('meal_types.add_meal_form')
    <div class="modal-footer">
        {!! Form::submit('Save', ['class'=>'btn left']) !!}
        <a href="#" class="waves-effect waves-green btn modal-action modal-close">Cancel</a>
    </div>
    {!! Form::close() !!}
</div>
