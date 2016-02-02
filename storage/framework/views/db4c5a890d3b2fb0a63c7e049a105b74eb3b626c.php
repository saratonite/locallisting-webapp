<h3>Account Settings</h3>
<span ng-show="!requestCompleted" us-spinner></span>
<div class="col-md-10">
	<!-- Chnage email -->
		<div class="panel panel-default">
	  	  <div class="panel-heading">Change Password</div>
		  <div class="panel-body">
		    <form class="col-md-7" >
		    	<div class="form-group">
		    		<label for="">Old Password</label>
		    		<input type="password" class="form-control" ng-model="user.old_password">
		    	</div>
		    	<div class="form-group">
		    		<label for="">New Password</label>
		    		<input type="password" class="form-control" ng-model="user.password">
		    	</div>
		    	<div class="form-group">
		    		<label for="">Confirm New Password</label>
		    		<input type="password" class="form-control" ng-model="user.password_confirmation">
		    	</div>
		    	<div class="form-group">
		    		
		    		<button ng-disabled="!user.password_confirmation || !user.password || !user.old_password" type="button" class="btn btn-primary" ng-click="updatePassword()" >Update Password	</button>
		    	</div>
		    </form>
		  </div>
		</div>
	<!-- End Chnage email -->

	<!-- Chnage email -->
		<div class="panel panel-default">
	  	  <div class="panel-heading">Change Email</div>
		  <div class="panel-body">
		    <form class="col-md-7" name="emailChange">
		    	<div class="form-group">
		    		<label for="">Email</label>
		    		<input type="email" name="appmail" class="form-control" ng-model="user.email">
		    	</div>
		    	<div class="form-group">
		    		<label for="">Current Password</label>
		    		<input type="password" class="form-control" ng-model="user.email_password">
		    	</div>
		    	<div class="form-group">
		    		
		    		<button type="button" class="btn btn-primary" ng-disabled="(!user.email_password || !user.email)" ng-click="updateEmail()">Update Email	</button>
		    	</div>
		    </form>
		  </div>
		</div>
	<!-- End Chnage email -->
</div>