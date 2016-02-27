<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class HomeController extends Controller
{
    

    public function home(){

    	$categories = \App\Category::orderBy('name','ASC')->lists('name','id');
    	$cities = \App\City::orderBy('name','ASC')->lists('name','id');


        $featuredVendors = \App\Vendor::featured()->onlyActive()->get();

    	return view('site.home',compact('categories','cities','featuredVendors'));
    }

    public function search(Request $request){

    	$cat = $request->input('category');
    	$city =$request->input('city');


    	$categoriesSide = \App\Category::all();
        $categories = \App\Category::orderBy('name','ASC')->lists('name','id');
    	$cities = \App\City::all();

        $per_page = config('frontrnd.pagination.per_page');


        if(!$cat && !$city){
            $vendors = \App\Vendor::with('picture')->onlyactive()->paginate($per_page);
        }
        elseif($cat && !$city){
            $vendors = \App\Vendor::byCategory($cat)->with('picture')->onlyactive()->paginate($per_page);

        }
        elseif(!$cat && $city){

            $vendors = \App\Vendor::byCity($city)->with('picture')->onlyactive()->paginate($per_page);

        }
        else{
            $vendors = \App\Vendor::byCity($city)->byCategory($cat)->with('picture')->onlyactive()->paginate($per_page);
        }

        $vendors->appends($request->except('page'));

    	return view('site.search',compact('vendors','categories','cities','cat','city','categoriesSide'));

    }

    public function service_provider(Request $request,$vendorId=null,$vendorName=""){

    	$vendor = \App\Vendor::onlyactive()->with(['categories','cities','images'=>function($q){
                $q->where('status','accepted');

        },'review'=>function($q){
                $q->where('status','accepted');
                $q->orderBy('id','DESC');
                $q->with('user');


        }
        ,'cover'])->findOrFail($vendorId);


        $categories = \App\Category::orderBy('name','ASC')->lists('name','id');

    	return view('site.service_provider.profile',compact('vendor','categories'));

    }

    public function confirmemail(Request $request, $code){


        $user = \App\User::where('email_verification',trim($code))->first();

        $alertClass = "danger";

        if($user){
            $user->email_verification = null;
            $user->update();

            $message = "Email Verified Successfully";
            $alertClass ="success";

        }
        else{
            $message= "Invalid Verification Link";
        }

        return view('site.confirm_email.index',compact('alertClass','message'));

    }
}
