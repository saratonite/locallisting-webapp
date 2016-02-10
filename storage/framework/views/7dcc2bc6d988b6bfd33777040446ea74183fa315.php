<?php $__env->startSection('content'); ?>
<h3>Enquiry Details</h3>
<div class="row">
	<!-- Row 1 left col -->
	<div class="col-md-6">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h5><?php echo e($enquiry->subject); ?></h5>
		</div>
		<div class="panel-body">
			<p><?php echo nl2br(e($enquiry->message)); ?></p>
		</div>
	</div>

	<!-- Enquiry Details -->
	<table class="table table-bordered">
		<tr>
			<td>From</td>
			<td><?php echo e($enquiry->from->first_name); ?> <?php echo e($enquiry->from->last_name); ?></td>
		</tr>
		<tr>
			<td>Vendor</td>
			<td><?php echo e($enquiry->vendor->vendor_name); ?></td>
		</tr>
		<tr>
			<td>Date Time</td>
			<td><?php echo e($enquiry->created_at->toFormattedDateString()); ?> , <span class="label label-primary"><?php echo e($enquiry->created_at->diffForHumans()); ?></span></td>
		</tr>
		<tr>
			<td>Enquiry Status</td>
			<td> <span class="label label-<?php echo e(BS_Enquiry_Status_Class($enquiry->status)); ?>"><?php echo e(ucfirst($enquiry->status)); ?></span></td>
		</tr>
	</table>
	<!-- End Enquiry Details -->
	

	<div>

		<?php if(count($enquiry->getStatuArray())): ?>
			<div class="btn-group ">
							  <button type="button" data-record-id="<?php echo e($enquiry->id); ?>"  class="btn dropdown-toggle btn-<?php echo e(BS_Status_Class($enquiry->status)); ?>" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							   <?php echo e(ucfirst($enquiry->status)); ?> <span class="caret"></span>
							  </button>
							  <ul class="dropdown-menu change-status">
							  <?php foreach($enquiry->getStatuArray() as $status): ?>
							  <li><a class="status-action" href="javascript:void(0);" data-status-action="<?php echo e($status); ?>"><?php echo e(ucfirst($status)); ?></a></li>
							  <?php endforeach; ?>
							  </ul>
							</div>
		<?php endif; ?>
		<input type="button" id="delete-enquiry" data-record-id="<?php echo e($enquiry->id); ?>" class="btn btn-danger" value="DELETE">
	</div>
	
		
	</div>
	<!-- End Row 1 left col -->

	<!-- Row 1 right col -->
	<div class="col-md-5">
		<!-- Enquiry From user details  -->
				<table class="table table-bordered ">
			<thead>
				<tr>
					<th colspan="2">
						<h4>Sender Profile <span class="label label-info"></span></h4> 
					</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>Name</td>
					<td><?php echo e($enquiry->from->first_name); ?>  <?php echo e($enquiry->from->last_name); ?></td>
				</tr>
				<tr>
					<td>Email</td>
					<td><?php echo e($enquiry->from->email); ?></td>
				</tr>
								<tr>
					<td>Status </td>
					<td><span class=" label label-<?php echo e(BS_Status_Class($enquiry->from->status)); ?>"><?php echo e(ucfirst($enquiry->from->status)); ?></span> </td>
				</tr>
			</tbody>
		</table>
		<!-- End Enquiry From user detals -->
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
					<td><?php echo e($enquiry->vendor->vendor_name); ?> </td>
				</tr>
				<tr>
					<td>Status </td>
					<td> <span class="label label-<?php echo e(BS_Status_Class($enquiry->vendor->user->status)); ?>"><?php echo e(ucfirst($enquiry->vendor->user->status)); ?> </span> </td>
				</tr>
				<tr>
					<td>Category </td>
					<td><?php echo e($enquiry->vendor->categoryname()); ?> </td>
				</tr>
				<tr>
					<td>City </td>
					<td><?php echo e($enquiry->vendor->cityname()); ?> </td>
				</tr>
				<tr>
					<td>Contact Number </td>
					<td><?php echo e($enquiry->vendor->contact_number); ?> </td>
				</tr>
				<tr>
					<td>Mobile Number </td>
					<td><?php echo e($enquiry->vendor->mobile); ?> </td>
				</tr>
			</tbody>
		</table>
		<!-- End Equiry Vendor Details -->
	</div>
	<!-- End Row 1 right col -->
</div>

<!-- End Page Main Contents -->
<!-- Change status modal -->
<div class="modal fade" tabindex="-1" id="chnage-status-modal" role="dialog">
<form  method="post">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Change Enquiry Status</h4>
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

<!-- Delete modal -->
<div class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <form action="" method="post">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Delete</h4>
      </div>
      <div class="modal-body">
        	<p class="alert alert-danger" id="modalContext">

        	Delete Enquiry ?
        	</p>
        	<?php echo e(csrf_field()); ?>

        <input type="hidden" name="_method" value="delete">
        <input type="hidden" name="id" >
        <input type="hidden" name="action" >
      </div>
      <div class="modal-footer">
      	<button type="submit" class="btn btn-danger">DELETE</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
  </form>
</div>
<!-- End Delete modal  -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script>
	$(function(){

	var enquiryBaseURL ="<?php echo e(route('admin::all-enquiries')); ?>/";
		
	var changeStatusURL = "<?php echo e(route('admin::all-enquiries')); ?>/change-status/";


	var deleteBox = new Confirmbox();
	deleteBox.create({'el':"#delete-enquiry","modal":"#delete-modal","action_url":enquiryBaseURL+'delete'});

	////////////////////////////////////////////
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