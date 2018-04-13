<ul class="collection with-header brown darken-4 white-text">
@foreach (unserialize($order->order_items)->items as $item)
<li class="collection-item">
	<div>
		{{ $item['item']->name }}
	<br> {{ $item['qty'] }} Items  @ {{ $item['item']->price }} 
	 <a href="#!" class="secondary-content">
		 Total : KSH {{ $item['qty'] * $item['item']->price }}
	</a>
	</div>
</li>
@endforeach
<li class="collection-item avatar">
	Total Price : KSH. {{ unserialize($order->order_items)->totalPrice }} <br>
	Status : {{ $order->order_status }} <br>
	Served By : {{ $order->waiter->name }}
</li>
</ul>