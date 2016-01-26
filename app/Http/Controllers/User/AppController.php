<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use View;

class AppController extends Controller
{
    


    public function getPartials($partial = null){

		   $view_path = 'user.app.'.$partial;

		   //dd($view_path);

		  if (View::exists($view_path)) {
		    return View::make($view_path);
		  }

		  abort(404);

    }
}
