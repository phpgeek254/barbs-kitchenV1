@extends('master')

@section('content')
    <div class="row card">
        <div class="row">
            <div class="col m6 s12">
                <div class="card purple lighten-4">
                    <div class="card-content white-text">
                        <span class="card-title">Waiter Performance</span>
                        {!! $waiter_chart->render() !!}
                    </div>
                    <div class="card-action">
                        <a href="#">Open Detail</a>
                    </div>
                </div>
            </div>

                <div class="col m6 s12">
                    <div class="card light-purple darken-4">
                        <div class="card-content white-text">
                            <span class="card-title">Meal Types</span>
                            {!! $meal_types->render()  !!}
                        </div>
                        <div class="card-action">
                            <a href="#">Open Detail</a>
                        </div>
                    </div>
                </div>

<div class="row">
    <div class="col m10 s12">
        <div class="card light-purple darken-4">
            <div class="card-content white-text">
                <span class="card-title">Daily Sales</span>
                {!! $daily_perform->render() !!}{% extends 'master.html' %}
{% load staticfiles %}
{% block slider %}
{% endblock %}
{% block content %}
<div class="row main-low-margin text-center">
            <div class="col-md-12">
                <div class="circle-body">
                    <i class="fa fa-user fa-5x  icon-set"></i>
                </div>
                <h3>NAME : {{ user.name }}</h3>
                <h3>ADM No :{{ user.reg_number }}</h3>
                <h3>EMAIL: {{ user.email }}</h3>
                <p>
                </p>
            </div>

            </div>


        </div>
{% endblock %}
            </div>
            <div class="card-action">
                <a href="#">Open Detail</a>
            </div>
        </div>
    </div>

    <div class="col m2 s12">
        <div class="row">
            <div class="col s12">
                <div class="card purple lighten-4 center">
                    <div class="card-content white-text">
                        <span class="center">Max Sold</span>
                        <span class="card-title"> 90 </span>
                    </div>
                    <div class="card-action">
                    </div>
                </div>
            </div>
            <div class="col s12">
                <div class="card purple lighten-4 center">
                    <div class="card-content white-text">
                        <span class="center">Min Sold</span>
                        <span class="card-title"> 20 </span>
                    </div>
                    <div class="card-action">
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
    <div class="row">
        <div class="col m12 s12">
            <div class="card light-purple darken-4">
                <div class="card-content white-text">
                    <span class="card-title">Meals</span>
                    {!! $meals->render() !!}
                </div>
                <div class="card-action">
                    <a href="#">Open Detail</a>
                </div>
            </div>
        </div>
    </div>
    </div>

@endsection