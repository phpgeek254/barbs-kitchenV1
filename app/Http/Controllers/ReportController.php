<?php

namespace App\Http\Controllers;

use App\OrderedItem;
use App\Waiter;
use App\Meal;
use Carbon\Carbon;
use App\Order;
use ConsoleTVs\Charts\Facades\Charts;
use Illuminate\Support\Facades\DB;


class ReportController extends Controller
{
    public function  __construct()
    {
            $this->middleware('auth');
    }
    
    public function index()
    {
        // Waiter Performance Chart.

        $waiter_chart = $this->waiterChart();

        $daily_perform = $this->monthlyChart();

        $meals = $this->mealPerformanceChart();

        //meal types and the number of meals in each.
        $meal_types = $this->mealTypeCharts();


        return view('reports.index',
            compact('waiter_chart',
                'daily_perform',
                'meals',
                'meal_types'
            ));
    }

    public function daily()
    {
        $salesChart = $this->hourlyReports();
        $chart = $this->dailyWaiterChart();
        $orders = Order::whereDate('created_at', Carbon::today()
            ->toDateString())
            ->orderByDesc('created_at')
            ->paginate(18);
        $amount = null;
        $pending = null;
        $confirmed = null;
        foreach ($orders as $order) {
            if($order->order_status == 'pending'){
                $pending += 1;
            }

            $amount += $order->amount;
        }
        return view('reports.daily', compact('orders', 'salesChart', 'amount', 'pending', 'chart'));
    }

    public function monthly($month = null, $year=null)
    {
        if ($month and $year){
            $month = $month;
            $year = $year;
        } else {
            $month = date('m');
            $year = date('Y');
        }
        $salesChart = $this->monthlyChart();
        $chart = $this->monthlyWaiterChart($month, $year);
        $amount = null;
        $orders = null;
        $pending = null;

            $orders = Order::whereMonth('created_at', date('m'))
                ->whereYear('created_at', date('Y'))
                ->orderByDesc('created_at')
                ->paginate(18);

        foreach ($orders as $order):
            $amount += $order->amount;
            if($order->order_status == 'pending'){
                $pending += 1;
            }
        endforeach;


            return view('reports.monthly', compact('orders', 'salesChart',
                'amount', 'pending', 'chart'));
    }

    public function yearly($year = null)
    {
        if($year != null){
            $year = $year;
        } else {
            $year = date('Y');
        }
        $salesChart = $this->yearlyChart();
        $chart = $this->yearlyWaiterChart($year);
        $amount = null;
        $orders = null;
        $pending = null;

        $orders = Order::whereYear('created_at', $year)->orderByDesc('id')->paginate(10);
        $orders_count = count(Order::whereYear('created_at', $year)->get());

        foreach ($orders as $order):
            $amount += $order->amount;
            if($order->order_status == 'pending'){
                $pending += 1;
            }
        endforeach;

        return view('reports.yearly', compact('orders', 'salesChart',
            'amount', 'pending', 'chart', 'orders_count'));
    }

    public function waiterReport($waiter_id)
    {
        $orders = Order::where($waiter_id)->get();
        return view('reports.waiter', compact('orders'));
    }

    public function weeklyReport()
    {
        $orders = Order::whereBetween('created_at', [Carbon::now(), Carbon::now()->subDays(7)])->get();
        return view('report.weekly', compact('orders'));
    }

    public function reportByRange($start_date, $end_date)
    {
        $orders = Order::whereBetween('created_at', [$start_date, $end_date])->get();
        return $orders;
    }

    public function waiterChart()
    {
        $waiter_chart = Charts::database(Order::all(), 'bar', 'Chartjs')
            ->elementLabel('Waiters')
            ->height(300)
            ->width(0)
            ->title(' Waiter Sales')
            ->groupBy('waiter_id', 'Waiter.name');
        return $waiter_chart;
    }

    public function dailyWaiterChart(){
        $data = DB::table('orders')->select('waiter_id', DB::raw('count(*) as total'))->groupBy('waiter_id')->whereDate('created_at', Carbon::today()->toDateString())->get();
        $meal_labels = null;
        foreach ($data as $item) {
            $meal_labels[] = Waiter::find($item->waiter_id)->name;
        }
//        dd(array_values($meal_labels));
        $counts = null;
        foreach ($data as $item) {
            $counts[] = $item->total;
        }
        $chart = Charts::create('bar', 'Chartjs')
            ->title('Waiter Performance Today')
            ->labels($meal_labels)
            ->values($counts)
            ->height(300)
            ->width(0);

        return $chart;
    }

    public function monthlyWaiterChart($month=null, $year=null){
        $month ? $month : date('m');
        $year ? $year : date('Y');
        $data = DB::table('orders')->select('waiter_id', DB::raw('count(*) as total'))->groupBy('waiter_id')->whereMonth('created_at', $month)->whereYear('created_at', $year)->get();
        $meal_labels = null;
        foreach ($data as $item) {
            $meal_labels[] = Waiter::find($item->waiter_id)->name;
        }
//        dd(array_values($meal_labels));
        $counts = null;
        foreach ($data as $item) {
            $counts[] = $item->total;
        }
        $chart = Charts::create('bar', 'Chartjs')
            ->title('Waiter Performance Today')
            ->labels($meal_labels)
            ->values($counts)
            ->height(300)
            ->width(0);

        return $chart;
    }

    public function yearlyWaiterChart($year=null){
        $year ? $year : date('Y');
        $data = DB::table('orders')->select('waiter_id', DB::raw('count(*) as total'))
            ->groupBy('waiter_id')
            ->whereYear('created_at', $year)
            ->get();
        $meal_labels = null;
        foreach ($data as $item) {
            $meal_labels[] = Waiter::find($item->waiter_id)->name;
        }
//        dd(array_values($meal_labels));
        $counts = null;
        foreach ($data as $item) {
            $counts[] = $item->total;
        }
        $chart = Charts::create('bar', 'Chartjs')
            ->title('Waiter Performance Today')
            ->labels($meal_labels)
            ->values($counts)
            ->height(300)
            ->width(0);

        return $chart;
    }


    public function monthlyChart()
    {
        $daily_perform = Charts::database(Order::all(), 'line', 'Chartjs')
            ->title('Daily Sales For ' . date('F'))
            ->elementLabel('Daily Sales')
            ->height(300)
            ->dateFormat('j')
            ->width(0)
            ->GroupByDay(date('m'), date('Y'), true);
        return $daily_perform;
    }

    public function yearlyChart()
    {
        $daily_perform = Charts::database(Order::all(), 'line', 'Chartjs')
            ->title('Daily Sales For ' . date('F'))
            ->elementLabel('Daily Sales')
            ->height(300)
            ->dateFormat('M ')
            ->width(0)
            ->GroupByMonth(null, date('Y'), true);
        return $daily_perform;
    }

    public function mealPerformanceChart()
    {
        $data = DB::table('ordered_items')
            ->select('item_id', DB::raw('count(*) as total'))
            ->groupBy('item_id')
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
            ->title('Meal Performance')
            ->responsive(false)
            ->dimensions(0, 300)
            ->labels($meal_labels)
            ->values($counts);
        return $meals;
    }

    public function mealTypeCharts()
    {
        $meal_types = Charts::database(Meal::all(), 'donut', 'Chartjs')
            ->title(' Meal types')
            ->elementLabel(' Meals')
            ->height(300)
            ->width(0)
            ->groupBy('meal_type_id', 'MealType.name');
        return $meal_types;
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
            ->responsive(false)
            ->dimensions(0, 300)
            ->labels(array_keys($data->toArray()))
            ->values($counts);
        return $chart;
    }
}
