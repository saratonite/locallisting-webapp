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