@extends('layouts.admin')

@section('content')
<h3>Enquiry Details</h3>
<div class="row">
	<!-- Row 1 left col -->
	<div class="col-md-6">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h5>{{$enquiry->subject}}</h5>
		</div>
		<div class="panel-body">
			<p>{!! nl2br(e($enquiry->message)) !!}</p>
		</div>
	</div>

	<!-- Enquiry Details -->
	<table class="table table-bordered">
		<tr>
			<td>From</td>
			<td>{{$enquiry->from->first_name}} {{$enquiry->from->last_name}}</td>
		</tr>
		<tr>
			<td>Vendor</td>
			<td>To Vendor name</td>
		</tr>
		<tr>
			<td>Date Time</td>
			<td>{{$enquiry->created_at->toFormattedDateString() }} , <span class="label label-primary">{{$enquiry->created_at->diffForHumans()}}</span></td>
		</tr>
		<tr>
			<td>Enquiry Status</td>
			<td>{{$enquiry->status}}</td>
		</tr>
	</table>
	<!-- End Enquiry Details -->
	
		
	</div>
	<!-- End Row 1 left col -->

	<!-- Row 1 right col -->
	<div class="col-md-5">
		<!-- Enquiry From user details  -->
				<table class="table table-bordered ">
			<thead>
				<tr>
					<th colspan="2">
						<h4>Sender Profile <span class="label label-info"></span></h4> 
					</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>Name</td>
					<td>{{$enquiry->from->first_name}}  {{$enquiry->from->last_name}}</td>
				</tr>
				<tr>
					<td>Email</td>
					<td>{{$enquiry->from->email}}</td>
				</tr>
								<tr>
					<td>Status </td>
					<td><span class=" label label-{{ BS_Status_Class($enquiry->from->status) }}">{{ucfirst($enquiry->from->status)}}</span> </td>
				</tr>
			</tbody>
		</table>
		<!-- End Enquiry From user detals -->
		<!-- Equiry Vendor Details -->
		<table class="table table-bordered ">
			<thead>
				<tr>
					<th colspan="2">
						<h4>Vendor Profile <span class="label label-info"><a href="#">Edit</a></span></h4> 
					</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>Name </td>
					<td>{{$enquiry->vendor->vendor_name}} </td>
				</tr>
				<tr>
					<td>Status </td>
					<td> <span class="label label-{{BS_Status_Class($enquiry->vendor->user->status)}}">{{ ucfirst($enquiry->vendor->user->status)}} </span> </td>
				</tr>
				<tr>
					<td>Category </td>
					<td>{{$enquiry->vendor->categoryname()}} </td>
				</tr>
				<tr>
					<td>City </td>
					<td>{{$enquiry->vendor->cityname()}} </td>
				</tr>
				<tr>
					<td>Contact Number </td>
					<td>{{$enquiry->vendor->contact_number}} </td>
				</tr>
				<tr>
					<td>Mobile Number </td>
					<td>{{$enquiry->vendor->mobile}} </td>
				</tr>
			</tbody>
		</table>
		<!-- End Equiry Vendor Details -->
	</div>
	<!-- End Row 1 right col -->
</div>
@endsection