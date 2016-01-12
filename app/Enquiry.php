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
     *
     * Helpers
     */
    
    public function getStatuArray(){
    	return $this->statusArray;
    }
}
