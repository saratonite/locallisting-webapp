@extends('layouts.admin')

@section('content')
<div class="row">
	<h3>Vendors</h3>

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
				<td>{{$vendor->vendor_name}}</td>
				<td>{{$vendor->categoryname()}}</td>
				<td>{{$vendor->cityname()}}</td>
				<td>
					<!-- Single button -->
					<div class="btn-group btn-block">
					  <button type="button" data-record-id="{{$vendor->id}}"  class="btn dropdown-toggle btn-sm  btn-block btn-{{ BS_Status_Class($vendor->user->status) }}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					   {{ucfirst($vendor->user->status)}} <span class="caret"></span>
					  </button>
					  <ul class="dropdown-menu change-status">
					  	@unless($vendor->user->status == "active")
					    <li><a href="#" data-status-action="activate">Activate</a></li>
					    @endunless
					    @unless($vendor->user->status == "blocked")
					    <li><a href="#" data-status-action="block">Block</a></li>
					    @endunless
					    <li><a href="#">Move to pending</a></li>
					    <li role="separator" class="divider"></li>
					    <li><a href="#" data-status-action="pending">Edit Details</a></li>
					  </ul>
					</div>
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
<!-- Change status modal -->
<div class="modal fade" tabindex="-1" id="chnage-status-modal" role="dialog">
<form action="{{ route('admin::vendors-change-status') }}" method="post">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Change Vendor Status</h4>
      </div>
      <div class="modal-body">
        <p>Are you sure ?&hellip;</p>
        <input type="hidden" name="_method" value="put">
        <input type="hidden" name="id" id="modal-recordId">
        <input type="hidden" name="status" id="modal-actionName">
        {{csrf_field()}}
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
</div>

@section('scripts')
<script>
	$(function(){
	var changeStatusURL = "{{ route('admin::vendors-change-status') }}";
	// Chnage status
	$('.change-status').on('click','li a',function(e){

		console.log(this);
		var action = $(this).data('status-action');

		var parentNode = $(this).parents('.btn-group').find('button');

		if(!parentNode){
			console.log('nop');
		}

		var recordId = parentNode.data('record-id');

		$("#chnage-status-modal form").attr('action',changeStatusURL+"/"+recordId);



		$("#modal-recordId").val(recordId);
		$("#modal-actionName").val(action);

		console.log(recordId);

		// Showing modal
		$('#chnage-status-modal').modal('show');

	});
});
</script>
@endsection