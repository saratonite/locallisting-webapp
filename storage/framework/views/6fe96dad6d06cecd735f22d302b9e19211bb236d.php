<h2>Edit Review</h2>

<div class="col-md-10">
<span ng-show="!requestCompleted" us-spinner></span>

<div class="col-md-10">
	<form action="" class="form-horizontal">
		
		<div class="form-group" >
			<label for="" class="control-label col-md-3">Vendor Name</label>
			<div class="col-md-9">
				<label for="" class="control-label">
					<span ng-if="review.vendor"><strong>{{review.vendor.vendor_name}}</strong></span>
					<span ng-if="!review.vendor">(Vendor Not Found)</span>
				</label>
			</div>
		</div>

		<div class="form-group" ng-class="{ 'has-error': serverErrors.title}">
			<label for="" class="control-label col-md-3">Title</label>
			<div class="col-md-9">
				<input type="text" class="form-control" ng-model="review.title">
				<div class="help-block" ng-messages="serverErrors">
					<span ng-message="title" >{{serverErrors.title[0]}}</span>
				</div>
			</div>
		</div>

		<div class="form-group" ng-class="{ 'has-error': serverErrors.body}">
			<label for="" class="control-label col-md-3">Body</label>
			<div class="col-md-9">
				<textarea name="" id=""  rows="5" class="form-control" ng-model="review.body"></textarea>
				<div class="help-block" ng-messages="serverErrors">
					<span ng-message="body" >{{serverErrors.body[0]}}</span>
				</div>
			</div>
		</div>
		<div class="form-group">
			<label for="" class="control-label col-md-3">Rate Price</label>
			<div class="col-md-2">
				<select name="" id="" class="form-control" ng-model="review.rate_price">
					<option value="" disabled>Rate</option>
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
					<option value="5">5</option>
				</select>
			</div>
		</div>
		<div class="form-group">
			<label for="" class="control-label col-md-3">Rate Timeliness</label>
			<div class="col-md-2">
				<select name="" id="" class="form-control" ng-model="review.rate_timeliness">
					<option value="" disabled>Rate</option>
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
					<option value="5">5</option>
				</select>
			</div>
		</div>
		<div class="form-group">
			<label for="" class="control-label col-md-3">Rate Quality</label>
			<div class="col-md-2">
				<select name="" id="" class="form-control" ng-model="review.rate_quality">
					<option value="" disabled>Rate</option>
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
					<option value="5">5</option>
				</select>
			</div>
		</div>
		<div class="form-group">
			<label for="" class="control-label col-md-3">Rate Professionalism</label>
			<div class="col-md-2">
				<select name="" id="" class="form-control" ng-model="review.rate_professionalism">
					<option value="" disabled>Rate</option>
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
					<option value="5">5</option>
				</select>
			</div>
		</div>
		<div class="form-group">
			<div class="col-md-9 col-md-offset-3">
				<button type="button" class="btn btn-success" ng-click="updateReview()">Update</button>
			</div>
		</div>
	</form>
</div>
		
</div>