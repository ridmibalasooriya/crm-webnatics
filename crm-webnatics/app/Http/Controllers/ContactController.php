<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Input;

use App\Contact;
use App\Customer;

class ContactController extends BaseController
{
	//Search Contact
    public function searchContact(){
    	
		$contacts= new Contact;
		
		return View('searchContact')->with('contacts',  $contacts::all());
    }
	
	//Search By Company Name
	public function searchContactByCN(){
		$result=$_GET['cpName'];
		
		$customers=Customer::where('company_name','like', $result.'%')->get();
		
		$custIds=[];
		$i=0;
		
		foreach($customers as $customer){
			$custIds[$i]=$customer->customer_id;
			$i++;
		}
		
		$contacts= new Contact;
		$contact=[];
		$j=0;
		
		foreach($custIds as $custId){
			$contact[$i]=$contacts->where('customer_id','=',$custId)->get();
			$i++;
		}
				
		return view('searchContactByCN')->with('contacts',$contact);		
	}
	
	//Add new Contact
	public function addContact(){
		
		$customers=new Customer;
	
		$companyNames=array();
		foreach($customers::all() as $customer){
			$opVal=$customer->customer_id;
			$companyNames[$opVal]=$customer->company_name;
		}
		
		$contact= new Contact;
		
		//Get last cid and increase it by one and add to CID pref. as new customer Id
		$lastcID=$contact->orderBy('id', 'desc')->first()->id;
		$cid=$lastcID+1;
		$newContId='ContID'.$cid;
		
		$data = array(
	    'contId'  => $newContId,
	    'companyNames'=> $companyNames
		);
		
	    return view('addContact')->with('data',$data);
	}
	
	//Add new Contact to DB
	public function updateNewContact(){
		
		$contacts= new Contact;
	
		$contacts->cont_id=Input::get('contId');
		$contacts->customer_id=Input::get('compName');
		$contacts->name=Input::get('name');
		$contacts->email=Input::get('contEmail');
		$contacts->contact_no=Input::get('contNo');
		$contacts->save();
		
		return redirect('searchContact')->with('contacts',  $contacts::all());
	}
	
	
	//Delete Existing Contact
	public function deleteContact(){
		$id=Input::get('deleteIdHidden');
	
		$contacts=Contact::find($id);
		
		$contacts->delete();
		
		return redirect('searchContact')->with('contacts',  $contacts::all());
	
	}
	
	//Edit existing Contact
	public function editContact(){
		
		$contId=Input::get('editIdHidden');
	
		$contacts=Contact::find($contId);
		
		$customers=new Customer;
	
		$companyNames=array();
		foreach($customers::all() as $customer){
			$opVal=$customer->customer_id;
			$companyNames[$opVal]=$customer->company_name;
		}
		
		$data = array(
	    'contact'  => $contacts,
	    'companyNames'=> $companyNames
		);
	
		return View('editContact')->with('data',$data);
	}
	
	
	//Update Edited Contact
	public function updateContact(){
		
		$id=Input::get('idHidden');
	
		$contacts=Contact::find($id);
	
		$contacts->cont_id=Input::get('contId');
		$contacts->customer_id=Input::get('compId');
		$contacts->name=Input::get('name');
		$contacts->email=Input::get('contEmail');
		$contacts->contact_no=Input::get('contNo');
		$contacts->save();
		
		return redirect('searchContact')->with('contacts',  $contacts::all());
	}
	
}
