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
		.when('/vendor/profile',{
			controller:'VendorController',
			templateUrl:"app/partials/vendor_profile_edit"
		})
		.when('/settings',{
			controller:"SettingsController",
			templateUrl:"app/partials/settings"
		})
		.otherwise({
			templateUrl:'app/partials/404'
		});
	});


"use strict";
angular.module("userApp")
.controller('DashboaredController',['$scope',function($scope){
		
		$scope.content = "Hello Universe";

}]);
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
				

			},function(response,status){
				console.log(response);

				if(response.status == 422){
					toastr.error('Validation error!', 'Ooop!');
				}
				else{
					toastr.error('Something went wrong!', 'Ooop!');
				}
				

				$scope.requestCompleted = true;

			});
		}

		if(!$scope.profile){
			$scope.fetchMyProfile();
		}

}]);
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
"use strict";
angular.module("userApp")
	.controller('DemoController',['$scope',function($scope){
		//
		
	}]);
"use strict";
angular.module("userApp")
.factory("api",["$http",function($http){
	return {

		request:function(httpMethod,url,data){
			return $http({"method":httpMethod,"url":url,"data":data});
		}
	}
}]);
"use strict";
angular.module("userApp")
.factory("categoryService",['api',function(){

}]);
"use strict";
angular.module("userApp")
.factory("meService",["api",function(api){
	return {

		profileData:false,

		setProfileData:function(data){
			this.profileData = data;
			return this.profileData;
		},
		getProfileData:function(){
			return this.profileData;
		},

		profile:function(){
			return api.request('get','api/me');
		},
		updateProfile:function(data){

			return api.request('put','api/me',data);

		},

		// Settings
		updatePassword:function(data){

			return api.request('put','api/me/changepassword',data);

		},
		updateEmail:function(data){

			return api.request('put','api/me/changeemail',data);


		}
	}
}]);
"use strict";
angular.module("userApp")
.factory("vendorService",["api",function(api){
	return {
		get:function(){
			return api.request('get','api/me/vendor');
		},
		update:function(data){

			return api.request('put','api/me/vendor',data);

		}
	}
}]);
//# sourceMappingURL=userapp.js.map
