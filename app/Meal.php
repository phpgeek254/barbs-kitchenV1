<?php

namespace App;
use App\MealType;

use Illuminate\Database\Eloquent\Model;

class Meal extends Model
{
	protected $fillable = ['name', 'price', 'vat', 'image_path', 'meal_type_id'];
    public function mealType()
    {
    	return $this->belongsTo(MealType::class);
    }
}
