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
    
});

Route::group(['middleware'=>['web'],'namespace'=>'Site'],function(){

	Route::get('/','HomeController@home');
	Route::get('search','HomeController@search')->name('search');
	Route::get('service_provider/{vendorId}','HomeController@service_provider')->name('profile');


	// Auth pages
	Route::get('service_provider/{vendorID}/submit_review',['middleware'=>'auth','uses'=>'ReviewController@writeReview'])->name('submit_review');
	Route::post('service_provider/{vendorID}/submit_review',['middleware'=>'auth','uses'=>'ReviewController@submitReview']);
	
	// Route::post('service_provider/{vendorID}/reviews',['middleware'=>'auth','uses'=>'VendorController@reviews']);
	// Route::post('service_provider/{vendorID}/images',['middleware'=>'auth','uses'=>'VendorController@images']);


	Route::get('service_provider/{vendorID}/contact',['middleware'=>'auth','uses'=>'EnquiryController@contact'])->name('submit-enquiry');
	Route::post('service_provider/{vendorID}/contact',['middleware'=>'auth','uses'=>'EnquiryController@submitContact'])->name('submit-contact');

	Route::get('post_requirements',['middleware'=>'auth','uses'=>'EnquiryController@postRequirements'])->name('post-requirement');
	Route::post('post_requirements',['middleware'=>'auth','uses'=>'EnquiryController@proccessPostRequirements']);


	Route::get('categories','CategoryController@index')->name('categories');

	Route::get('terms-conditions','PageController@termsandconditions')->name('terms-conditions');
	Route::get('privacy-policy','PageController@privacypolicy')->name('privacy-policy');



	// User Registration
	Route::get('signup',['middleware'=>['guest'],'uses'=>'RegistrationController@userSignup'])->name('user-signup');
	Route::post('signup',['middleware'=>['guest'],'uses'=>'RegistrationController@userSignupProcess'])->name('user-signup-process');

	Route::get('service-signup',['middleware'=>['guest'],'uses'=>'RegistrationController@vendorSignup'])->name('vendor-signup');
	Route::post('service-signup',['middleware'=>['guest'],'uses'=>'RegistrationController@vendorSignupProcess'])->name('vendor-signup-process');

	Route::get('confirm_email/{code}','HomeController@confirmemail')->name('confirm-email');

	Route::post('subscribe','HomeController@subscribe');
	Route::post('unsubscribe','HomeController@subscribe')->name('unsubscribe');

	Route::get('about-us','HomeController@about')->name('about');
	Route::get('sitemap','HomeController@sitemap')->name('sitemap');


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

Route::group(['middleware' => ['web','redirectByType']], function () {
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
	
	Route::put('vendors/setfeatured/{vendorID}','VendorController@setfeatured');
	Route::put('vendors/unsetfeatured/{vendorID}','VendorController@unsetfeatured');
	Route::delete('vendors/delete/{vendorID}','VendorController@delete')->name('delete-vendor');

	Route::get('vendors/{vendorId}/edit','VendorController@edit')->name('edit-vendor');
	Route::put('vendors/{vendorId}/update','VendorController@update')->name('update-vendor');

		// Feature image
		Route::post('vendors/{vendorId}/upload-picture','VendorController@uploadPicture')->name('update-vendor-picture');
		Route::delete('vendors/{vendorId}/remove-picture/','VendorController@deletePicture')->name('delete-vendor-picture');
		// Logo
		Route::post('vendors/{vendorId}/upload-logo','VendorController@uploadLogo')->name('update-vendor-logo');
		Route::delete('vendors/{vendorId}/remove-logo/','VendorController@deleteLogo')->name('delete-vendor-logo');
		// Cover
		Route::post('vendors/{vendorId}/upload-cover','VendorController@uploadCover')->name('update-vendor-cover');
		Route::delete('vendors/{vendorId}/remove-cover/','VendorController@deleteCover')->name('delete-vendor-cover');

	Route::get('vendors/{vendorId}/enquiries/{status?}','VendorController@enquiries')->name('vendor-enquiries');
	
	Route::get('vendors/{vendorId}/reviews/{status?}','VendorController@reviews')->name('vendor-reviews');
	Route::get('vendors/{vendorId}/images/{status?}','VendorController@images')->name('vendor-images');

	/* Users */

	Route::get('siteusers','SiteuserController@getAllUsers')->name('all-site-users');
	Route::get('siteusers/pending','SiteuserController@pending')->name('pending-site-users');
	Route::get('siteusers/active','SiteuserController@accepted')->name('active-site-users');
	Route::get('siteusers/blocked','SiteuserController@blocked')->name('blocked-site-users');
	Route::get('siteusers/{userId}/view','SiteuserController@view')->name('view-site-user');

	Route::get('siteusers/{userId}/edit','SiteuserController@edit')->name('edit-site-user');
	Route::put('siteusers/{userId}/update','SiteuserController@update')->name('update-site-user');

	Route::put('siteusers/change-status/{userId}','SiteuserController@changeStatus')->name('update-user-status');

	Route::delete('siteusers/delete/{userId}','SiteuserController@delete')->name('delete-user');

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
	Route::delete('enquiries/delete/{enquiryId}','EnquiryController@delete')->name('delete-enquiry');

	
	/**
	 *
	 * Reviews
	 */
	
	Route::get('reviews/{status?}','ReviewController@index')->name('list-reviews');
	Route::get('reviews/{reviewId}/show','ReviewController@show')->name('show-review');
	Route::put('reviews/change-status/{reviewId}','ReviewController@changeStatus')->name('review-chnage-status');
	Route::delete('reviews/delete/{reviewId}','ReviewController@delete')->name('review-delete');


	/**
	 * Images 
	 */
	
	Route::get('images/{status?}','ImageController@index')->name('list-images');
	Route::get('images/show/{imageID}','ImageController@show')->name('show-image');
	Route::put('images/change-status/{imageID}','ImageController@changeStatus')->name('edit-image');
	Route::get('images/edit/{imageID}','ImageController@edit')->name('edit-image');
	Route::put('images/update/{imageID}','ImageController@update')->name('update-image');
	Route::delete('images/delete/{imageID}','ImageController@delete')->name('delete-image');
	

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


	Route::get('subscribers','SubscriberController@index')->name('subscribers');

	Route::post('subscribers/new','SubscriberController@store')->name('store-subscriber');

	Route::delete('subscribers/delete/{subid}','SubscriberController@delete')->name('store-subscribers');

	Route::post('subscribers/sendnl','SubscriberController@sendNewsLetter')->name('sendnl');




	

});

// User Account section

Route::group(['middleware'=>['web','auth'],'prefix'=>'account','namespace'=>"User","as"=>"account::"],function(){
	
	Route::get('/',"ProfileController@index");

	// Profile
	Route::get('profile','ProfileController@show')->name('profile');

	// Test App
	Route::get('app','ProfileController@test')->name('appHome');

	// AppView Getter
	
	Route::get('app/partials/{partial?}','AppController@getPartials');


	// API Routes
	
	Route::get('api/me','ProfileController@myprofile');
	Route::put('api/me','ProfileController@updateMyprofile');

	// My Reviews
	Route::get('api/me/reviews','ReviewController@getReviewsByMe');
	Route::get('api/me/reviews/find/{reviewId}','ReviewController@getMyReview');
	Route::put('api/me/reviews/find/{reviewId}','ReviewController@updateMyReview');
	Route::delete('api/me/reviews/delete/{reviewId}','ReviewController@delete');



	Route::get('api/me/vendor','VendorController@profile');
	Route::put('api/me/vendor','VendorController@update');
	Route::post('api/me/vendor/logo','VendorController@updateLogo');
	Route::delete('api/me/vendor/logo',['middleware'=>'api','uses'=>'VendorController@removeLogo']);


	Route::get('api/me/vendor/banner-picture',['middleware'=>'api','uses'=>'VendorController@bannerAndPicture']);

	Route::post('api/me/vendor/banner','VendorController@updateBanner');
	Route::delete('api/me/vendor/banner',['middleware'=>'api','uses'=>'VendorController@removeBanner']);
	Route::post('api/me/vendor/picture','VendorController@updatePicture');
	Route::delete('api/me/vendor/picture',['middleware'=>'api','uses'=>'VendorController@removePicture']);
	// Vendor Images
	Route::get('api/me/images','ImageController@getMyImages');
	Route::post('api/me/images/upload','ImageController@doUpload');
	Route::delete('api/me/images/delete/{imageId}','ImageController@delete');
	Route::get('api/me/images/get/{imageId}','ImageController@getImage');
	Route::put('api/me/images/update/{imageId}','ImageController@updateImage');



	// API Settings
	Route::put('api/me/changepassword','SettingsController@updatePassword');
	Route::put('api/me/changeemail','SettingsController@updateEmail');





});