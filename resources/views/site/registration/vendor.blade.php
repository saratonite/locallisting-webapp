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
			<form action="{{ route('vendor-signup-process')}}" method="post" class="form-horizontal">
				<div class="panel panel-default" style="margin-top:10px">
					<div class="panel-heading" >
						Service Provider Registration
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
				<div class="form-group @if($errors->has('vendor_name')) has-error @endif">
					<label for="" class="control-label col-md-3">Company</label>
					<div class="col-md-7">
						<input type="text" name="vendor_name" value="{{old('vendor_name')}}" class="form-control" placeholder="Company Name / Service Provider Name">
						@if($errors->has('vendor_name'))
							<span class="help-block">{{$errors->first('vendor_name')}}</span>
						@endif
					</div>
				</div>
				<!--  -->
				<div class="form-group @if($errors->has('category_id')) has-error @endif">
					<label for="" class="control-label col-md-3">Category</label>
					<div class="col-md-7">
						<select name="category_id" class="form-control">
						<option value="" disabled selected>Select Category</option>
						@if($categories->count())
								@foreach($categories as $category)
								<option @if($category->id == old('category_id')) selected @endif value="{{$category->id}}">{{ $category->name }}</option>
								@endforeach
						@endif
						</select>
						
						@if($errors->has('category_id'))
							<span class="help-block">{{$errors->first('category_id')}}</span>
						@endif
					</div>
				</div>
				<div class="form-group @if($errors->has('city_id')) has-error @endif">
					<label for="" class="control-label col-md-3">City</label>
					<div class="col-md-7">
						<select name="city_id" class="form-control">
						<option value="" disabled selected>Select City</option>
						@if($cities->count())
								@foreach($cities as $city)
									<option @if($city->id == old('city_id')) selected @endif value="{{$city->id}}">{{ $city->name }}</option>
								@endforeach
						@endif
						</select>
						
						@if($errors->has('city_id'))
							<span class="help-block">{{$errors->first('city_id')}}</span>
						@endif
					</div>
				</div>
				<!--  -->

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
				<!-- Address -->
				<div class="form-group @if($errors->has('addr_line1')) has-error @endif">
					<label for="" class="control-label col-md-3" >Address</label>
					<div class="col-md-7">
						<input type="text" name="addr_line1" value="{{old('addr_line1')}}" class="form-control" placeholder="Adddress line 1">
						@if($errors->has('addr_line1'))
							<span class="help-block">{{$errors->first('addr_line1')}}</span>
						@endif
					</div>
				</div>
				<div class="form-group @if($errors->has('addr_line2')) has-error @endif">
					<label for="" class="control-label col-md-3" ></label>
					<div class="col-md-7">
						<input type="text" name="addr_line2" value="{{old('addr_line2')}}" class="form-control" placeholder="Address line 2">
						@if($errors->has('addr_line2'))
							<span class="help-block">{{$errors->first('addr_line2')}}</span>
						@endif
					</div>
				</div>
				<div class="form-group @if($errors->has('addr_line3')) has-error @endif">
					<label for="" class="control-label col-md-3" ></label>
					<div class="col-md-7">
						<input type="text" name="addr_line3" value="{{old('addr_line3')}}" class="form-control" placeholder="Address line 3">
						@if($errors->has('addr_line3'))
							<span class="help-block">{{$errors->first('addr_line3')}}</span>
						@endif
					</div>
				</div>
				<div class="form-group @if($errors->has('zip_code')) has-error @endif">
					<label for="" class="control-label col-md-3" >Zip Code</label>
					<div class="col-md-3">
						<input type="text" name="zip_code" value="{{old('zip_code')}}" class="form-control" placeholder="Zip Code">
						@if($errors->has('zip_code'))
							<span class="help-block">{{$errors->first('zip_code')}}</span>
						@endif
					</div>
				</div>
				<!-- End Address -->
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