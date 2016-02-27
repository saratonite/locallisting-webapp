<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Auth;
use Validator;

class ReviewController extends Controller
{

	/** API Methods */
    
    /**
     * [getReviewsByMe description]
     * @return [type] [description]
     */
    public function getReviewsByMe(){

    	$reviews = \App\Review::orderBy('id','desc')->byuser(Auth::user()->id)->with('vendor')->paginate(2);

    	return $reviews;



    }

    public function getMyReview($id=null){

    	$review = \App\Review::where('id',$id)->byuser(Auth::user()->id)->with('vendor')->first();

    	if($review)
    	{
    		return $review;
    	}

    	return response()->json(['message','Not found'])->setStatusCode(404);

    }

     public function updateMyReview(Request $request,$id=null){

    	$review = \App\Review::where('id',$id)->byuser(Auth::user()->id)->with('vendor')->first();

    	if($review)
    	{
    		// Validate
    		$v = Validator::make($request->all(),
    			[
    				'title' => 'required | min:3,max:255',
    				'body' => 'required | min:10',
    				'rate_price' => 'required|numeric|between:1,5',
    				'rate_timeliness' => 'required|numeric|between:1,5',
    				'rate_quality' => 'required|numeric|between:1,5',
    				'rate_professionalism' => 'required|numeric|between:1,5'
    			]
    		);

    		if($v->fails()){

    			return response()->json(['errors'=>$v->errors()])->setStatusCode(428);
    		}
    		
    		// Save
    		
    		$review->fill($request->only('title','body','rate_price','rate_timeliness','rate_quality','rate_professionalism'));
    		$review->status = "pending";
    		$review->update();
    		return $review;
    	}

    	return response()->json(['message','Not found'])->setStatusCode(404);

    }

    public function delete($id){

        $review = \App\Review::where('id',$id)->byuser(Auth::user()->id)->with('vendor')->first();

        if($review){
            $review->delete();

            return response()->json(['message','Review Deleted'])->setStatusCode(200);
        }

            return response()->json(['message','Unable to find revie']);


    }
     /* For vendors - their user
     */
    public function getMyUserReviews(){



    }
}
