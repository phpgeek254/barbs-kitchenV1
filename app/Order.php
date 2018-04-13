<?php

namespace App;
use App\Waiter;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
	use softDeletes;
	protected $dates = ['deleted_at'];
    public function waiter()
    {
    	return $this->belongsTo(Waiter::class);
    }
}
