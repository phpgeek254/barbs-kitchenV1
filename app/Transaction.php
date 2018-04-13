<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = ['user_id', 'transaction_type', 'quantity_taken', 'remaining', 'stock_id', 'reason'];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

	public function stock()
    {
    	return $this->belongsTo(Stock::class);
    }


}
