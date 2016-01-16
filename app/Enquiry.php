<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Enquiry extends Model
{
    protected $table = "enquiries";

    /**
     *
     *  Additional data
     */
    
    public $statusArray = ['pending','accepted','rejected','spam'];



    /* Relations */

    public function from(){

    	return $this->belongsTo('\App\User','from_user');
    }

    public function vendor(){
    	return $this->belongsTo("\App\Vendor","to_vendor");
    }


    /**
     * Scopes
     */
    
    public function scopeByDate($query){

        $query->orderBy('created_at',"DESC");

    }
    
    public function scopeByStatus($query,$status = null){

        if(!is_null($status) && $this->isValidStatus($status)){
            $query->where('status',$status);
        }

    }
    
    

    /**
     *
     * Helpers
     */
    
    public function getStatuArray(){
    	return $this->statusArray;
    }

    public function isValidStatus($status=null){
        return in_array($status, $this->statusArray);
    }
}
