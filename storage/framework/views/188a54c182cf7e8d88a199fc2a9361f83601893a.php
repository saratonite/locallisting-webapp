<?php $__env->startSection('content'); ?>
<h3>Enquiries</h3>
<table class="table table-bordered table-striped table-hover">
	<thead>
		<tr>
			<th class="col-md-1">Sl.No</th>
			<th class="col-md-5">Subject</th>
			<th class="col-md-2">User</th>
			<th class="col-md-2">Vendor</th>
			<th class="col-md-2">Date</th>
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>