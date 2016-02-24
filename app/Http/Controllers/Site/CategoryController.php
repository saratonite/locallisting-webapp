<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    


    public function index(){

    	$categories = \App\Category::orderBY('name')->lists('name','id');

    	return view('site.category.index',compact('categories'));
    }
}
