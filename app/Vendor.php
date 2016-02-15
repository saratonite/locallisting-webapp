<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Vendor extends Model
{
    
    protected $table = "vendors";

    protected $fillable = ['vendor_name','description','category_id','city_id','contact_number','mobile','addr_line1','addr_line2','addr_line3','post_code'];



    /*
    
    Relations 
     */
    
    /* Users */
    public function user(){


    	return $this->belongsTo("\App\User","user_id");
    }

    /* Category [Deprecated]*/

    public function category(){


    	return $this->belongsTo("\App\Category","category_id");

    	
    }

    /* Categories */

    public function categories(){

        return $this->hasMany('\App\VendorCategory','vendor_id')->with('category');
    }





    /* City  [Deprected]*/

    public function city(){

    	return $this->belongsTo("\App\City","city_id");

    }

    public function cities(){

        return $this->hasMany("\App\VendorCity","vendor_id");
    }

    public function enquiry(){
        return $this->hasMany("\App\Enquiry","to_vendor");
    }

    public function review(){

        return $this->hasMany("\App\Review","vendor_id");
    }

    public function rating(){

        return $this->hasMany("\App\Review","vendor_id")
            ->select(DB::raw('((rate_price + rate_quality +rate_timeliness + rate_professionalism ) /4) as overall_rate'));
    }

 




    // Vendor profile picture

    public function picture(){
        
        return $this->hasOne("\App\Image",'user_id','user_id')->where('type','=','profile');

    }

    public function logo(){

        return $this->hasOne("\App\Image",'user_id','user_id')->where('type','=','logo');
        

    }

    public function cover(){
        
        return $this->hasOne("\App\Image",'user_id','user_id')->where('type','=','cover');

    }

    public function publicCover(){
        
        return $this->hasOne("\App\Image",'user_id','user_id')->where('type','=','cover');

    }


    // Vendor Images
    public function images(){

        return $this->hasMany('\App\Image','user_id','user_id')->where('type','image');
        
    }



    /* Scope functions */

    public function  latest(){
        return $this->enquiry()->orderBy('id','desc')->limit('5');
    }

    /* Deprecated */
    public function scopeCategoryname(){

    	if($this->category){
    		return $this->category->name;
    	}
    	return "(Uncategorised)";
    }

    public function scopeAddCategories($query, Array $categoryArray){

        if(count($categoryArray)){
            foreach ($categoryArray as $newCategory) {

                $newVendorCategory = new  \App\VendorCategory();
                $newVendorCategory->category_id = $newCategory;
                $this->categories()->save($newVendorCategory);
                
            }
        }

    }

    public function scopeUpdateCategories($query,Array $newCategories){

        // Update Categoires
        $existingCategories = [];
        
        if($this->categories){

            foreach($this->categories as $currentCategory){

                if(in_array($currentCategory->category_id, $newCategories)){

                    $existingCategories[] = $currentCategory->category_id;

                }
                else{
                    $currentCategory->delete();

                }
            }
            
        }

        // Filtered only non existing new categories
        $filterdNewCategories = array_diff($newCategories,$existingCategories);
         // Crete new categories
        if(count($filterdNewCategories)){

            $this->addCategories($filterdNewCategories);
        }

    }

    /**
     * By Category // Using Home page search
     */

    public function scopeByCategory($query,$category){

        $query->whereHas('categories',function($q) use($category){

            $q->where('category_id',$category);

        });

    }

    public function scopeActive($query){
        return $this->user()->active();
    }

    public function scopeOnlyActive($query){

        $query->whereHas('user',function($q){
            $q->where('status','active');
        });

    }

    public function scopeBydate($query){
        $query->orderBy('created_at','DESC');

    }

    public function scopeByStatus($query,$status="pending"){

        $query->whereHas('user',function($q) use($status){
            $q->where('status',$status);
        });

    }

    public function cityname(){
    	if($this->city){
    		return $this->city->name;
    	}
    	return "(No City Specified)";
    }

    public function scopeAddCities($query, Array $citiesArray){

        if(count($citiesArray)){
            foreach ($citiesArray as $newCity) {

                $newVendorCity = new  \App\VendorCity();
                $newVendorCity->city_id = $newCity;
                $this->cities()->save($newVendorCity);
                
            }
        }

    }

    public function scopeUpdateCities($query,Array $newCities){

        // Update Categoires
        $existingCities = [];
        
        if($this->cities){

            foreach($this->cities as $currentCity){

                if(in_array($currentCity->city_id, $newCities)){

                    $existingCities[] = $currentCity->city_id;

                }
                else{
                    $currentCity->delete();

                }
            }
            
        }

        // Filtered only non existing new cities
        $filterdnewCities = array_diff($newCities,$existingCities);
         // Crete new cities
        if(count($filterdnewCities)){
            
            $this->addCities($filterdnewCities);
        }

    }

    public function scopeByCity($query,$city){

        $query->whereHas('cities',function($q) use($city){
            $q->where('city_id',$city);
        });

    }

    public function recentEnquiries(){

        
    }

    public function scopeDeleteVendor($query){

        // Delete user
        // Delete Vendor enquiries
        
        $enquiries = $this->enquiry;
        if($enquiries->count()){
            foreach ($enquiries as $e) {
                $e->delete();
            }
        }
        // Delete Vendor Reviews
        $reviews = $this->review;
        if($reviews->count()){
            foreach ($reviews as $r) {
                $r->delete();
            }
        }
        
        // Delete VedorCategory
        $vendorCategories = $this->categories;
        if($vendorCategories->count()){
            foreach ($vendorCategories as $vc) {
                $vc->delete();
            }
        }
        // Delete VendorCity
        $vendorCities = $this->cities;
        if($vendorCities->count()){
            foreach ($vendorCities as $vc) {
                $vc->delete();
            }
        }

        // Delete user
        $user = $this->user;
        $user->deleteSiteUser();

        $this->delete();
        

    }

}
