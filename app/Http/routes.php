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
    return view('site.home');
});

Route::get('/home', function () {
    return view('site.home');
});
Route::get('search',function(){
	return view('site.search');

})->name('search');

Route::get('service_provider/red-earth-gardening',function(){
	return view('site.service_provider.profile');
})->name('profile');


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
Route::group(['middleware'=>['web','auth','superadmin'],'prefix'=>'admin','namespace'=>'Admin','as'=>'admin::'],function(){

	Route::get('/',['uses'=>'DashboardController@getIndex','as'=>'dashboard']);

	// Settings 
	Route::get('settings','SettingsController@index')->name('settings');

	Route::post('change-email','SettingsController@changeemail')->name('change-email');

	Route::post('change-password','SettingsController@changePassword')->name('change-password');

	/* Vendors */
	Route::get('vendors','VendorController@index')->name('all-vendors');
	Route::get('vendors/pending','VendorController@pending')->name('pending-vendors');
	Route::get('vendors/accepted','VendorController@accepted')->name('accepted-vendors');
	Route::get('vendors/blocked','VendorController@blocked')->name('blocked-vendors');
	
	Route::get('vendors/show/{vendorId}','VendorController@show')->name('vendor-profile');

	Route::put('vendors/change-status/{vendorID}','VendorController@chnageStatus')->name('vendors-change-status');

	Route::get('vendors/{vendorId}/edit','VendorController@edit')->name('edit-vendor');
	Route::put('vendors/{vendorId}/update','VendorController@update')->name('update-vendor');

	Route::get('vendors/{vendorId}/enquiries/{status?}','VendorController@enquiries')->name('vendor-enquiries');

	/* Users */

	Route::get('siteusers','SiteuserController@getAllUsers')->name('all-site-users');
	Route::get('siteusers/pending','SiteuserController@pending')->name('pending-site-users');
	Route::get('siteusers/active','SiteuserController@accepted')->name('active-site-users');
	Route::get('siteusers/blocked','SiteuserController@blocked')->name('blocked-site-users');
	Route::get('siteusers/{userId}/view','SiteuserController@view')->name('view-site-user');

	Route::get('siteusers/{userId}/edit','SiteuserController@edit')->name('edit-site-user');
	Route::put('siteusers/{userId}/update','SiteuserController@update')->name('update-site-user');

	Route::put('siteusers/change-status/{userId}','SiteuserController@changeStatus')->name('update-user-status');

	/**
	 *
	 * Enquiry 
	 */

	Route::get('enquiries','EnquiryController@index')->name('all-enquiries');
	Route::get('enquiries/accepted','EnquiryController@accepted')->name('accepted-enquiries');
	Route::get('enquiries/pending','EnquiryController@pending')->name('pending-enquiries');
	Route::get('enquiries/rejected','EnquiryController@rejected')->name('rejected-enquiries');

	Route::get('enquiries/{enquiryId}/view','EnquiryController@view')->name('view-enquiry');
	
	Route::put('enquiries/change-status/{enquiryId}','EnquiryController@changeStatus')->name('update-enquiry-enquiry');

	/**
	 * Categorires
	 */
	
	Route::get('category/all','CategoryController@index')->name('list-category');

	Route::get('category/new','CategoryController@add')->name('new-category');
	
	Route::post('category/new','CategoryController@create')->name('category-create');
	
	Route::get('category/{catId}/edit','CategoryController@edit')->name('category-edit');
	
	Route::put('category/{catId}/update','CategoryController@update')->name('category-update');

	Route::delete('category/delete/{catId}','CategoryController@delete')->name('category-delete');

	/**
	 *
	 * Cities
	 */

	Route::get('city/all','CityController@index')->name('list-cities');
	Route::get('city/add','CityController@addcity')->name('city-add');
	Route::post('city/create','CityController@create')->name('city-create');

	Route::get('city/{cityId}/edit','CityController@edit')->name('city-edit');
	Route::put('city/{cityId}/update','CityController@update')->name('city-update');
	Route::delete('city/delete/{cityId}','CityController@delete')->name('city-delete');

	

});


Route::group(['middleware'=>['web','auth'],'prefix'=>'account','namespace'=>"User","as"=>"account::"],function(){
	
	Route::get('/',"ProfileController@index");

	// Profile
	Route::get('profile','ProfileController@show')->name('profile');

	// Test App
	Route::get('app','ProfileController@test')->name('test');

	// AppView Getter
	
	Route::get('app/partials/{partial?}','AppController@getPartials');


	// API Routes
	
	Route::get('api/me','ProfileController@myprofile');
	Route::put('api/me','ProfileController@updateMyprofile');



});