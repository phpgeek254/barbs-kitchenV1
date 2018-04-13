<table class="striped animated slideInLeft">
    <thead>
    <tr>
        <th data-field="id"> Date</th>
        <th data-field="id"> Time</th>
        <th data-field="name"> Waiter</th>
        <th data-field="price"> Cost</th>
        <th data-field="price"> Options</th>
    </tr>
    </thead>
    <tbody>
    @forelse ($orders as $order)
    <!-- Modal Trigger -->
<!-- Modal Structure -->
<div id="confirm_{{$order->id}}" class="modal">
	<div class="modal-content">
		<h4>Confirm Order</h4>
		@include('orders.single_order_loop')
	</div>
	<div class="modal-footer">
		<a class='btn left' href="{{ route('confirm_order', ['id'=>$order->id]) }}">Confirm Order </a>
		<a href="#" class="waves-effect waves-green btn modal-action modal-close">Cancel</a>
	</div>
</div>
        <tr>
            <td>{{ date('d - m Y', strtotime($order->created_at)) }}</td>
            <td>{{ date('H : i :a ', strtotime($order->created_at)) }}</td>
            <td>{{ $order->waiter->name }}</td>
            <td>{{ $order->amount }}</td>
            <td>
            {{-- A drop down to either Delete The order Or Confirm it. --}}
            <!-- Dropdown Trigger -->
                @if ($order->order_status == 'pending')
                    <a class='dropdown-button btn-flat btn-block' href='#confirm_{{$order->id}}' data-activates='options'>
                        Action
                    </a>
            @else
                {{ $order->order_status }}
            @endif
            </td>
        </tr>
    @empty
        There are no Orders
    @endforelse

    </tbody>
</table>
