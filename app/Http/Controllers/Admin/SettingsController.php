<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;
use Auth;
use Hash;

class SettingsController extends Controller
{
    public function index(){

    	return view('admin.settings.index');
    }

    public function changeemail(Request $request){

    	$v = Validator::make($request->all(),[
    		"email"=>"required | email | unique:users,email,".$request->user()->id,
    		"password"=>"required"
    	]);

    	if($v->fails()){

    		//var_dump($v->errors());

    		return redirect()->back()->withErrors($v,'changeEmail')->withInput();
    	}

    	// Checking password// 
        if($this->checkCurrentPassword($request->input('password'))){


            $user = \App\User::find(Auth::user()->id);
            //$user->password = Hash::make($request->input('password'));
            $user->email = $request->input('email');
            if($user->update()){

                return redirect()->back()->with('success','Email adderss changed');
                
            }

        }
        return redirect()->back()->with('changeEmailError','Incorrect password');


    }


    public function changePassword(Request $request){

        $v = Validator::make($request->all(),[
            'current_password' => "required",
            'new_password' => "required | min:8",
            'c_new_password' =>"required | same:new_password"
        ]);
        $niceNames = ['c_new_password'=>'Confirm new password'];
        $v->setAttributeNames($niceNames);

        if($v->fails()){

            return redirect()->back()->withErrors($v,'changePassword')->withInput();
        }

        //
        
        //check old password
        if($this->checkCurrentPassword($request->input('current_password'))){


            $user = \App\User::find(Auth::user()->id);

                $user->password = $request->input('new_password');
                if($user->update()){
                    return redirect()->back()->with('success','Password has been changed');
                }
            
        }

        return redirect()->back()->with('changePasswordError','Incurrect current password');
    }


    // Private Properties

    protected function checkCurrentPassword($password){

        if(Hash::check($password,Auth::user()->getAuthPassword())){
            return true;
        }

        return false;

    }


}
