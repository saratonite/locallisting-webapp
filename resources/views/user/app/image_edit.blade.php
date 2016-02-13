<h2>Edit Image</h2>

<div class="col-md-10">
<span ng-show="!requestCompleted" us-spinner></span>

<div class="col-md-10">
	<form action="" class="form-horizontal">
		
		<div class="form-group" >
			<label for="" class="control-label col-md-3">Image</label>
			<div class="col-md-9">
				<img  class="img img-responsive" src="{{ImagesDir()}}@{{image.base_dir}}/@{{image.file_name}}"  alt="">
			</div>
		</div>

		<div class="form-group" ng-class="{ 'has-error': serverErrors.title}">
			<label for="" class="control-label col-md-3">Title</label>
			<div class="col-md-9">
				<input type="text" class="form-control" ng-model="image.title" >
				<div class="help-block" ng-messages="serverErrors">
					<span ng-message="title" >@{{serverErrors.title[0]}}</span>
				</div>
			</div>
		</div>

		<div class="form-group" ng-class="{ 'has-error': serverErrors.body}">
			<label for="" class="control-label col-md-3">Description</label>
			<div class="col-md-9">
				<textarea name="" id=""  rows="5" class="form-control" ng-model="image.description" ></textarea>
				<div class="help-block" ng-messages="serverErrors">
					<span ng-message="body" >@{{serverErrors.body[0]}}</span>
				</div>
			</div>
		</div>
	
		<div class="form-group">
			<div class="col-md-9 col-md-offset-3">
				<button type="button" class="btn btn-success" ng-click="update()" >Update</button>
			</div>
		</div>
	</form>
</div>
		
</div>