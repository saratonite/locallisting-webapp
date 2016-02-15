angular.module('userApp')
.controller('BannerAndImage',['$scope','profileImageService',function($scope,profileImageService){

	$scope.fetchData = function(){
		profileImageService.getData().then(

			function(response){

				if(response.status == 200){
					$scope.vendor = response.data;
				}

			},
			function(){

			}

		);
	}


	$scope.updateBanner = function(){


		profileImageService.updateBanner($scope.file_banner).then(
			function(response){

				if(response.status == 200){
					$scope.vendor = response.data;
				}

			},
			function(){

			}
		);


	}




	$scope.updatePic = function(){

		profileImageService.updatepPicture($scope.file).then(
			function(response){



			},
			function(response){

			}
		);

	}




	// Init
	$scope.fetchData();


}]);