@extends('layouts.admin')
@section('title','Settinngs')

@section('content')



<div class="row">
<div class="page-header">
	<h2>Dashboard</h2>
</div>
	<!-- App settings -->
	<div class="col-md-6">
	<!-- Change email -->
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">App Settings</h3>
			</div>
			<div class="panel-body">
				<form method="post" >
					<div class="form-group">
						<label>App Name</label>
						<input type="text" class="form-control">
					</div>
					<div class="form-group">
						<label>App Email</label>
						<input type="email" class="form-control">
					</div>
					<div class="form-group">
						<label>App Email SMTP host</label>
						<input type="text" class="form-control">
					</div>
					<div class="form-group">
						<label>App Email SMTP Username</label>
						<input type="email" class="form-control">
					</div>
					<div class="form-group">
						<label>App Email SMTP password</label>
						<input type="email" class="form-control">
					</div>
					<div class="form-group">
						<input type="submit" class="btn btn-success" value="Update">

					</div>
				</form>
			</div>
		</div>
	<!-- Change email -->
	</div>
	<!-- End App Settings -->
	<div class="col-md-6">
	<!-- Change email -->
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Chnage Email</h3>
			</div>
			<div class="panel-body">
				<form method="post" >
					<div class="form-group">
						<label>Email</label>
						<input type="email" class="form-control">
					</div>
					<div class="form-group">
						<label>Password</label>
						<input type="password" class="form-control">
					</div>
					<div class="form-group">
						<input type="submit" class="btn btn-danger" value="Change Email">

					</div>
				</form>
			</div>
		</div>
	<!-- Change email -->
	<!-- Chnage password -->
	<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Chnage Email</h3>
			</div>
			<div class="panel-body">
				<form method="post" >
					<div class="form-group">
						<label>Current Password</label>
						<input type="email" class="form-control">
					</div>
					<div class="form-group">
						<label>New Password</label>
						<input type="password" class="form-control">
					</div>
					<div class="form-group">
						<label>Confirm New Password</label>
						<input type="password" class="form-control">
					</div>
					<div class="form-group">
						<input type="submit" class="btn btn-danger" value="Change Password">

					</div>
				</form>
			</div>
		</div>
	<!-- End Chnage password -->
	</div>
</div>
@endsection