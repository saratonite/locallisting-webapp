
@extends('admin.emails.base')

@section('content')
Hi {{$vendor->user->first_name}} {{ $vendor->user->last_name }}
<p>
	

	<!--  -->
	@if($vendor->user->status == "active")
	 Congratulations ! Your vendor account has been activated.

	 @elseif($vendor->user->status == "blocked")
	  <strong style="color:red;">Sorry Your vendor Account has been Blocked !.</strong>

	 @else
	 Yuor vendor account status changed to {{ ucfirst($vendor->user->status) }}.
	@endif 
	<!--  -->
</p>
<p>
	@if(isset($vendor->note))
	
	<blockquote>
		<h5>NOTE:</h5>
		{{ $vendor->note }}
	</blockquote>
	
	@endif
</p>

@endsection