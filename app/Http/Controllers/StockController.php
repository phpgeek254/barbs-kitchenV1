<?php

namespace App\Http\Controllers;

use App\Stock;
use App\Transaction;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class StockController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $chart = '';
        $stock_items = Stock::with('user')->paginate(10);

        return view('stock.index', compact('stock_items', 'chart'));
    }


    public function store(Request $request)
    {
        $this->runValidations($request);

        Stock::create($request->all());
        return redirect()->back();
    }

    
    public function show(Stock $stock)
    {
        
    }

   
    public function edit(Stock $stock)
    {
        
    }

    
    public function update(Request $request, Stock $stock)
    {
        $this->validate($request, [
            'name' => 'required',
            'cost_per_unit' => 'required|integer',
            'quantity' => 'required|integer',
            'units' => 'required',
        ]);
        $stock->update($request->all());
        return redirect()->back()->with('message', 'Update Successfull');
    }

    public function restock(Request $request, Stock $stock)
    {
        $stock = Stock::findOrFail($request->all()['stock_id']);
        $stock->quantity += $request->all()['quantity'];
        Transaction::create([
            'transaction_type'=>$request->all()['transaction_type'],
            'stock_id'=>$stock->id,
            'quantity_taken'=>$request->all()['quantity'],
            'remaining'=>$stock->quantity,
            'reason'=>'addition',
            'user_id'=>$request->all()['user_id']
        ]);
        $stock->save();
        return redirect()->back()->with('message', 'Restock Successfull');
    }

    public function removeStock(Request $request, Stock $stock)
    {
        // validate to make sure that taken stock is not more than whats available.
        $this->validate($request, [

        ]);
        $stock = Stock::findOrFail($request->all()['stock_id']);
        $stock->quantity -= $request->all()['quantity'];
        Transaction::create([
            'transaction_type'=>$request->all()['transaction_type'],
            'stock_id'=>$request->all()['stock_id'],
            'quantity_taken'=>$request->all()['quantity'],
            'remaining'=>$stock->quantity,
            'reason'=>'removing',
            'user_id'=>$request->all()['user_id']
        ]);
        $stock->save();
        return redirect()->back()->with('message', 'Transaction Successfull');
    }

    
    public function destroy(Stock $stock)
    {
        foreach ($stock->transactions as $transaction) {
           $transaction->delete();
        }
       $stock->delete();
       return redirect()->back()->with(['message'=>'item Successfully deleted']);
    }

    public function monthlyStockChart(Stock $stock)
    {
        $chart = null;

        return $chart;
    }

    public function yearlyStockChart(Stock $stock)
    {
        $chart = null;

        return $chart;
    }

    /**
     * @param Request $request
     */
    public function runValidations(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:stocks',
            'cost_per_unit' => 'required|integer',
            'quantity' => 'required|integer',
            'units' => 'required',
        ]);
    }


}
