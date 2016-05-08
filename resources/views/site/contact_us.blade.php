@extends('layouts.frontend')

@section('header')
@include('site.partials.header')
@endsection


@section('content')
<div class="container">
	<div class="row" style="padding: 15px">
	
		<div class="col-md-12">
			<h2>Contact Us</h2>
			
			<div class="row">
				<div class="col-md-8">
				
				<p>info@uaehomeadvisor.com</p>
				<p>Maria Tower, Jew Street, Al Nama City UAE - 55</p>


				<p>
					UAE Home Advisor will help you grow your business and showcase your projects. We aim to provide your company, a growing base of customers and an exposure in the UAE Service Industry.
					<p>
						Many Maintenance and Service Companies and Professionals do not have the time and money to invest in advertising, these costs can be stressful for any company. 

					</p>
					<p>
						UAE Home Advisor steps in to provide you with a platform to showcase your work and reach a discerning customer base in the UAE.
					</p>

				</p>
					
				</div>
				<div class="col-md-4">
					<ul style="list-style-image: url('images/icon-tick.png');">
						
						<li>Leads from Potential Customers</li>
						<li>Free Listing</li>
						<li>No Contracts –stop use at any time</li>
						<li>The ability to import existing reviewss</li>
					</ul>

					<img src="{{url('/')}}/images/about-us-1.png" alt="">
				</div>
			</div>
				
		</div>
   </div>
 </div>
@endsection

@section('footer')
@include('site.partials.footer')
@endsection