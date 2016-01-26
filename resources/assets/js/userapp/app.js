"use strict";

	angular.module("userApp",["ngRoute","angularSpinner"])

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
		.otherwise({
			templateUrl:'app/partials/404'
		});
	});

