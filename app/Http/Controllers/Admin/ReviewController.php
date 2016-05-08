<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ReviewController extends Controller
{
    /**
     * List all reviews
     */

    public function index(Request $request,$status=null){

    	$reviews = \App\Review::byDate()->bystatus($status)->paginate(config('settings.pagination.per_page'));

    	$row_count = pagination_row_num($request->input('page'),config('settings.pagination.per_page'));

    	return view('admin.reviews.index',compact('reviews','row_count'));
    }

    /**
     *
     * Show Single Review
     */

    public function show($reviewId=null){


    	$review = \App\Review::findOrfail($reviewId);

    	return view('admin.reviews.show',compact('review'));
    }

    /**
     *
     * Change Status
     */

    public function changeStatus(Request $request,$reviewId=null){

    	$review = \App\Review::find($reviewId);
    	if(!$review){
    		return  redirect()->back();

    	}

    	$status = $request->input('action');

    	// Check valid status
    	
    	if($status && $review->validStatus($status)){
    		$review->status = $status;
    		$review->update();
    	}

        //  -- Calculate / Update Vendor rating ---
        $vendor = \App\Vendor::find($review->vendor_id);
        if($vendor){
           $vendor->rate = $vendor->rating->avg('overall_rate');
           $vendor->update();
        }

    	return redirect()->back();

    }

    public function changeFeatured(Request $request,$reviewId){

        $review = \App\Review::find($reviewId);

        //dd($review);

        if($review){

            if($review->featured == 1){

                $review->featured = 0;

            }
            else{

                $review->featured = 1;

            }

            $review->save();
        }

        return redirect()->back();
    }

    public function delete(Request $request , $reviewId){



        $review = \App\Review::find($reviewId);
        if(!$review){
            return  redirect()->back();

        }

        if($review->vendor){

            //  -- Calculate / Update Vendor rating ---
            $vendor = $review->vendor;
                if($vendor){
                   $vendor->rate = $vendor->rating->avg('overall_rate');
                   $vendor->update();
                }


        }

        $review->delete();


        return redirect()->route('admin::list-reviews')->with('success','Review deleted');



    }
}
