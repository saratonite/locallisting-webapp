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