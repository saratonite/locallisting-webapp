<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
	// Dashboard page
    public function getIndex(){

    	$count['vendors'] = \App\Vendor::bystatus('active')->count();


    	return view('admin.dashboard',compact('count'));
    }

    public function logout(){

    }
}
