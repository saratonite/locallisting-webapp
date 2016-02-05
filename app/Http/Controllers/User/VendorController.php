<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;


use Auth;
use Validator;
use Image;
class VendorController extends Controller
{
    

    // ***** API *****
    
    public function profile(){

    	
    	$vendor = \App\Vendor::where("user_id",Auth::user()->id)->with(['categories','cities'])->first();

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
            'categories' => 'required',
            'cities' => 'required',
            'addr_line1' => 'required | max:255',
            'addr_line2' => 'max:255',
            'addr_line3' => 'max:255',
            'post_code' => 'required|max:10|min:5',
            'contact_number' => 'required',
            'mobile' => 'required'
        ],[
            'categories' => 'Select category',
            'cities' => 'Select city',
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

        $vendor->updateCategories($request->input('categories'));
        $vendor->updateCities($request->input('cities'));

        $vendor->update();

        return $this->profile();


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


        // File Validation
        $v = Validator::make($request->all(),
            ['file' => 'required | image|max:'.config('settings.uploads.maxsize',5000)]
            );
        //
        if($v->fails()){
            return response()->json(['errors'=>$v->errors()])->setStatusCode(422);
        }

        // Delete old pictures
        $picture->DeleteFromDisk();
        

        $file = $request->file('file');

        //$realPath = $file->getRealPath();
        
        $picture->SaveToDisk($file);
        // Save Image Details to DB
        $picture->save();

    

        // if success 
        return $this->profile();

    }

    /**
     * Remove Vendor picture
     */
    
    public function removePicture(){

         $user = Auth::user();

        $vendor = $user->vendor;


        $vendor->picture->DeleteFromDisk();

        $vendor->picture()->delete();

        return $this->profile();
        
    }
}
