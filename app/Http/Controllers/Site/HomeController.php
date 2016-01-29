<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    

    public function home(){

    	return view('site.home');
    }

    public function search(){

    	return view('site.search');

    }

    public function service_provider(){

    	return view('site.service_provider.profile');

    }
}
