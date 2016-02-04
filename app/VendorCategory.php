<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VendorCategory extends Model
{
    
    protected $table = "vendor_categories";

    public $timestamps = false;

    public function category(){

    	return $this->belongsTo('\App\Category',"category_id");
    }

    public function vendors(){

    	return $this->belongsTo('\App\Vendors','vendor_id');
    }




}
