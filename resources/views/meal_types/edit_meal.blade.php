<!-- Modal Structure -->
<div id="edit_meal_{{ $meal->id }}" class="modal">
    {!! Form::model($meal, ['route'=>['meal.update', $meal->id], 'files'=>true, 'method'=>'PATCH']) !!}
    {!! Form::hidden('meal_type_id', $meal_type->id) !!}
    @include('meal_types.add_meal_form')
    <div class="modal-footer">
        {!! Form::submit('Save', ['class'=>'btn']) !!}
        <a style='float:left' href="#" class="waves-effect waves-green btn modal-action modal-close">Cancel</a>
    </div>
    {!! Form::close() !!}
</div>