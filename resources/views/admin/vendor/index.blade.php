@extends('layouts.admin')

@section('content')
<div class="row">
	<h3>Vendors</h3>
@include('admin.partials.alert')
<!-- List vendors -->
<table class="table table-bordered table-striped table-hover">
	<thead>
		<tr>
			<th class="col-md-1">Sl.No</th>
			<th class="col-md-3">Vendor Name</th>
			<th class="col-md-2">Category</th>
			<th class="col-md-2">City</th>
			<th class="col-md-1">Status</th>
			<th class="col-md-2">Join Date</th>
			<th>Actions</th>
		</tr>
	</thead>
	<tbody>
		@if(count($vendors))
		<!-- Loop through vendors -->
		@foreach($vendors as $vendor)
			<tr>
				<td>{{$row_count}}</td>
				<td><a href="{{route('admin::vendor-profile',$vendor->id)}}">{{$vendor->vendor_name}}</a></td>
				<td>{{$vendor->categoryname()}}</td>
				<td>{{$vendor->cityname()}}</td>
				<td>
					
					  <span   class="label btn-block label-{{ BS_Status_Class($vendor->user->status) }}" >{{ucfirst($vendor->user->status)}}</span>
					   
				</td>
				<td>{{ $vendor->user->created_at->format('d-M-Y')}}</td>
				<td>
					<a title="Vendor profile" href="{{route('admin::vendor-profile',$vendor->id)}}"><i class="glyphicon glyphicon-eye-open"></i></a>
					<a title="Edit Vendor profile" href="{{ route('admin::edit-vendor',$vendor->id)}}"><i class=" glyphicon glyphicon-pencil"></i></a>
					<a title="User details" href="{{ route('admin::view-site-user',$vendor->user->id)}}"><i class=" glyphicon glyphicon-user"></i></a>
				</td>
			</tr>
			<?php $row_count++;?>
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


