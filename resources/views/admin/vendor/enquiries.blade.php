@extends('layouts.admin')

@section('content')
<div class="row">

	<div class="col-md-2">
		<div data-spy="affix" data-offset-top="60" data-offset-bottom="200">
		<nav>
			<ul class="list-group">
				<li  class="list-group-item"><a href="{{route('admin::vendor-enquiries',$vendor->id)}}">All </a> <span class="badge"> {{$count['all']}}</span></li>
				<li  class="list-group-item"><a href="{{route('admin::vendor-enquiries',$vendor->id)}}/accepted">Accepted</a><span class="badge"> {{$count['accepted']}}</span></li>
				<li  class="list-group-item"><a href="{{route('admin::vendor-enquiries',$vendor->id)}}/pending">Pending</a><span class="badge"> {{$count['pending']}}</span></li>
				<li  class="list-group-item"><a href="{{route('admin::vendor-enquiries',$vendor->id)}}/rejected">Rejected</a><span class="badge"> {{$count['rejected']}}</span></li>
				<li  class="list-group-item"><a href="{{route('admin::vendor-enquiries',$vendor->id)}}/spam">Spam</a><span class="badge"> {{$count['spam']}}</span></li>
			</ul>
		</nav>
			<ul class="nav nav-list">
				<li><a href="">Profile</a></li>
				<li><a href="{{route('admin::edit-vendor',$vendor->id)}}">Edit Profile</a></li>
				<li class="active"><a href="{{route('admin::vendor-enquiries',$vendor->id)}}">Enquiries</a></li>
			</ul>
		</div>
	</div>
	<div class="col-md-10">
		<h3>Enquires of {{ $vendor->vendor_name }}</h3>
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
				@if(count($enquiries))
					@foreach($enquiries as $enquiry)
						<tr>
							<td>{{$enquiry->id}}</td>
							<td><a href="{{route('admin::view-enquiry',$enquiry->id)}}">{{$enquiry->subject}}</a></td>
							<td>{{$enquiry->from->first_name}}</td>
							<td>{{$enquiry->created_at->toFormattedDateString()}}</td>
							<td><label class="label label-{{BS_Enquiry_Status_Class($enquiry->status)}}">{{ucfirst($enquiry->status)}}</label></td>
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

		{!! $enquiries->links() !!}
	
	</div>
</div>
@endsection()