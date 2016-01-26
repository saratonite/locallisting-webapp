<h2>Edit Profile</h2>
<div class="col-md-10">
<span ng-show="!requestCompleted" us-spinner></span>
		

		<div class="col-md-12">
		<form class="form-horizontal" action="" name="userProfile">
			<div class="form-group" ng-class="{ 'has-error': userProfile.firstname.$touched && userProfile.firstname.$invalid }">
				<label class="col-md-3 control-label" for="">Name</label>
				<div class="col-md-4">
					<input class="form-control " name="firstname" type="text" ng-model="profile.first_name" required minlength="3">
					<div class="help-block" ng-messages="userProfile.firstname.$error" ng-if="userProfile.firstname.$touched">
						<span ng-message="required">Field required</span>
						<span ng-message="minlength">At least 3 characters</span>
					</div>
				</div>
				<div class="col-md-3">
					<input class="form-control " type="text" name="lastname" ng-model="profile.last_name">
					

				</div>
			</div>
			<div class="form-group" ng-class="{ 'has-error': userProfile.addr1.$touched && userProfile.addr1.$invalid }">
				<label class="col-md-3 control-label" for="">Address (Building / Room)</label>
				<div class="col-md-7">
					<input class="form-control " type="text" ng-model="profile.addr_line1" name="addr1" required>
					<div class="help-block" ng-messages="userProfile.addr1.$error" ng-if="userProfile.addr1.$touched">
						<span ng-message="required">Field required</span>
					</div>
				</div>
			</div>
			<div class="form-group" ng-class="{ 'has-error': userProfile.addr2.$touched && userProfile.addr2.$invalid }">
				<label class="col-md-3 control-label" for="">Address (Street / Landmark)</label>
				<div class="col-md-7">
					<input class="form-control " type="text" ng-model="profile.addr_line2" name="addr2" required>
					<div class="help-block" ng-messages="userProfile.addr2.$error" ng-if="userProfile.addr2.$touched">
						<span ng-message="required">Field required</span>
					</div>
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-3 control-label" for="">Address (Place)</label>
				<div class="col-md-7">
					<input class="form-control " type="text" ng-model="profile.addr_line3">
				</div>
			</div>
			<div class="form-group">
				<div class="col-md-7 col-md-offset-3">
					<button class="btn btn-success" ng-click="updateProfile()" ng-disabled="!requestCompleted || userProfile.$invalid">Update</button>
					<button class="btn btn-warning">Cancel</button>
				</div>
			</div>
			
		</form>
		</div>
		
</div>