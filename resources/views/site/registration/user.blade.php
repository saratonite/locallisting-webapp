@extends('layouts.frontend')

@section('header')
@include('site.partials.header')
@endsection


@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-5">
			
		</div>
		<div class="col-md-7">
			<form action="{{ route('user-signup-process')}}" method="post" class="form-horizontal">
				<div class="panel panel-default" style="margin-top:10px">
					<div class="panel-heading" >
						User registration
					</div>
					@if(Session::has('success'))
						<p class="alert alert-success">
							{!! Session::get('success') !!}
						</p>
					@endif
					<div class="panel-body">
							{{ csrf_field()}}
						<div class="form-group @if($errors->has('first_name') || $errors->has('last_name')) has-error @endif">
					<label for="" class="control-label col-md-3">Name</label>
					<div class="col-md-4">
						<input type="text" name="first_name" value="{{old('first_name')}}" class="form-control" placeholder="First name" >
						@if($errors->has('first_name'))
							<span class="help-block">{{$errors->first('first_name')}}</span>
						@endif
					</div>
					<div class="col-md-3">
						<input type="text" name="last_name" value="{{old('last_name')}}" class="form-control" placeholder="Last name">
						@if($errors->has('last_name'))
							<span class="help-block">{{$errors->first('last_name')}}</span>
						@endif
					</div>
				</div>
				<div class="form-group @if($errors->has('email')) has-error @endif">
					<label for="" class="control-label col-md-3">Email</label>
					<div class="col-md-7">
						<input type="email" name="email" value="{{old('email')}}" class="form-control" placeholder="Email">
						@if($errors->has('email'))
							<span class="help-block">{{$errors->first('email')}}</span>
						@endif
					</div>
				</div>
				<div class="form-group @if($errors->has('mobile')) has-error @endif">
					<label for="" class="control-label col-md-3" >Mobile</label>
					<div class="col-md-7">
						<input type="text" name="mobile" value="{{old('mobile')}}" class="form-control" placeholder="Mobile">
						@if($errors->has('mobile'))
							<span class="help-block">{{$errors->first('mobile')}}</span>
						@endif
					</div>
				</div>
				<div class="form-group @if($errors->has('password')) has-error @endif">
					<label for="" class="control-label col-md-3">Password</label>
					<div class="col-md-7">
						<input type="password" name="password" class="form-control">
						@if($errors->has('first_name'))
							<span class="help-block">{{$errors->first('password')}}</span>
						@endif
					</div>
				</div>
				<div class="form-group @if($errors->has('password')) has-error @endif">
					<label for="" class="control-label col-md-3">Confirm Password</label>
					<div class="col-md-7">
						<input type="password" name="password_confirmation" class="form-control">

					</div>
				</div>
				<div class="form-group">
					<div class="col-md-7 col-md-offset-3">
						<input type="submit" class="btn btn-success" value="SIGNUP">
					</div>
				</div>
					</div>
				</div>
				
			</form>
		</div>
   </div>
 </div>
@endsection

@section('footer')
@include('site.partials.footer')
@endsection