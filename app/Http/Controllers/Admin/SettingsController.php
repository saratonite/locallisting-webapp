<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;
use Auth;

class SettingsController extends Controller
{
    public function index(){

    	return view('admin.settings.index');
    }

    public function changeemail(Request $request){

    	$v = Validator::make($request->all(),[
    		"email"=>"required | email",
    		"password"=>"required"
    	]);

    	if($v->fails()){

    		//var_dump($v->errors());

    		return redirect()->back()->withErrors($v,'changeEmail')->withInput();
    	}

    	// Checking password


    }
}
