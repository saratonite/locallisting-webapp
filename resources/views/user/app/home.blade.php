
<h2>Welcome {{ ucfirst(Auth::user()->first_name) }}</h2>
<p> Here you can update your details</p>
	
	<div class="col-md-10">
		<div class="col-md-3">
			<a href="#profile" class="btn btn-block btn-primary">Profile</a>
		</div>
		<div class="col-md-3">
			<a href="#profile/edit" class="btn btn-block btn-success">Update Details</a>
			
		</div>
		<div class="col-md-3">
			<a href="#settings" class="btn btn-block btn-danger">Account Settings</a>
			
		</div>
	</div>