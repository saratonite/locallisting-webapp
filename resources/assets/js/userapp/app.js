"use strict";

	angular.module("userApp",["ngRoute","ngAnimate","ngMessages","angularSpinner","toastr","ngFileUpload"])

	.config(function($routeProvider){
		
		$routeProvider.when('/',{
			controller:'DashboaredController',
			templateUrl:'app/partials/home'
		}).
		when('/profile',{
			controller:'ProfileController',
			templateUrl:'app/partials/profile'
		})
		.when('/profile/edit',{
			controller:'ProfileController',
			templateUrl:'app/partials/profile_edit'
		})
		.when('/myreviews/:page?',{
			controller:'MyReviewController',
			templateUrl:'app/partials/myreviews'
		})
		.when('/myreviews/edit/:reviewId',{
			controller:'EditReviewController',
			templateUrl:'app/partials/myreviews_edit'
		})
		.when('/vendor/profile',{
			controller:'VendorController',
			templateUrl:"app/partials/vendor_profile_edit"
		})
		.when('/vendor/images/:page?',{
			controller:'ImagesController',
			templateUrl:"app/partials/images"
		})
		.when('/vendor/images/edit/:imageId',{
			controller:"ImageController",
			templateUrl:'app/partials/image_edit'
		})
		.when('/settings',{
			controller:"SettingsController",
			templateUrl:"app/partials/settings"
		})
		.otherwise({
			templateUrl:'app/partials/404'
		});

		
	})

	// Http interceptor

	.config(function($httpProvider){

		$httpProvider.interceptors.push(function(){
			return {
				response:function(response){

					return response;
				},
				responseError:function(response){

					if(response.status == 302){
						alert("Unauthorized");
						window.location.href = "/login";

					}
					if(response.status==405){
						window.location.href = "/login";
					}
				}
			}
		});

	});

