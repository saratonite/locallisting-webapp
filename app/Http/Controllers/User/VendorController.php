<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
class VendorController extends Controller
{
    

    // ***** API *****
    
    public function profile(){

    	
    	$vendor = \App\Vendor::where("user_id",Auth::user()->id)->first();

    	$data['vendor'] = $vendor;
    	$data['categories'] = \App\Category::orderBy('name')->get();
    	$data['cities'] = \App\City::orderBy('name')->get();

    	return $data;
    }

    /**
     * Update profile
     */

    public function update(Request $request){


    }
}
