<?php
/**
 * @author Sarath <sarathtvmala@gmail.com>
 * @package Sitemanager
 * @description Vendor controller for api request
 */

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
        $data['logo'] = $vendor->logo;
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

    public function updateLogo(Request $request){

        $user = Auth::user();

        $vendor = $user->vendor;

        $logo = $vendor->logo;

        if(!$logo){

            $logo = new \App\Image();
            $logo->type = "logo";
            $logo->user_id = $user->id;
        }


        // File Validation
        $v = Validator::make($request->all(),
            ['file' => 'required | image|max:'.config('settings.uploads.maxsize',5000)]
            );
        //
        if($v->fails()){
            return response()->json(['errors'=>$v->errors()])->setStatusCode(422);
        }

        // Delete old logos
        $logo->DeleteFromDisk();
        

        $file = $request->file('file');

        //$realPath = $file->getRealPath();
        
        $logo->SaveToDisk($file);
        // Save Image Details to DB
        $logo->save();

    

        // if success 
        return $this->profile();

    }

    /**
     * Remove Vendor logo
     */
    
    public function removeLogo(){

         $user = Auth::user();

        $vendor = $user->vendor;


        $vendor->logo->DeleteFromDisk();

        $vendor->logo()->delete();

        return $this->profile();
        
    }

    public function bannerAndPicture(){

        $vendor = \App\Vendor::where("user_id",Auth::user()->id)->first();

        $data['cover'] = $vendor->cover;
        $data['picture'] = $vendor->picture;

        return $data;
    }


    // Banner
    public function updateBanner(Request $request){

        $user = Auth::user();

        $vendor = $user->vendor;

        $cover = $vendor->cover;

        if(!$cover){

            $cover = new \App\Image();
            $cover->type = "cover";
            $cover->user_id = $user->id;
        }


        // File Validation
        $v = Validator::make($request->all(),
            ['file_banner' => 'required | image|max:'.config('settings.uploads.maxsize',5000)]
            );
        //
        if($v->fails()){
            return response()->json(['errors'=>$v->errors()])->setStatusCode(422);
        }

        // Delete old covers
        $cover->DeleteFromDisk();
        

        $file = $request->file('file_banner');

        //$realPath = $file->getRealPath();
        
        $cover->SaveToDisk($file);
        // Save Image Details to DB
        $cover->save();

    

        // if success 
        return $this->bannerAndPicture();

    }

    /**
     * Remove Vendor logo
     */
    
    public function removeBanner(){

         $user = Auth::user();

        $vendor = $user->vendor;


        $vendor->cover->DeleteFromDisk();

        $vendor->cover()->delete();

        return $this->bannerAndPicture();
        
    }
    // End Banner
    
    // Picture
    public function updatePicture(Request $request){

        $user = Auth::user();

        $vendor = $user->vendor;

        $picture = $vendor->picture;

        if(!$picture){

            $picture = new \App\Image();
            $picture->type = "picture";
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
        return $this->bannerAndPicture();

    }

    /**
     * Remove Vendor picture
     */
    
    public function removePicture(){

         $user = Auth::user();

        $vendor = $user->vendor;


        $vendor->picture->DeleteFromDisk();

        $vendor->picture()->delete();

        return $this->bannerAndPicture();
        
    }
    //End Picture
}
