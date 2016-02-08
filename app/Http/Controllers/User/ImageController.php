<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Auth;
use Validator;

class ImageController extends Controller
{
    

    /*** API ***/
    public function getMyImages(){


    	$images = \App\Image::orderBy('created_at','DESC')->byUser(Auth::user()->id)->onlyImage()->paginate(9);

    	return $images;


    }

    public function doUpload(Request $request){

    	$vendor = \App\Vendor::find(Auth::user()->id);

    	if($vendor){
    		return response()->json(['message'=>'Resource Not Found.'])->setStatusCode(404);
    	}

    	// Validate
    	
    	$v = Validator::make($request->all(),[

    			'file' =>'required |mimes:jpg,jpeg,png|max:5000',
    			'title' =>'required|max:128',
    			'description' => 'required'
    	]);

    	if($v->fails()){

    		return response()->json(['errors'=>$v->errors()])->setStatusCode(422);
    	}

    	$file = $request->file('file');

    	$image = new \App\Image();
    	$image->user_id = Auth::user()->id;
    	$image->title = $request->input('title');
    	$image->description = $request->input('description');

    	$image->saveToDisk($file);
    	$image->save();

    	return $this->getMyImages();

    	

    }
}
