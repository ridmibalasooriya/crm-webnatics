<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContact extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function(Blueprint $newtable){
        	$newtable->increments('id');
			$newtable->string('cont_id',10);
			$newtable->string('customer_id',10);
			$newtable->string('name',80);
			$newtable->string('email',100);
			$newtable->string('contact_no',10);
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
        Schema::drop('contacts');
    }
}
