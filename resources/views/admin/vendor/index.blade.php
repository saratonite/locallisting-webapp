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
			<th class="col-md-2">Featured</th>
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
				<td>
					@if($vendor->featured)
						<button class="btn btn-xs btn-warning unset-featured" data-record-id="{{$vendor->id}}">Remove Freatured</button>
					@else
						<button class="btn btn-xs btn-primary set-featured" data-record-id="{{$vendor->id}}">Set As Featured</button>

					@endif

				</td>
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
<!-- Modals -->

<!--Delete Modal -->
<div class="modal fade" id="modalSetFeatured" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <form action="" method="post">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Make Featured</h4>
      </div>
      <div class="modal-body">
        	<p class="alert alert-danger" id="modalContext">

        	Make this vendor as featured ?;
        	</p>
        	{{ csrf_field() }}
        <input type="hidden" name="_method" value="put">
        <input type="hidden" name="id" >
        <input type="hidden" name="action" >
      </div>
      <div class="modal-footer">
      	<button type="submit" class="btn btn-success">Make Featured</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
  </form>
</div>
<!-- End Set as Featured -->
<div class="modal fade" id="modalUnsetFeatured" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <form action="" method="post">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Remove Featured</h4>
      </div>
      <div class="modal-body">
        	<p class="alert alert-danger" id="modalContext">

        	Remove this vendor from featured ?;
        	</p>
        	{{ csrf_field() }}
        <input type="hidden" name="_method" value="put">
        <input type="hidden" name="id" >
        <input type="hidden" name="action" >
      </div>
      <div class="modal-footer">
      	<button type="submit" class="btn btn-danger">CONTINUE</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
  </form>
</div>
<!-- End Set as Featured -->
<!-- End Modal -->
@endsection


@section('scripts')

<script type="text/javascript">
	var vendorsBaseUrl= "{{route('admin::all-vendors')}}";
	var setFeatured = new Confirmbox();
	setFeatured.create({"el":".set-featured","modal":"#modalSetFeatured","action_url":vendorsBaseUrl+"/setfeatured"});


	var UnsetFeatured = new Confirmbox();
	UnsetFeatured.create({"el":".unset-featured","modal":"#modalUnsetFeatured","action_url":vendorsBaseUrl+"/unsetfeatured"});

</script>
@endsection

