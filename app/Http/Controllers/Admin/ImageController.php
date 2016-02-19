<?php

/**
 * @package Locallisting\Admin
 * @author Sarath <sarathtvmala@gmail.com>
 * @descriptionm Admin area image controller , basic CRUD and file operations
 */

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Validator;


class ImageController extends Controller
{
    

    public function index(Request $request,$ImageStatus=null){


        $per_page = config('settings.pagination.per_page');


    	$images = \App\Image::with('user')->orderBy('id','DESC')->paginate($per_page);

        $row_count = pagination_row_num($request->input('page'),$per_page);

        return view('admin.images.index',compact('images','row_count'));
    }

    public function show($ImageId =null){

    	$image = \App\Image::findOrFail($ImageId);
    	return view('admin.images.show',compact('image'));

    }

    public function edit($imageId){

    	$image = \App\Image::findOrFail($imageId);
    	return view('admin.images.edit',compact('image'));

    }

    public function update(Request $request, $imageId){

    	$image = \App\Image::findOrFail($imageId);

    	$image->title = $request->input('title');
    	$image->description = $request->input('description');

    	$image->update();

    	return redirect()->back()->with('Image updated');


    }

    public function changeStatus(Request $request , $imageId){

    	$image = \App\Image::find($imageId);

    	if(!$image){
    		return redirect()->back();
    	}
    	$image->status = $request->input('action');

    	$image->update();

    	return redirect()->back()->with('success','Status changed');

    }

    public function delete(Request $request,$imageId){

    	$image = \App\Image::find($imageId);

    	if($image){

    		$image->deleteFromDisk();
    		$image->delete();
    	}

    	return redirect()->route('admin::list-images');

    }
}
