<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class SiteuserController extends Controller
{
    

	/* Get users where type =user */
    public function getAllUsers(){

    	$siteusers = \App\User::siteuser()->paginate(15);

    	return view('admin.siteuser.index',compact('siteusers'));
    	 
    }

    /**
     *  Show a single site user
     *  
     */
    
    public function view(Request $request,$userId=null){

    	$user = \App\User::find($userId);

    	return view('admin.siteuser.view',compact('user'));

    }
}
