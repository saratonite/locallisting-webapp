@extends('layouts.admin')

@section('content')
	<h3>Images</h3>
	<table class="table table-bordered">
		<thead>
			<th>#</th>
			<th>Image</th>
			<th>Title</th>
			<th>User</th>
			<th>Type</th>
			<th>Status</th>
			<th>Action</th>
		</thead>
		<tbody>
			@if(count($images))
				@foreach($images as $image)
					<tr>
						<td class="col-md-1">{{ $row_count++}}</d>
						<td class="col-md-1">
							
							<a href="{{imagePath($image)}}" data-lightbox="image-{{$image->id}}">
								<img class="img" style="width:42px" src="{{imagePath($image)}}" alt="{{$image->title}}">
							</a>
						</td>
						<td class="col-md-3"><a href="{{route('admin::show-image',$image->id)}}">{{ str_limit($image->title,35)}}</a></td>
						<td class="col-md-2">{{ $image->user->first_name }}</td>
						<td class="col-md-2">{{ ucfirst($image->type) }}</td>
						<td class="col-md-1"> <span class="label label-{{ BS_Status_Class2($image->status)}}">{{ ucfirst($image->status)}}</span></td>
						<td class="col-md-1"> 
								<a href="{{ route('admin::edit-image',$image->id)}}" >Edit</a>
								<a class="delete-image" data-record-id="{{$image->id}}"  >Delete</a>

							</td>
					</tr>
				@endforeach

			@else 

				<tr class="info">
					<td colspan="5">No Record</td>
				</tr>

			@endif
		</tbody>
	</table>

	{!! $images->links() !!}

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
<!-- End Modals -->
@endsection

@section('scripts')
<script>
	$(function(){

		// Chnage status
		var imageDeleteBase = "{{ route("admin::list-images")}}/delete";

		var delBox = new Confirmbox();
		delBox.create({"el":".delete-image",'modal':"#delete-modal","action_url":imageDeleteBase});




	});
</script>
@endsection