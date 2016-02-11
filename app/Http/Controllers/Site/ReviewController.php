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

    public function submitReview(){


    	$categories = \App\Category::orderBy('name','ASC')->lists('name','id');



    }
}
