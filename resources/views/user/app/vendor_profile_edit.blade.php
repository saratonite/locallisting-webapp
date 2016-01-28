<h3>Vendor Profile</h3>

<div class="col-md-10">
	<form action="" class="form-horizontal">
		<!-- Vendor name -->
		<div class="form-group">
			<label for="" class="col-md-3 control-label">Vendor Name</label>
			<div class="col-md-6">
				<input type="text" class="form-control" ng-model="vendor.vendor_name">
			</div>
		</div>
		<!-- Description -->
		<div class="form-group">
			<label for="" class="col-md-3 control-label">Description</label>
			<div class="col-md-6">
				<textarea  class="form-control" ng-model="vendor.description"></textarea>
			</div>
		</div>
		<!-- Category -->
		<div class="form-group">
			<label for="" class="col-md-3 control-label">Category</label>
			<div class="col-md-6">
				<select class="form-control" ng-model="vendor.category_id">
					<option value="" ng-repeat="category in categories" ng-selected="vendor.category_id == category.id" g-value="category.id">@{{category.name}}</option>
				</select>
			</div>
		</div>
		<!-- City -->
		<div class="form-group">
			<label for="" class="col-md-3 control-label">City</label>
			<div class="col-md-6">
				<select class="form-control" ng-model="vendor.city_id">
					<option value="" ng-repeat="city in cities" ng-selected="vendor.city_id == city.id" g-value="city.id">@{{city.name}}</option>
				</select>
			</div>
		</div>

		<!-- Addr1 -->
		<div class="form-group">
			<label for="" class="col-md-3 control-label">Address (Room / Building)</label>
			<div class="col-md-6">
				<input type="text" class="form-control" ng-model="vendor.addr_line1">
			</div>
		</div>

		<!-- Addr2 -->
		<div class="form-group">
			<label for="" class="col-md-3 control-label">Address (Street)</label>
			<div class="col-md-6">
				<input type="text" class="form-control" ng-model="vendor.addr_line2">
			</div>
		</div>

		<!-- Addr3 -->
		<div class="form-group">
			<label for="" class="col-md-3 control-label">Address (Place)</label>
			<div class="col-md-6">
				<input type="text" class="form-control" ng-model="vendor.addr_line3">
			</div>
		</div>
		<!-- Contact Number -->
		<div class="form-group">
			<label for="" class="col-md-3 control-label">Contact Number</label>
			<div class="col-md-6">
				<input type="text" class="form-control" ng-model="vendor.contact_number">
			</div>
		</div>
		<!-- Mobile -->
		<div class="form-group">
			<label for="" class="col-md-3 control-label">Mobile Number</label>
			<div class="col-md-6">
				<input type="text" class="form-control" ng-model="vendor.mobile">
			</div>
		</div>
		<!-- Addr1 -->
		<div class="form-group">
			
			<div class="col-md-6 col-md-offset-3">
				<button class="btn btn-success">Update</button>
				<a class="btn btn-warning">Cancel</a>
			</div>
		</div>




	</form>
</div>