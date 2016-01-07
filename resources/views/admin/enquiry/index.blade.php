@extends('layouts.admin')

@section('content')
<h3>Enquiries</h3>
<table class="table table-bordered table-striped table-hover">
	<thead>
		<tr>
			<th>Sl.No</th>
			<th>Subject</th>
			<th>User</th>
			<th>Vendor</th>
			<th>Date</th>
		</tr>
	</thead>
	<tbody>
		<!-- Loop through enquiries -->
		@foreach($enquiries as $enquiry)
		<tr>
			<td>1</td>
			<td>{{$enquiry->subject}}</td>
			<td>{{ $enquiry->from->first_name}}</td>
			<td>{{ $enquiry->vendor->vendor_name }}</td>
			<td>{{ $enquiry->created_at->format('d-M-Y')}}</td>
		</tr>
		@endforeach
		<!-- End Loop through enquiries -->
	</tbody>
</table>
@endsection