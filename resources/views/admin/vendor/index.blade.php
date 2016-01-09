@extends('layouts.admin')

@section('content')
<div class="row">
	<h3>Vendors</h3>
@include('admin.partials.alert')
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
		@if(count($vendors))
		<!-- Loop through vendors -->
		@foreach($vendors as $vendor)
			<tr>
				<td>{{$vendor->id}}</td>
				<td><a href="{{route('admin::vendor-profile',$vendor->id)}}">{{$vendor->vendor_name}}</a></td>
				<td>{{$vendor->categoryname()}}</td>
				<td>{{$vendor->cityname()}}</td>
				<td>
					
					  <span   class="label btn-block label-{{ BS_Status_Class($vendor->user->status) }}" >{{ucfirst($vendor->user->status)}}</span>
					   
				</td>
				<td>{{ $vendor->user->created_at->format('d-M-Y')}}</td>
				<td></td>
			</tr>
		@endforeach
		<!-- End Loop through vendors -->
		@else
		<tr>
			<td colspan="7" class="alert alert-info"> No Records. </td>
		</tr>
		@endif
	</tbody>
</table>
<!-- Pagination links -->
	{!! $vendors->links() !!}
<!-- Pagination links -->
<!-- End List vendors -->
@endsection


