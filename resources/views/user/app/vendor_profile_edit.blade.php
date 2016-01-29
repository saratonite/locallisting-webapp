<h3>Vendor Profile</h3>

<div class="col-md-10">
<span ng-show="!requestCompleted" us-spinner></span>
	<form action="" class="form-horizontal" name="vendorProfile">
		<!-- Vendor name -->
		<div class="form-group" ng-class="{ 'has-error': serverErrors.vendor_name}">
			<label for="" class="col-md-3 control-label">Vendor Name</label>
			<div class="col-md-6">
				<input type="text" class="form-control" ng-model="vendor.vendor_name">
				<div class="help-block" ng-messages="serverErrors">
					<span ng-message="vendor_name" >@{{serverErrors.vendor_name[0]}}</span>
				</div>
			</div>
		</div>
		<!-- Description -->
		<div class="form-group" ng-class="{ 'has-error': serverErrors.description}">
			<label for="" class="col-md-3 control-label">Description</label>
			<div class="col-md-6">
				<textarea  class="form-control" ng-model="vendor.description"></textarea>
				<div class="help-block" ng-messages="serverErrors">
					<span ng-message="description" >@{{serverErrors.description[0]}}</span>
				</div>
			</div>
		</div>
		<!-- Category -->
		<div class="form-group" ng-class="{ 'has-error': serverErrors.category_id}">
			<label for="" class="col-md-3 control-label">Category</label>
			<div class="col-md-6">
				<select class="form-control" ng-model="vendor.category_id">
					<option value="" ng-repeat="category in categories" ng-selected="vendor.category_id == category.id" ng-value="category.id">@{{category.name}}</option>
				</select>
				<div class="help-block" ng-messages="serverErrors">
					<span ng-message="category_id" >@{{serverErrors.category_id[0]}}</span>
				</div>
			</div>
		</div>
		<!-- City -->
		<div class="form-group" ng-class="{ 'has-error': serverErrors.city_id}">
			<label for="" class="col-md-3 control-label">City</label>
			<div class="col-md-6">
				<select class="form-control" ng-model="vendor.city_id">
					<option value="" ng-repeat="city in cities" ng-selected="vendor.city_id == city.id" ng-value="city.id">@{{city.name}}</option>
				</select>
				<div class="help-block" ng-messages="serverErrors">
					<span ng-message="city_id" >@{{serverErrors.city_id[0]}}</span>
				</div>
			</div>
		</div>

		<!-- Addr1 -->
		<div class="form-group" ng-class="{ 'has-error': serverErrors.addr_line1}">
			<label for="" class="col-md-3 control-label">Address (Room / Building)</label>
			<div class="col-md-6">
				<input type="text" class="form-control" ng-model="vendor.addr_line1">
				<div class="help-block" ng-messages="serverErrors">
					<span ng-message="addr_line1" >@{{serverErrors.addr_line1[0]}}</span>
				</div>
			</div>
		</div>

		<!-- Addr2 -->
		<div class="form-group" ng-class="{ 'has-error': serverErrors.addr_line2}">
			<label for="" class="col-md-3 control-label">Address (Street)</label>
			<div class="col-md-6">
				<input type="text" class="form-control" ng-model="vendor.addr_line2">
				<div class="help-block" ng-messages="serverErrors">
					<span ng-message="addr_line2" >@{{serverErrors.addr_line2[0]}}</span>
				</div>
			</div>

		</div>

		<!-- Addr3 -->
		<div class="form-group" ng-class="{ 'has-error': serverErrors.addr_line3}">
			<label for="" class="col-md-3 control-label">Address (Place)</label>
			<div class="col-md-6">
				<input type="text" class="form-control" ng-model="vendor.addr_line3">
				<div class="help-block" ng-messages="serverErrors">
					<span ng-message="addr_line3" >@{{serverErrors.addr_line3[0]}}</span>
				</div>
			</div>
		</div>
		<!-- Contact Number -->
		<div class="form-group" ng-class="{ 'has-error': serverErrors.contact_number}">
			<label for="" class="col-md-3 control-label">Contact Number</label>
			<div class="col-md-6">
				<input type="text" class="form-control" ng-model="vendor.contact_number">
				<div class="help-block" ng-messages="serverErrors">
					<span ng-message="contact_number" >@{{serverErrors.contact_number[0]}}</span>
				</div>
			</div>
		</div>
		<!-- Mobile -->
		<div class="form-group" ng-class="{ 'has-error': serverErrors.mobile}">
			<label for="" class="col-md-3 control-label">Mobile Number</label>
			<div class="col-md-6">
				<input type="text" class="form-control" ng-model="vendor.mobile">
			</div>
			<div class="help-block" ng-messages="serverErrors">
					<span ng-message="mobile" >@{{serverErrors.mobile[0]}}</span>
				</div>
		</div>
		<!-- Addr1 -->
		<div class="form-group">
			
			<div class="col-md-6 col-md-offset-3">
				<button type="button" ng-click="updateProfile()" class="btn btn-success">Update</button>
				<a class="btn btn-warning">Cancel</a>
			</div>
		</div>




	</form>
</div>