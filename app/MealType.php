<?php

namespace App;
use App\Meal;

use Illuminate\Database\Eloquent\Model;

class MealType extends Model
{
	protected $fillable = ['name', 'image_path'];
	
    public function meals()
    {
    	return $this->hasMany(Meal::class);
    }
}
