angular.module('userApp')

.controller('ImagesController',['$scope','$routeParams','toastr','imageService',function($scope,$routeParams,toastr,imageService){

$scope.imageUploading = false;
	// Fetch Vendor Images
	
	$scope.currentPage = parseInt($routeParams.page) || 1;
	$scope.lastPage=1;
	
	$scope.syncData = function(response){


		$scope.images = response.data;
		$scope.initPagination();

	}

	$scope.initPagination = function(){

		$scope.lastPage = $scope.images.last_page;

		$scope.nextPage = $scope.lastPage == $scope.currentPage ? false : $scope.currentPage + 1;
		$scope.previousPage = $scope.currentPage==1 ? false:$scope.currentPage - 1;


	}
	
	$scope.fetchImages = function(){

		imageService.getImages($scope.currentPage).then(

			// Success
			function(response){
				if(response.status == 200){
					$scope.syncData(response);

				}

				$scope.requestCompleted = true;

			},
			//Errror
			function(){

			}

		);

	}

	// Upload Image
	
	$scope.doUpload = function(){
		$scope.imageUploading = true;
		imageService.upload($scope.file,$scope.fileMeta,$scope.currentPage).then(

			function(response){
				console.info("FFFFFF");
				if(response.status == 200) {

					$scope.syncData(response);
					toastr.success('Image uploaded');
					$("#myModal").modal('hide');

				}

				$scope.imageUploading = false;



			},

			function(){
				$scope.imageUploading = false;
			}

		);
	}

	$scope.cancelUpload = function(){

		$("#myModal").modal('hide');
		$scope.file = false;
		$scope.fileMeta = false;

	}

	$scope.showImageUploader = function(){
		$("#myModal").modal('show');
	}

	$scope.fetchImages();

	
}]);