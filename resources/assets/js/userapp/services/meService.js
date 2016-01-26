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