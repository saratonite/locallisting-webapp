@extends('layouts.admin')

@section('content')
<div class="row">
	<div class="col-md-2">
		<ul class="nav nav-list">
			<li><a href="{{ route('admin::city-add')}}">Add City</a></li>
			<li><a href="{{ route('admin::list-cities')}}">All Cities</a></li>

		</ul>
	</div>
	<div class="col-md-10">
		<h3>Cities</h3>
		<table class="table table-bordered">
			<thead>
				<th class="col-md-1">id</th>
				<th class="col-md-4">Name</th>
				<th class="col-md-5">Description</th>
				<th class="col-md-2">Status</th>
			
			</thead>
			<tbody>
			<!-- Loop through cities -->
			@if($cities->count())
			@foreach($cities as $city)
				<tr>
					<td>{{$row_count++}}</td>
					<td><a href="{{ route('admin::city-edit',$city->id)}}">{{str_limit($city->name,30)}}</a></td>
					<td><a href="{{ route('admin::city-edit',$city->id)}}">{{str_limit($city->name,30)}}</a></td>
					<td><a href="{{ route('admin::city-edit',$city->id)}}">{{str_limit($city->name,30)}}</a></td>
				</tr>
			@endforeach
			@else
				<tr class="info">
					<td colspan="4">No records</td>
				</tr>
			@endif
			<!-- End Loop -->
			</tbody>
		</table>
		{!! $cities->links()!!}
	</div>
</div>
@endsection