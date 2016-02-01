<?php

namespace App\Listeners;


use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

/**
 * Services
 */

use Mail;

/**
 * Events
 */
use App\Events\NewUserRegistered;

class Email
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  NewUserRegistered  $event
     * @return void
     */
    // public function handle(NewUserRegistered $event)
    // {
    //     //
    // }
    
    /**
     *
     *  New User Registartion
     */
    
    public function newUser($data){

        Mail::send('admin.emails.siteuser.register',['user'=>$data->user],function($message) use($data){

            $message->to(strtolower($data->user->email))->subject('Welcome to UAE Home Advisor');

        });

    }

    public function newVendor($data){


    }
    
    /**
     *  Vendor Status Changed Notification
     *   
     */
    public function vendorStatusChanged($data){
        // Send Email to  vendor user email
        

        Mail::send('admin.emails.vendor.statuschanged',['vendor'=>$data->vendor],function($message){

            $message->to('sarathtvmala@gmail.com')->subject('Status Changed');

        });
        


        
        
        // dd($data);

    }
}
