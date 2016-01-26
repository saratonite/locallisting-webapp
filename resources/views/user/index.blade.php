@extends("layouts.user")

@section('content')


<h2>Welcome {{ ucfirst(Auth::user()->first_name)}}</h2>
<p> Here you can update your details</p>
	
	<div class="col-md-10">
		<div class="col-md-3">
			<a href="" class="btn btn-block btn-primary">Profile</a>
		</div>
		<div class="col-md-3">
			<a href="" class="btn btn-block btn-success">Update Details</a>
			
		</div>
		<div class="col-md-3">
			<a href="" class="btn btn-block btn-danger">Account Settings</a>
			
		</div>
	</div>

@endsection