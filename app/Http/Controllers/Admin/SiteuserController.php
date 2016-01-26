<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;

class SiteuserController extends Controller
{
    

	/* Get users where type =user */
    public function getAllUsers(Request $request){

    	$siteusers = \App\User::siteuser()->bydate()->paginate(config('settings.pagination.per_page'));
        $row_count = pagination_row_num($request->input('page'),config('settings.pagination.per_page'));
    	return view('admin.siteuser.index',compact('siteusers','row_count'));
    	 
    }

    /**
     *  get accespted users
     * 
     */
    
    public function accepted(Request $request){
        $siteusers = \App\User::siteuser()->bydate()->bystatus('active')->paginate(config('settings.pagination.per_page'));
        $row_count = pagination_row_num($request->input('page'),config('settings.pagination.per_page'));
        return view('admin.siteuser.index',compact('siteusers','row_count'));
    }

    /**
     *
     *  get pending users
     */
    
    public function pending(Request $request){
        $siteusers = \App\User::siteuser()->bydate()->bystatus('pending')->paginate(config('settings.pagination.per_page'));
        $row_count = pagination_row_num($request->input('page'),config('settings.pagination.per_page'));
        return view('admin.siteuser.index',compact('siteusers','row_count'));
    }

    /**
     *  get blocked users
     */
    public function blocked(Request $request){
         $siteusers = \App\User::siteuser()->bydate()->bystatus('blocked')->paginate(config('settings.pagination.per_page'));
         $row_count = pagination_row_num($request->input('page'),config('settings.pagination.per_page'));
        return view('admin.siteuser.index',compact('siteusers','row_count'));
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

        $niceNames = [
                        'addr_line1' => 'Address line 1',
                        'addr_line2' => 'Address line 2',
                        'addr_line3' => 'Address line 3'
                     ];

        $v->setAttributeNames($niceNames);

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
