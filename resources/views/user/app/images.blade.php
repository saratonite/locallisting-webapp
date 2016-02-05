<h2>My Images (@{{reviews.total}})</h2>

<div class="col-md-10">
<span ng-show="!requestCompleted" us-spinner></span>

<div>
	
	<nav class="pull-right">
	  <ul class="pager">
	    <li><a  ng-hide="!previousPage" ng-href="#/myreviews/@{{previousPage}}">Previous</a></li>
	    <li><a  ng-show="!previousPage" ng-href="#/myreviews/@{{currentPage}}">Previous</a></li>
	    <li><a  ng-hide="!nextPage"  ng-href="#/myreviews/@{{nextPage}}">Next</a></li>
	    <li><a  ng-show="!nextPage"  ng-href="#/myreviews/@{{currentPage}}">Next</a></li>
	  </ul>.
	</nav>
</div>

		
</div>