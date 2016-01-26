<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Auth;

class ProfileController extends Controller
{
    /**
     * 
     */
    
    public function index(){

    	return view('user.index');



    }

    public function show(){


    	return view('user.profile.show');

    }

    public function test(){

    	return view('user.app');
    }

    // API 
   /**
    * Get my profile data
    * 
    */
   
   public function myprofile(){


   	$me = \App\User::find(Auth::user()->id);
   	return $me;
   }


}
