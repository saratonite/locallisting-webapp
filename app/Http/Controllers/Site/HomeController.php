<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    

    public function home(){

    	$categories = \App\Category::orderBy('name','ASC')->lists('name','id');
    	$cities = \App\City::orderBy('name','ASC')->lists('name','id');

    	return view('site.home',compact('categories','cities'));
    }

    public function search(Request $request){

    	$cat = $request->input('category');
    	$city =$request->input('city');


    	$vendors = \App\Vendor::byCategory($cat)->byCity($city)->with('picture')->onlyactive()->paginate(10);

    	return view('site.search',compact('vendors'));

    }

    public function service_provider(Request $request,$vendorId=null,$vendorName=""){

    	$vendor = \App\Vendor::onlyactive()->find($vendorId); 

    	return view('site.service_provider.profile',compact('vendor'));

    }
}
