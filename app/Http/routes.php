<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('home.index');
});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
});

Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/home', 'HomeController@index');
});


// Admin Dasbord routes
Route::group(['middleware'=>'web','prefix'=>'admin','namespace'=>'Admin','as'=>'admin::'],function(){

	Route::get('/',['uses'=>'DashboardController@getIndex','as'=>'dashboard']);

	// Settings 
	Route::get('settings','SettingsController@index')->name('settings');

	Route::post('change-email','SettingsController@changeemail')->name('change-email');
});