<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ApiSupportController extends Controller
{
    /**
     * /
     * @return [type] [description]
     */
    public function getCategories(){
    	 // Todo only active Categories
    	 
    	 $categories = \App\Category::all();
    	 return $categories;
    }

    /**
     *  get Cities
     */
    
    public function getCities(){

    	$cities = \App\Citi::all();

    	return $cities;
    }

}
