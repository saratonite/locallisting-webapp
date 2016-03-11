@extends('layouts.frontend')

@section('header')
@include('site.partials.header')
@endsection


@section('content')
<div class="container">
	<div class="row" style="padding: 15px">
	
		<div class="col-md-12">
			<h2>GROW YOUR BUSINESS WITH UAE HOME ADVISOR</h2>
			
			<div class="row">
				<div class="col-md-8">

				<p>
					UAE Home Advisor will help you grow your business and showcase your projects. We aim to provide your company, a growing base of customers and an exposure in the UAE Service Industry.
					<p>
						Many Maintenance and Service Companies and Professionals do not have the time and money to invest in advertising, these costs can be stressful for any company. 

					</p>
					<p>
						UAE Home Advisor steps in to provide you with a platform to showcase your work and reach a discerning customer base in the UAE.
					</p>

				</p>
				<h4>CONNECTING QUALITY PROFESSIONALS TO CLIENTS</h4>

				<p>
					The ability to grow a new customer base can be a long process, and costly! No need to worry! UAEHomeAdvisor.com is here to help. With your customized company profile being exposed to thousands of potential clients daily 
				</p>
				<p>
					<a href="{{route('vendor-signup')}}">Signup</a> for your risk FREE 6 month trial today, and put UAEHomeAdvisor.com to work for you!
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