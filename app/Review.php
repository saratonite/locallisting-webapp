<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    
    protected $table = "reviews";

    protected $statusArray = ['pending','accepted','rejected'];

    protected $fillable = ['title','body','rate_price','rate_timeliness','rate_quality','rate_professionalism'];


    // Relations
    
    public function user(){
    	return $this->belongsTo('\App\User','user_id');
    }
    

    public function vendor(){

    	return $this->belongsTo('\App\Vendor','vendor_id');
    }


    // Scopes
    
    public function scopeByDate($query){
    	$query->orderBy('created_at','DESC');
    }

    public function scopeByStatus($query,$status=null){

    	if($status && in_array($status,$this->statusArray)){
    		$query->where('status',$status);
    	}
    }

    public function scopeByUser($query,$user_id=false){

        if($user_id){
            $query->where('user_id',$user_id);
        }

    }

    public function scopeByVendor($query,$vendor=false){

        if($vendor){
            $query->where('vendor_id',$vendor_id);
        }

    }

    // Helpers
    
    public function statusArray(){
    	return $this->statusArray;
    }

    public function validStatus($status=null){
        return in_array($status, $this->statusArray);
    }

    
}
