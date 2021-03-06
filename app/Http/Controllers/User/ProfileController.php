<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Auth;
use Validator;

use Response;

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

   	$me = \App\User::where('id',Auth::user()->id)->with('vendor')->first();
   	return $me;
   }

   /**
    * Update personal profile
    */
   public function updateMyprofile(Request $request){

   	$me = \App\User::find(Auth::user()->id);
   	$data = $request->except('status','email');
   	// Validate
   	$v= Validator::make($data,[

   		"first_name" => "required | max:255",
   		"last_name" => "required | max:255",
   		"addr_line1" => "required | max:255",
   		"addr_line2" => "required | max:255",
   		"addr_line3" => "max:255"

   	]);

   	if($v->fails()){

   		// return Response::json([
   		// 	"errors" => [$v->errors()],
   		// 	"code" => 422
   		// ]);
   		
   		return response()->json(['errors'=>$v->errors()])->setStatusCode(422, 'Validation error!');

   	}


   	// Updatig
   	
   	$me->fill($request->except('status','email'));

   	$me->save();

   	return $me;



   }


}
