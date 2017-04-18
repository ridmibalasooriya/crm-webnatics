<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


/* --------------------------- Customer Route----------------------------------- */

Route::get('/searchCustomer','CustomerController@searchCustomer');

Route::get('searchCustomerByCN',array('as'=>'searchCustomerByCN','uses'=>'CustomerController@searchCustomerByCN'));

Route::post('/searchCustomer','CustomerController@searchCustomer');

Route::post('/addCustomer','CustomerController@addCustomer');

Route::post('/updateNewCustomer','CustomerController@updateNewCustomer');

Route::post('/editCustomer','CustomerController@editCustomer');

Route::post('/updateCustomer','CustomerController@updateCustomer');

Route::post('/deleteCustomer','CustomerController@deleteCustomer');

/* --------------------------- Contact ----------------------------------- */

Route::get('/searchContact','ContactController@searchContact');

Route::get('searchContactByCN',array('as'=>'searchContactByCN','uses'=>'ContactController@searchContactByCN'));

Route::post('/addContact','ContactController@addContact');

Route::post('/updateNewContact','ContactController@updateNewContact');

Route::post('/deleteContact','ContactController@deleteContact');

Route::post('/editContact','ContactController@editContact');

Route::post('/updateContact','ContactController@updateContact');

/* --------------------------- Contact ----------------------------------- */

Route::get('/searchActivity','ActivityController@searchActivity');

Route::get('searchActivityByCN',array('as'=>'searchActivityByCN','uses'=>'ActivityController@searchActivityByCN'));

Route::post('/addActivity','ActivityController@addActivity');

Route::post('/updateNewActivity','ActivityController@updateNewActivity');

Route::post('/deleteActivity','ActivityController@deleteActivity');

Route::post('/editActivity','ActivityController@editActivity');

Route::post('/updateActivity','ActivityController@updateActivity');


