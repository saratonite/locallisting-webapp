@extends('layouts.frontend')

@section('header')
@include('site.partials.header')
@endsection


@section('content')
<div class="container">
	<div class="row">
	
		<div class="col-md-12">
			<h3>Email Verification</h3>
			<p class="alert alert-{{$alertClass}}">
				{{$message}}
			</p>
		</div>
   </div>
 </div>
@endsection

@section('footer')
@include('site.partials.footer')
@endsection