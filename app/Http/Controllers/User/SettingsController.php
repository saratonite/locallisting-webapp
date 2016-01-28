<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

// Servicese
use Validator;
use Hash;
use Auth;

class SettingsController extends Controller
{
    

    // APIS
    

    public function updatePassword(Request $request){

    	$data = $request->all();

    	$v = Validator::make($data,[

    			"old_password" => "required",
    			"password" => "required | min:6 |confirmed"

    		]);

    	if($v->fails()){

    		return response()->json(['errors'=>$v->errors()])->setStatusCode(422);
    	}

    	// Check old password
    	
    	if(!$this->checkCurrentPassword($data['old_password'])){

    		return response()->json(['errors'=>['old_password'=>["Incorrect old password"] ]])->setStatusCode(422);

    	}

    	$user = $request->user();

    	$user->password =$data['password'];
    	$user->update();

    	return response()->json(['message'=>'Password updated']);





    }


    public function updateEmail(Request $request){

    	$data = $request->all();


    	$v = Validator::make($data,[
    		"email"=>"required | email | unique :users,email,".$request->user()->id,
    		"email_password"=>"required"
    	]);

    	if($v->fails()){

    		return response()->json(['errors'=>$v->errors()])->setStatusCode(422);
    	}

    	// Check old password
    	
    	if(!$this->checkCurrentPassword($data['email_password'])){

    		return response()->json(['errors'=>['email_password'=>["Incorrect password"] ]])->setStatusCode(422);

    	}

    	$user = $request->user();

    	$user->email =$data['email'];
    	$user->update();

    	return response()->json(['message'=>'Email updated','data'=>$user->toArray()]);





    }


    protected function checkCurrentPassword($password){

        if(Hash::check($password,Auth::user()->getAuthPassword())){
            return true;
        }

        return false;

    }
}
