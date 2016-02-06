<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Image as ImageManager;

class Image extends Model
{
    

    protected $table = "images";




    // Scopes
    

    /**
     * Delete picture from file
     */
    public function scopeSaveToDisk($query,$file){


    	$imageName = md5(time()).'_'.$file->getClientOriginalName().'.'.$file->getClientOriginalExtension();

        // Creating Year Month based folders
        
        $DatePath = getYearMonthDir(config('settings.uploads.images'));

        // Creating Thnumb nails
        
        $savePath = config('settings.uploads.images')."/".$DatePath.'/';

        if(config('settings.images.thumb') == true){
            ImageManager::make($file->getRealPath())->fit(200,200)->save($savePath.'V200_'.$imageName);
            ImageManager::make($file->getRealPath())->fit(325,175)->save($savePath.'V325_'.$imageName);
        }
        
        

			// Setting Model Property
        	$this->base_dir = $DatePath;
       		$this->mime_type = $file->getMimeType();
        	$this->file_name = $imageName;
        if($file->move($savePath, $imageName)){

        	

        	return true;
        }

        return false;



    }
    public function scopeDeleteFromDisk($query){

    	@unlink(base_path().'/public/'.config('settings.uploads.images').$this->base_dir.'/'.$this->file_name);
    	@unlink(base_path().'/public/'.config('settings.uploads.images').$this->base_dir.'/V200_'.$this->file_name);
    	@unlink(base_path().'/public/'.config('settings.uploads.images').$this->base_dir.'/V325_'.$this->file_name);


    }

}
