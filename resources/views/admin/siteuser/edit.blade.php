@extends('layouts.admin')

@section('content')
<div class="row">
	<h3>Edit User</h3>
	@include('admin.partials.alert')
	<div class="col-md-6">
		<h3></h3>
		<form action="{{route('admin::update-site-user',$user->id)}}" method="post">
			{{csrf_field()}}
			<input type="hidden" name="_method" value="put">
			<div class="form-group @if($errors->has('first_name')) has-error @endif">
				<label for="" class="control-label">First Name</label>
				<input type="text" class="form-control" name="first_name" value="{{old('first_name',$user->first_name)}}">
				@if($errors->has('first_name'))
					<span class="help-block">{{$errors->first('first_name')}}</span>
				@endif
			</div>
			<div class="form-group @if($errors->has('last_name')) has-error @endif">
				<label for="" class="control-label">Last Name</label>
				<input type="text" class="form-control" name="last_name" value="{{old('last_name',$user->last_name)}}" >
				@if($errors->has('last_name'))
					<span class="help-block">{{$errors->first('last_name')}}</span>
				@endif
			</div>
			<div class="form-group @if($errors->has('email')) has-error @endif">
				<label for="" class="control-label">Email</label>
				<input type="text" class="form-control" name="email" value="{{old('email',$user->email)}}">
				@if($errors->has('email'))
					<span class="help-block">{{$errors->first('email')}}</span>
				@endif
			</div>
			<div class="form-group @if($errors->has('status')) has-error @endif">
				<label for="" class="control-label">Status</label>
				<input type="text" class="form-control" name="status" value="{{old('status',$user->status)}}">
				@if($errors->has('status'))
					<span class="help-block">{{$errors->first('status')}}</span>
				@endif
			</div>
			<div class="form-group">
				<input type="submit" class="btn btn-primary" value="Update">

			</div>
		</form>
	</div>
</div>
@endsection