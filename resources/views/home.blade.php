@extends('master')
@section('content')
    <div class="row">
        <div class="col s12 center">
            <img src="{{ asset('images/logo.jpg') }}" alt=""
                 class="z-depth-5 responsive-img animated bounceInDown"
                 style="position: relative; top: 50%; bottom: 50%; margin-bottom: 50px;">
            <div class="animated fadeInDown">
                <a href="/meals" class="btn-flat"><i class="fa fa-bars"></i> Menu </a>
                <a href="/meals" class="btn-flat"><i class="fa fa-birthday-cake"></i> Dishes </a>
                <a href="/orders" class="btn-flat"><i class="fa fa-buysellads"></i> Orders </a>
                <a href="/login" class="btn-flat"><i class="fa fa-power-off"></i> Login </a>
            </div>
        </div>
        <div class="row">
            <div class="col m12 s12">
                @forelse($meal_types->chunk(4) as $chunk)
                    <div class="row">
                    @foreach($chunk as $meal_type)
                                <div class="col m3 s12 animated fadeInUp">
                                    <div class="card small round">
                                        <div class="card-image">
                                            {{ Html::image(asset($meal_type->image_path), null, ['style'=>'height:150px; max-height:150px;']) }}
                                        </div>
                                        <div class="card-content white-text">
                                            <span class="center" style="font-size: 12px;">{{ $meal_type->name }}</span>
                                            <span class="badge white-text" style="background: #420D09;">{{count($meal_type->meals)}}</span>
                                        </div>
                                        {{--<div class="card-action center">--}}
                                            {{--<a class="btn" href="{{ route('meal.show', ['id'=>$meal_type->id]) }}">Open</a>--}}
                                        {{--</div>--}}
                                    </div>
                                </div>
                    @endforeach
                    </div>
                @empty
                @endforelse
            </div>
        </div>
    </div>
@endsection