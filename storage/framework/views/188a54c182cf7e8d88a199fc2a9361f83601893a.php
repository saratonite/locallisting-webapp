<?php $__env->startSection('content'); ?>
<h3>Enquiries</h3>
<?php echo $__env->make('admin.partials.alert', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<table class="table table-bordered table-striped table-hover">
	<thead>
		<tr>
			<th class="col-md-1">Sl.No</th>
			<th class="col-md-5">Subject</th>
			<th class="col-md-2">User</th>
			<th class="col-md-2">Vendor</th>
			<th class="col-md-2">Date</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		<?php if($enquiries->count()): ?>
		<!-- Loop through enquiries -->
		<?php foreach($enquiries as $enquiry): ?>
		<tr>
			<td><?php echo e($row_count); ?></td>
			<td><a href="<?php echo e(route('admin::view-enquiry',$enquiry->id)); ?>"><?php echo e($enquiry->subject); ?></a></td>
			<td><?php echo e($enquiry->from->first_name); ?></td>
			<td><?php echo e($enquiry->vendor->vendor_name); ?></td>
			<td><?php echo e($enquiry->created_at->format('d-M-Y')); ?></td>
			<td>
				<a href="<?php echo e(route('admin::view-enquiry',$enquiry->id)); ?>"> <i class="glyphicon glyphicon-eye-open"></i></a>
				<a href="#delete" class="action-delete" data-record-id="<?php echo e($enquiry->id); ?>"> <i class="glyphicon glyphicon-remove"></i></a>
			</td>
		</tr>
			<?php $row_count++;?>
		<?php endforeach; ?>
		<!-- End Loop through enquiries -->
		<?php else: ?>
		<tr>
			<td colspan="5" class="alert alert-info"> No Records. </td>
		</tr>
		<?php endif; ?>
	</tbody>
</table>
<!-- Pagination links	 -->
<?php echo $enquiries->links(); ?>

<!-- End Pagination links	 -->

<!-- Modals -->
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
<!-- End Modals -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

<script type="text/javascript">
	var enquiryBase = "<?php echo e(route('admin::all-enquiries')); ?>";
	var delBox  = new Confirmbox	();
	delBox.create({"el":".action-delete","modal":"#delete-modal","action_url":enquiryBase+"/delete"});
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>