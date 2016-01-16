<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class EnquiryController extends Controller
{
    
    public function index(){

    	$enquiries = \App\Enquiry::with('vendor')->bydate()->paginate(1);
    	//return $enquiries;

    	return view('admin.enquiry.index',compact('enquiries'));
    }




    /**
     *
     * Get accepted enquiries
     */
    
    public function accepted(){
        $enquiries = \App\Enquiry::with('vendor')->bydate()->bystatus('accepted')->paginate(1);
        //return $enquiries;

        return view('admin.enquiry.index',compact('enquiries'));
    }

    /**
     * get rejected
     */
    
    public function rejected(){
        $enquiries = \App\Enquiry::with('vendor')->bydate()->bystatus('rejected')->paginate(1);
        //return $enquiries;

        return view('admin.enquiry.index',compact('enquiries'));
    }

    /**
     * get pending 
     */
    
    public function pending(){

        $enquiries = \App\Enquiry::with('vendor')->bydate()->bystatus('pending')->paginate(1);
        //return $enquiries;

        return view('admin.enquiry.index',compact('enquiries'));

    }

    /*'
    *
    * View a single enquiry details
    **/

    public function view(Request $request,$enquiryId){

    	$enquiry = \App\Enquiry::find($enquiryId);


    	return view('admin.enquiry.view',compact('enquiry'));

    }
}
