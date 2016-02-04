<?php $__env->startSection('content'); ?>
<div class="row">
	<h3>Vendors</h3>
<?php echo $__env->make('admin.partials.alert', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<!-- List vendors -->
<table class="table table-bordered table-striped table-hover">
	<thead>
		<tr>
			<th class="col-md-1">Sl.No</th>
			<th class="col-md-3">Vendor Name</th>
			<th class="col-md-2">Category</th>
			<th class="col-md-2">City</th>
			<th class="col-md-1">Status</th>
			<th class="col-md-2">Join Date</th>
			<th>Actions</th>
		</tr>
	</thead>
	<tbody>
		<?php if(count($vendors)): ?>
		<!-- Loop through vendors -->
		<?php foreach($vendors as $vendor): ?>
			<tr>
				<td><?php echo e($row_count); ?></td>
				<td><a href="<?php echo e(route('admin::vendor-profile',$vendor->id)); ?>"><?php echo e($vendor->vendor_name); ?></a></td>
				<td><?php echo e($vendor->categoryname()); ?></td>
				<td><?php echo e($vendor->cityname()); ?></td>
				<td>
					
					  <span   class="label btn-block label-<?php echo e(BS_Status_Class($vendor->user->status)); ?>" ><?php echo e(ucfirst($vendor->user->status)); ?></span>
					   
				</td>
				<td><?php echo e($vendor->user->created_at->format('d-M-Y')); ?></td>
				<td>
					<a title="Vendor profile" href="<?php echo e(route('admin::vendor-profile',$vendor->id)); ?>"><i class="glyphicon glyphicon-eye-open"></i></a>
					<a title="Edit Vendor profile" href="<?php echo e(route('admin::edit-vendor',$vendor->id)); ?>"><i class=" glyphicon glyphicon-pencil"></i></a>
					<a title="User details" href="<?php echo e(route('admin::view-site-user',$vendor->user->id)); ?>"><i class=" glyphicon glyphicon-user"></i></a>
				</td>
			</tr>
			<?php $row_count++;?>
		<?php endforeach; ?>
		<!-- End Loop through vendors -->
		<?php else: ?>
		<tr>
			<td colspan="7" class="alert alert-info"> No Records. </td>
		</tr>
		<?php endif; ?>
	</tbody>
</table>
<!-- Pagination links -->
	<?php echo $vendors->links(); ?>

<!-- Pagination links -->
<!-- End List vendors -->
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>