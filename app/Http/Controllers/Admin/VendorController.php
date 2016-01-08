<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class VendorController extends Controller
{
    

    public function index(){


    	$vendors = \App\Vendor::paginate(15);

    	return view('admin.vendor.index',compact('vendors'));
    }
    
    public function chnageStatus(Request $request,$vendorId=null){

    	$vendor = \App\Vendor::find($vendorId);

    	if(!$vendor){
    		return abort(404);
    	}

    	// validate status field
    	
    	$vendor->status = $request->input('status');
    	$vendor->save();

    	dd($request->all());


    	return redirect()->back();
    }
}
