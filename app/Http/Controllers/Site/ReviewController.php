<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;
use Auth;


class ReviewController extends Controller
{
    
    public function writeReview($vendorId){

    	$vendor = \App\Vendor::onlyactive()->with(['categories','cities','images'=>function($q){
                $q->where('status','accepted');

        },'review'=>function($q){
                $q->where('status','accepted');
                $q->with('user');

        },'cover'])->findOrFail($vendorId);

        $categories = \App\Category::orderBy('name','ASC')->lists('name','id');

        return view('site.service_provider.review',compact('categories','vendor'));

    }

    public function submitReview(Request $request,$vendorId){


    	$vendor = \App\Vendor::onlyactive()->findOrfail($vendorId);


    	// Validate request
    	
    	$v = Validator::make($request->all(),[

    		'title' => 'required',
    		'body' => 'required',
    		'confirm' => 'required|accepted'

    	]);

    	if($v->fails()){

    		return redirect()->back()->withErrors($v)->withInput();
    	}

    	$review = new \App\Review();

    	$review->fill($request->all());

    	$review->vendor_id = $vendor->id;
    	$review->user_id = Auth::user()->id;
    	$review->status = 'pending';

    	$review->save();

    	return redirect()->route('profile',$vendor->id)->with('success','You review has been submitted , Thank you');


    	$categories = \App\Category::orderBy('name','ASC')->lists('name','id');



    }
}
