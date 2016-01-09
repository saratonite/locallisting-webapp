<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class VendorController extends Controller
{
    private $userStatuses = ['active','pending','blocked'];



    public function index(){


    	$vendors = \App\Vendor::paginate(15);

    	return view('admin.vendor.index',compact('vendors'));
    }

    /**
     *
     * View A Single User details
     */
    
    public function show(Request $request,$vendorId){

    	$vendor = \App\Vendor::find($vendorId);

    	return view('admin.vendor.show',compact('vendor'));

    }


    /*
    *
    * Change Status of a vendor
     */
    
    public function chnageStatus(Request $request,$vendorId){

    	$vendor = \App\Vendor::find($vendorId);

    	if(!$vendor){
    		return abort(404);
    	}

    	// validate status field
    	if($this->isValidUserStatus($request->input('status'))){
    		$vendor->user->status = $request->input('status');
    		if($vendor->user->save()){

    			// Event Vendor Status Changed
    			return redirect()->back()->with('success','Vendor status chnaged');
    		}
    	}


    	return redirect()->back();
    }

    // Helper functions 
    public function isValidUserStatus($status){

    	if(in_array($status, $this->userStatuses)){
    		return true;
    	}
    	return false;

    }
}
