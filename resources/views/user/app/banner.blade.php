<h3>Banner & Picture</h3>
<div class="col-md-10">


<!-- Banner -->
	<div class="col-md-6">
			<div class="panel panel-default">

		<div class="panel-heading">
			Update Banner
		</div>
		<div class="panel-body">
			<div class="col-md-12" style="padding:0px">
				
			    <a  class="thumbnail" style="padding:0px">
			    	<!-- Dummy -->
			    	<img ng-hide="vendor.cover || file_banner"  ng-src="{{url('/')}}/images/placeholder.png">
			    	<!-- The Current -->
			    	<img ng-hide="file_banner || !vendor.cover " ng-src="{{url('/').'/'.config('settings.uploads.images')}}@{{vendor.cover.base_dir}}/@{{vendor.cover.file_name}}">
			    	<!-- New -->
			      <img style="width:200px;height:200px" ng-show="file_banner" ngf-src="file_banner" >
			    </a>
			  </div>
			  <div class="file-selection-area">
			  	<div class="btn btn-sm btn-primary" ngf-select ng-model="file_banner" name="file_banner" ngf-pattern="'image/*'"
    ngf-accept="'image/*'" ngf-max-size="20MB" >Select</div>
    			<button class="btn btn-sm btn-danger" ng-hide="file_banner || !vendor.cover " ng-click="removePic()">Remove</button>
    			<button class="btn btn-sm btn-success" ng-show="file_banner" ng-click="updateBanner()">Save	</button>
    			<button class="btn btn-sm btn-warning" ng-show="file_banner" ng-click="cancelUpdatePic()">Cancel	</button>
			  </div>

			  <!-- Error -->
			  <p ng-messages="serverErrors">
			  	<span class="text-danger" ng-message="file_banner">@{{serverErrors.file[0]}}</span>
			  </p>
		</div>
		
	</div>
	</div>

<!-- End Banner -->

<!-- Feature -->
	<div class="col-md-6">
			<div class="panel panel-default">

		<div class="panel-heading">
			Update Feature Image
		</div>
		<div class="panel-body">
			<div class="col-md-12" style="padding:0px">
				
			    <a  class="thumbnail" style="padding:0px">
			    	<!-- Dummy -->
			    	<img ng-hide="vendor.picture || file"  ng-src="{{url('/')}}/images/placeholder.png">
			    	<!-- The Current -->
			    	<img ng-hide="file || !vendor.picture " ng-src="{{url('/').'/'.config('settings.uploads.images')}}@{{vendor.picture.base_dir}}/@{{vendor.picture.file_name}}">
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
			  	<span class="text-danger" ng-message="file">@{{serverErrors.file[0]}}</span>
			  </p>
		</div>
		
	</div>
	</div>

<!-- End Feature -->
</div>
