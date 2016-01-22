@extends('layouts.admin')

@section('content')
<div class="row">
	<div class="col-md-2">
		@include('admin.city.partials.sidenav')

	</div>
	<div class="col-md-10">
		<h3>Cities</h3>
		@include('admin.partials.alert')
		<table class="table table-bordered">
			<thead>
				<th class="col-md-1">id</th>
				<th class="col-md-4">Name</th>
				<th class="col-md-5">Description</th>
				<th class="col-md-2">Status</th>
				<th>Actions</th>
			
			</thead>
			<tbody>
			<!-- Loop through cities -->
			@if($cities->count())
			@foreach($cities as $city)
				<tr>
					<td>{{$row_count++}}</td>
					<td><a href="{{ route('admin::city-edit',$city->id)}}">{{str_limit($city->name,30)}}</a></td>
					<td><a href="{{ route('admin::city-edit',$city->id)}}">{{str_limit($city->description,40)}}</a></td>
					<td><a href="{{ route('admin::city-edit',$city->id)}}">{{$city->status}}</a></td>
					<td><a href="#del" class="delete" data-record-id="{{$city->id}}"> <i class="glyphicon glyphicon-remove-circle"></i></a</td>
				</tr>
			@endforeach
			@else
				<tr class="info">
					<td colspan="5">No records</td>
				</tr>
			@endif
			<!-- End Loop -->
			</tbody>
		</table>
		{!! $cities->links()!!}
	</div>
</div>

<!--Delete Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <form action="" method="post">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Delete City</h4>
      </div>
      <div class="modal-body">
        	<p class="alert alert-danger" id="modalContext">

        	This will  delete the city .Are you sure ?;
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
<!-- End Modal -->
@endsection

@section('scripts')
<script>
	$(function(){
		var citi_delete = new Confirmbox();
		citi_delete.create({'el':".delete","modal":"#deleteModal","action_url":"delete"});
	});
</script>
@endsection