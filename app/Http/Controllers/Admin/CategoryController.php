<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Events\CategoryEdited;
use Event;
use Mail;

class CategoryController extends Controller
{

	/**
	 *
	 * List all categories
	 */
    
    public function index(Request $request){

    	$categories = \App\Category::paginate(config('settings.pagination.per_page'));

        $row_count = pagination_row_num($request->input('page'),config('settings.pagination.per_page'));



    	return view('admin.category.index',compact('categories','row_count'));
    }

    /**
     *
     * 
     */
    
    public function add(){

        return view('admin.category.add');
    }

    /**
     *
     * 
     */
    
    public function create(Request $request){

        $this->validate($request,[
            'name' => 'required',
            'description' => 'required',
            'slug' => 'max:255'
        ]);

        $category = new \App\Category();
        $category->fill($request->all());

        $category->save();


        return redirect()->route('admin::list-category')->with('success','Category added');
        
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




        $category = \App\Category::find($catId);

        //Event::fire(new CategoryEdited($category));
        


        return view('admin.category.edit',compact('category'));

    }

    /**
     * Update category
     */
    public function update(Request $request,$catId){

        $category = \App\Category::findOrFail($catId);

        $this->validate($request,[
            'name' => 'required | max:255',
            'description' => 'max:255',
            'slug' => 'max:255'
        ]);

        $category->fill($request->all());

        if($category->update()){

            $request->session()->flash('success',"Category updated.");
        }

        return redirect()->route('admin::list-category');


    }

    public function delete(Request $request,$catId){

        $category = \App\Category::find($catId);

        if($category){
            $category->delete();
            $request->session()->flash('success','Category deleted');
        }
        return redirect()->back();
    }
}
