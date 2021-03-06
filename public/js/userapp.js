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
		.when('/vendor/profile/bannerandimage',{
			controller:'BannerAndImage',
			templateUrl:'app/partials/banner'
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


angular.module('userApp')
.controller('BannerAndImage',['$scope','profileImageService',function($scope,profileImageService){

	$scope.fetchData = function(){
		profileImageService.getData().then(

			function(response){

				if(response.status == 200){
					$scope.vendor = response.data;
				}

			},
			function(){

			}

		);
	}


	$scope.updateBanner = function(){


		profileImageService.updateBanner($scope.file_banner).then(
			function(response){

				if(response.status == 200){
					$scope.vendor = response.data;
				}

			},
			function(){

			}
		);


	}




	$scope.updatePic = function(){

		profileImageService.updatepPicture($scope.file).then(
			function(response){



			},
			function(response){

			}
		);

	}




	// Init
	$scope.fetchData();


}]);
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
angular.module('userApp')

.controller('ImageController',['$scope','$routeParams','toastr','imageService',function($scope,$routeParams,toastr,imageService){

	$scope.imageId = $routeParams.imageId;

	$scope.image = false;

	$scope.fetchImage = function(){
		 imageService.getImage($scope.imageId).then(
		 	function(response){

		 		if(response.status == 200){

		 			$scope.image = response.data;

		 			console.info($scope.image);


		 		}

		 		$scope.requestCompleted = true;

		 	},
		 	function(){
		 		$scope.requestCompleted = true;

		 	}
		 );
	}

	$scope.update = function(){


		imageService.update($scope.imageId,$scope.image).then(
			function(response){

		 		if(response.status == 200){

		 			$scope.image = response.data;

		 			toastr.success('Image updated');


		 		}

		 		$scope.requestCompleted = true;

		 	},
		 	function(){
		 		$scope.requestCompleted = true;

		 	});
	}

	$scope.fetchImage();
	
}]);
angular.module('userApp')

.controller('ImagesController',['$scope','$routeParams','toastr','imageService',function($scope,$routeParams,toastr,imageService){

$scope.imageUploading = false;
	// Fetch Vendor Images
	
	$scope.currentPage = parseInt($routeParams.page) || 1;
	$scope.lastPage=1;
	
	$scope.syncData = function(response){


		$scope.images = response.data;
		$scope.initPagination();

	}

	$scope.initPagination = function(){

		$scope.lastPage = $scope.images.last_page;

		$scope.nextPage = $scope.lastPage == $scope.currentPage ? false : $scope.currentPage + 1;
		$scope.previousPage = $scope.currentPage==1 ? false:$scope.currentPage - 1;


	}
	
	$scope.fetchImages = function(){

		imageService.getImages($scope.currentPage).then(

			// Success
			function(response){
				if(response.status == 200){
					$scope.syncData(response);

				}

				$scope.requestCompleted = true;

			},
			//Errror
			function(){

			}

		);

	}

	// Upload Image
	
	$scope.doUpload = function(){
		$scope.imageUploading = true;
		imageService.upload($scope.file,$scope.fileMeta,$scope.currentPage).then(

			function(response){
				console.info("FFFFFF");
				if(response.status == 200) {

					$scope.syncData(response);
					toastr.success('Image uploaded');
					$("#myModal").modal('hide');

				}

				$scope.imageUploading = false;



			},

			function(){
				$scope.imageUploading = false;
			}

		);
	}

	$scope.cancelUpload = function(){

		$("#myModal").modal('hide');
		$scope.file = false;
		$scope.fileMeta = false;

	}

	$scope.showImageUploader = function(){
		$("#myModal").modal('show');
	}

	/**
	 * Delete image
	 */
	
	$scope.confirmDelete = function(id){
		if(confirm('Delete image , are you sure?')){
			$scope.deleteImage(id);
		}
	}
	
	$scope.deleteImage = function(id){


		imageService.delete(id,$scope.currentPage).then(

			function(response){
				if(response.status == 200){
					$scope.syncData(response);

				}

				$scope.requestCompleted = true;

			},
			function(){

			}

		);
	}

	$scope.fetchImages();

	
}]);
"use strict";
angular.module("userApp")
.controller("MyReviewController",['$scope','$routeParams','reviewService','toastr',function($scope,$routeParams,reviewService,toastr){

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

	$scope.showDeleteAlert = function(id){

		if(confirm('Are really want to delete this review?')){
			$scope.deleteReview(id);
		}

	}


	$scope.deleteReview = function(id){

		reviewService.deleteMyReview(id).then(
			function(response){

				if(response.status == 200){
					$scope.getReviews();
					toastr.success('Review Deleted');
				}

			},
			function(response){

				toastr.error('Network error');

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
		$scope.updatingPic = false;

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
							$scope.$emit('profileUpdated',{"message":"Vendor profile updated","response":response});
						
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
			$scope.updatingPic = true;
			$scope.serverErrors = false;
			vendorService.updatePicture($scope.file).then(
				function(response){

					if(response.status==200){
							$scope.$emit('profileUpdated',{"message":"Picture updated","response":response});


						$scope.file = false;
					}

					$scope.updatingPic = false;

				},
				function(xhr){
					if(xhr.status == 422){
						toastr.error('File upload error');
						$scope.serverErrors = xhr.data.errors;
					}
					$scope.updatingPic = false;

				}
			);

		}

		// Init
		$(function(){
			$scope.vendorProfile();
			//$('select').select2();
		});

		$scope.cancelUpdatePic = function(){
			$scope.file = false;
			$scope.serverErrors = false;

		}

		$scope.removePic = function(){
			$scope.serverErrors = false;
			if(confirm("Are you sure?")){

				vendorService.removePicture().then(

					function(response){
						if(response.status == 200){

							$scope.$emit('profileUpdated',{"message":"Picture removed","response":response});
						}
					},
					function(xhr){

						toastr.error('Network error');

					});
				
			}
		}

		$scope.$on("profileUpdated",function(event,data){

			var message = data.message || "Profile updated";

			//Sync data
				if(data.response.status == 200){
					$scope.vendor = data.response.data.vendor;
					$scope.vendor.categories = $scope.parseVendorCategories($scope.vendor.categories);
					$scope.vendor.cities = $scope.parseVendorCities($scope.vendor.cities);
					$scope.cities = data.response.data.cities;
					$scope.categories = data.response.data.categories;
					toastr.success(message);
							
				}

			//End Sync data

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
angular.module('userApp')
.factory('imageService',['api','Upload',function(api,Upload){

	return {
		getImages:function(page){
			var page = page || 1;
			return api.request('get','api/me/images?page='+page);
		},
		upload:function(file,data,page){

			var page = page || 1;

			var requestData = {file:file};
			angular.extend(requestData,data);
			return Upload.upload({
				url:"api/me/images/upload?page="+page,
				data:requestData
			});
		},
		getImage:function(imageId){
			return api.request('get','api/me/images/get/'+imageId);



		},
		update:function(imageId,data){
			return api.request('put','api/me/images/update/'+imageId,data);
		},
		delete:function(imageId,page){

			return api.request('delete','api/me/images/delete/'+imageId+'?page='+page);

		}
	}

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
.factory("profileImageService",["api","Upload",function(api,Upload){
	return {

		getData:function(){
			return api.request('get','api/me/vendor/banner-picture');
			
		},

		updateBanner:function(file){


			return Upload.upload({
				url:"api/me/vendor/banner",
				data:{file_banner:file}
			});

		},
		removeBanner:function(data){
			return api.request('delete','api/me/vendor/banner');
		},
		updatepPicture:function(file){


			return Upload.upload({
				url:"api/me/vendor/picture",
				data:{file:file}
			});

		},
		removePicture:function(data){
			return api.request('delete','api/me/vendor/picture');
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

		deleteMyReview:function(id){

			var id = id;
			return api.request('delete','api/me/reviews/delete/'+id);

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
				url:"api/me/vendor/logo",
				data:{file:file}
			});

		},
		removePicture:function(data){
			return api.request('delete','api/me/vendor/logo');
		}
	}
}]);
//# sourceMappingURL=userapp.js.map
