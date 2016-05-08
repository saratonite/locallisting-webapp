@extends('layouts.admin')

@section('content')
	<h3>User Reviews</h3>

	@include('admin.partials.alert')

	<table class="table table-bordered">
		<thead>
			<th>#</th>
			<th>Title</th>
			<th>User</th>
			<th>Vendor</th>
			<th>Status</th>
			<th>Action</th>
		</thead>
		<tbody>
			@if(count($reviews))
				@foreach($reviews as $review)
					<tr>
						<td class="col-md-1">{{ $row_count++}}</d>
						<td class="col-md-3"><a href="{{ route('admin::show-review',$review->id) }}">{{ str_limit($review->title,35)}}</a></td>
						<td class="col-md-2">{{ $review->user->first_name }}</td>
						<td class="col-md-2">{{$review->vendor->vendor_name}}</td>
						<td class="col-md-1"> <span class="label label-{{ BS_Status_Class2($review->status)}}">{{ ucfirst($review->status)}}</span></td>
						<td class="col-md-1">
							<a href="{{ route('admin::show-review',$review->id)}}"><i class="glyphicon glyphicon-eye-open"></i></a>
							<a href="#delete" class="delete-action" data-record-id="{{$review->id}}"><i class="glyphicon glyphicon glyphicon-remove"></i></a>
						</td>
					</tr>
				@endforeach

			@else 

				<tr class="info">
					<td colspan="6">No Record</td>
				</tr>

			@endif
		</tbody>
	</table>

	{!! $reviews->links() !!}


<!-- Modals -->

<!-- Delete Review modal -->
<div class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <form action="" method="post">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Delete Review</h4>
      </div>
      <div class="modal-body">
        	<p class="alert alert-danger" id="modalContext">

        	Change review status ?;
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
<!-- End Delete Review modal  -->
<!-- End Modals -->
@endsection

@section('scripts')
<script type="text/javascript">

var reviewsBase = "{{route('admin::list-reviews')}}";

var delbox = new Confirmbox();
	delbox.create({"el":".delete-action",'"modal':'#delete-modal',"action_url":reviewsBase+"/delete"});
	
</script>
@endsection