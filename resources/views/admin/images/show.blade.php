@extends('layouts.admin')

@section('content')
<div class="col-md-6">
	<h3>Image</h3>
	<a href="{{imagePath($image)}}" data-lightbox="image" class="thumbnail">
		<img src="{{imagePath($image)}}" alt="" class="img">
	</a>
	<div class="panel panel-default">
		<div class="panel-heading">
			{{$image->title}}
		</div>
		<div class="panel-body">
			{{$image->description}}
		</div>
	</div>
</div>

<div class="col-md-6">
	<br>
	<br>
	<br>

	<div class="panel panel-info">
		<div class="panel-heading">
			Info
		</div>
		<div class="panel-body">
			<table>
				<tr>
					<td class="col-md-3">User </td>
					<td class="col-md-9">{{$image->user->first_name}}</td>
				</tr>
				<tr>
					<td class="col-md-3">Type </td>
					<td class="col-md-9">{{ucfirst($image->type)}}</td>
				</tr>
				<tr>
					<td class="col-md-3">Created </td>
					<td class="col-md-9">{{$image->created_at->toFormattedDateString()}}</td>
				</tr>
				<tr>
					<td class="col-md-3">Updated </td>
					<td class="col-md-9">{{$image->updated_at->toFormattedDateString()}}</td>
				</tr>
			</table>
		</div>
	</div>
	<!-- Change Status -->
	<div class="panel panel-info">
		<div class="panel-heading">
			Change Status
		</div>
		<div class="panel-body">

			<label>Change Status</label>
				 <div class="btn-group">
					  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					    {{ucfirst($image->status)}} <span class="caret"></span>
					  </button>
					  <ul class="dropdown-menu">
					  	@if($image->status <> "accepted")
					    <li><a class="status-action" data-action="accepted" href="#">Accept</a></li>
					    @endif
					    @if($image->status <> "rejected")
					    <li><a class="status-action" data-action="rejected" href="#">Reject</a></li>
					    @endif
					    @if($image->status <> "pending")
					    <li><a class="status-action" data-action="pending" href="#">Pending</a></li>
					    @endif
					  </ul>
					</div>
			
		</div>
	</div>


	<div class="panel panel-danger">
		<div class="panel-heading">
			Delete Image
		</div>
		<div class="panel-body">
			<button class="b-delete-image btn btn-danger" data-action="default">DELETE</button>
		</div>
	</div>
</div>

<!-- Modals -->

<!-- Change status modal -->
<div class="modal fade" id="chnage-status-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <form action="" method="post">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Change Status</h4>
      </div>
      <div class="modal-body">
        	<p class="alert alert-danger" id="modalContext">

        	Change review status ?;
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
<!-- End change status modal  -->
<!--  -->
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

        	Delete image ?;
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
<!--  -->

<!--End Modals -->
@endsection

@section('scripts')
<script>
	$(function(){

		// Chnage status
		var imageBase = "{{ route("admin::list-images")}}/change-status";
		var imageDeleteBase = "{{ route("admin::list-images")}}/delete";
		var imageId = {{ $image->id}};
		var changeStatusBox = new Confirmbox();
		changeStatusBox.create({"el":".status-action",'modal':"#chnage-status-modal","action_url":imageBase,"recordId":imageId});

		var delBox = new Confirmbox();
		delBox.create({"el":".b-delete-image",'modal':"#delete-modal","action_url":imageDeleteBase,"recordId":imageId});




	});
</script>
@endsection