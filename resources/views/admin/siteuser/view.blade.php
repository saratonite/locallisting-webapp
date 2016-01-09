@extends('layouts.admin')

@section('content')
<!-- Row 1  -->
<div class="row">
	<!-- Row 1 Col left -->
	<div class="col-md-6">
		<table class="table table-bordered ">
			<thead>
				<tr>
					<th colspan="2">
						<h4>User Profile <span class="label label-info"><a href="#">Edit</a></span></h4> 
					</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>Name</td>
					<td>{{$user->first_name}}  {{$user->last_name}}</td>
				</tr>
				<tr>
					<td>Name</td>
					<td>{{$user->email}}</td>
				</tr>
								<tr>
					<td>Status </td>
					<td><span class=" label label-{{ BS_Status_Class($user->status) }}">{{ucfirst($user->status)}}</span> </td>
				</tr>
				<tr>
					<td>Join date </td>
					<td>{{$user->created_at->toFormattedDateString()}} <span class="label label-primary">{{ $user->created_at->diffForHumans() }}</span></td>
				</tr>
			</tbody>
		</table>
	</div>
	<!--  End Row 1 Col left  -->
	<!-- Row 1 Col right  -->
	<div class="col-md-5">
		<!-- Vendor Profile Status -->
		<table class="table table-bordered">
			<thead>
					<tr>
						<th colspan="2">
							<h4>User Stats**</h4>
						</th>
					</tr>
					<tr>
						<td>Enquiries </td>
						<td>-- </td>
					</tr>
					<tr>
						<td>Pending Enquiries </td>
						<td>-- </td>
					</tr>
					<tr>
						<td>Total Reviews </td>
						<td>-- </td>
					</tr>
				</thead>
		</table>
		<!-- End Vendor Profile Status -->
			<div class="panel panel-info">
				<div class="panel-heading">
					<h3 class="panel-title">Change Status</h3>
				</div>
				<div class="panel-body">
					<!-- Status switch -->
							<div class="btn-group ">
							  <button type="button" data-record-id="{{$user->id}}"  class="btn dropdown-toggle btn-{{ BS_Status_Class($user->status) }}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							   {{ucfirst($user->status)}} <span class="caret"></span>
							  </button>
							  <ul class="dropdown-menu change-status">
							  	@unless($user->status == "active")
							    <li><a class="status-action" href="javascript:void(0);" data-status-action="active">Activate</a></li>
							    @endunless
							    @unless($user->status == "blocked")
							    <li><a class="status-action" href="javascript:void(0);" data-status-action="blocked">Block</a></li>
							    @endunless
							    <li><a class="status-action" href="javascript:void(0);" data-status-action="pending">Move to pending</a></li>
							    <li role="separator" class="divider"></li>
							    <li><a href="#" >Edit Details</a></li>
							  </ul>
							</div>
							<!-- End Status switch -->
				</div>
			</div>
			<div class="panel panel-danger">
				<div class="panel-heading">
					<h3 class="panel-title">Delete Account</h3>
				</div>
				<div class="panel-body">
					<button class="btn btn-danger">Delete Profile</button>
					
				</div>
			</div>
	</div>
	<!-- End Row 1 Col left  -->


@endsection