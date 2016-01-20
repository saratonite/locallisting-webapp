@extends('layouts.admin')

@section('content')
<div class="row">
	<div class="col-md-2">
		<div data-spy="affix" data-offset-top="60" data-offset-bottom="200">
			<ul class="nav nav-list">
				<li><a href="">Profile</a></li>
				<li><a href="{{route('admin::edit-vendor',$vendor->id)}}">Edit Profile</a></li>
				<li class="active"><a href="{{route('admin::vendor-enquiries',$vendor->id)}}">Enquiries</a></li>
			</ul>
		</div>
	</div>
	
	<div class="col-md-6">
	<h3>Edit Vendor </h3>
	@include('admin.partials.alert')
		<form action="{{route('admin::update-vendor',$vendor->id)}}" method="post">
			{{csrf_field()}}
			<input type="hidden" name="_method" value="put">
			<div class="form-group @if($errors->has('vendor_name')) has-error @endif">
				<label for="" class="control-label">Vendor Name</label>
				<input type="text" class="form-control" name="vendor_name" value="{{old('vendor_name',$vendor->vendor_name)}}">
				@if($errors->has('vendor_name'))
					<span class="help-block">{{$errors->first('vendor_name')}}</span>
				@endif
			</div>
			<div class="form-group @if($errors->has('description')) has-error @endif">
				<label for="" class="control-label">Description</label>
				<textarea class="form-control" name="description" >{{old('description',$vendor->description)}}</textarea>
				@if($errors->has('description'))
					<span class="help-block">{{$errors->first('description')}}</span>
				@endif
			</div>
			<div class="form-group @if($errors->has('category_id')) has-error @endif">
				<label for="" class="control-label">Category</label>
				<select  id="" class="form-control" name="category_id">
					<option disabled selected>Select Category</option>
					@if(count($categories))
						@foreach($categories as $key => $name)
							<option @if(old('category_id',$vendor->category_id) == $key ) selected @endif value="{{$key}}">{{ $name }}</option>
						@endforeach
					@endif
				</select>
				@if($errors->has('category_id'))
					<span class="help-block">{{$errors->first('category_id')}}</span>
				@endif
			</div>
			<div class="form-group @if($errors->has('city_id')) has-error @endif">
				<label for="" class="control-label">City</label>
				<select  id="" class="form-control" name="city_id">
					<option disabled selected>Select City</option>
					@if(count($cities))
						@foreach($cities as $key => $name)
							<option @if(old('category_id',$vendor->city_id) == $key ) selected @endif value="{{$key}}">{{ $name }}</option>
						@endforeach
					@endif
				</select>
				@if($errors->has('city_id'))
					<span class="help-block">{{$errors->first('city_id')}}</span>
				@endif
			</div>
			<div class="form-group @if($errors->has('contact_number')) has-error @endif">
				<label for="" class="control-label">Contact Number</label>
				<input type="text" class="form-control" name="contact_number" value="{{old('contact_number',$vendor->contact_number)}}">
				@if($errors->has('city_id'))
					<span class="help-block">{{$errors->first('contact_number')}}</span>
				@endif
			</div>
			<div class="form-group @if($errors->has('mobile')) has-error @endif">
				<label for="" class="control-label">Mobile</label>
				<input type="text" class="form-control" name="mobile" value="{{old('mobile',$vendor->mobile)}}">
				@if($errors->has('mobile'))
					<span class="help-block">{{$errors->first('mobile')}}</span>
				@endif
			</div>
			
			<div class="form-group">
				<input type="submit" class="btn btn-primary" value="Update">

			</div>
		</form>
	</div>
</div>
@endsection