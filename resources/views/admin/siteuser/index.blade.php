@extends('layouts.admin')

@section('content')
<h3>Users</h3>

<table class="table table-bordered table-striped table-hover">
	<thead>
		<tr>
			<th>Sl.No</th>
			<th>Name</th>
			<th>City</th>
			<th>Status</th>
			<th>Join Date</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		@if($siteusers->count())
		<!-- Loop through site users -->
		@foreach($siteusers as $user)
		<tr>
			<td>{{$user->id}}</td>
			<td><a href="{{ route('admin::view-site-user',$user->id)}}">{{ $user->first_name }}</a></td>
			<td></td>
			<td>
				
					  <span type="button" data-record-id="{{$user->id}}"  class="label label-{{ BS_Status_Class($user->status) }}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					   {{ucfirst($user->status)}} 
					  </span>
					
			</td>
			<td>
				{{$user->created_at->toFormattedDateString()}}
			</td>
			<td></td>
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