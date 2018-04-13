        {!! Form::open(['route'=>['waiters.store'], 'files'=>true]) !!}
        <h5 class="center">
            Add A New Waiter
        </h5>
        <div class="input-field col s12">
            {!! Form::text('name', null) !!}
            {!! Form::label('name', 'Enter Name') !!}
        </div>

        <div class="input-field col s12">
            {!! Form::text('pf_number', null) !!}
            {!! Form::label('pf_number', 'Enter PF Number') !!}
        </div>

        <div class="input-field col s12">
            {!! Form::number('phone_number', null) !!}
            {!! Form::label('phone_number', 'Enter Phone Number') !!}
        </div>
        <div class="file-field input-field">
            <div class="btn">
                <span>File</span>
                {!! Form::file('profile_image') !!}
            </div>
            <div class="file-path-wrapper">
                <input class="file-path validate" type="text">
                @if($errors)
                    <span class="help-block">{{ $errors->first('profile_image') }}</span>
                @endif
            </div>
        </div>
