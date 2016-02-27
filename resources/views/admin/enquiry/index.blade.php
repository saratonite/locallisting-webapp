@extends('layouts.admin')

@section('content')
<h3>Enquiries</h3>
@include('admin.partials.alert')
<table class="table table-bordered table-striped table-hover">
	<thead>
		<tr>
			<th class="col-md-1">Sl.No</th>
			<th class="col-md-5">Subject</th>
			<th class="col-md-2">User</th>
			<th class="col-md-2">Vendor</th>
			<th class="col-md-2">Date</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		@if($enquiries->count())
		<!-- Loop through enquiries -->
		@foreach($enquiries as $enquiry)
		<tr>
			<td>{{$row_count}}</td>
			<td><a href="{{route('admin::view-enquiry',$enquiry->id)}}">{{$enquiry->subject}}</a></td>
			<td>{{ $enquiry->from->first_name}}</td>
			<td>{{ $enquiry->vendor->vendor_name }}</td>
			<td>{{ $enquiry->created_at->format('d-M-Y')}}</td>
			<td>
				<a href="{{route('admin::view-enquiry',$enquiry->id)}}"> <i class="glyphicon glyphicon-eye-open"></i></a>
				<a href="#delete" class="action-delete" data-record-id="{{ $enquiry->id}}"> <i class="glyphicon glyphicon-remove"></i></a>
			</td>
		</tr>
			<?php $row_count++;?>
		@endforeach
		<!-- End Loop through enquiries -->
		@else
		<tr>
			<td colspan="5" class="alert alert-info"> No Records. </td>
		</tr>
		@endif
	</tbody>
</table>
<!-- Pagination links	 -->
{!! $enquiries->links() !!}
<!-- End Pagination links	 -->

<!-- Modals -->
<!-- Delete modal -->
<div class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <form action="" method="post">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Delete</h4>
      </div>
      <div class="modal-body">
        	<p class="alert alert-danger" id="modalContext">

        	Delete Enquiry ?
        	</p>
        	{{ csrf_field() }}
        <input type="hidden" name="_method" value="delete">
        <input type="hidden" name="id" >
        <input type="hidden" name="action" >
      </div>
      <div class="modal-footer">
      	<button type="submit" class="btn btn-danger">DELETE</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
  </form>
</div>
<!-- End Delete modal  -->
<!-- End Modals -->
@endsection

@section('scripts')

<script type="text/javascript">
	var enquiryBase = "{{route('admin::all-enquiries')}}";
	var delBox  = new Confirmbox	();
	delBox.create({"el":".action-delete","modal":"#delete-modal","action_url":enquiryBase+"/delete"});
</script>

@endsection