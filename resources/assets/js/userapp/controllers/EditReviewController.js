"use strict";
angular.module("userApp")
.controller("EditReviewController",["$scope","$routeParams","$location","reviewService","toastr",function($scope,$routeParams,$location,reviewService,toastr){

	$scope.review = false;

	$scope.reviewId = $routeParams.reviewId;

	$scope.getMyReview = function(){

		reviewService.findMyReview($scope.reviewId).then(

			function(response){

				if(response.status == 200){

					$scope.review = response.data;


				}


				$scope.requestCompleted = true;


			},

			function(response){

				$scope.requestCompleted = true;


			}


		);
	}

	$scope.updateReview = function(){
		$scope.serverErrors = false;
		reviewService.updateMyReview($scope.reviewId,$scope.review).then(
			// Success
			function(response){

				if(response.status == 200){

					toastr.success("Review updated");
					$location.path('/myreviews');

				}

			},
			//Error
			function(response){
				if(response.status == 428){
					toastr.error("Validation Error");
					$scope.serverErrors = response.data.errors;
					console.log(response);
				}

				else{
					toastr.error("Network error");
				}

			}

		);
	}

	$scope.getMyReview();

}]);