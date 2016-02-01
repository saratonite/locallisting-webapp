<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    
    protected $table = "vendors";

    protected $fillable = ['vendor_name','description','category_id','city_id','contact_number','mobile','addr_line1','addr_line2','addr_line3','zip_code'];



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

    public function review(){

        return $this->hasMany("\App\Review","vendor_id");
    }


    // Vendor profile picture

    public function picture(){

        return $this->hasOne("\App\Image",'user_id','user_id')->where('type','=','profile');

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
