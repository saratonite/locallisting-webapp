<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
    


    public function termsandconditions(){



    	return view('site.terms-conditions');

    }

    public function privacypolicy(){

    	return view('site.privacy-policy');

    }
}
