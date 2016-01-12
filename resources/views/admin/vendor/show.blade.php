@extends('layouts.admin')

@section('content')

<div class="row">
	<div class="col-md-6">
		<table class="table table-bordered ">
			<thead>
				<tr>
					<th colspan="2">
						<h4>Vendor Profile <span class="label label-info"><a href="{{route('admin::edit-vendor',$vendor->id)}}">Edit</a></span></h4> 
					</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>Name </td>
					<td>{{$vendor->vendor_name}} </td>
				</tr>
				<tr>
					<td>Description </td>
					<td>{{$vendor->description}} </td>
				</tr>
				<tr>
					<td>Category </td>
					<td>{{$vendor->categoryname()}} </td>
				</tr>
				<tr>
					<td>City </td>
					<td>{{$vendor->cityname()}} </td>
				</tr>
				<tr>
					<td>Contact Number </td>
					<td>{{$vendor->contact_number}} </td>
				</tr>
				<tr>
					<td>Mobile Number </td>
					<td>{{$vendor->mobile}} </td>
				</tr>
				<tr>
					<td>Address</td>
					<td>--</td>
				</tr>
				<tr>
					<td>Google Map**</td>
					<td>-- </td>
				</tr>
				<tr>
					<td>Updated </td>
					<td>{{$vendor->updated_at->toFormattedDateString()}} , <span>{{ $vendor->updated_at->diffForHumans()}}</span></td>
				</tr>
			</tbody>
		</table>
	</div>
	<!-- Right column  -->
	<div class="col-md-5">
	<!-- User Details -->
		<table class="table table-bordered">
			<thead>
				<tr>
					<th colspan="2">
						<h4>User Details <a href="{{route('admin::edit-site-user',$vendor->user->id)}}">Edit</a></h4>
					</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>Name</td>
					<td>{{$vendor->user->first_name}}  {{$vendor->user->last_name}}</td>
				</tr>
				<tr>
					<td>Name</td>
					<td>{{$vendor->user->email}}</td>
				</tr>
								<tr>
					<td>Status </td>
					<td><span class=" label label-{{ BS_Status_Class($vendor->user->status) }}">{{ucfirst($vendor->user->status)}}</span> </td>
				</tr>
				<tr>
					<td>Join date </td>
					<td>{{$vendor->user->created_at->toFormattedDateString()}} <span class="label label-primary">{{ $vendor->user->created_at->diffForHumans() }}</span></td>
				</tr>
			</tbody>
		</table>
	<!-- End User Details -->
	<!-- Vendor Profile Status -->
	<table class="table table-bordered">
		<thead>
				<tr>
					<th colspan="2">
						<h4>Vendor Stats**</h4>
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
	</div>
	<!-- End Right column -->
</div>
<div class="row">
	<!-- Row 2 Left col -->
	<div class="col-md-6">
		<!-- Recent Enquiries -->
		<table class="table table-bordered">
			<thead>
				<tr>
					<th colspan="5">Recent Enquiries</th>
				</tr>
				<tr>
					<th>Sl.No</th>
					<th>Subject</th>
					<th>User</th>
					<th>Date/Time</th>
					<th>Status</th>
				</tr>
			</thead>
			<tbody>
			<!-- Loop through enquiries  -->
			@if($vendor->enquiry->count())
			@foreach($vendor->enquiry as $enquiry)
				<tr>
					<td>{{$enquiry->id}}</td>
					<td><a href="{{route('admin::view-enquiry',$enquiry->id)}}" data-toggle="tooltip" data-placement="top"  title="{{$enquiry->subject}}">{{str_limit($enquiry->subject,26)}}</a></td>
					<td><a title="{{$enquiry->from->first_name}} {{$enquiry->from->last_name}}" data-toggle="tooltip" data-placement="top">{{$enquiry->from->first_name}}</a></td>
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
	<!-- End Row 2 Left col -->
	<!-- Row 2 Right col -->
	<div class="col-md-5">
	<div class="panel panel-info">
		<div class="panel-heading">
			<h3 class="panel-title">Change Status</h3>
		</div>
		<div class="panel-body">
			<!-- Status switch -->
					<div class="btn-group ">
					  <button type="button" data-record-id="{{$vendor->id}}"  class="btn dropdown-toggle btn-{{ BS_Status_Class($vendor->user->status) }}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					   {{ucfirst($vendor->user->status)}} <span class="caret"></span>
					  </button>
					  <ul class="dropdown-menu change-status">
					  	@unless($vendor->user->status == "active")
					    <li><a class="status-action" href="javascript:void(0);" data-status-action="active">Activate</a></li>
					    @endunless
					    @unless($vendor->user->status == "blocked")
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
	<!-- Row 2 Right col -->

</div>

<!-- End Page Main Contents -->
<!-- Change status modal -->
<div class="modal fade" tabindex="-1" id="chnage-status-modal" role="dialog">
<form  method="post">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Change Vendor Status</h4>
      </div>
      <div class="modal-body">
        <p id="modalContext">Are you sure ?&hellip;</p>
        <input type="hidden" name="_method" value="put">
        <input type="hidden" name="id" id="modal-recordId">
        <input type="hidden" name="status" id="modal-actionName">
        {{csrf_field()}}
        	<div class="checkbox">
        		<label><input type="checkbox" class="checkbox" name="notify">Send a notification email?.</label>
        	</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Continue</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</form>
</div><!-- /.modal -->
<!-- End change status modal  -->

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