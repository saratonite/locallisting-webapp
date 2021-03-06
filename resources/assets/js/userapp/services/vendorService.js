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