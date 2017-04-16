<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
	
	public function contacts()
	{
	    return $this->hasMany('App\Contact','customer_id','customer_id');
	}
	
	public function activitys()
	{
	    return $this->hasMany('App\Contact','customer_id','customer_id');
	}
     
}
