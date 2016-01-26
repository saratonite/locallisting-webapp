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


"use strict";
angular.module("userApp")
.controller('DashboaredController',['$scope',function($scope){
		
		$scope.content = "Hello Universe";

}]);
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
		}
	}
}]);
//# sourceMappingURL=userapp.js.map
