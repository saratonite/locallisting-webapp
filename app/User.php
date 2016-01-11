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
        'name', 'email', 'password',
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

    /* Relations */

    public function enquiry(){

        // User sended enquiries

        return $this->hasMany("\App\Enquiry","from_user");
    }

    /* Scope functions */

    public function scopeSiteuser($query){

        $query->where('type','user');

    }

    public function scopeActive($query){
        $query->where('status','active');
    }
}
