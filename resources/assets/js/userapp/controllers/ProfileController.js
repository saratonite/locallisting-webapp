"use strict";
angular.module("userApp")
.controller('ProfileController',['$scope','meService','toastr',function($scope,meService,toastr){
		
		$scope.content = "Hello Universe";


		
		$scope.content = "Profile";

		$scope.requestCompleted = false;

		$scope.fetchMyProfile = function(){
			meService.profile().then(function(data,status,headers){

				$scope.profile = data.data;
				$scope.requestCompleted = true;

			},function(){

			});
		}

		$scope.updateProfile = function(){

			$scope.requestCompleted = false;
			meService.updateProfile($scope.profile)
			.then(function(data){

				$scope.profile = data.data;
				$scope.requestCompleted = true;
				toastr.success('Profile updated!', 'Nice job!');
				

			},function(){
				toastr.error('Something went wrong!', 'Ooop!');

			});
		}

		if(!$scope.profile){
			$scope.fetchMyProfile();
		}

}]);