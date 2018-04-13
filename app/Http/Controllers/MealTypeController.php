<?php

namespace App\Http\Controllers;

use App\MealType;
use App\Meal;
use Illuminate\Http\Request;

class MealTypeController extends Controller
{
    private $destination = 'mealTypes/';
    public function index()
    {
        $meal_types = MealType::with('meals')->get();
        return view('meal_types.index', compact('meal_types'));
    }

   
    public function create()
    {
        
    }

    public function store(Request $request)
    {
         
        $this->validate($request, [
            'name'=> 'required',
            'image_path'=>'required|image|mimes:jpg,png,gif,jpeg',
        ]);

        $image_path = 'mealTypes/default.jpg';
        $file_name = null;
        if($request->file('image_path')){
            $file_name = uniqid().$request->file('image_path')->getClientOriginalName();
            $image_path = $this->destination.$file_name;
        }

       

        MealType::create([
        'name'=>$request->all()['name'],
        'image_path'=>$image_path,
        ]);

        $request->file('image_path')->move($this->destination, $file_name);
        return redirect()->back()->with('success', 'Item Successfully created');

    }

   
    public function show($id)
    {
        $meal_type = MealType::findOrFail($id);
        $meals = Meal::where('meal_type_id', $meal_type->id)->get();
        return view('meal_types.show', compact('meal_type', 'meals'));
    }

    
    public function edit(MealType $mealType)
    {
       
    }

    
    public function update(Request $request, MealType $mealType)
    {
        $this->validate($request, [
            'name'=> 'required',
            'image_path'=>'image|mimes:jpg,png,gif,jpeg',
        ]);


        if($request->file('image_path')){
        $filename = uniqid().$request->file('image_path').getClientOriginalFileName();
        unlink(public_path().$mealType->image_path);
        $image_path = $this->destination.$filename;
        }

        $mealType->update([
            'name'=> $request->all()['name'],
            'image_path'=>$image_path,
        ]);
        $request->file('image_path')->move($this->destination, $filename);
    }

    
    public function destroy(MealType $mealType)
    {
        $mealType->delete();
        return redirect()->back()->with('message', 'Item Successfully Deleted');
    }
}
