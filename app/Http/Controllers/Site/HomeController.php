<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

use Validator;

class HomeController extends Controller
{
    

    public function home(){

    	$categories = \App\Category::orderBy('name','ASC')->lists('name','id');
    	$cities = \App\City::orderBy('name','ASC')->lists('name','id');


        $featuredVendors = \App\Vendor::featured()->onlyActive()->get();

        $topCats = \App\VendorCategory::select('category_id', DB::raw('count(*) as total'))->groupby('category_id')->orderBy('total','DESC')->limit(6)->get();


        // get featured reviews
        
        $featuredReviews = \App\Review::featured()->limit(4)->orderBy("id","desc")->get();





    	return view('site.home',compact('categories','cities','featuredVendors','topCats','featuredReviews'));
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


        // Getting Current Search category info
        $searchCategoryName = false;
        if($cat){

            $searchCategory = \App\Category::find($cat);

            if($searchCategory){

                $searchCategoryName = $searchCategory->name;

            }
        }

    	return view('site.search',compact('vendors','categories','cities','cat','city','categoriesSide','searchCategoryName'));

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

        $categories = \App\Category::orderBy('name','ASC')->lists('name','id');

        return view('site.confirm_email.index',compact('alertClass','message','categories'));

    }


    public function subscribe(Request $request){

        $v =  Validator::make($request->all(),[
            'email'=>'required | email'
        ]);


        $email = strtolower(trim($request->input('email')));



        

        if($v->fails()){

            return response()->json(['errors'=>$v->errors(),'message'=>'Invalid Email Address'])->setStatusCode(422);
        }

        // check email already existing 
        $ex = \App\Subscriber::where('email',$email)->first();

        if(!$ex){

            $sub = new \App\Subscriber();
            $sub->email = $email;

            $sub->save();

        }
        // if not Save

        return response()->json(['message'=>'Thank you for subscribing news letter']);

    }

    public function about(){

        $categories = \App\Category::orderBy('name','ASC')->lists('name','id');
        
        return view('site.about',compact('categories'));
    }

    public function sitemap(){

        $categories = \App\Category::orderBy('name','ASC')->lists('name','id');
        return view('site.sitemap',compact('categories'));


    }

    public function helpandsupport(){


        return view('site.helpandsupport');

    }


    public function faq(){
        return view('site.faq');
    }

    public function contactus(){



        return view('site.contact_us');
    }


}
