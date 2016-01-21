<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Validator;

class VendorController extends Controller
{
    private $userStatuses = ['active','pending','blocked'];



    public function index(Request $request){


    	$vendors = \App\Vendor::bydate()->paginate(config('settings.pagination.per_page')); 
        $row_count = pagination_row_num($request->input('page'),config('settings.pagination.per_page'));
    
        return view('admin.vendor.index',compact('vendors','row_count'));
    }

    public function pending(Request $request){

        $vendors = \App\Vendor::bydate()->bystatus('pending')->paginate(config('settings.pagination.per_page'));

        $row_count = pagination_row_num($request->input('page'),config('settings.pagination.per_page'));
        return view('admin.vendor.index',compact('vendors','row_count'));

    }

    public function accepted(Request $request){
        $vendors = \App\Vendor::bydate()->bystatus('active')->paginate(config('settings.pagination.per_page'));
        $row_count = pagination_row_num($request->input('page'),config('settings.pagination.per_page'));
        return view('admin.vendor.index',compact('vendors','row_count'));
    }

    public function blocked(Request $request){
        $vendors = \App\Vendor::bydate()->bystatus('blocked')->paginate(config('settings.pagination.per_page'));
        $row_count = pagination_row_num($request->input('page'),config('settings.pagination.per_page'));
        return view('admin.vendor.index',compact('vendors','row_count'));
    }

    /**
     *
     * View A Single User details
     */
    
    public function show(Request $request,$vendorId){

    	$vendor = \App\Vendor::with(['enquiry'=>function($enquiry){
            $enquiry->recent();
        }])->find($vendorId);

    	return view('admin.vendor.show',compact('vendor'));

    }

    /**
     *  Edit single Vendor
     */
    public function edit($vendorId){

        $vendor = \App\Vendor::find($vendorId);

        $categories = \App\Category::lists('name','id');
        $cities = \App\City::lists('name','id');

       // return $categories;

        return view('admin.vendor.edit',compact('vendor','categories','cities'));


    }

    /**
     * Update vendor
     */
    
    public function update(Request $request,$vendorId = null){

        $vendor = \App\Vendor::find($vendorId);

        $v =  Validator::make($request->all(),[
            'vendor_name' => 'required ',
            'description' => 'required',
            'category_id' => 'required',
            'city_id' => 'required',
            'contact_number' => 'required',
            'mobile' => 'required'
        ],[
            'category_id' => 'Select category',
            'city_id' => 'Select city'
        ]);

        if($v->fails()){
            return redirect()->back()->withErrors($v)->withInput();
        }

        $vendor->fill($request->all());

        if($vendor->update()){

            return redirect()->back()->with('success','Vendor profile updated');
        }

        return $vendor;

    }

    /**
     *
     * Vendor enquiries
     */
    
    public function enquiries($vendorId,$enquiryStatus=null){

        $vendor = \App\Vendor::findOrFail($vendorId);

        $enquiries = $vendor->enquiry()->bydate()->bystatus($enquiryStatus)->paginate(config('settings.pagination.per_page'));

        $count['all'] = $vendor->enquiry()->count();
        $count['accepted'] = $vendor->enquiry()->bystatus('accepted')->count();
        $count['pending'] = $vendor->enquiry()->bystatus('pending')->count();
        $count['rejected'] = $vendor->enquiry()->bystatus('rejected')->count();
        $count['spam'] = $vendor->enquiry()->bystatus('spam')->count();

        return view('admin.vendor.enquiries',compact('vendor','enquiries','count'));


    }


    /*
    *
    * Change Status of a vendor
     */
    
    public function chnageStatus(Request $request,$vendorId){

    	$vendor = \App\Vendor::find($vendorId);

    	if(!$vendor){
    		return abort(404);
    	}

    	// validate status field
    	if($this->isValidUserStatus($request->input('status'))){
    		$vendor->user->status = $request->input('status');
    		if($vendor->user->save()){

    			// Event Vendor Status Changed
    			return redirect()->back()->with('success','Vendor status chnaged');
    		}
    	}


    	return redirect()->back();
    }

    // Helper functions 
    public function isValidUserStatus($status){

    	if(in_array($status, $this->userStatuses)){
    		return true;
    	}
    	return false;

    }

}
