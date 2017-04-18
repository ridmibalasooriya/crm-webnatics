<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
     public function customers()
	{
	    return $this->belongsTo('App\Customer','customer_id','customer_id');
	}
}
