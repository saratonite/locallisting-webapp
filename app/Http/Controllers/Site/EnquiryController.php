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

    public function postRequirements(){


        $vendors = \App\Vendor::with('picture')->onlyactive()->get();

        $categories = \App\Category::orderBy('name','ASC')->lists('name','id');



        return view('site.postrequirements',compact('vendors','categories'));

        

    }

    public function proccessPostRequirements(Request $request){



        $v = Validator::make($request->all(),[

            'subject' => 'required',
            'message' =>'required'

            ]);

        if($v->fails()){
            return redirect()->back()->withErrors($v)->withInput();
        }

        $vendors = $request->input('vendor');

        if(count($vendors) == 0){
            return redirect()->back()->withInput()->with('error','Please select at least 1 vendor');
        }

        foreach($vendors as $vendor){

            $vnd = \App\Vendor::find($vendor);

            if($vnd){

                $enquiry = new \App\Enquiry();

                $enquiry->from_user = Auth::user()->id;
                $enquiry->to_vendor = $vnd->id;

                $enquiry->subject = $request->input('subject');
                $enquiry->message = $request->input('message');

                $enquiry->save();


            }

        }

        return redirect()->back()->with('success','Your requirement submited to vendors');



    }
}
