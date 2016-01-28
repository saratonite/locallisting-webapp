<h2>Profile</h2>

<div class="col-md-10">
<span ng-show="!profile" us-spinner></span>
		

		<div class="col-md-12">
			
			<!--  -->
			<div class="panel panel-default"  ng-show="profile">
			  <div class="panel-heading">Personal Details <a class="pull-right label label-success" href="#profile/edit">Edit</a></div>
			  <div class="panel-body">
			    
			    <div class="row">
				<div class="col-md-3">
					Name
				</div>
				<div class="col-md-9">
					@{{profile.first_name}}  @{{profile.last_name}}
				</div>
			</div>
			<div class="row">
				<div class="col-md-3">
					Email
				</div>
				<div class="col-md-9">
					@{{profile.email}}
				</div>
			</div>
			<div class="row">
				<div class="col-md-3">
					Address
				</div>
				<div class="col-md-9">
					@{{profile.addr_line1}}
					<span ng-if="profile.addr_line2">, @{{profile.addr_line2}}</span>
					<span ng-if="profile.addr_line3">, @{{profile.addr_line3}}</span>
				</div>
			</div>
			<div class="row">
				<div class="col-md-3">
					Status
				</div>
				<div class="col-md-9">
					@{{profile.status | uppercase}}
				</div>
			</div>
			<div class="row">
				<div class="col-md-3">
					Join Date
				</div>
				<div class="col-md-9">
					@{{profile.created_at}}
					
				</div>
			</div>
			  </div>
			</div>
			<!--  -->


			<!-- Vendor profile -->
			<div class="panel panel-default" ng-show="profile.vendor">
			  <div class="panel-heading">Vendor Profile</div>
			  <div class="panel-body">
			   <table class="table">
			   	<tr>
			   		<td class="col-md-3">Vendor Name</td>
			   		<td>@{{profile.vendor.vendor_name}}</td>
			   	</tr>
			   	<tr>
			   		<td class="col-md-3">Description</td>
			   		<td>@{{profile.vendor.description}}</td>
			   	</tr>
			   	<tr>
			   		<td class="col-md-3">Address</td>
			   		<td>@{{profile.vendor.addr_line1}} , @{{profile.vendor.addr_line2}} , @{{profile.vendor.addr_line3}}</td>
			   	</tr>
			   	<tr>
			   		<td class="col-md-3">Contact Number</td>
			   		<td>@{{profile.vendor.contact_number}} </td>
			   	</tr>
			   	<tr>
			   		<td class="col-md-3">Mobile Number</td>
			   		<td>@{{profile.vendor.mobile}} </td>
			   	</tr>
			   </table>
			  </div>
			</div>
			<!-- Vendor profile -->

		</div>
		
</div>