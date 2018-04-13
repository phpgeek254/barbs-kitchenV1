<div class="row">
	<div class="input-field col s12">
	{!! Form::text('name', null) !!}
	{!! Form::label('name', 'Type Name') !!}
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