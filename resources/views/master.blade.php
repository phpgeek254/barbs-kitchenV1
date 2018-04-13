<!DOCTYPE html>
<html>
<head>
  <title> Barbs Hotel</title>
    {{ Html::style('/css/materialize.css') }}
    {{ Html::style('/css/animate.css') }}
    {!! Html::style('css/materialize.clockpicker.css') !!}
    {!! Html::style('/css/font_awesome/css/font_awesome.css') !!}
    {{ Html::style('/css/style.css') }}
    {{ Html::style('/css/print.css') }}
    {!! Charts::assets() !!}
  @yield('styles')

  {{--scripts--}}
    {{ Html::script('js/jquery.js') }}
    {{ Html::script('js/materialize.js') }}
    {{ Html::script('js/vue.js') }}
    {{ Html::script('js/axios.js') }}
    {{ Html::script('js/clockpicker.js') }}
    {{ Html::script('js/script.js') }}
</head>
<body>
<header class="noPrint" >
    <div class="row">
        <div class="col s12" >

            <ul id="nav-mobile" class="left side-nav white-text fixed">
                @include('partials.navbar')
            </ul>
            <!-- navbar for mobile -->
            <ul class="side-nav" id="mobile-demo">
                @include('partials.navbar')
            </ul>
        </div>
    </div>

</header>
<main>
    @if (Session::has('message'))
        <div class="message noPrint" style="display: none;">
            {{ Session::get('message') }}
        </div>
    @endif
<a href="#" data-activates="nav-mobile"
   style='padding:6px; font-size: 16px; width: 100%'
   class="noPrint button-collapse top-nav
   waves-effect waves-light hide-on-large-only">
    BARBS-KITCHEN MENU</a>
  @include('partials.tray')
  @yield('content')
</main>
</body>
</html>
