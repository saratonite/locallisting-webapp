@extends('layouts.admin')



@section('content')
<div class="row">
	<div class="col-md-2">
		<ul class="nav nav-list">
			<li><a href="{{ route('admin::new-category')}}">Add Category</a></li>
			<li><a href="{{ route('admin::list-category')}}">All Categories</a></li>

		</ul>
	</div>
	<div class="col-md-10">
		<h3>Catogories</h3>
		@include('admin.partials.alert')
		<table class="table table-bordered">
			<thead>
				<th class="col-md-1">#</th>
				<th class="col-md-4">Name</th>
				<th class="col-md-5">Description</th>
				<th class="col-md-2">Status</th>
			
			</thead>
			<tbody>
		<!-- Loop through categories -->
			@if($categories->count())
			@foreach($categories as $category)
				<tr>
					<td>{{$row_count++}}</td>
					<td><a href="{{route('admin::category-edit',$category->id)}}">{{$category->name}}</a></td>
					<td>{{$category->name}}</td>
					<td>{{$category->name}}</td>
				</tr>
			@endforeach
			@else
				<tr>
					<td colspan="4">No records</td>
				</tr>
			@endif
			<!-- End Loop -->
			</tbody>
		</table>
		{!! $categories->links()!!}
	</div>
</div>
@endsection