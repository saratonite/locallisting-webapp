<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CityController extends Controller
{
    /**
	 *
	 * List all cities
	 */
    
    public function index(){

    	$cities = \App\City::paginate(15);

    

    	return view('admin.city.index',compact('cities'));
    }

    public function addcity(){

        return view('admin.city.add');
    }

    /**
     * Show single City
     */
    
    public function show($cityId){

    }

    /**
     * Edit City
     */
    
    public function edit($cityId){

    }

    /**
     * Update City
     */
    public function update(){
    	
    }
}
