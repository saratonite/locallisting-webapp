<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

/**
 * Aditional services
 */

use Validator;

/**
 *
 * Events
 */
use Event;
use App\Events\VendorStatusChanged;

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

        $vendor = \App\Vendor::with(['categories','cities','picture'])->find($vendorId);

        $categories = \App\Category::lists('name','id');
        $cities = \App\City::lists('name','id');

       // return $categories;

        return view('admin.vendor.edit',compact('vendor','categories','cities'));


    }

    /**
     * Update vendor
     */
    
    public function update(Request $request,$vendorId = null){

        

        $vendor = \App\Vendor::with('categories')->find($vendorId);

        $v =  Validator::make($request->all(),[
            'vendor_name' => 'required ',
            'description' => 'required',
            'categories' => 'required',
            'cities' => 'required',
            'addr_line1' => 'max:255',
            'addr_line2' => 'max:255',
            'addr_line3' => 'max:255',
            'post_code' => 'required|min:5|max:10',
            'contact_number' => 'required',
            'mobile' => 'required'
        ],[
            'categories' => 'Select category',
            'cities' => 'Select city',
            'addr_line1' => 'Address (Building / Room)',
            'addr_line2' => 'Address (Street / Landmark)',
            'addr_line3' => 'Address (Place)'
        ]);

        if($v->fails()){
            return redirect()->back()->withErrors($v)->withInput();
        }


        //** Processing Categories ** //

        // Remove old categories thos not selected now
        
        $newCategories = $request->input('categories');

        $vendor->UpdateCategories($newCategories);

        $newCities = $request->input('cities');

        $vendor->UpdateCities($newCities);

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

    public function reviews(Request $request,$vendorId,$vendorStatus=false){

        $vendor = \App\Vendor::with('review')->findOrFail($vendorId);

        $reviews = $vendor->review()->orderBy('updated_at','DESC')->paginate(config('settings.pagination.per_page'));

        $row_count = pagination_row_num($request->input('page'),config('settings.pagination.per_page'));

        return view('admin.vendor.reviews',compact('vendor','reviews','row_count'));

    }

    public function images(Request $request, $vendorId){

        $vendor = \App\Vendor::with('images')->findOrFail($vendorId);

        $images = $vendor->images()->orderBy('updated_at','DESC')->paginate(config('settings.pagination.per_page'));

        $row_count = pagination_row_num($request->input('page'),config('settings.pagination.per_page'));

        return view('admin.vendor.images.index',compact('vendor','images','row_count'));

    }

    /**
     *
     * Add Change Vendorpicture
     * 
     */
    
    public function uploadPicture(Request $request,$vendorId){

        $vendor = \App\Vendor::with('picture','user')->findOrFail($vendorId);

        $this->validate($request,[
            'file' => 'required |mimes:jpg,jpeg,png|max:5000'
            ]);

        $picture = $vendor->picture;
        if(!$picture){

            $picture = new \App\Image();
             $picture->type = "profile";
             $picture->user_id = $vendor->user->id;
        }

        // Delete old pictures
        $picture->DeleteFromDisk();
        

        $file = $request->file('file');

        //$realPath = $file->getRealPath();
        
        $picture->SaveToDisk($file);
        // Save Image Details to DB
        if($picture->save()){
            $request->session()->flash('success','Picture updated');

        }
        return redirect()->back();


    }

    public function deletePicture(Request $request,$vendorId){

        $vendor = \App\Vendor::with('picture')->findOrFail($vendorId);

        if($vendor->picture){
            $vendor->picture()->DeleteFromDisk();
            $vendor->picture()->delete();
            $request->session()->flash('success','Picture removed');

        }

        return redirect()->back();
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
                if($request->input('note')){
                    $vendor->note = $request->input('note');
                }  
                Event::fire(new VendorStatusChanged($vendor));

    			return redirect()->back()->with('success','Vendor status chnaged');
    		}
    	}


    	return redirect()->back();
    }

    public function delete(Request $request, $vendorID){

        $vendor = \App\Vendor::find($vendorID);

        if($vendor){

            $vendor->DeleteVendor();
            $request->session()->flash('success','Vendor Deleted');
        }

         return redirect()->route('admin::all-vendors');


    }

    // Helper functions 
    public function isValidUserStatus($status){

    	if(in_array($status, $this->userStatuses)){
    		return true;
    	}
    	return false;

    }

}
