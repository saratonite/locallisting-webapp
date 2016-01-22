@extends('layouts.admin')

@section('content')
<div class="row">
	@include('admin.partials.alert')
		<div class="col-md-2">
		@include('admin.city.partials.sidenav')
		
	</div>
	<div class="col-md-6">
		<h3>Edit City</h3>
		<form action="{{route("admin::city-update",$city->id)}}" method="post">
			{{csrf_field()}}
			<input type="hidden" name="_method" value="put">
			<div class="form-group @if($errors->has('name')) has-error @endif">
				<label class="control-label">Name</label>
				<input type="text" class="form-control" name="name" value="{{$city->name}}">
				@if($errors->has('name'))
					<span class="help-block">{{ $errors->first('name') }}</span>
				@endif
			</div>
			<div class="form-group @if($errors->has('description')) has-error @endif">
				<label class="control-label">Description</label>
				<input type="text" class="form-control" name="description" value="{{$city->description}}">
				@if($errors->has('description'))
					<span class="help-block">{{ $errors->first('description') }}</span>
				@endif
			</div>
			<div class="form-group @if($errors->has('slug')) has-error @endif">
				<label class="control-label">slug</label>
				<input type="text" class="form-control" name="slug" value="{{$city->slug}}">
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