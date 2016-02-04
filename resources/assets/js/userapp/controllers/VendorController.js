"use strict";
angular.module("userApp")
	.controller('VendorController',['$scope','vendorService','toastr','Upload',function($scope,vendorService,toastr,Upload){


		//
		$scope.vendor = false;
		$scope.cities = false;
		$scope.categories = false;

		$scope.serverErrors = false;

		$scope.requestCompleted = false;

		$scope.parseVendorCategories = function(categories){

			var categoryIds = [];

			if(categories.length){

				angular.forEach(categories,function(category){

					categoryIds.push(category.category_id);

				});
			}

			console.log(categoryIds);

			return categoryIds;

		}

		$scope.parseVendorCities = function(cities){

			var citiIds = [];

			if(cities.length){

				angular.forEach(cities,function(city){

					citiIds.push(city.city_id);

				});
			}

			console.log(citiIds);

			return citiIds;

		}

		$scope.vendorProfile = function(){

			vendorService.get().then(
				// Success
				function(response){

					$scope.vendor = response.data.vendor;
					$scope.vendor.categories = $scope.parseVendorCategories($scope.vendor.categories);
					$scope.vendor.cities = $scope.parseVendorCities($scope.vendor.cities);
					$scope.cities = response.data.cities;
					$scope.categories = response.data.categories;
					$scope.requestCompleted = true;
					//$('select').select2();
					//
					$scope.queryOptions = {
        query: function (query) {
            var data = $scope.vendor.categories;

            query.callback(data);
        }
    	};


				},
				// Error
				function(xhr){


				}
			);
		}

		$scope.updateProfile = function(){
			$scope.requestCompleted = false;
			$scope.serverErrors = false;
			vendorService.update($scope.vendor).then(
				function(response){

					console.log(response);
					// if ok
					if(response.status == 200){
						$scope.vendor = response.data.vendor;
						$scope.vendor.categories = $scope.parseVendorCategories($scope.vendor.categories);
						$scope.vendor.cities = $scope.parseVendorCities($scope.vendor.cities);
						$scope.cities = response.data.cities;
						$scope.categories = response.data.categories;
						toastr.success("Profile updated","Great");
						//$('select').select2();

					}
					$scope.requestCompleted = true;

				},
				function(xhr){
					console.log("Error",xhr);
					// check errors
					if(xhr.status == 422){
						toastr.error("Please fill correct data","Validation errors");
						$scope.serverErrors = xhr.data.errors;

					}
					$scope.requestCompleted = true;

				}
			);
		}

		// Update profile picture
		$scope.updatePic = function(){
			vendorService.updatePicture($scope.file).then(
				function(response){

					if(response.status==200){
						toastr.success('Profile Picture Updated!');
					}

				},
				function(xhr){

				}
			);

		}

		// Init
		$(function(){
			$scope.vendorProfile();
			//$('select').select2();
		});
		
		
	}]);