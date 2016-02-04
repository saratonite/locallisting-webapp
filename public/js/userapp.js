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
.controller("EditReviewController",["$scope","$routeParams","$location","reviewService","toastr",function($scope,$routeParams,$location,reviewService,toastr){

	$scope.review = false;

	$scope.reviewId = $routeParams.reviewId;

	$scope.getMyReview = function(){

		reviewService.findMyReview($scope.reviewId).then(

			function(response){

				if(response.status == 200){

					$scope.review = response.data;


				}


				$scope.requestCompleted = true;


			},

			function(response){

				$scope.requestCompleted = true;


			}


		);
	}

	$scope.updateReview = function(){
		$scope.serverErrors = false;
		reviewService.updateMyReview($scope.reviewId,$scope.review).then(
			// Success
			function(response){

				if(response.status == 200){

					toastr.success("Review updated");
					$location.path('/myreviews');

				}

			},
			//Error
			function(response){
				if(response.status == 428){
					toastr.error("Validation Error");
					$scope.serverErrors = response.data.errors;
					console.log(response);
				}

				else{
					toastr.error("Network error");
				}

			}

		);
	}

	$scope.getMyReview();

}]);
"use strict";
angular.module("userApp")
.controller("MyReviewController",['$scope','$routeParams','reviewService',function($scope,$routeParams,reviewService){

	$scope.requestCompleted = false;

	$scope.reviews = {};

	$scope.currentPage = parseInt($routeParams.page) || 1;
	$scope.lastPage=1;

	$scope.initPagination = function(){

		$scope.lastPage = $scope.reviews.last_page;

		$scope.nextPage = $scope.lastPage == $scope.currentPage ? false : $scope.currentPage + 1;
		$scope.previousPage = $scope.currentPage==1 ? false:$scope.currentPage - 1;


	}

	



	$scope.getReviews = function(){
		$scope.requestCompleted =false;
		reviewService.getMyReviews($scope.currentPage).then(

			// success
			function(response){

				console.log(response);

				if(response.status == 200){
					$scope.reviews = response.data;

					$scope.initPagination();
					$scope.requestCompleted=true;

				}




			},
			// Error
			function(response){

				$scope.requestCompleted =true;

			}

		);

	}

	$scope.init = function(){

		$scope.getReviews();
	}

	$scope.init();
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
"strict user";
angular.module("userApp")
.factory("reviewService",["api",function(api){

	return {

		/*
		Return a list of athures review
		 */
		 
		getMyReviews:function(page){
			var page = page || 1;
			return api.request("get","api/me/reviews?page="+page);
		},
		findMyReview:function(id){

			var id = id;

			return api.request('get','api/me/reviews/find/'+id);

		},
		updateMyReview:function(id,data){
			var id = id;
			return api.request('put','api/me/reviews/find/'+id,data);
		},

		/*
		 Return vendors reviews
		 */
		getVendorReviews:function(){

		}
	};

}]);
"use strict";
angular.module("userApp")
.factory("vendorService",["api","Upload",function(api,Upload){
	return {
		get:function(){
			return api.request('get','api/me/vendor');
		},
		update:function(data){

			return api.request('put','api/me/vendor',data);

		},
		updatePicture:function(file){


			return Upload.upload({
				url:"api/me/vendor/picture",
				data:{file:file}
			});

		}
	}
}]);
//# sourceMappingURL=userapp.js.map
