@extends('layouts.admin')



@section('content')
<div class="row">
	<div class="col-md-2">
		@include('admin.category.partials.sidenav')
	</div>
	<div class="col-md-10">
		<h3>Catogories</h3>
		@include('admin.partials.alert')
		<table class="table table-bordered">
			<thead>
				<th class="col-md-1">#</th>
				<th class="col-md-3">Name</th>
				<th class="col-md-4">Description</th>
				<th class="col-md-2">Action</th>
			
			</thead>
			<tbody>
		<!-- Loop through categories -->
			@if($categories->count())
			@foreach($categories as $category)
				<tr>
					<td>{{$row_count++}}</td>
					<td><a href="{{route('admin::category-edit',$category->id)}}">{{$category->name}}</a></td>
					<td>{{$category->description}}</td>
					<td><a href="#delete" class="delete" data-record-id="{{$category->id}}"><i class="glyphicon glyphicon-remove-circle"></a></td>
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
		{!! $categories->links()!!}
	</div>
</div>
<!--Delete Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <form action="" method="post">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Delete Category</h4>
      </div>
      <div class="modal-body">
        	<p class="alert alert-danger" id="modalContext">

        	This will  delete the category .Are you sure ?;
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
		var v = new Confirmbox();
		v.create({'el':'.delete','modal':'#deleteModal','action_url':'delete'});
	});
</script>
@endsection