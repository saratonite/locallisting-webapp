@extends('layouts.admin')

@section('content')
<h3>Users</h3>
@include('admin.partials.alert')
<table class="table table-bordered table-striped table-hover">
	<thead>
		<tr>
			<th class="col-md-1">Sl.No</th>
			<th class="col-md-3">Name</th>
			<th class="col-md-3">Email</th>
			<th class="col-md-1">Status</th>
			<th class="col-md-1">Join Date</th>
			<th class="col-md-1">Action</th>
		</tr>
	</thead>
	<tbody>
		@if($siteusers->count())
		<!-- Loop through site users -->
		@foreach($siteusers as $user)
		<tr>
			<td>{{$row_count}}</td>
			<td><a href="{{ route('admin::view-site-user',$user->id)}}">{{ $user->first_name }} {{ $user->last_name }}</a></td>
			<td>{{ $user->email }}</td>
			<td>
				
					  <span type="button" data-record-id="{{$user->id}}"  class="label label-{{ BS_Status_Class($user->status) }}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					   {{ucfirst($user->status)}} 
					  </span>
					
			</td>
			<td>
				{{$user->created_at->toFormattedDateString()}}
			</td>
			<td>
				
				<a href="{{ route('admin::view-site-user',$user->id)}}"><i class="glyphicon glyphicon-eye-open"></i></a>
				<a href="#delete" class="action-delete" data-record-id="{{$user->id}}"><i class="glyphicon glyphicon-remove"></i></a>
			</td>
			<?php $row_count++;?>
		</tr>
		@endforeach
		<!-- End Loop through site users -->
		@else
		<tr>
			<td colspan="6" class="alert alert-info"> No Records. </td>
		</tr>
		@endif
	</tbody>
</table>
<!-- Pagination links -->
	{!! $siteusers->links() !!}
<!-- End Pagination links -->


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

        	Delete User ?; this will affect the following.
        	<ul>
        		<li>Delete enquiries</li>
        		<li>Delete reviews</li>
        		<li>Delete images</li>
        	</ul>
        	</p>
        	{{csrf_field()}}
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
	var userBase = "{{route('admin::all-site-users')}}";
	var delBox = new Confirmbox();
	delBox.create({"el":".action-delete",'modal':'#delete-modal','action_url':userBase+'/delete'});

</script>
@endsection