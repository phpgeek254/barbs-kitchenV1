<h5 class="center"> Add Dish </h5>
<div class="modal-content">
    <div class="row">
        <div class="input-field col s12">
            {!! Form::text('name', null) !!}
            {!! Form::label('name', 'Meal Name') !!}
        </div>
    </div>

    <div class="row">
        <div class="input-field col s12">
            {!! Form::textarea('description', null, ['class'=>'materialize-textarea']) !!}
            {!! Form::label('description', 'Enter Description') !!}
        </div>
    </div>

    <div class="row">
        <div class="input-field col s12">
            {!! Form::number('price', null) !!}
            {!! Form::label('price', 'Enter Price') !!}
        </div>
    </div>

    <div class="row">
        <div class="file-field input-field">
            <div class="btn">
                <span>File</span>
                {!! Form::file('image_path') !!}
            </div>
            <div class="file-path-wrapper">
                <input class="file-path validate" type="text">
                @if($errors)
                    <span class="help-block">{{ $errors->first('image_path') }}</span>
                @endif
            </div>
        </div>
    </div>
</div>