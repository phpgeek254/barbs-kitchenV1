<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed $meals
 */
class OrderedItem extends Model
{
    protected $fillable = ['order_id', 'item_id', 'number_of_times'];

    public function meals()
    {
        return $this->hasMany(Meal::class);
    }
}
