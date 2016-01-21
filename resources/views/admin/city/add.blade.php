@extends('layouts.admin')

@section('content')
<div class="row">
	
	@include('admin.partials.alert')
	<div class="col-md-2">
		<ul class="nav nav-list">
			<li><a href="{{ route('admin::city-add')}}">Add City</a></li>
			<li><a href="{{ route('admin::list-cities')}}">All Cities</a></li>
		</ul>
	</div>
	<div class="col-md-6">
		<h3>Add City</h3>
		<form action="{{route("admin::city-create")}}" method="post">
			{{csrf_field()}}
			<div class="form-group @if($errors->has('name')) has-error @endif">
				<label class="control-label">Name</label>
				<input type="text" class="form-control" name="name" value="{{old('name')}}">
				@if($errors->has('name'))
					<span class="help-block">{{ $errors->first('name') }}</span>
				@endif
			</div>
			<div class="form-group @if($errors->has('description')) has-error @endif">
				<label class="control-label">Description</label>
				<input type="text" class="form-control" name="description" value="{{old('description')}}">
				@if($errors->has('description'))
					<span class="help-block">{{ $errors->first('description') }}</span>
				@endif
			</div>
			<div class="form-group @if($errors->has('slug')) has-error @endif">
				<label class="control-label">slug</label>
				<input type="text" class="form-control" name="slug" value="{{old('slug')}}">
				@if($errors->has('slug'))
					<span class="help-block">{{ $errors->first('slug') }}</span>
				@endif
			</div>
			<div class="form-group">
				<input type="submit" class="btn btn-primary" name="submit">
			</div>
		</form>
	</div>
</div>
@endsection