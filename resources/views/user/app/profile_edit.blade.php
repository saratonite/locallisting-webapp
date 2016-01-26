<h2>Edit Profile</h2>
<div class="col-md-10">
<span ng-show="!requestCompleted" us-spinner></span>
		

		<div class="col-md-12">
		<form class="form-horizontal" action="">
			<div class="form-group">
				<label class="col-md-3 control-label" for="">Name</label>
				<div class="col-md-4">
					<input class="form-control " type="text" ng-model="profile.first_name">
				</div>
				<div class="col-md-3">
					<input class="form-control " type="text" ng-model="profile.last_name">
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-3 control-label" for="">Email</label>
				<div class="col-md-7">
					<input class="form-control " type="email" ng-model="profile.email">
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-3 control-label" for="">Address (Building / Room)</label>
				<div class="col-md-7">
					<input class="form-control " type="text" ng-model="profile.addr_line1">
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-3 control-label" for="">Address (Street / Landmark)</label>
				<div class="col-md-7">
					<input class="form-control " type="text" ng-model="profile.addr_line2">
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
					<button class="btn btn-success" ng-click="updateProfile()" ng-disabled="!requestCompleted">Update</button>
					<button class="btn btn-warning">Cancel</button>
				</div>
			</div>
			
		</form>
		</div>
		
</div>