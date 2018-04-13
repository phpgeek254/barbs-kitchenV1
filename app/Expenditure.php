<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expenditure extends Model
{
   	protected $fillable = ['amount', 'user_id', 'reason'];

   	public function user()
   	{
   		return $this->belongsTo(User::class);
   	}
}
