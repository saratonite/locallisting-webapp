@extends('layouts.admin')
@section('title','Settinngs')

@section('content')



<div class="row">
<div class="page-header">
	<h2>Dashboard</h2>
</div>
	@include('admin.partials.alert')

<div class="col-md-6">
		<!-- Chnage password -->
	<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Chnage Password</h3>
			</div>
			<div class="panel-body">
				<form method="post" action="{{ route('admin::change-password')}}" >
				{{csrf_field()}}
					<div class="form-group @if($errors->changePassword->has('current_password') || Session::has('changePasswordError')) has-error @endif">
						<label>Current Password</label>
						<input type="password" class="form-control" name="current_password">
						@if($errors->changePassword->has('current_password'))
							<span class="text-danger">{{$errors->changePassword->first('current_password')}}</span>
						@endif
						@if(Session::has('changePasswordError'))
							<span class="text-danger">{{Session::get('changePasswordError')}}</span>
						@endif
					</div>
					<div class="form-group @if($errors->changePassword->has('new_password')) has-error @endif">
						<label>New Password</label>
						<input type="password" class="form-control" name="new_password">
						@if($errors->changePassword->has('new_password'))
							<span class="text-danger">{{$errors->changePassword->first('new_password')}}</span>
						@endif
					</div>
					<div class="form-group @if($errors->changePassword->has('c_new_password')) has-error @endif">
						<label>Confirm New Password</label>
						<input type="password" class="form-control" name="c_new_password">
						@if($errors->changePassword->has('c_new_password'))
							<span class="text-danger">{{$errors->changePassword->first('c_new_password')}}</span>
						@endif
					</div>
					<div class="form-group">
						<input type="submit" class="btn btn-danger" value="Change Password">

					</div>
				</form>
			</div>
		</div>
	<!-- End Chnage password -->
</div>
<div class="col-md-6">
			<!-- Change email -->
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Chnage Email</h3>
			</div>
			<div class="panel-body">
				<form method="post" action="{{route('admin::change-email')}}" autocomplete="off" >
				{{ csrf_field() }}
					<div class="form-group @if($errors->changeEmail->has('email')) has-error @endif ">
						<label class="control-label">Email</label>
						<input type="email" class="form-control" name="email" value="{{ old('email',Auth::user()->email) }}" autocomplete="off">
						@if($errors->changeEmail->has('email'))
							<span class="text-danger">{{ $errors->changeEmail->first('email') }}</span>
						@endif
						
					<div class="form-group @if($errors->changeEmail->has('password') || Session::has('changeEmailError')) has-error @endif">
						<label class="control-label">Password</label>
						<input type="password" class="form-control" name="password" autocomplete="off">
						@if($errors->changeEmail->has('password'))
							<span class="text-danger">{{ $errors->changeEmail->first('password') }}</span>
						@endif
						@if(Session::has('changeEmailError'))
						<span class="text-danger">{{ Session::get('changeEmailError')}}</span>
						@endif
					</div>
					<div class="form-group">
						<input type="submit" class="btn btn-danger" value="Change Email">
						
					</div>
				</form>
			</div>
		</div>
	<!-- Change email -->
</div>

</div>

</div>
@endsection