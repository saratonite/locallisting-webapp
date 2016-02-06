<h3>Vendor Profile</h3>

<div class="col-md-8">
<span ng-show="!requestCompleted" us-spinner></span>
	<form action="" class="form-horizontal" name="vendorProfile">
		<!-- Vendor name -->
		<div class="form-group" ng-class="{ 'has-error': serverErrors.vendor_name}">
			<label for="" class="col-md-3 control-label">Vendor Name</label>
			<div class="col-md-9">
				<input type="text" class="form-control" ng-model="vendor.vendor_name">
				<div class="help-block" ng-messages="serverErrors">
					<span ng-message="vendor_name" >{{serverErrors.vendor_name[0]}}</span>
				</div>
			</div>
		</div>
		<!-- Description -->
		<div class="form-group" ng-class="{ 'has-error': serverErrors.description}">
			<label for="" class="col-md-3 control-label">Description</label>
			<div class="col-md-9">
				<textarea  class="form-control" ng-model="vendor.description"></textarea>
				<div class="help-block" ng-messages="serverErrors">
					<span ng-message="description" >{{serverErrors.description[0]}}</span>
				</div>
			</div>
		</div>
		<!-- Category -->
		<div class="form-group" ng-class="{ 'has-error': serverErrors.categories}">
			<label for="" class="col-md-3 control-label">Category</label>
			<div class="col-md-9">
				<select class="form-control" ng-model="vendor.categories" multiple size="4">
					<option value="" ng-repeat="category in categories" ng-value="category.id">{{category.name}}</option>
				</select>
				<div class="help-block" ng-messages="serverErrors">
					<span ng-message="categories" >{{serverErrors.categories[0]}}</span>
				</div>
			</div>
		</div>
		<!-- City -->
		<div class="form-group" ng-class="{ 'has-error': serverErrors.cities}">
			<label for="" class="col-md-3 control-label">City</label>
			<div class="col-md-9">
				<select class="form-control" ng-model="vendor.cities" multiple>
					<option  ng-repeat="city in cities"  ng-value="city.id">{{city.name}}</option>
				</select>
				<div class="help-block" ng-messages="serverErrors">
					<span ng-message="cities" >{{serverErrors.cities[0]}}</span>
				</div>
			</div>
		</div>

		<!-- Addr1 -->
		<div class="form-group" ng-class="{ 'has-error': serverErrors.addr_line1}">
			<label for="" class="col-md-3 control-label">Address (Room / Building)</label>
			<div class="col-md-9">
				<input type="text" class="form-control" ng-model="vendor.addr_line1">
				<div class="help-block" ng-messages="serverErrors">
					<span ng-message="addr_line1" >{{serverErrors.addr_line1[0]}}</span>
				</div>
			</div>
		</div>

		<!-- Addr2 -->
		<div class="form-group" ng-class="{ 'has-error': serverErrors.addr_line2}">
			<label for="" class="col-md-3 control-label">Address (Street)</label>
			<div class="col-md-9">
				<input type="text" class="form-control" ng-model="vendor.addr_line2">
				<div class="help-block" ng-messages="serverErrors">
					<span ng-message="addr_line2" >{{serverErrors.addr_line2[0]}}</span>
				</div>
			</div>

		</div>

		<!-- Addr3 -->
		<div class="form-group" ng-class="{ 'has-error': serverErrors.addr_line3}">
			<label for="" class="col-md-3 control-label">Address (Place)</label>
			<div class="col-md-9">
				<input type="text" class="form-control" ng-model="vendor.addr_line3">
				<div class="help-block" ng-messages="serverErrors">
					<span ng-message="addr_line3" >{{serverErrors.addr_line3[0]}}</span>
				</div>
			</div>
		</div>
		<div class="form-group" ng-class="{ 'has-error': serverErrors.post_code}">
			<label for="" class="col-md-3 control-label">Post Code</label>
			<div class="col-md-9">
				<input type="text" class="form-control" ng-model="vendor.post_code">
				<div class="help-block" ng-messages="serverErrors">
					<span ng-message="post_code" >{{serverErrors.post_code[0]}}</span>
				</div>
			</div>
		</div>
		<!-- Contact Number -->
		<div class="form-group" ng-class="{ 'has-error': serverErrors.contact_number}">
			<label for="" class="col-md-3 control-label">Contact Number</label>
			<div class="col-md-9">
				<input type="text" class="form-control" ng-model="vendor.contact_number">
				<div class="help-block" ng-messages="serverErrors">
					<span ng-message="contact_number" >{{serverErrors.contact_number[0]}}</span>
				</div>
			</div>
		</div>
		<!-- Mobile -->
		<div class="form-group" ng-class="{ 'has-error': serverErrors.mobile}">
			<label for="" class="col-md-3 control-label">Mobile Number</label>
			<div class="col-md-9">
				<input type="text" class="form-control" ng-model="vendor.mobile">
			</div>
			<div class="help-block" ng-messages="serverErrors">
					<span ng-message="mobile" >{{serverErrors.mobile[0]}}</span>
				</div>
		</div>
		<!-- Addr1 -->
		<div class="form-group">
			
			<div class="col-md-9 col-md-offset-3">
				<button type="button" ng-click="updateProfile()" class="btn btn-success">Update</button>
				<a class="btn btn-warning">Cancel</a>
			</div>
		</div>	




	</form>
</div>
<div class="col-md-4">
<span ng-show="!requestCompleted" us-spinner></span>
<span ng-show="updatingPic" us-spinner></span>
	<div class="panel panel-default">

		<div class="panel-heading">
			Update Picture
		</div>
		<div class="panel-body">
			<div class="col-md-12" style="padding:0px">
				
			    <a  class="thumbnail" style="padding:0px">
			    	<!-- Dummy -->
			    	<img ng-hide="vendor.picture || file"  ng-src="<?php echo e(url('/')); ?>/images/placeholder.png">
			    	<!-- The Current -->
			    	<img ng-hide="file || !vendor.picture " ng-src="<?php echo e(url('/').'/'.config('settings.uploads.images')); ?>{{vendor.picture.base_dir}}/{{vendor.picture.file_name}}">
			    	<!-- New -->
			      <img style="width:200px;height:200px" ng-show="file" ngf-src="file" >
			    </a>
			  </div>
			  <div class="file-selection-area">
			  	<div class="btn btn-sm btn-primary" ngf-select ng-model="file" name="file" ngf-pattern="'image/*'"
    ngf-accept="'image/*'" ngf-max-size="20MB" >Select</div>
    			<button class="btn btn-sm btn-danger" ng-hide="file || !vendor.picture " ng-click="removePic()">Remove</button>
    			<button class="btn btn-sm btn-success" ng-show="file" ng-click="updatePic()">Save	</button>
    			<button class="btn btn-sm btn-warning" ng-show="file" ng-click="cancelUpdatePic()">Cancel	</button>
			  </div>

			  <!-- Error -->
			  <p ng-messages="serverErrors">
			  	<span class="text-danger" ng-message="file">{{serverErrors.file[0]}}</span>
			  </p>
		</div>
		
	</div>
</div>