<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{

	/**
	 *
	 * List all categories
	 */
    
    public function index(){

    	$categories = \App\Category::paginate(1);



    	return view('admin.category.index',compact('categories'));
    }

    /**
     * Show single category
     */
    
    public function show($catId){

    }

    /**
     * Edit Category
     */
    
    public function edit($catId){

    }

    /**
     * Update category
     */
    public function update(){

    }
}
