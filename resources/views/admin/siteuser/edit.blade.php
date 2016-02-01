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
			<div class="form-group @if($errors->has('mobile')) has-error @endif">
				<label for="" class="control-label">Mobile</label>
				<input type="text" class="form-control" name="mobile" value="{{old('mobile',$user->mobile)}}">
				@if($errors->has('mobile'))
					<span class="help-block">{{$errors->first('mobile')}}</span>
				@endif
			</div>
			<div class="form-group @if($errors->has('addr_line1')) has-error @endif">
				<label for="" class="control-label">Address line 1</label>
				<input type="text" class="form-control" name="addr_line1" value="{{old('addr_line1',$user->addr_line1)}}">
				@if($errors->has('addr_line1'))
					<span class="help-block">{{$errors->first('addr_line1')}}</span>
				@endif
			</div>
			<div class="form-group @if($errors->has('addr_line2')) has-error @endif">
				<label for="" class="control-label">Address line 2</label>
				<input type="text" class="form-control" name="addr_line2" value="{{old('addr_line2',$user->addr_line2)}}">
				@if($errors->has('addr_line2'))
					<span class="help-block">{{$errors->first('addr_line2')}}</span>
				@endif
			</div>
			<div class="form-group @if($errors->has('addr_line3')) has-error @endif">
				<label for="" class="control-label">Address line 3</label>
				<input type="text" class="form-control" name="addr_line3" value="{{old('addr_line3',$user->addr_line3)}}">
				@if($errors->has('addr_line3'))
					<span class="help-block">{{$errors->first('addr_line3')}}</span>
				@endif
			</div>
			<div class="form-group @if($errors->has('status')) has-error @endif">
				<label for="" class="control-label">Status</label>
				<select name="status" class="form-control">
					@if($user->StatusArray())
						@foreach($user->StatusArray() as $status)
						<option @if(old('status',$user->status) == $status) selected @endif value="{{$status}}">{{ucfirst($status)}}</option>
						@endforeach
					@endif
				</select>
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