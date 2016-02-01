@extends('layouts.admin')

@section('content')
	<h3>User Reviews</h3>
	<table class="table table-bordered">
		<thead>
			<th>#</th>
			<th>Title</th>
			<th>User</th>
			<th>Vendor</th>
			<th>Status</th>
		</thead>
		<tbody>
			@if(count($reviews))
				@foreach($reviews as $review)
					<tr>
						<td class="col-md-1">{{ $row_count++}}</d>
						<td class="col-md-3"><a href="{{ route('admin::show-review',$review->id) }}">{{ str_limit($review->title,35)}}</a></td>
						<td class="col-md-2">{{ $review->user->first_name }}</td>
						<td class="col-md-2">{{$review->vendor->vendor_name}}</td>
						<td class="col-md-1"> <span class="label label-{{ BS_Status_Class2($review->status)}}">{{ ucfirst($review->status)}}</span></td>
					</tr>
				@endforeach

			@else 

				<tr class="info">
					<td colspan="5">No Record</td>
				</tr>

			@endif
		</tbody>
	</table>

	{!! $reviews->links() !!}
@endsection