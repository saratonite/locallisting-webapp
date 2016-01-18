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

    	$cities = \App\City::paginate(config('settings.pagination.per_page'));

    

    	return view('admin.city.index',compact('cities'));
    }

    /**
     *  Show create form
     */

    public function addcity(){

        return view('admin.city.add');
    }

    /**
     * Create new city
     */
    
    public function create(Request $request){

        $this->validate($request,[
            'name' => 'required | max:255',
            'description' => 'max:255',
            'slug' => 'max:255'
        ]);

        $city = \App\City::create($request->all());

        return redirect()->back()->with('success','City added');

    }

    /**
     * Show single City
     */
    
    public function show($cityId){

    }

    /**
     * Edit City
     */
    
    public function edit($cityId = null){

        $city = \App\City::find($cityId);

        return view('admin.city.edit',compact('city'));

    }

    /**
     * Update City
     */
    public function update(Request $request,$cityId){

        $city = \App\City::find($cityId);

        $this->validate($request,[
            'name' => 'required | max:255',
            'description' => 'max:255',
            'slug' => 'max:255'
        ]);

        $city->fill($request->all());

        $city->update();

        return redirect()->back()->with('success','City updated');




    }
}
