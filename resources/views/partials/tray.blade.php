{{-- Floating Tray View --}}
  @if (Session::has('cart'))
  <div class="row">
    <div class="col s2"></div>
    <div class="col s10">
   <a  class='dropdown-button btn btn-block' style='float:right;width:600px;' href='#' data-activates='dropdown1'>
       @if( Session::has('cart'))
   {{ count(Session::get('cart')->items) }} items in Tray  KSH {{ Session::get('cart')->totalPrice }}</a>
        @endif
  <ul id='dropdown1' class='dropdown-content'>
    <li>

      <div class="row">
        <div class="col s12">
          <div class="card center">
              <span class="card-title center">Items In Tray </span> 
              <span class='chip' style='float:right;'>Total Cost KSH {{ Session::get('cart')->totalPrice }}</span>
            <div class="card-content">
              @include('partials.tray_items')
            </div>
              {{-- Waiters --}}
            
            <div class="card-action">
              <a href="#order_form" class="btn"> Place Order </a>
            {{ link_to('cancel', 'Cancel', ['class'=>'waves btn', 'style'=>'float:right']) }}
            </div>
          </div>
        </div>
      </div>

    </li>
  </ul>
</div>
  </div>
 
  @endif

  <!-- Modal Structure -->
  <div id="order_form" class="modal modal-fixed-footer">
    <div class="modal-content">
      <h4> Place order </h4>
      @include('partials.tray_items')
      {!! Form::open(['route'=>['orders.store']]) !!}
      <div class="row">
      <div class="input-field col s12">
        {!! Form::select('waiter_id', \App\Waiter::all()->pluck('name', 'id'), 'Select Wauter Name', ['class'=>'select'] ) !!}
        {!! Form::label('waiter_id', 'Select Waiter Name') !!}
     </div>
      </div>
      
    </div>
    <div class="modal-footer">
      {!! Form::submit('Place Order', ['class'=>'btn', 'style'=>'float:left']) !!}

      <a style='float:right;' href="#" class="waves-effect btn waves-green  modal-action modal-close">Cancel</a>
      {!! Form::close() !!}

    </div>
  </div>