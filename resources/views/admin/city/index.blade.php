@extends('layouts.admin')

@section('content')
<div class="row">
	<h3>Cities</h3>
	<div class="col-md-12">
		<table class="table table-bordered">
			<thead>
				<th>id</th>
				<th>Name</th>
			
			</thead>
			<tbody>
			<!-- Loop through cities -->
			@if($cities->count())
			@foreach($cities as $city)
				<tr>
					<td>{{$city->id}}</td>
					<td>{{$city->name}}</td>
				</tr>
			@endforeach
			@endif
			<!-- End Loop -->
			</tbody>
		</table>
	</div>
</div>
@endsection