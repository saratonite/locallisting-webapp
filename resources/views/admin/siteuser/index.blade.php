@extends('layouts.admin')

@section('content')
<h3>Users</h3>

<table class="table table-bordered table-striped table-hover">
	<thead>
		<tr>
			<th>Sl.No</th>
			<th>Name</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
		@if($siteusers->count())
		<!-- Loop through site users -->
		@foreach($siteusers as $user)
		<tr>
			<td>{{$user->id}}</td>
			<td>{{ $user->first_name }}</td>
			<td>{{ $user->status }}</td>
		</tr>
		@endforeach
		<!-- End Loop through site users -->
		@else
		<tr>
			<td colspan="3" class="alert alert-info"> No Records. </td>
		</tr>
		@endif
	</tbody>
</table>
<!-- Pagination links -->
	{!! $siteusers->links() !!}
<!-- End Pagination links -->
@endsection