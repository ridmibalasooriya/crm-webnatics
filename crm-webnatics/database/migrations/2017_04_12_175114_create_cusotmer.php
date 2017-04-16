<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCusotmer extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    	//customer table
        Schema::create('customers', function(Blueprint $newtable){        	
			$newtable->increments('id');
			$newtable->string('customer_id',10);
			$newtable->string('company_name',200);
			$newtable->string('address',100);
			$newtable->string('city',50);
			$newtable->string('prov',30);
			$newtable->string('zip',10);
			$newtable->string('country',30);
			$newtable->string('brn',8);
			$newtable->string('website',300);
			$newtable->timestamps();
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       	Schema::drop('customers');
    }
}
