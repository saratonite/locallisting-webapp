<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;


use Auth;
use Validator;
class VendorController extends Controller
{
    

    // ***** API *****
    
    public function profile(){

    	
    	$vendor = \App\Vendor::where("user_id",Auth::user()->id)->first();

    	$data['vendor'] = $vendor;
        $data['picture'] = $vendor->picture;
    	$data['categories'] = \App\Category::orderBy('name')->get();
    	$data['cities'] = \App\City::orderBy('name')->get();

    	return $data;
    }

    /**
     * Update profile
     */

    public function update(Request $request){


    	$vendor = \App\Vendor::where("user_id",Auth::user()->id)->first();


        $v =  Validator::make($request->all(),[
            'vendor_name' => 'required ',
            'description' => 'required',
            'category_id' => 'required',
            'city_id' => 'required',
            'addr_line1' => 'required | max:255',
            'addr_line2' => 'max:255',
            'addr_line3' => 'max:255',
            'contact_number' => 'required',
            'mobile' => 'required'
        ],[
            'category_id' => 'Select category',
            'city_id' => 'Select city',
            'addr_line1' => 'Address (Building / Room)',
            'addr_line2' => 'Address (Street / Landmark)',
            'addr_line3' => 'Address (Place)'
        ]);

        $niceNames = [ 'addr_line1' => 'Address (Building / Room)',
            'addr_line2' => 'Address (Street / Landmark)',
            'addr_line3' => 'Address (Place)'];
        $v->setAttributeNames($niceNames);


        if($v->fails()){
            return response()->json(['errors'=>$v->errors()])->setStatusCode(422);
        }

        $vendor->fill($request->all());

        $vendor->update();

        return $vendor;


    }

    public function updatePicture(Request $request){

        $user = Auth::user();

        $vendor = $user->vendor;

        $picture = $vendor->picture;

        if(!$picture){

            $picture = new \App\Image();
            $picture->type = "profile";
            $picture->user_id = $user->id;
        }

        $picture->file_name = "imageName";

        $picture->save();

        $file = $request->file('file');

         $imageName = md5(time()).'_test.'.$file->getClientOriginalExtension();

        $file->move(base_path() . '/public/images/vendors/profile/', $imageName);
        //var_dump($file);
        

        // Save Image Details to DB
        $picture->file_name = $imageName;

        $picture->save();

        // if success 
        return $this->profile();

    }
}
