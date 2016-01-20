<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    
    protected $table = "vendors";

    protected $fillable = ['vendor_name','description','category_id','city_id','contact_number','mobile'];



    /*
    
    Relations 
     */
    
    /* Users */
    public function user(){


    	return $this->belongsTo("\App\User","user_id");
    }

    /* Category */

    public function category(){


    	return $this->belongsTo("\App\Category","category_id");

    	
    }


    /* City */

    public function city(){

    	return $this->belongsTo("\App\City","city_id");

    }

    public function enquiry(){
        return $this->hasMany("\App\Enquiry","to_vendor");
    }

    /* Scope functions */

    public function  latest(){
        return $this->enquiry()->orderBy('id','desc')->limit('5');
    }

    public function scopeCategoryname(){

    	if($this->category){
    		return $this->category->name;
    	}
    	return "(Uncategorised)";
    }

    public function scopeActive($query){
        return $this->user()->active();
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

    public function recentEnquiries(){

        
    }

}
