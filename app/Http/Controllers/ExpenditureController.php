<?php

namespace App\Http\Controllers;

use App\Expenditure;
use ConsoleTVs\Charts\Facades\Charts;
use Illuminate\Http\Request;

class ExpenditureController extends Controller
{
    
    public function index()
    {
        $monthlyChart = $this->monthlyChart();
        $expenses = Expenditure::with('user')->paginate(15);
        return view('expenditure.index', compact('expenses', 'monthlyChart'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'amount'=>'required|integer',
            'reason'=>'required'
            ]);

        Expenditure::create($request->all());
        return redirect()->back()->with('message', 'Record Saved');
    }

    public function update(Request $request, Expenditure $expenditure)
    {
        $this->validate($request, [
            'amount'=>'required|integer',
            'reason'=>'required'
            ]);

        $expenditure->update($request->all());
        return redirect()->back()->with('message', 'Record Saved');
    }

    
    public function destroy(Expenditure $expenditure)
    {
        $expenditure->delete();
        return redirect()->back()->with('message', 'record deleted');
    }

    public function monthlyChart()
    {
        $daily_perform = Charts::database(Expenditure::all(), 'bar', 'Chartjs')
            ->title('Daily Expenditure For ' . date('F'))
            ->elementLabel('Expenses')
            ->height(300)
            ->dateFormat('j')
            ->width(0)
            ->GroupByDay(date('m'), date('Y'), true);
        return $daily_perform;
    }
}
