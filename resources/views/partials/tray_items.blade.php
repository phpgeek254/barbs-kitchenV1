<ul class="collection">
  @if (Session::has('cart'))
     @foreach (Session::get('cart')->items as $item)
              <li class="collection-item avatar">
              <img src="{{ asset($item['item']->image_path) }}" alt="" class="circle">
              <span class="title">{{ $item['item']->name }}</span>
              <p> Price : {{ $item['item']->price }}<br>
                Ordered : {{ $item['qty'] }}
              </p>
              <a href="{{ route('remove_item', ['id'=>$item['item']->id]) }}" class="secondary-content">
                remove
              </a>
            </li>
              @endforeach
</ul>
  @else
    {{-- false expr --}}
  @endif
             