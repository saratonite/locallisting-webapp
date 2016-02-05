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


    	$vendors = \App\Vendor::whereHas('categories',function($q) use($cat){

    		$q->where('category_id',$cat);

    	})->get();

    	dd($vendors);

    	return view('site.search');

    }

    public function service_provider(){

    	return view('site.service_provider.profile');

    }
}
