@extends('layouts.admin')

@section('content')
<h3>Users</h3>

<table class="table table-bordered table-striped table-hover">
	<thead>
		<tr>
			<th class="col-md-1">Sl.No</th>
			<th class="col-md-3">Name</th>
			<th class="col-md-3">Email</th>
			<th class="col-md-1">Status</th>
			<th class="col-md-1">Join Date</th>
			<th class="col-md-1">Action</th>
		</tr>
	</thead>
	<tbody>
		@if($siteusers->count())
		<!-- Loop through site users -->
		@foreach($siteusers as $user)
		<tr>
			<td>{{$row_count}}</td>
			<td><a href="{{ route('admin::view-site-user',$user->id)}}">{{ $user->first_name }} {{ $user->last_name }}</a></td>
			<td>{{ $user->email }}</td>
			<td>
				
					  <span type="button" data-record-id="{{$user->id}}"  class="label label-{{ BS_Status_Class($user->status) }}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					   {{ucfirst($user->status)}} 
					  </span>
					
			</td>
			<td>
				{{$user->created_at->toFormattedDateString()}}
			</td>
			<td></td>
			<?php $row_count++;?>
		</tr>
		@endforeach
		<!-- End Loop through site users -->
		@else
		<tr>
			<td colspan="6" class="alert alert-info"> No Records. </td>
		</tr>
		@endif
	</tbody>
</table>
<!-- Pagination links -->
	{!! $siteusers->links() !!}
<!-- End Pagination links -->
@endsection