<h2>Profile</h2>

<div class="col-md-10">
<span ng-show="!profile" us-spinner></span>
		

		<div class="col-md-12">
			
			<!--  -->
			<div class="panel panel-default">
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
			<div class="panel panel-default">
			  <div class="panel-heading">Vendor Profile</div>
			  <div class="panel-body">
			    Panel content
			  </div>
			</div>
			<!-- Vendor profile -->

		</div>
		
</div>