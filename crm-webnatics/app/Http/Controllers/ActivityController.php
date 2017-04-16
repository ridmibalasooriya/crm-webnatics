<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Input;

use App\Activity;
use App\Customer;

class ActivityController extends BaseController
{
	//Search Contact
    public function searchActivity(){
		$activities= new Activity;
		$customers=new Customer;	
		
		return View('searchActivity')->with('activities',  $activities::all());
    }
	
	//Add new Contact
	public function addActivity(){
		
		$customers=new Customer;
	
		$companyNames=array();
		foreach($customers::all() as $customer){
			$opVal=$customer->customer_id;
			$companyNames[$opVal]=$customer->company_name;
		}
		
		$activity= new Activity;
		
		//Get last cid and increase it by one and add to CID pref. as new customer Id
		$lastcID=$activity->orderBy('id', 'desc')->first()->id;
		$actid=$lastcID+1;
		$newActId='ActID'.$actid;
		
		$data = array(
	    'actId'  => $newActId,
	    'companyNames'=> $companyNames
		);
		
	    return view('addActivity')->with('data',$data);
	}
	
	//Add new Contact to DB
	public function updateNewActivity(){
		
		$activities= new Activity;
	
		$activities->act_id=Input::get('actId');
		$activities->customer_id=Input::get('compName');
		$activities->date=Input::get('date');
		$activities->activity_type=Input::get('actType');
		$activities->outcomes=Input::get('outcomes');
		$activities->sales_person=Input::get('salesPerson');
		$activities->save();
		
		return redirect('searchActivity')->with('activities',  $activities::all());
	}
	
	
	//Delete Existing Contact
	public function deleteActivity(){
		$id=Input::get('deleteIdHidden');
	
		$activities=Activity::find($id);
		
		$activities->delete();
		
		return redirect('searchActivity')->with('activities',  $activities::all());
	
	}
	
	//Edit existing Contact
	public function editActivity(){
		
		$actId=Input::get('editIdHidden');
	
		$activities=Activity::find($actId);
		
		$customers=new Customer;
	
		$companyNames=array();
		foreach($customers::all() as $customer){
			$opVal=$customer->customer_id;
			$companyNames[$opVal]=$customer->company_name;
		}
		
		$data = array(
	    'activity'  => $activities,
	    'companyNames'=> $companyNames
		);
	
		return View('editActivity')->with('data',$data);
	}
	
	
	//Update Edited Contact
	public function updateActivity(){
		
		$id=Input::get('idHidden');
	
		$activities=Activity::find($id);
	
		$activities->act_id=Input::get('actId');
		$activities->customer_id=Input::get('compId');
		$activities->date=Input::get('date');
		$activities->activity_type=Input::get('actType');
		$activities->outcomes=Input::get('outcomes');
		$activities->sales_person=Input::get('salesPerson');
		$activities->save();
		
		
		return redirect('searchActivity')->with('activities',  $activities::all());
	}
}
