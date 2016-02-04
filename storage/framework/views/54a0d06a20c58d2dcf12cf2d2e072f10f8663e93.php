<?php $__env->startSection('content'); ?>
<!-- Row 1  -->
<div class="row">
	<!-- Row 1 Col left -->
	<div class="col-md-6">
		<table class="table table-bordered ">
			<thead>
				<tr>
					<th colspan="2">
						<h4>User Profile <span class="label label-info"><a href="<?php echo e(route('admin::edit-site-user',$user->id)); ?>">Edit</a></span></h4> 
					</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>Name</td>
					<td><?php echo e($user->first_name); ?>  <?php echo e($user->last_name); ?></td>
				</tr>
				<tr>
					<td>Email</td>
					<td><?php echo e($user->email); ?></td>
				</tr>
				<tr>
					<td>Address</td>
					<td>
						<p><?php echo e($user->addr_line1); ?></p>
						<p><?php echo e($user->addr_line2); ?></p>
						<p><?php echo e($user->addr_line3); ?></p>
					</td>
				</tr>
				<tr>
					<td>Mobile</td>
					<td>
						<?php echo e($user->mobile); ?>

					</td>
				</tr>
								<tr>
					<td>Status </td>
					<td><span class=" label label-<?php echo e(BS_Status_Class($user->status)); ?>"><?php echo e(ucfirst($user->status)); ?></span> </td>
				</tr>
				<tr>
					<td>Join date </td>
					<td><?php echo e($user->created_at->toFormattedDateString()); ?> <span class="label label-primary"><?php echo e($user->created_at->diffForHumans()); ?></span></td>
				</tr>
			</tbody>
		</table>
		<!-- Recent Enquiries -->
		<table class="table table-bordered">
			<thead>
				<tr>
					<th colspan="5">Recent Enquiries</th>
				</tr>
				<tr>
					<th>Sl.No</th>
					<th>Subject</th>
					<th>To</th>
					<th>Date/Time</th>
					<th>Status</th>
				</tr>
			</thead>
			<tbody>
				<!-- Loop through enquiries  -->
			<?php if($user->enquiry->count()): ?>
			<?php foreach($user->enquiry as $enquiry): ?>
				<tr>
					<td><?php echo e($enquiry->id); ?></td>
					<td><a href="<?php echo e(route('admin::view-enquiry',$enquiry->id)); ?>" data-toggle="tooltip" data-placement="top"  title="<?php echo e($enquiry->subject); ?>"><?php echo e(str_limit($enquiry->subject,26)); ?></a></td>
					<td><a title="<?php echo e($enquiry->vendor->user->first_name); ?> <?php echo e($enquiry->vendor->user->last_name); ?>" data-toggle="tooltip" data-placement="top"><?php echo e($enquiry->vendor->user->first_name); ?></a></td>
					<td ><a title="<?php echo e($enquiry->from->created_at->diffForHumans()); ?>" data-toggle="tooltip" data-placement="top"><?php echo e($enquiry->from->created_at->toFormattedDateString()); ?></a></td>
					<td>---</td>
				</tr>
			<?php endforeach; ?>
			<?php else: ?>
			<tr>
				<td colspan="5" class="info"> No enquiries yet.</td>
			</tr>
			<?php endif; ?>
			<!-- End Enquiry loop -->
			</tbody>
		</table>
		<!-- End Recent Enquiries -->
	</div>
	<!--  End Row 1 Col left  -->
	<!-- Row 1 Col right  -->
	<div class="col-md-5">
		<!-- Vendor Profile Status -->
		<table class="table table-bordered">
			<thead>
					<tr>
						<th colspan="2">
							<h4>User Stats**</h4>
						</th>
					</tr>
					<tr>
						<td>Enquiries </td>
						<td> <span class="badge"><?php echo e($user->enquiry->count()); ?></span></td>
					</tr>
					<tr>
						<td>Pending Enquiries </td>
						<td>-- </td>
					</tr>
					<tr>
						<td>Total Reviews </td>
						<td>-- </td>
					</tr>
				</thead>
		</table>
		<!-- End Vendor Profile Status -->
			<div class="panel panel-info">
				<div class="panel-heading">
					<h3 class="panel-title">Change Status</h3>
				</div>
				<div class="panel-body">
					<!-- Status switch -->
							<div class="btn-group ">
							  <button type="button" data-record-id="<?php echo e($user->id); ?>"  class="btn dropdown-toggle btn-<?php echo e(BS_Status_Class($user->status)); ?>" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							   <?php echo e(ucfirst($user->status)); ?> <span class="caret"></span>
							  </button>
							  <ul class="dropdown-menu change-status">
							  	<?php if ( ! ($user->status == "active")): ?>
							    <li><a class="status-action" href="javascript:void(0);" data-status-action="active">Activate</a></li>
							    <?php endif; ?>
							    <?php if ( ! ($user->status == "blocked")): ?>
							    <li><a class="status-action" href="javascript:void(0);" data-status-action="blocked">Block</a></li>
							    <?php endif; ?>
							    <li><a class="status-action" href="javascript:void(0);" data-status-action="pending">Move to pending</a></li>
							    <li role="separator" class="divider"></li>
							    <li><a href="#" >Edit Details</a></li>
							  </ul>
							</div>
							<!-- End Status switch -->
				</div>
			</div>
			<div class="panel panel-danger">
				<div class="panel-heading">
					<h3 class="panel-title">Delete Account</h3>
				</div>
				<div class="panel-body">
					<button class="btn btn-danger">Delete Profile</button>
					
				</div>
			</div>
	</div>
	<!-- End Row 1 Col left  -->
</div>
<!-- End Row 1 -->


<!-- Change status modal -->
<div class="modal fade" tabindex="-1" id="chnage-status-modal" role="dialog">
<form  method="post">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Change Vendor Status</h4>
      </div>
      <div class="modal-body">
        <p id="modalContext">Are you sure ?&hellip;</p>
        <input type="hidden" name="_method" value="put">
        <input type="hidden" name="id" id="modal-recordId">
        <input type="hidden" name="status" id="modal-actionName">
        <?php echo e(csrf_field()); ?>

        	<div class="checkbox">
        		<label><input type="checkbox" class="checkbox" name="notify">Send a notification email?.</label>
        	</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Continue</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</form>
</div><!-- /.modal -->
<!-- End change status modal  -->







<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script>
	$(function(){
		
	var changeStatusURL = "<?php echo e(route('admin::all-site-users')); ?>/change-status/";
	// Chnage status
	$('.change-status').on('click','li a.status-action',function(e){

		var statusAvailable = {'active':{'class':'alert-info','title':'Activate'},'block':{'class':'alert-danger','title':'Block'},'pending':{'class':'alert-info','title':'Pending'}};

		console.log(this);
		var action = $(this).data('status-action');

		var parentNode = $(this).parents('.btn-group').find('button');

		if(!parentNode){
			console.log('nop');
		}

		var recordId = parentNode.data('record-id');

		var contextBody = '<p class="alert alert-info">Are you sure?</p>';
		$("#modalContext").html(contextBody);

		$("#chnage-status-modal form").attr('action',changeStatusURL+recordId);



		$("#modal-recordId").val(recordId);
		$("#modal-actionName").val(action);

		console.log(recordId);

		// Showing modal
		$('#chnage-status-modal').modal('show');

	});
});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>