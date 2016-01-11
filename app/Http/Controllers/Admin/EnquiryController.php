<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class EnquiryController extends Controller
{
    
    public function index(){

    	$enquiries = \App\Enquiry::with('vendor')->paginate(1);
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
