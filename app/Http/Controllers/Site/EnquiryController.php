<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Validator;
use Auth;


class EnquiryController extends Controller
{
    

    public function contact($vendorId){

    	$vendor = \App\Vendor::onlyactive()->findOrFail($vendorId);

        $categories = \App\Category::orderBy('name','ASC')->lists('name','id');

        return view('site.service_provider.contact',compact('categories','vendor'));

    }

    public function submitContact(Request $request,$vendorId){

    	$vendor = \App\Vendor::onlyactive()->findOrFail($vendorId);


    	$v = Validator::make($request->all(),[

    		'subject' => 'required',
    		'message' =>'required'

    		]);

    	if($v->fails()){
    		return redirect()->back()->withErrors($v)->withInput();
    	}


    	$e = new \App\Enquiry();

    	$e->from_user = Auth::user()->id;
    	$e->to_vendor = $vendor->id;

    	$e->fill($request->all());

    	$e->save();

    	return redirect()->route('profile',$vendor->id)->with('success','Your enquiry has been submitted.');


    }
}
