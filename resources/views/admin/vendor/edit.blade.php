@extends('layouts.admin')

@section('content')
<div class="row">
	<div class="col-md-2">
		<div data-spy="affix" data-offset-top="60" data-offset-bottom="200">
			<ul class="nav nav-list">
				<li><a href="{{ route('admin::vendor-profile',$vendor->id)}}">Profile</a></li>
				<li><a href="{{route('admin::edit-vendor',$vendor->id)}}">Edit Profile</a></li>
				<li class="active"><a href="{{route('admin::vendor-enquiries',$vendor->id)}}">Enquiries</a></li>
				<li class="active"><a href="{{route('admin::vendor-reviews',$vendor->id)}}">Reviews</a></li>
				<li class="active"><a href="{{route('admin::vendor-images',$vendor->id)}}">Images</a></li>
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
				<select  id="" class="form-control" name="categories[]" multiple size="5">
					<option disabled >Select Category</option>
					@if(count($categories))
						@foreach($categories as $key => $name)
							<option 

							@if(count($vendor->categories))
								@foreach($vendor->categories as $vcat)

									@if(old("categories[]",$vcat->category_id) == $key ) selected @endif
								@endforeach
							@endif

							value="{{$key}}">{{ $name }}</option>
						@endforeach
					@endif
				</select>
				@if($errors->has('category_id'))
					<div class="help-block">{{$errors->first('category_id')}}</div>
				@endif
			</div>
			<div class="form-group @if($errors->has('city_id')) has-error @endif">
				<label for="" class="control-label">City</label>
				<select  id="" class="form-control" name="cities[]" multiple>
					@if(count($cities))
						@foreach($cities as $key => $name)
							<option 
								@if(count($vendor->cities))
									@foreach($vendor->cities as $vcity)

										@if(old("cities[]",$vcity->city_id) == $key ) selected @endif
									@endforeach
								@endif

								value="{{$key}}">{{ $name }}</option>
						@endforeach
					@endif
				</select>
				@if($errors->has('city_id'))
					<span class="help-block">{{$errors->first('city_id')}}</span>
				@endif
			</div>
			<div class="form-group @if($errors->has('addr_line1')) has-error @endif">
				<label for="" class="control-label">Address (Building / Room)</label>
				<input type="text" class="form-control" name="addr_line1" value="{{old('addr_line1',$vendor->addr_line1)}}">
				@if($errors->has('addr_line1'))
					<span class="help-block">{{$errors->first('addr_line1')}}</span>
				@endif
			</div>
			<div class="form-group @if($errors->has('addr_line2')) has-error @endif">
				<label for="" class="control-label">Address (Street / Landmark )</label>
				<input type="text" class="form-control" name="addr_line2" value="{{old('addr_line2',$vendor->addr_line2)}}">
				@if($errors->has('addr_line2'))
					<span class="help-block">{{$errors->first('addr_line2')}}</span>
				@endif
			</div>
			<div class="form-group @if($errors->has('addr_line3')) has-error @endif">
				<label for="" class="control-label">Address (Place )</label>
				<input type="text" class="form-control" name="addr_line3" value="{{old('addr_line3',$vendor->addr_line3)}}">
				@if($errors->has('addr_line3'))
					<span class="help-block">{{$errors->first('addr_line3')}}</span>
				@endif
			</div>
			<div class="form-group @if($errors->has('post_code')) has-error @endif">
				<label for="" class="control-label">Post Code</label>
				<input type="text" class="form-control" name="post_code" value="{{old('post_code',$vendor->post_code)}}">
				@if($errors->has('post_code'))
					<span class="help-block">{{$errors->first('post_code')}}</span>
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

	<!-- Picture update section -->
	<div class="col-md-4">
	<!-- Logo -->
		<form action="{{ route('admin::update-vendor-logo',$vendor->id)}}" method="post" enctype="multipart/form-data">
		<div class="panel panel-default">
			<div class="panel-heading">
				Logo
			</div>
			<div class="panel-body">
				@if($vendor->logo)
					<a href="{{ImagePath($vendor->logo)}}" data-lightbox="profile">
						<img style="width:325px;"   src="{{ImagePath($vendor->logo,'md')}}" alt="">
					</a>
				@else 
					<strong>No Picture</strong>
				@endif
				<input type="file" name="file_logo">
				{{csrf_field()}}

				@if($errors->has('file_logo'))
					<span class="text-danger"> {{$errors->first('file_logo')}}</span>
				@endif
			</div>
			<div class="panel-footer">

					<button type="submit" class="btn">Upload</button>
					@if($vendor->logo)
					<button type="button" class="btn btn-danger	" id="remove-logo" data-record-id="{{$vendor->id}}">Remove</button>
					@endif
				</div>
		</div>
	</form>

	<!-- End Logo -->
	<!-- Feature Image -->
	<form action="{{ route('admin::update-vendor-picture',$vendor->id)}}" method="post" enctype="multipart/form-data">
		<div class="panel panel-default">
			<div class="panel-heading">
				Picture
			</div>
			<div class="panel-body">
				@if($vendor->picture)
					<a href="{{ImagePath($vendor->picture)}}" data-lightbox="profile">
						<img style="width:325px"   src="{{ImagePath($vendor->picture,'md')}}" alt="">
					</a>
				@else 
					<strong>No Picture</strong>
				@endif
				<input type="file" name="file">
				{{csrf_field()}}

				@if($errors->has('file'))
					<span class="text-danger"> {{$errors->first('file')}}</span>
				@endif
			</div>
			<div class="panel-footer">

					<button type="submit" class="btn">Upload</button>
					<button type="button" class="btn btn-danger	" id="remove-pic" data-record-id="{{$vendor->id}}">Remove</button>
				</div>
		</div>
	</form>
	<!-- End Featues image -->
	<!-- Cover Image -->
		<form action="{{ route('admin::update-vendor-cover',$vendor->id)}}" method="post" enctype="multipart/form-data">
		<div class="panel panel-default">
			<div class="panel-heading">
				Cover Image
			</div>
			<div class="panel-body">
				@if($vendor->cover)
					<a href="{{ImagePath($vendor->cover)}}" data-lightbox="profile">
						<img style="width:325px;"   src="{{ImagePath($vendor->cover,'md')}}" alt="">
					</a>
				@else 
					<strong>No Picture</strong>
				@endif
				<input type="file" name="file_cover">
				{{csrf_field()}}

				@if($errors->has('file_cover'))
					<span class="text-danger"> {{$errors->first('file_cover')}}</span>
				@endif
			</div>
			<div class="panel-footer">

					<button type="submit" class="btn">Upload</button>
					@if($vendor->cover)
					<button type="button" class="btn btn-danger	" id="remove-cover" data-record-id="{{$vendor->id}}">Remove</button>
					@endif
				</div>
		</div>
	</form>

	<!-- End Cover Image -->
	</div>
	<!-- End Picture update section -->
</div>

<!-- Modals -->
	<!-- Modal 1 -->
	<div class="modal fade" id="removePicModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <form action="{{route('admin::all-vendors')}}" method="post">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Delete Vendor Picture</h4>
      </div>
      <div class="modal-body">
        	<p class="alert alert-danger" id="modalContext">

        	Delete picture . Are you sure ?;
        	</p>
        	{{ csrf_field() }}
        <input type="hidden" name="_method" value="delete">
        <input type="hidden" name="id" >
        <input type="hidden" name="action" >
      </div>
      <div class="modal-footer">
      	<button type="submit" class="btn btn-danger">DELETE</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
  </form>
</div>
	<!-- End Modal 1 -->

	<!-- Remove Logo 1 -->
	<div class="modal fade" id="removeLogoModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <form action="{{route('admin::all-vendors')}}" method="post">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Delete Vendor Logo</h4>
      </div>
      <div class="modal-body">
        	<p class="alert alert-danger" id="modalContext">

        	Delete picture . Are you sure ?;
        	</p>
        	{{ csrf_field() }}
        <input type="hidden" name="_method" value="delete">
        <input type="hidden" name="id" >
        <input type="hidden" name="action" >
      </div>
      <div class="modal-footer">
      	<button type="submit" class="btn btn-danger">DELETE</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
  </form>
</div>
	<!-- End Remove Logo 1 -->
		<!-- Remove Cover 1 -->
	<div class="modal fade" id="removeCoverModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <form action="{{route('admin::all-vendors')}}" method="post">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Delete Vendor Cover Image</h4>
      </div>
      <div class="modal-body">
        	<p class="alert alert-danger" id="modalContext">

        	Delete picture . Are you sure ?;
        	</p>
        	{{ csrf_field() }}
        <input type="hidden" name="_method" value="delete">
        <input type="hidden" name="id" >
        <input type="hidden" name="action" >
      </div>
      <div class="modal-footer">
      	<button type="submit" class="btn btn-danger">DELETE</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
  </form>
</div>
	<!-- End Remove Cover 1 -->
<!-- End Modals -->
@endsection


@section('scripts')
<script type="text/javascript">
	$(function(){
		 $('select[multiple]').select2();


		 // Remove pic modal
		 var removePic = new Confirmbox();
		 removePic.setActionUrl('remove-picture');
		 removePic.create({'el':'#remove-pic','modal':'#removePicModal','action_url':'remove-picture'});


		 

		 var removeLogo = new Confirmbox();
		 removeLogo.setActionUrl('remove-logo');
		 removeLogo.create({'el':'#remove-logo','modal':'#removeLogoModal','action_url':'remove-logo'});

		 var removeCover = new Confirmbox();
		 removeCover.setActionUrl('remove-cover');
		 removeCover.create({'el':'#remove-cover','modal':'#removeCoverModal','action_url':'remove-cover'});
	});
</script>
@endsection