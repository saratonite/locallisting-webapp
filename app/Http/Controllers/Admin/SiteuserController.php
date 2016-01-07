<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class SiteuserController extends Controller
{
    

	/* Get users where type =user */
    public function getAllUsers(){

    	$siteusers = \App\User::siteuser()->get();

    	return view('admin.siteuser.index',compact('siteusers'));
    	 
    }
}
