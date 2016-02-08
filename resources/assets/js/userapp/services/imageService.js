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
		}
	}

}]);