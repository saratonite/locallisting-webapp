@extends('layouts.frontend')

@section('header')
@include('site.partials.header')
@endsection


@section('content')
<div class="container">
	<div class="row" style="padding: 10px;margin:10px">
	
		<div class="col-md-12">
			<h3>Sitemap</h3>
				
					<ul>
						<li><a href="{{url('/')}}">Home</a></li>
						<ul>
							<li><a href="{{url('login')}}">Login</a></li>
							<li><a href="{{route('user-signup')}}">User Signup</a></li>
							<li><a href="{{route('vendor-signup')}}">Vendor Signup</a></li>
							<li><a href="{{route('search')}}">Vendors</a></li>
							<li><a href="{{route('categories')}}">Categories</a></li>
							<li><a href="{{route('post-requirement')}}">Post A Requirement </a></li>
							<li><a href="{{route('privacy-policy')}}">Privacy Policy</a></li>
							<li><a href="{{route('terms-conditions')}}">Terms</a></li>
							<li><a href="{{route('about')}}">About Us</a></li>
							<li><a href="{{route('sitemap')}}">Site Map</a></li>
						</ul>
					</ul>
				
		</div>
   </div>
 </div>
@endsection

@section('footer')
@include('site.partials.footer')
@endsection