<?php

namespace App\Http\Controllers;

use App\Meal;
use App\Cart;
use App\MealType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class MealController extends Controller
{
    private $destination = 'dish_images/';
    private $file_name;
    private $image_path;

    private function image_path(Request $request)
    {
        if ($request->file('image_path')) {
            $request->file('image_path') ? $this->file_name = uniqid() . $request->file('image_path')->getClientOriginalName() : 'default.jpg';
            return $this->image_path = $this->destination . $this->file_name;
        }
    }

    public function index()
    {
        $meals = Meal::all();
        return view('meals.index', compact('meals'));

    }


    public function store(Request $request)
    {
        $meal_type = MealType::findOrFail($request->all()['meal_type_id']);

        $this->validate($request, [
            'name' => 'required',
//            'vat' => 'required',
            'image_path' => 'image|mimes:jpg,png,gif,jpeg',
            'price' => 'required',
            'description' => 'required'
        ]);

        $meal = new Meal();
        $meal->name = $request->all()['name'];
        $meal->price = $request->all()['price'];
        $meal->vat = 0.14*($request->all()['price']);
        $meal->description = $request->all()['description'];
        $meal->image_path = $this->image_path($request);


        $meal_type->meals()->save($meal);
        if ($request->file('image_path')) {
            $request->file('image_path')->move($this->destination, $this->file_name);
        }

        return redirect()->back()->with('message', 'Item Successfuly saved');


    }

    public function show(Meal $meal)
    {
        return redirect('meal.show', compact($meal));
    }


    public function edit(Meal $meal)
    {
        //
    }


    public function update(Request $request, Meal $meal)
    {
        $this->validate($request, [
            'name' => 'required',
//            'vat' => 'required',
            'image_path' => 'image|mimes:jpg,png,gif,jpeg',
            'price' => 'required',
            'description' => 'required'
        ]);

        $meal->name = $request->all()['name'];
        $meal->vat = 0.14*($request->all()['price']);
        $meal->price = $request->all()['price'];
        $meal->description = $request->all()['description'];
        if($request->file('image_path'))
        {
            $meal->image_path = $this->image_path($request);
        }

        $meal->update();
        if ($request->file('image_path')) {
            if(file_exists(public_path().'/'.$meal->image_path))
            {
                unlink(public_path().'/'.$meal->image_path);
            }
            $request->file('image_path')->move($this->destination, $this->file_name);
        }
        return redirect()->back()->with('message', 'Item Updated Successfully');
    }


    public function destroy(Meal $meal)
    {
        $meal->delete();
        return redirect()->back()->with(['message'=>'Item deleted Successfully']);
    }

    public function add_to_cart(Request $request, $id)
    {
        $meal = Meal::findOrFail($id);

        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);

        $cart->add($meal, $meal->id);

        $request->session()->put('cart', $cart);
        // dd($request->session('cart'));
        return redirect()->back()->with('message', 'Item Added to tray');
    }

    public function reduce_by_one($id)
    {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->reduce_by_one($id);
        if (count($cart->items) > 0) {
            Session::put('cart', $cart);
        } else {
            Session::forget('cart');
        }
        return redirect()->back()->with(['message' => 'Quantity Reduced']);
    }

    public function remove_item($id)
    {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->remove_item($id);

        if (count($cart->items) > 0) {
            Session::put('cart', $cart);
        } else {
            Session::forget('cart');
        }

        return redirect()->back()->with(['message' => 'Item Removed']);
    }
}
