<h2>My Images (@{{images.total}})</h2>

<div class="col-md-10">
<span ng-show="!requestCompleted" us-spinner></span>

<div class="row">
	<nav class="pull-left">
		<button class="btn" type="button" ng-click="showImageUploader()">Add Image</button>
	</nav>
	<nav class="pull-right">
	  <ul class="pager">
	    <li><a  ng-hide="!previousPage" ng-href="#/vendor/images/@{{previousPage}}">Previous</a></li>
	    <li><a  ng-show="!previousPage" ng-href="#/vendor/images/@{{currentPage}}">Previous</a></li>
	    <li><a  ng-hide="!nextPage"  ng-href="#/vendor/images/@{{nextPage}}">Next</a></li>
	    <li><a  ng-show="!nextPage"  ng-href="#/vendor/images/@{{currentPage}}">Next</a></li>
	  </ul>.
	</nav>
</div>


		<div class="row">
			<!-- Thumbnail element -->
			 <div class="col-md-4 pull-left" ng-repeat="image in images.data">
			    <div class="thumbnail">
			      <img src="{{ImagesDir()}}@{{image.base_dir}}/@{{image.file_name}}"" alt="...">
			      <div class="caption">
			        <h5>@{{image.title}}</h5>
			        <p>@{{image.description | limitTo:30}}
			        	<span ng-if="image.description.length > 30">...</span>
			        </p>
			        <p>
			        	<a href="{{ImagesDir()}}@{{image.base_dir}}/@{{image.file_name}}" class="btn btn-xs btn-default" role="button">View</a>
			        	<a href="#" class="btn btn-xs btn-primary" role="button">Edit</a> 
			        	<button type="button" class="btn btn-xs btn-danger" role="button">Delete</button> 
			        	</p>
			      </div>
			    </div>
			  </div>
			  <!-- Thumbnail Element -->
		</div>
		


		
</div>





<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Upload Image</h4>
      </div>
      <div class="modal-body">
      <span ng-show="imageUploading" us-spinner></span>
        <!-- Image Area -->
       
			      <img class="img" style="width:100%"  ng-show="file" ngf-src="file" >
        <!-- End Image Preview Area -->
        <form ng-show="file">
        	<div class="form-group">
        		<label for="">Title</label>
        		<input type="text" ng-model="fileMeta.title" class="form-control" >
        	</div>
        	<div class="form-group">
        		<label for="">Description</label>
        		<textarea type="text" ng-model="fileMeta.description" class="form-control" ></textarea>
        	</div>
        </form>
      </div>
      <div class="modal-footer">
      	  <!-- ImageSelecter -->
      	  <nav class="pull-left">
        <div class="btn btn-sm btn-primary" ngf-select ng-model="file" name="file" ngf-pattern="'image/*'"
    ngf-accept="'image/*'" ngf-max-size="20MB" >Select</div>
    	 </nav>
        <!-- Image Selecter -->
        <button type="button" class="btn btn-default" ng-click="cancelUpload()" data-dismiss="modal">Close</button>
        <button type="button" ng-show="file" class="btn btn-primary" ng-click="doUpload()">Upload</button>
      </div>
    </div>
  </div>
</div>