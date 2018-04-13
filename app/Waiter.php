<?php

namespace App;
use App\Order;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Waiter extends Model
{
	use SoftDeletes;
	protected $date = ['deleted_at'];
    protected $fillable = ['name', 'pf_number', 'phone_number', 'profile_image'];

    public function Orders()
    {
    	return $this->hasMany(Orders::class);
    }
}
