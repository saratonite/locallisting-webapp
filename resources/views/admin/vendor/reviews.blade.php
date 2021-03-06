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
		<h3>Reviews of {{ $vendor->vendor_name }}</h3>
		<table class="table table-bordered">
			<thead>
				<tr>
					<th class="col-md-1">Sl.No</th>
					<th class="col-md-4">Subject</th>
					<th class="col-md-3">From</th>
					<th class="col-md-2">Date</th>
					<th class="col-md-1">Status</th>
				</tr>
				<!-- Loop -->
				@if(count($reviews))
					@foreach($reviews as $review)
						<tr>
							<td>{{ $row_count++ }}</td>
							<td><a href="{{route('admin::show-review',$review->id)}}">{{$review->title}}</a></td>
							<td>{{$review->user->first_name}}</td>
							<td>{{$review->created_at->toFormattedDateString()}}</td>
							<td><label class="label label-{{BS_Enquiry_Status_Class($review->status)}}">{{ucfirst($review->status)}}</label></td>
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

		{!! $reviews->links() !!}
	
	</div>
</div>
@endsection()