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
.factory("api",["$http",function($http){
	return {

		request:function(httpMethod,url,data){
			return $http({"method":httpMethod,"url":url,"data":data});
		}
	}
}]);
"use strict";
angular.module("userApp")
.factory("meService",["api",function(api){
	return {

		profile:function(){
			return api.request('get','http://localhost:8000/account/api/me');
		},
		updateProfile:function(data){

			return api.request('put','api/me',data);

		}
	}
}]);
//# sourceMappingURL=userapp.js.map
