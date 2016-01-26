"use strict";
angular.module("userApp")
.factory("api",["$http",function($http){
	return {

		request:function(httpMethod,url,data){
			return $http({"method":httpMethod,"url":url,"data":data});
		}
	}
}]);