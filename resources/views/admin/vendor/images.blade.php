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
	<div class="col-md-10">
		<h3>Images of {{ $vendor->vendor_name }}</h3>
		<table class="table table-bordered">
			<thead>
				<tr>
					<th class="col-md-1">Sl.No</th>
					<th class="col-md-2">Sl.No</th>
					<th class="col-md-4">Subject</th>
					<th class="col-md-2">Date</th>
					<th class="col-md-1">Status</th>
				</tr>
				<!-- Loop -->
				@if(count($images))
					@foreach($images as $image)
						<tr>
							<td>{{ $row_count++ }}</td>
							<td>
								<a href="{{imagePath($image)}}" data-lightbox="image-{{$row_count}}" data-title="{{$image->title}}">
								<img class="img"  style="width:62px " src="{{imagePath($image,'sm')}}" alt="{{$image->title}}">
								</a>
								
							</td>
							<td><a href="{{route('admin::show-review',$image->id)}}">{{$image->title}}</a></td>
							<td>{{$image->created_at->toFormattedDateString()}}</td>
							<td><label class="label label-{{BS_Enquiry_Status_Class($image->status)}}">{{ucfirst($image->status)}}</label></td>
						</tr>
					@endforeach
				@else
				<tr>
					<td colspan="5" class="alert alert-info">No records</td>
				</tr>
				@endif
				<!-- End Loop -->
			</thead>
		</table>

		{!! $images->links() !!}
	
	</div>
</div>
@endsection()