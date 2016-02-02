"use strict";
angular.module("userApp")
.controller("MyReviewController",['$scope','$routeParams','reviewService',function($scope,$routeParams,reviewService){

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

	$scope.init = function(){

		$scope.getReviews();
	}

	$scope.init();
}]);