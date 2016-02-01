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

    	return "review::show".$reviewId;
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

    	return redirect()->back();

    }
}
