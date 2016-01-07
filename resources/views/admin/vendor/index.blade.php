@extends('layouts.admin')

@section('content')
<div class="row">
<div class="page-header">
	<h2>Vendors</h2>
</div>
x
<!-- List vendors -->
<table class="table table-bordered table-striped table-hover">
	<thead>
		<tr>
			<th>Sl.No</th>
			<th>Vendor Name</th>
			<th>Category</th>
			<th>City</th>
			<th>Status</th>
			<th>Join Date</th>
			<th>Actions</th>
		</tr>
	</thead>
	<tbody>
		<!-- Loop through vendors -->
		@foreach($vendors as $vendor)
			<td>1</td>
			<td>{{$vendor->vendor_name}}</td>
			<td>{{$vendor->categoryname()}}</td>
			<td>{{$vendor->cityname()}}</td>
			<td>{{$vendor->user->status}}</td>
			<td>{{ $vendor->user->created_at->format('d-M-Y')}}</td>
			<td></td>
		@endforeach
		<!-- End Loop through vendors -->
	</tbody>
</table>
<!-- End List vendors -->
@endsection
</div>