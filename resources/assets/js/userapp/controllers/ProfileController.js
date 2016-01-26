"use strict";
angular.module("userApp")
.controller('ProfileController',['$scope','meService',function($scope,meService){
		
		$scope.content = "Hello Universe";


		
		$scope.content = "Profile";

		$scope.fetchMyProfile = function(){
			meService.profile().then(function(data,status,headers){

				$scope.profile = data.data;

			},function(){

			});
		}

		$scope.updateProfile = function(){

			meService.updateProfile($scope.profile);
		}

		if(!$scope.profile){
			$scope.fetchMyProfile();
		}

}]);