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