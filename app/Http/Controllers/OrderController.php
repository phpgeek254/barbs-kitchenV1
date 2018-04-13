<?php

namespace App\Http\Controllers;

use App\Order;
use App\OrderedItem;
use App\Cart;
use App\Meal;
use Carbon\Carbon;
use Charts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
class OrderController extends Controller
{

    public function index()
    {
        $data = DB::table('ordered_items')
            ->select('item_id', DB::raw('count(*) as total'))
            ->groupBy('item_id')
            ->limit(4)
            ->orderByDesc('total')
            ->get();


        $meal_labels = null;
        foreach ($data as $item) {
            $meal_labels[] = Meal::find($item->item_id)->name;
        }
//        dd(array_values($meal_labels));
        $counts = null;
        foreach ($data as $item) {
            $counts[] = $item->total;
        }

        $meals = Charts::create('bar', 'Chartjs')
            ->elementLabel('Ordered')
            ->title('')
            ->responsive(false)
            ->dimensions(0, 300)
            ->labels($meal_labels)
            ->values($counts);

        $chart = $this->hourlyReports();

        $orders = Order::where('order_status', 'pending')
            ->with('waiter')->orderByDesc('created_at')
            ->paginate(10);
        return view('orders.index', compact('orders', 'chart', 'meals'));
    }

    public function store(Request $request)
    {
        if(Session::has('cart'))
            {

                
                $cart = new Cart(Session::get('cart'));
                
                $order = new Order();
                $order->amount = Session::get('cart')->totalPrice;
                $order->order_items = serialize($cart);
                $order->waiter_id = $request->all()['waiter_id'];
                $order->order_status = 'pending';
                $order->save();
                foreach ($cart->items as $item) {
                $ordered_item = new OrderedItem();
                $ordered_item->item_id = $item['item']->id;
                $ordered_item->number_of_times = $item['qty'];
                $ordered_item->order_id = $order->id;
                $ordered_item->save();
                }

                //Clear The Cart Object
                Session::forget('cart');

                return redirect('print_order')->with('message', 'Order Placed Successfully');
            } else {
                return redirect()->back()->with('message', 'Problem');
            }
        
    }

    public function show(Order $order)
    {
        //
    }

    public function edit(Order $order)
    {
        //
    }

    public function update(Request $request, Order $order)
    {
        //
    }

    public function destroy(Order $order)
    {
        //
    }

    public function create_order(Request $request)
    {
        
       
    }

    public function hourlyReports()
    {
        $data = Order::get()->groupBy(function ($date) {
            return Carbon::parse($date->created_at)->format('h');
        });

        $counts = null;
        foreach ($data as $item) {
            $counts[] = count($item);
        }

        $chart = Charts::create('line', 'Chartjs')
            ->title('')
            ->elementLabel('Sales')
            ->responsive(false)
            ->dimensions(0, 300)
            ->labels(array_keys($data->toArray()))
            ->values($counts);
        return $chart;
    }
}
