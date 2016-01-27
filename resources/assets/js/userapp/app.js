"use strict";

	angular.module("userApp",["ngRoute","ngAnimate","ngMessages","angularSpinner","toastr"])

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
		.when('/settings',{
			controller:"SettingsController",
			templateUrl:"app/partials/settings"
		})
		.otherwise({
			templateUrl:'app/partials/404'
		});
	});

