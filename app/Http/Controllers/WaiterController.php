<?php

namespace App\Http\Controllers;

use App\Waiter;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Charts;

class WaiterController extends Controller
{
    
    public function index()
    {


        $waiters = Waiter::all();
        return view('waiters.index', compact('waiters'));
    }


    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        
        $this->validate($request, array(
            'profile_image'=>'image:mimes:jpg,pgn,gif,jpeg',
            'name'=>'required',
            'phone_number'=>'required',
            'pf_number'=>'required'
        ));
        $profile_path = $this->get_profile_image_path($request);

        Waiter::create([
           'name'=>$request->all()['name'],
            'pf_number'=>$request->all()['pf_number'],
            'phone_number'=>$request->all()['phone_number'],
            'profile_image'=>$profile_path
        ]);
        if($request->file('profile_image'))
            $request->file('profile_image')->move(explode('/', $profile_path)[0],explode('/', $profile_path)[1] );
        return redirect()->back();

    }

    
    public function show(Waiter $waiter)
    {
        $data = DB::table('orders')
            ->select('order_id', DB::raw('count(*) as total'))
            ->where('waiter_id', $waiter->id)
            ->groupBy(date('m', strtotime('created_at')))
            ->orderByDesc('total')
            ->get();


        $meal_labels = null;
        for ($i=1; $i<=12; $i++) {
            $meal_labels[] = $i;
        }
//        dd($meal_labels);
        $counts = null;
        foreach ($data as $item) {
            $counts[] = $item->total;
        }
        $chart = Charts::create('bar', 'Chartjs')
            ->title('Meal Performance')
            ->responsive(false)
            ->dimensions(0, 300)
            ->labels($meal_labels)
            ->values($counts);

        return view('waiters.show', compact('waiter', 'chart'));
    }

    
    public function edit(Waiter $waiter)
    {
        //Low Chance of using this, gonna use a modal window for this.
        return view('waiters.edit', compact('waiter'));

    }

    
    public function update(Request $request, Waiter $waiter)
    {
        //
    }

    public function destroy(Waiter $waiter)
    {
        // Remove the picture from the file system
        if(file_exists(public_path().'/'.$waiter->profile_image))
        {
            unlink(public_path().'/'.$waiter->profile_image);
        }
        //Delete the database entry.
        $waiter->delete();
        return redirect('waiters')->with('message', 'waiter deleted');

    }

    public function get_profile_image_path(Request $request)
    {
        if ($request->file('profile_image')) {
            $file_name = uniqid() . $request->file('profile_image')->getClientOriginalName();
            $destination = 'waiter_images/';
            $profile_path = $destination . $file_name;
        } else {
            $profile_path = 'waiter_images/default.jpg';
        }
        return $profile_path;
    }


}
