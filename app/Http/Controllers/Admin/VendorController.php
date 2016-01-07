<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class VendorController extends Controller
{
    

    public function index(){


    	$vendors = \App\Vendor::all();

    	return view('admin.vendor.index',compact('vendors'));
    }
}
