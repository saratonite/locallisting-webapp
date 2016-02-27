<h2>My Reviews ({{reviews.total}})</h2>

<div class="col-md-10">
<span ng-show="!requestCompleted" us-spinner></span>

<div>
	
	<nav class="pull-right">
	  <ul class="pager">
	    <li><a  ng-hide="!previousPage" ng-href="#/myreviews/{{previousPage}}">Previous</a></li>
	    <li><a  ng-show="!previousPage" ng-href="#/myreviews/{{currentPage}}">Previous</a></li>
	    <li><a  ng-hide="!nextPage"  ng-href="#/myreviews/{{nextPage}}">Next</a></li>
	    <li><a  ng-show="!nextPage"  ng-href="#/myreviews/{{currentPage}}">Next</a></li>
	  </ul>.
	</nav>
</div>
<table class="table table-bordered">
	<thead>
		<tr>
			<th class="col-md-1">#</th>
			<th class="col-md-3">Title</th>
			<th class="col-md-2">Vendor</th>
			<th class="col-md-1">Status</th>
			<th class="col-md-2">Date Time</th>
			<th class="col-md-1">Actions</th>
		</tr>
	</thead>
	<tbody>
		<tr ng-repeat="review in reviews.data">
			<td>{{$index+reviews.from}}</td>
			<td><a ng-href="#/myreviews/edit/{{review.id}}">{{review.title | limitTo:25}}</a></td>
			<td>{{review.vendor.vendor_name}}</td>
			<td>{{review.status |uppercase}}</td>
			<td>{{review.created_at | date:"medium"}}</td>
			<td>
				<a ng-href="#/myreviews/edit/{{review.id}}">Edit</a> 
				<a ng-click="showDeleteAlert(review.id)">Delete</a> 
			</td>
		</tr>
		<tr class="info"  ng-show="!reviews.total && requestCompleted" ng-class="{'info':!reviews.total}">
			<td colspan="6">No reviews.</td>
		</tr>
	</tbody>
</table>
		
</div>