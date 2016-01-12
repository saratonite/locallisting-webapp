@extends('layouts.admin')

@section('content')
<div class="row">
	<h3>Categories</h3>
	<div class="col-md-12">
		<table class="table table-bordered">
			<thead>
				<th>id</th>
				<th>Name</th>
			
			</thead>
			<tbody>
			<!-- Loop through categories -->
			@if($categories->count())
			@foreach($categories as $category)
				<tr>
					<td>{{$category->id}}</td>
					<td>{{$category->name}}</td>
				</tr>
			@endforeach
			@endif
			<!-- End Loop -->
			</tbody>
		</table>
	</div>
</div>
@endsection