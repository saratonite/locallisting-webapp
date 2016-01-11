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
					<td>Email</td>
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
		<!-- Recent Enquiries -->
		<table class="table table-bordered">
			<thead>
				<tr>
					<th colspan="5">Recent Enquiries</th>
				</tr>
				<tr>
					<th>Sl.No</th>
					<th>Subject</th>
					<th>To</th>
					<th>Date/Time</th>
					<th>Status</th>
				</tr>
			</thead>
			<tbody>
				<!-- Loop through enquiries  -->
			@if($user->enquiry->count())
			@foreach($user->enquiry as $enquiry)
				<tr>
					<td>{{$enquiry->id}}</td>
					<td><a href="{{route('admin::view-enquiry',$enquiry->id)}}" data-toggle="tooltip" data-placement="top"  title="{{$enquiry->subject}}">{{str_limit($enquiry->subject,26)}}</a></td>
					<td><a title="{{$enquiry->vendor->user->first_name}} {{$enquiry->vendor->user->last_name}}" data-toggle="tooltip" data-placement="top">{{$enquiry->vendor->user->first_name}}</a></td>
					<td ><a title="{{$enquiry->from->created_at->diffForHumans()}}" data-toggle="tooltip" data-placement="top">{{$enquiry->from->created_at->toFormattedDateString()}}</a></td>
					<td>---</td>
				</tr>
			@endforeach
			@else
			<tr>
				<td colspan="5" class="info"> No enquiries yet.</td>
			</tr>
			@endif
			<!-- End Enquiry loop -->
			</tbody>
		</table>
		<!-- End Recent Enquiries -->
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
						<td> <span class="badge">{{$user->enquiry->count()}}</span></td>
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
</div>
<!-- End Row 1 -->







@endsection

@section('scripts')
<script>
	$(function(){
		
	var changeStatusURL = "{{ route('admin::all-vendors') }}/change-status/";
	// Chnage status
	$('.change-status').on('click','li a.status-action',function(e){

		var statusAvailable = {'active':{'class':'alert-info','title':'Activate'},'block':{'class':'alert-danger','title':'Block'},'pending':{'class':'alert-info','title':'Pending'}};

		console.log(this);
		var action = $(this).data('status-action');

		var parentNode = $(this).parents('.btn-group').find('button');

		if(!parentNode){
			console.log('nop');
		}

		var recordId = parentNode.data('record-id');

		var contextBody = '<p class="alert alert-info">Are you sure?</p>';
		$("#modalContext").html(contextBody);

		$("#chnage-status-modal form").attr('action',changeStatusURL+recordId);



		$("#modal-recordId").val(recordId);
		$("#modal-actionName").val(action);

		console.log(recordId);

		// Showing modal
		$('#chnage-status-modal').modal('show');

	});
});
</script>
@endsection