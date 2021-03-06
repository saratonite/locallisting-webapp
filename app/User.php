<?php

namespace App;
use Hash;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name','last_name', 'email', 'password','status','addr_line1','addr_line2','addr_line3','mobile'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function setPasswordAttribute($value){

        $this->attributes['password'] = Hash::make($value);

    }

    public  $statusArray = ['pending','active','blocked'];

    /* Relations */

    public function enquiry(){

        // User sended enquiries

        return $this->hasMany("\App\Enquiry","from_user");
    }

    public function review(){
        
        return $this->hasMany('\App\Review','user_id');
    }

    public function vendor(){

        return $this->hasOne("\App\Vendor","user_id");
    }

    public function image(){
        return $this->hasMany("\App\Image","user_id");
    }

    /* Scope functions */

    public function scopeSiteuser($query){

        $query->where('type','user');

    }

    public function scopeActive($query){
        $query->where('status','active');
    }

    public function scopeByDate($query){

        $query->orderBy('created_at','desc');

    }

    public function scopeByStatus($query,$status){

        if($this->isStatusExists($status)){
            $query->where('status',$status);
        }

    }

    /*Helper functions */

    public function isStatusExists($status=null){
        return in_array($status,$this->statusArray);
    }

    public function scopeStatusarray(){

        return $this->statusArray;

    }

    public function scopeDeleteSiteUser($query){

        // Delete all enquiries made by user
        // Delete all Revies made by user
        // Delete all images by user
        $reviews = $this->review;

        if($reviews->count()){
            foreach($reviews as $r){
                $r->delete();
            }
        }

        $enquiries = $this->enquiry;

        if($enquiries->count()){
            foreach ($enquiries as $e) {
                $e->delete();
            }
        }

        $images = $this->image;

        if($images->count()){
            foreach ($images as $img) {
                $img->deleteFromDisk();
                $img->delete();
            }
        }

        $this->delete();
    }
}
