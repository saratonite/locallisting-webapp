"use strict";
angular.module("userApp")
.factory("meService",["api",function(api){
	return {

		profileData:false,

		setProfileData:function(data){
			this.profileData = data;
			return this.profileData;
		},
		getProfileData:function(){
			return this.profileData;
		},

		profile:function(){
			return api.request('get','http://localhost:8000/account/api/me');
		},
		updateProfile:function(data){

			return api.request('put','api/me',data);

		},

		// Settings
		updatePassword:function(data){

			return api.request('put','api/me/changepassword',data);

		},
		updateEmail:function(data){

			return api.request('put','api/me/changeemail',data);


		}
	}
}]);