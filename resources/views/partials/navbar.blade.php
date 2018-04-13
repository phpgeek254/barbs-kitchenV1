<li>
    {!! Html::image(asset('images/logo.jpg'), null, ['class'=>'responsive-img animated bounceInLeft']) !!}
</li>
        <li>
            <div class="white-text" style='padding-left:32px;'>
                <i class="fa fa-birthday-cake white-text"></i> &nbsp
                {{ link_to('meals', 'Dishes', ['class'=>'waves white-text']) }}
            </div>

        </li>
        <li>
            <div class="white-text" style='padding-left:32px;'>
                <i class="fa fa-buysellads white-text"></i> &nbsp
             <a href="/orders" class="white-text"> Orders
                 <span class="badge {{ count(\App\Order::where('order_status', 'pending')->get())? 'pulse': '' }} purple lighten-1 white-text"> {{ count(\App\Order::where('order_status', 'pending')->get()) }} New</span>
             </a>
            </div>
         </li>
  {{-- Menu Of Meal Types --}}
   <li class="no-padding">
    <ul class="collapsible" data-collapsible="accordion">
        <li>
            <div class="collapsible-header white-text" style="padding-left: 32px;">
                Menu <i class="fa fa-vine white-text"></i>
            </div>
             @foreach (App\MealType::all() as $meal_type)
                     <div class="collapsible-body white-text">
                         <i class="fa fa-birthday-cake white-text"></i>
                          {{ link_to_route('meals.show',
                            substr($meal_type->name, 0, 30).'...', ['id'=>$meal_type->id], ['class'=>'waves white-text'
                         , 'style'=>'padding-left:25px;']) }}

                     </div>
                 @endforeach
        </li>
    </ul>
</li>
@if (!Auth::check())
  <li>
    <div class="white-text" style='padding-left:32px;'>
        <i class="fa fa-power-off white-text"></i> &nbsp
        <a href="/login" class="white-text"> Login
        </a>
    </div>
</li>
@endif

  @if (Auth::check())
  <li class="no-padding">
    <ul class="collapsible" data-collapsible="accordion">
        <li>
            <div class="collapsible-header white-text" style="padding-left: 32px;">
                Reports
            </div>
            <div class="collapsible-body">
                    {{ link_to_route('reports', 'All', null, ['class'=>'waves white-text'
                         , 'style'=>'padding-left:25px;']) }}
                </div>
                <div class="collapsible-body">
                    {{ link_to_route('daily', 'Daily', null, ['class'=>'waves white-text'
                         , 'style'=>'padding-left:25px;']) }}
                </div>
            <div class="collapsible-body">
                {{ link_to_route('monthly', 'Monthly', null, ['class'=>'waves white-text'
                         , 'style'=>'padding-left:25px;']) }}
            </div>
            <div class="collapsible-body">
                {{ link_to_route('yearly', 'Yearly', null, ['class'=>'waves white-text'
                         , 'style'=>'padding-left:25px;']) }}
            </div>
            <div class="collapsible-body">
                {{ link_to_route('varied', 'Varied', null, ['class'=>'waves white-text'
                         , 'style'=>'padding-left:25px;']) }}
            </div>
        </li>
    </ul>
</li>
        <li> {{ link_to('waiters', 'Waiters', ['class'=>'waves']) }} </li>
        <li> {{ link_to('expences', 'Expences', ['class'=>'waves']) }} </li>
        <li> {{ link_to('stock', 'Manage Stock', ['class'=>'waves']) }}</li>
        <li> {{ link_to('transactions', 'View Transactions', ['class'=>'waves']) }}</li>
        <li> 
            {!! Form::open(['route'=>['logout']]) !!}
            {!! Form::submit('logout '.Auth::user()->name, ['class'=>'btn-flat white-text']) !!}
            {!! Form::close() !!}
        </li>
  @else
  @endif


 