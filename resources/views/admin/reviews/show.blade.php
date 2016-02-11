@extends('layouts.admin')

@section('content')
<h3>User Review</h3>
<div class="row">
	<!-- Row 1 left col -->
	<div class="col-md-6">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h5>{{$review->title}}</h5>
		</div>
		<div class="panel-body">
			<p>{!! nl2br(e($review->body)) !!}</p>
		</div>
	</div>

	<!-- Review Retings -->
	<table class="table table-bordered">
		<thead>
			<th colspan="2">Ratings</th>
		</thead>
		<tbody>
			<tr>
				<td class="col-md-4">Price</td>
				<td class="col-md-8">{{$review->rate_price}}
					<span class="star-rating-span pull-right">{{ BS_StarRating($review->rate_price)}}</span>

				</td>
			</tr>
			<tr>
				<td>Timeliness</td>
				<td>
					{{$review->rate_timeliness}}

					<span class="star-rating-span pull-right">{{ BS_StarRating($review->rate_timeliness)}}</span>

				</td>
			</tr>
			<tr>
				<td>Quality</td>
				<td>{{$review->rate_quality}}
					<span class="star-rating-span pull-right">{{ BS_StarRating($review->rate_quality)}}</span>

				</td>
			</tr>
			<tr>
				<td>Professionalism</td>
				<td>{{$review->rate_professionalism}}
					<span class="star-rating-span pull-right">{{ BS_StarRating($review->rate_professionalism)}}</span>

				</td>
			</tr>
			
		</tbody>
	</table>
	<!-- End Review Retings -->

	<!-- review Details -->
	<table class="table table-bordered">
		<tr>
			<td>Reviewed By</td>
			<td>{{$review->user->first_name}} {{$review->user->last_name}}</td>
		</tr>
		<tr>
			<td>Vendor</td>
			<td>{{$review->vendor->vendor_name}}</td>
		</tr>
		<tr>
			<td>Date Time</td>
			<td>{{$review->created_at->toFormattedDateString() }} , <span class="label label-primary">{{$review->created_at->diffForHumans()}}</span></td>
		</tr>
		<tr>
			<td>review Status</td>
			<td> <span class="label label-{{BS_Status_Class2($review->status)}}">{{ucfirst($review->status)}}</span></td>
		</tr>
	</table>
	<!-- End review Details -->
	

	<div>

		@if(count($review->statusArray()))
			<div class="btn-group ">
							  <button type="button" data-record-id="{{$review->id}}"  class="btn dropdown-toggle btn-{{ BS_Status_Class($review->status) }}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							   {{ucfirst($review->status)}} <span class="caret"></span>
							  </button>
							  <ul class="dropdown-menu change-status">
							  @foreach($review->statusArray() as $status)
							  <li><a class="status-action" href="javascript:void(0);" data-action="{{$status}}">{{ucfirst($status)}}</a></li>
							  @endforeach
							  </ul>
							</div>
		@endif
		<input type="button" class="btn btn-danger" value="DELETE">
	</div>
	
		
	</div>
	<!-- End Row 1 left col -->

	<!-- Row 1 right col -->
	<div class="col-md-5">
		<!-- review From user details  -->
				<table class="table table-bordered ">
			<thead>
				<tr>
					<th colspan="2">
						<h4>User Profile <span class="label label-info"></span></h4> 
					</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>Name</td>
					<td>{{$review->user->first_name}}  {{$review->user->last_name}}</td>
				</tr>
				<tr>
					<td>Email</td>
					<td>{{$review->user->email}}</td>
				</tr>
								<tr>
					<td>Status </td>
					<td><span class=" label label-{{ BS_Status_Class($review->user->status) }}">{{ucfirst($review->user->status)}}</span> </td>
				</tr>
			</tbody>
		</table>
		<!-- End review user user detals -->
		<!-- Equiry Vendor Details -->
		<table class="table table-bordered ">
			<thead>
				<tr>
					<th colspan="2">
						<h4>Vendor Profile <span class="label label-info"><a href="#">Edit</a></span></h4> 
					</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>Name </td>
					<td>{{$review->vendor->vendor_name}} </td>
				</tr>
				<tr>
					<td>Status </td>
					<td> <span class="label label-{{BS_Status_Class($review->vendor->user->status)}}">{{ ucfirst($review->vendor->user->status)}} </span> </td>
				</tr>
				<tr>
					<td>Category </td>
					<td>{{$review->vendor->categoryname()}} </td>
				</tr>
				<tr>
					<td>City </td>
					<td>{{$review->vendor->cityname()}} </td>
				</tr>
				<tr>
					<td>Contact Number </td>
					<td>{{$review->vendor->contact_number}} </td>
				</tr>
				<tr>
					<td>Mobile Number </td>
					<td>{{$review->vendor->mobile}} </td>
				</tr>
			</tbody>
		</table>
		<!-- End Equiry Vendor Details -->
	</div>
	<!-- End Row 1 right col -->
</div>

<!-- End Page Main Contents -->
<!-- Change status modal -->
<div class="modal fade" id="chnage-status-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <form action="" method="post">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Change Status</h4>
      </div>
      <div class="modal-body">
        	<p class="alert alert-danger" id="modalContext">

        	Change review status ?;
        	</p>
        	{{ csrf_field() }}
        <input type="hidden" name="_method" value="put">
        <input type="hidden" name="id" >
        <input type="hidden" name="action" >
        <div class="checkbox">	
        	<label> <input type="checkbox" name="notification">Send Notification Mail?</label>
        	<textarea class="form-control" name="note" placeholder="Note"></textarea>
        </div>
      </div>
      <div class="modal-footer">
      	<button type="submit" class="btn btn-danger">Change</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
  </form>
</div>
<!-- End change status modal  -->
@endsection

@section('scripts')
<script>
	$(function(){

		// Chnage status
		var reviewBase = "{{ route("admin::list-reviews")}}/change-status";
		var reviewId = {{ $review->id}};
		var changeStatusBox = new Confirmbox();
		changeStatusBox.create({"el":".status-action",'modal':"#chnage-status-modal","action_url":reviewBase,"recordId":reviewId});


	});
</script>
@endsection