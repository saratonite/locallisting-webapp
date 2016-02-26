@extends('layouts.admin')

@section('content')
<h3>Enquiries</h3>
<table class="table table-bordered table-striped table-hover">
	<thead>
		<tr>
			<th class="col-md-1">Sl.No</th>
			<th class="col-md-5">Subject</th>
			<th class="col-md-2">User</th>
			<th class="col-md-2">Vendor</th>
			<th class="col-md-2">Date</th>
		</tr>
	</thead>
	<tbody>
		@if($enquiries->count())
		<!-- Loop through enquiries -->
		@foreach($enquiries as $enquiry)
		<tr>
			<td>{{$row_count}}</td>
			<td><a href="{{route('admin::view-enquiry',$enquiry->id)}}">{{$enquiry->subject}}</a></td>
			<td>{{ $enquiry->from->first_name}}</td>
			<td>{{ $enquiry->vendor->vendor_name }}</td>
			<td>{{ $enquiry->created_at->format('d-M-Y')}}</td>
		</tr>
			<?php $row_count++;?>
		@endforeach
		<!-- End Loop through enquiries -->
		@else
		<tr>
			<td colspan="5" class="alert alert-info"> No Records. </td>
		</tr>
		@endif
	</tbody>
</table>
<!-- Pagination links	 -->
{!! $enquiries->links() !!}
<!-- End Pagination links	 -->
@endsection