<?php

namespace App\Http\Controllers;

use App\Transaction;
use Illuminate\Http\Request;
use ConsoleTVs\Charts\Facades\Charts;

class TransactionController extends Controller
{
    
    public function index()
    {
        $stock_chart = $this->monthlyRestockChart();
        $subtraction_chart = $this->monthlySubtractChart();

        $transactions = Transaction::with('user')->with('stock')->orderByDesc('created_at')->paginate(15);
        return view('transactions.index',
            compact(
                'transactions',
                'stock_chart',
                'subtraction_chart'
            ));
    }

    
    public function create()
    {
        
    }

    public function show(Transaction $transaction)
    {
        return view('transactions.show', compact('transaction'));
        
    }

    public function destroy(Transaction $transaction)
    {
        $transaction->delete();
        return redirect()->back();
    }

    public function monthlyRestockChart()
    {
        $daily_perform = Charts::database(Transaction::where('transaction_type', '=', 'restock')->get(), 'bar', 'Chartjs')
            ->title('Daily Restock For ' . date('F'))
            ->elementLabel('Restocked')
            ->height(300)
            ->dateFormat('j')
            ->width(0)
            ->GroupByDay(date('m'), date('Y'), true);
        return $daily_perform;
    }

    public function monthlySubtractChart()
    {
        $daily_perform = Charts::database(Transaction::where('transaction_type', '=', 'subtraction')->get(), 'bar', 'Chartjs')
            ->title('Daily Stock Drain For ' . date('F'))
            ->elementLabel('Drained')
            ->height(300)
            ->dateFormat('j')
            ->width(0)
            ->GroupByDay(date('m'), date('Y'), true);
        return $daily_perform;
    }
}
