@extends('layouts.user')

@section('content')
	
	<h3>Profile</h3>

	<div class="col-md-10">
		<hr>
		<div class="row">
		<h4>Personal Details</h4>
			<div class="col-md-3"><label>Name</label></div>
			<div class="col-md-9">
				{{Auth::user()->first_name}}
				{{Auth::user()->last_name}}
			</div>
		</div>
		<div class="row">
			<div class="col-md-3"><label>Email</label></div>
			<div class="col-md-9">
				{{Auth::user()->email}}
			</div>
		</div>
		<div class="row">
			<div class="col-md-3"><label>Address</label></div>
			<div class="col-md-9">
				{{Auth::user()->addr_line1}}
				@if(Auth::user()->addr_line2) , {{ Auth::user()->addr_line2 }} @endif
				@if(Auth::user()->addr_line3) , {{Auth::user()->addr_line3}} @endif
			</div>
		</div>
		<div class="row">
			<div class="col-md-3">Status</div>
			<div class="col-md-9">
				{{Auth::user()->status}}
			</div>
		</div>
		<div class="row">
			<div class="col-md-3">Join Date</div>
			<div class="col-md-9">
				{{Auth::user()->created_at->toFormattedDateString()}}
				&nbsp;
				<span class="label label-success">{{Auth::user()->created_at->diffForHumans()}}</span>
			</div>
		</div>
	</div>
@endsection