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
Route::group(['middleware'=>['web','auth'],'prefix'=>'admin','namespace'=>'Admin','as'=>'admin::'],function(){

	Route::get('/',['uses'=>'DashboardController@getIndex','as'=>'dashboard']);

	// Settings 
	Route::get('settings','SettingsController@index')->name('settings');

	Route::post('change-email','SettingsController@changeemail')->name('change-email');

	Route::post('change-password','SettingsController@changePassword')->name('change-password');

	/* Vendors */
	Route::get('vendors','VendorController@index')->name('all-vendors');
	
	Route::get('vendors/show/{vendorId}','VendorController@show')->name('vendor-profile');

	Route::put('vendors/change-status/{vendorID}','VendorController@chnageStatus')->name('vendors-change-status');

	Route::get('vendors/{vendorId}/edit','VendorController@edit')->name('edit-vendor');
	Route::put('vendors/{vendorId}/update','VendorController@update')->name('update-vendor');

	/* Users */

	Route::get('siteusers','SiteuserController@getAllUsers')->name('all-site-users');
	Route::get('siteusers/{userId}/view','SiteuserController@view')->name('view-site-user');

	Route::get('siteusers/{userId}/edit','SiteuserController@edit')->name('edit-site-user');
	Route::put('siteusers/{userId}/update','SiteuserController@update')->name('update-site-user');

	Route::put('siteusers/change-status/{userId}','SiteuserController@changeStatus')->name('update-user-status');

	/**
	 *
	 * Enquiry 
	 */

	Route::get('enquiries','EnquiryController@index')->name('all-enquiries');

	Route::get('enquiries/{enquiryId}/view','EnquiryController@view')->name('view-enquiry');

	/**
	 * Categorires
	 */
	
	Route::get('category/all','CategoryController@index')->name('list-category');

	Route::get('category/new','CategoryController@index')->name('new-category');

	/**
	 *
	 * Cities
	 */

	Route::get('city/all','CityController@index')->name('list-cities');
	Route::get('city/add','CityController@addcity')->name('city-add');
	Route::post('city/create','CityController@create');

	

});