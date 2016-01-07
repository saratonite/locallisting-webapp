@extends('layouts.admin')

@section('content')
<h1>Users</h1>

<table class="table table-bordered table-striped table-hover">
	<thead>
		<tr>
			<th>Sl.No</th>
			<th>Name</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
		<!-- Loop through site users -->
		@foreach($siteusers as $user)
		<tr>
			<td>1</td>
			<td>{{ $user->first_name }}</td>
			<td>{{ $user->status }}</td>
		</tr>
		@endforeach
		<!-- End Loop through site users -->
	</tbody>
</table>
@endsection