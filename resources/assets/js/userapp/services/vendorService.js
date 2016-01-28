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