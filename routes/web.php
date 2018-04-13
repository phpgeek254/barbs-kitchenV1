<?php

use \Illuminate\Support\Facades\Session;
use App\Order;
use App\OrderedItem;
use App\Cart;

Route::get('/', function () {
    $meal_types = \App\MealType::all();
    return view('home', compact('meal_types'));
});

Route::patch('restock', 'StockController@restock')->name('restock');
Route::patch('remove_stock', 'StockController@removeStock')->name('remove_stock');


Route::resource('waiters', 'WaiterController');
Route::resource('meals', 'MealTypeController');
Route::resource('meal', 'MealController');
Route::resource('orders', 'OrderController');
Route::resource('stock', 'StockController');
Route::resource('expences', 'ExpenditureController');
Route::resource('transactions', 'TransactionController');


Route::get('add_to_cart/{id}', 'MealController@add_to_cart')->name('add_to_cart');
Route::get('cancel', function(){
   if (Session::has('cart')) {
       Session::forget('cart');
   }
    return redirect()->back()->with('message', 'Tray Successfully Cleared');
});

Route::get('print_order', function(){
	$order = Order::all()->last();
	return view('reports.print_reciept', compact('order'));
});

Route::get('remove_item/{id}', 'MealController@remove_item')->name('remove_item');
Route::get('reduce_by_one/{id}', 'MealController@reduce_by_one')->name('reduce_quantity');
Route::get('delete_order/{id}', function($id){
	$order = Order::findOrFail($id);
	$items = OrderedItem::where('order_id', $order->id);
	foreach ($items as $item) {
		$item->delete();
	}
	$order->delete();
	return redirect()->back()->with(['message'=>'Order Removed']);
})->name('delete_order');

Route::get('confirm_order/{id}', function($id){
	$order = Order::findOrFail($id);
	$order->order_status = 'Confirmed';
	$order->update();
	return redirect()->back()->with(['message'=>'Order Confirmed']);
})->name('confirm_order');

Route::get('reports', 'ReportController@index')->name('summary');
Route::get('daily', 'ReportController@daily')->name('daily');
Route::get('monthly', 'ReportController@monthly')->name('monthly');
Route::get('yearly', 'ReportController@yearly')->name('yearly');
Route::get('varied', 'ReportController@varied')->name('varied');
Route::get('reports', 'ReportController@index')->name('reports');

Auth::routes();
