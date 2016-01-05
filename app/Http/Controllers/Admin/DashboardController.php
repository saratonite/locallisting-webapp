<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
	// Dashboard page
    public function getIndex(){


    	return view('admin.dashboard');
    }

    public function logout(){

    }
}
