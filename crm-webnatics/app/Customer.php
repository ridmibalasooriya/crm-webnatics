<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
	
	public function contacts()
	{
	    return $this->hasMany('App\Contact','customer_id','customer_id');
	}
	
	public function activities()
	{
	    return $this->hasMany('App\Activity','customer_id','customer_id');
	}
     
}
