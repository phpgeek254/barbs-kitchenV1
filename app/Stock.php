<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $fillable = ['user_id', 'quantity', 'units', 'name', 'cost_per_unit'];

    public static $units = [
    	'liters'=>'L',
    	'kilograms'=>'KG',
    	'grams'=>'G',
        'pieces'=>'PCS',
        'bags'=>'BAGS'
    ];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
