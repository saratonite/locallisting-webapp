angular.module('userApp')

.controller('ImageController',['$scope','$routeParams','toastr','imageService',function($scope,$routeParams,toastr,imageService){

	$scope.imageId = $routeParams.imageId;

	$scope.image = false;

	$scope.fetchImage = function(){
		 imageService.getImage($scope.imageId).then(
		 	function(response){

		 		if(response.status == 200){

		 			$scope.image = response.data;

		 			console.info($scope.image);


		 		}

		 		$scope.requestCompleted = true;

		 	},
		 	function(){
		 		$scope.requestCompleted = true;

		 	}
		 );
	}

	$scope.update = function(){


		imageService.update($scope.imageId,$scope.image).then(
			function(response){

		 		if(response.status == 200){

		 			$scope.image = response.data;

		 			toastr.success('Image updated');


		 		}

		 		$scope.requestCompleted = true;

		 	},
		 	function(){
		 		$scope.requestCompleted = true;

		 	});
	}

	$scope.fetchImage();
	
}]);