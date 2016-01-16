<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
	// Dashboard page
    public function getIndex(){

    	$count['vendors'] = \App\Vendor::count();
    	$count['users'] = \App\User::siteuser()->count();
    	$count['enquiries'] = \App\Enquiry::count();


    	return view('admin.dashboard',compact('count'));
    }

    public function logout(){

    }
}
