<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VendorCity extends Model
{
    

    protected $table = "vendor_cities";

    public $timestamps = false;

    public function vendor(){

    	return $this->belongsTo('\App\Vendor',"vendor_id");
    }

    public function city(){

    	return $this->belongsTo("\App\City","city_id");
    }
}
