<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class EnquiryController extends Controller
{
    
    public function index(){

    	$enquiries = \App\Enquiry::with('vendor')->get();
    	//return $enquiries;

    	return view('admin.enquiry.index',compact('enquiries'));
    }
}
