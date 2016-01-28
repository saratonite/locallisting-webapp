"use strict";
angular.module("userApp")
	.controller('SettingsController',['$scope','meService','toastr',function($scope,meService,toastr){
		//
		$scope.title = "settings";

		$scope.user = {};
		$scope.init = function(){
			meService.profile().then(function(data,status,headers){

				$scope.user = {"email":data.data.email};
				$scope.requestCompleted = true;

			},function(){

			});
		}

		// Update Password
		$scope.updatePassword = function(){
			$scope.requestCompleted = false;
			meService.updatePassword($scope.user).then(

				function(response){
					// Success callback
					toastr.success("Password updated !!","Nice");
					$scope.requestCompleted =true;

					$scope.user.password = null;
					$scope.user.password_confirmation = null;
					$scope.user.old_password = null;

				},

				function(response){
					// Error callback
					if(response.status == 422){
						var message = response.data.errors.password || response.data.errors.old_password ;
						 console.log(message);
						 message = message[0] || response.data.errors.old_password || "Incorrect data provided";
						 console.log(message);
						 toastr.error(message, 'Ooops!');
						 //toastr.error('Validation error!', 'Ooop!');
					}
					else{
						toastr.error('Something went wrong!', 'Ooop!');
					}
					$scope.requestCompleted =true;

				}

			);
		}

		// Update Email
		$scope.updateEmail = function(){
			$scope.requestCompleted = false;
			meService.updateEmail($scope.user).then(
				function(response){

					// Success callback
					if(response.status == 200){
						toastr.success('Email updated!', 'Cool!');
						$scope.user.email_password = null;
						$scope.user = {"email":response.data.data.email};

					}
					$scope.requestCompleted =true;

				},
				function(response){
					console.log(response);
					// Error callback
					if(response.status == 422){
					var message = response.data.errors.email || response.data.errors.email_password || response.data.errors.email_password;
					console.log(message);
					message = message[0] || "Incorrect data provided";
					toastr.error(message, 'Ooops!');
					}
					else{
						toastr.error('Something went wrong!', 'Ooop!');
					}
						$scope.user.email_password = null;
						$scope.requestCompleted = true;


				}

			);
		}

		$scope.init();


	}]);