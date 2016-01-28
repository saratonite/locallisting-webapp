"use strict";
angular.module("userApp")
	.controller('VendorController',['$scope','vendorService',function($scope,vendorService){


		//
		$scope.vendor = false;
		$scope.cities = false;
		$scope.categories = false;

		$scope.vendorProfile = function(){

			vendorService.get().then(
				// Success
				function(response){

					$scope.vendor = response.data.vendor;
					$scope.cities = response.data.cities;
					$scope.categories = response.data.categories;


				},
				// Error
				function(){

				}
			);
		}

		// Init
		$scope.vendorProfile();
		
	}]);