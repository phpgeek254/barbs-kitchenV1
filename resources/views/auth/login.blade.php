@extends('master')

@section('content')
	<div class="row">
		<div class="col m3 s12"></div>
				<div class="col s12 m6 center card animated bounceInDown"
					 style="margin-top: 200px; border: 1px solid #420D09; border-radius: 10%;">
					<h4 class="card-title">Login Here</h4>
						<div class="card-image center">
							<img src="images/avatar.png" style='max-height: 300px; width: 300px; text-align: center; margin: auto; border-radius: 50%; border:solid black 1px;'>

						</div>
				{!! Form::open(['route'=>['login']]) !!}
						<div class="input-field col s12">
							{!! Form::email('email', null) !!}
							{!! Form::label('email', 'Enter Email') !!}
							<span class="error">{{ $errors->first('email') }}</span>
						</div>

						<div class="input-field col s12">
							{!! Form::password('password', null) !!}
							{!! Form::label('password', 'Password') !!}
							<span class="error">{{ $errors->first('password') }}</span>
						</div>


						{!! Form::submit('Login', ['class'=>'btn', 'style'=>'margin:10px;']) !!}
						{!! Form::close() !!}
			</div>
		<div class="col m3 s12"></div>
	</div>
@endsection