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
	

	<div>

		@if(count($enquiry->getStatuArray()))
			<div class="btn-group ">
							  <button type="button" data-record-id="{{$enquiry->id}}"  class="btn dropdown-toggle btn-{{ BS_Status_Class($enquiry->status) }}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							   {{ucfirst($enquiry->status)}} <span class="caret"></span>
							  </button>
							  <ul class="dropdown-menu change-status">
							  @foreach($enquiry->getStatuArray() as $status)
							  <li><a class="status-action" href="javascript:void(0);" data-status-action="{{$status}}">{{ucfirst($status)}}</a></li>
							  @endforeach
							  </ul>
							</div>
		@endif
		<input type="button" class="btn btn-danger" value="DELETE">
	</div>
	
		
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

<!-- End Page Main Contents -->
<!-- Change status modal -->
<div class="modal fade" tabindex="-1" id="chnage-status-modal" role="dialog">
<form  method="post">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Change Enquiry Status</h4>
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
		
	var changeStatusURL = "{{ route('admin::all-enquiries') }}/change-status/";
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