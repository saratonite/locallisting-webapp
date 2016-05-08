
@extends('admin.emails.base')

@section('content')
Hi {{$review->user->first_name}} {{ $review->user->last_name }}
<p>
	

	<!--  -->
	@if($review->user->status == "active")
	 Congratulations ! Your Review  has been approved.

	 @elseif($review->user->status == "blocked")
	  <strong style="color:red;">Sorry Your Review Account has been Blocked !.</strong>

	 @else
	 Yuor Review status changed to {{ ucfirst($review->status) }}.
	@endif 
	<!--  -->
</p>
<p>
	@if(isset($review->note))
	
	<blockquote>
		<h5>NOTE:</h5>
		{{ $review->note }}
	</blockquote>
	
	@endif
</p>

@endsection