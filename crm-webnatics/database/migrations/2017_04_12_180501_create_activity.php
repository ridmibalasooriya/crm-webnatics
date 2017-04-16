<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActivity extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activities', function(Blueprint $newtable){
        	$newtable->increments('id');
			$newtable->string('act_id');
			$newtable->string('customer_id',10);
			$newtable->date('date');
			$newtable->enum('activity_type', ['Call','Email','Meeting']);
			$newtable->string('outcomes',100);
			$newtable->string('sales_person',80);
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
        Schema::drop('activities');
    }
}
