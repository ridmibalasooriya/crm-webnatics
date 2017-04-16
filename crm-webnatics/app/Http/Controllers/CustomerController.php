<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Input;
use Mail;
use App\Customer;


class CustomerController extends BaseController
{
	//Search Customer
    public function searchCustomer(){
		$customers= new Customer;
		
		return View('searchCustomer')->with('customers',  $customers::all());
    }
	
	//Add new Customer
	public function addCustomer(){
		
		$customer= new Customer;
		
		//Get last cid and increase it by one and add to CID pref. as new customer Id
		$lastcID=$customer->orderBy('id', 'desc')->first()->id;
		$cid=$lastcID+1;
		$newCustId='CID'.$cid;
		
		//$this->sendEmailNewCustomer();
		
	    return view('addCustomer')->with('custId',$newCustId);
	}
	
	//Add new Customer to DB
	public function updateNewCustomer(){
		
		$customers= new Customer;
		
		$customers->customer_id=Input::get('custId');
		$customers->company_name=Input::get('compName');
		$customers->address=Input::get('address');
		$customers->city=Input::get('city');
		$customers->prov=Input::get('prov');
		$customers->zip=Input::get('zip');
		$customers->country=Input::get('country');
		$customers->brn=Input::get('brn');
		$customers->website=Input::get('website');
		$customers->save();
		
		return redirect('searchCustomer')->with('customers',  $customers::all());
	}
	
	//Send Email
	public function sendEmailNewCustomer(){
		Mail::send('emails', ['key' => 'value'], function($message)
		{
		    $message->to('ridmi.bizy@gmail.com', 'John Smith')->subject('New Customer Is Added');
		});
		
	}
	
	//Edit existing customer
	public function editCustomer(){
		
		$custId=Input::get('editIdHidden');
	
		$customers=Customer::find($custId);
	
		return View('editCustomer')->with('customers',$customers);
	}
	
	//Update Edited Customer
	public function updateCustomer(){
		
		$id=Input::get('idHidden');
	
		$customers=Customer::find($id);
	
		$customers->customer_id=Input::get('custId');
		$customers->company_name=Input::get('compName');
		$customers->address=Input::get('address');
		$customers->city=Input::get('city');
		$customers->prov=Input::get('prov');
		$customers->zip=Input::get('zip');
		$customers->country=Input::get('country');
		$customers->brn=Input::get('brn');
		$customers->website=Input::get('website');
		$customers->save();
		
		return redirect('searchCustomer')->with('customers',  $customers::all());
	}
	
	//Delete Existing Customer
	public function deleteCustomer(){
		$id=Input::get('deleteIdHidden');
	
		$customers=Customer::find($id);
		
		$customers->delete();
		
		return redirect('searchCustomer')->with('customers',  $customers::all());
	
	}
}
