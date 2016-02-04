<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Validator;

// Events
use Event;
use App\Events\NewUserRegistered;
use App\Events\NewVendorRegistered;

class RegistrationController extends Controller
{
    

    public function userSignup(){


    	return view('site.registration.user');

    }

    public function userSignupProcess(Request $request){

    	$v = Validator::make($request->all(),[

    		'first_name' =>'required|min:3|max:255',
    		'last_name' => 'required|max:255',
    		'email'=>'required|email|unique:users,email|max:255',
    		'mobile'=>'required|min:10|max:15',
    		'password'=>'required|confirmed']);

    	if($v->fails()){

    		return redirect()->back()->withErrors($v)->withInput();
    	}

    	$u = new \App\User();
    	$u->fill($request->all());
    	$u->type = "user";
    	$u->status = "pending";
    	$u->email_verification = md5(time().$request->input('email'));
    	if($u->save()){
    		$request->session()->flash('success','Thank you for Signup with UAE Home Advisor . please <a href="'.url('login').'">login</a> and update your profile');

    		// Fire event user created
    		Event::fire(new NewUserRegistered($u));
    		
    		
    	}

    	return redirect()->back();


    }


    // Vendor Signup
    public function vendorSignup(){

    	$categories = \App\Category::lists('name','id');
    	$cities = \App\City::lists('name','id');

    	return view('site.registration.vendor',compact('cities','categories'));

    }

    public function vendorSignupProcess(Request $request){

    	$v = Validator::make($request->all(),[

    		'first_name' =>'required|min:3|max:255',
    		'last_name' => 'required|max:255',
    		'email'=>'required|email|unique:users,email|max:255',
    		'mobile'=>'required|min:10|max:15',
    		'password'=>'required|confirmed',
    		//Vendor Section
    		'vendor_name' =>'required',
    		'categories' => 'required',
    		'cities' => 'required',
    		'addr_line1' => 'required',
    		'addr_line2' => 'required',
    		'addr_line2' => 'required',
    		'post_code' => 'required|max:10|min:5',
    		]);

    	$niceNames = [
    		'vendor_name' => 'Company name',
    		'category_id' => 'Category',
    		'city_id' => 'City',
    		'addr_line1' => 'Address line 1',
    		'addr_line2' => 'Address line 2',
    		'addr_line3' => 'Address line 3',
    		];

    	$v->setAttributeNames($niceNames);

    	if($v->fails()){

    		return redirect()->back()->withErrors($v)->withInput();
    	}

    	// Create a new user 
    	
    	$user = new \App\User();

    	$user->fill($request->only('first_name','last_name','email','mobile','password'));

    	$user->type = "vendor";
    	$user->status = "pending";
    	$user->email_verification = md5(time().$request->input('email'));

    	$user->save();

    	// Create a Vendor profile associated with the user
    	
    	$vendor = new \App\Vendor();

    	$vendor->user_id = $user->id;

    	$vendor->fill($request->only('vendor_name','addr_line1','addr_line2','addr_line3','zip_code'));

    	if($vendor->save()){
        $vendor->addCategories($request->input('categories'));
        $vendor->addCities($request->input('cities'));

    		$request->session()->flash('success','Thank you for Signup with UAE Home Advisor . please <a href="'.url('login').'">login</a> and update your profile');

    		// Fire event vendor created
    		Event::fire(new NewUserRegistered($user));
    	}
    	return redirect()->back();

    }
}
