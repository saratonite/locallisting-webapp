<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;

class SiteuserController extends Controller
{
    

	/* Get users where type =user */
    public function getAllUsers(){

    	$siteusers = \App\User::siteuser()->bydate()->paginate(15);

    	return view('admin.siteuser.index',compact('siteusers'));
    	 
    }

    /**
     *  get accespted users
     * 
     */
    
    public function accepted(){
        $siteusers = \App\User::siteuser()->bydate()->bystatus('active')->paginate(15);
        return view('admin.siteuser.index',compact('siteusers'));
    }

    /**
     *
     *  get pending users
     */
    
    public function pending(){
        $siteusers = \App\User::siteuser()->bydate()->bystatus('pending')->paginate(15);
        return view('admin.siteuser.index',compact('siteusers'));
    }

    /**
     *  get blocked users
     */
    public function blocked(){
         $siteusers = \App\User::siteuser()->bydate()->bystatus('blocked')->paginate(15);
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
    /**
     *
     * Edit a user
     */
    
    public function edit($userId = null){

        $user = \App\User::find($userId);


        return view('admin.siteuser.edit',compact('user'));

    }
    /**
     *
     * Update User
     */
    public function update(Request $request,$userId = null){

        $user = \App\User::find($userId);

        // validate 
        $v= Validator::make($request->all(),[
            'first_name' => 'required|min:3',
            'last_name' => 'required',
            'email' =>'required|email|unique:users,email,'.$user->id,
            'status'=>'required'
        ]);

        // if($user->isStatusExists(strtolowercase('active')))
        if($v->fails()){

            return redirect()->back()->withErrors($v)->withInput();
        }

        $user->fill($request->all());

        if($user->update()){

            return redirect()->back()->with('success','User details updated');
        }


    }

    /**
     *  Change Status
     */
    public function changeStatus(Request $request, $userId = null){

    

        $this->validate($request,[
            'id' => 'required',
            'status' => 'required'
        ]);



        $user = \App\User::find($request->input('id'));

        if($user->isStatusExists($request->input('status'))){

            $user->status = $request->input('status');
            $user->update();
        }

        return redirect()->back();



    }
}
