<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class EnquiryController extends Controller
{
    
    public function index(Request $request){

    	$enquiries = \App\Enquiry::with('vendor')->bydate()->paginate(config('settings.pagination.per_page'));
    	//return $enquiries;
        $row_count = pagination_row_num($request->input('page'),config('settings.pagination.per_page'));

    	return view('admin.enquiry.index',compact('enquiries','row_count'));
    }




    /**
     *
     * Get accepted enquiries
     */
    
    public function accepted(Request $request){
        $enquiries = \App\Enquiry::with('vendor')->bydate()->bystatus('accepted')->paginate(config('settings.pagination.per_page'));
        $row_count = pagination_row_num($request->input('page'),config('settings.pagination.per_page'));
        //return $enquiries;

        return view('admin.enquiry.index',compact('enquiries','row_count'));
    }

    /**
     * get rejected
     */
    
    public function rejected(Request $request){
        $enquiries = \App\Enquiry::with('vendor')->bydate()->bystatus('rejected')->paginate(config('settings.pagination.per_page'));
        $row_count = pagination_row_num($request->input('page'),config('settings.pagination.per_page'));
        //return $enquiries;

        return view('admin.enquiry.index',compact('enquiries','row_count'));
    }

    /**
     * get pending 
     */
    
    public function pending(Request $request){

        $enquiries = \App\Enquiry::with('vendor')->bydate()->bystatus('pending')->paginate(config('settings.pagination.per_page'));
        $row_count = pagination_row_num($request->input('page'),config('settings.pagination.per_page'));
        //return $enquiries;

        return view('admin.enquiry.index',compact('enquiries','row_count'));

    }

    /*'
    *
    * View a single enquiry details
    **/

    public function view(Request $request,$enquiryId){

    	$enquiry = \App\Enquiry::find($enquiryId);


    	return view('admin.enquiry.view',compact('enquiry'));

    }
    public function changeStatus(Request $request,$enquiryId){

        $enquiry = \App\Enquiry::find($enquiryId);

        $enquiry->status = $request->input('status');

        $enquiry->update();

        return redirect()->back()->with('success','Enquiry status updated');

    }

    public function delete(Request $request,$enquiryId){


        $enquiry = \App\Enquiry::find($enquiryId);

        if($enquiry){
            $enquiry->delete();
            $request->session()->flash('success','Enquiry Deleted.');
        }

        return redirect()->route('admin::all-enquiries');



    }
}

