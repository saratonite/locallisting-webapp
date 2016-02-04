<?php $__env->startSection('content'); ?>
<h3>Users</h3>

<table class="table table-bordered table-striped table-hover">
	<thead>
		<tr>
			<th class="col-md-1">Sl.No</th>
			<th class="col-md-3">Name</th>
			<th class="col-md-3">Email</th>
			<th class="col-md-1">Status</th>
			<th class="col-md-1">Join Date</th>
			<th class="col-md-1">Action</th>
		</tr>
	</thead>
	<tbody>
		<?php if($siteusers->count()): ?>
		<!-- Loop through site users -->
		<?php foreach($siteusers as $user): ?>
		<tr>
			<td><?php echo e($row_count); ?></td>
			<td><a href="<?php echo e(route('admin::view-site-user',$user->id)); ?>"><?php echo e($user->first_name); ?> <?php echo e($user->last_name); ?></a></td>
			<td><?php echo e($user->email); ?></td>
			<td>
				
					  <span type="button" data-record-id="<?php echo e($user->id); ?>"  class="label label-<?php echo e(BS_Status_Class($user->status)); ?>" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					   <?php echo e(ucfirst($user->status)); ?> 
					  </span>
					
			</td>
			<td>
				<?php echo e($user->created_at->toFormattedDateString()); ?>

			</td>
			<td></td>
			<?php $row_count++;?>
		</tr>
		<?php endforeach; ?>
		<!-- End Loop through site users -->
		<?php else: ?>
		<tr>
			<td colspan="6" class="alert alert-info"> No Records. </td>
		</tr>
		<?php endif; ?>
	</tbody>
</table>
<!-- Pagination links -->
	<?php echo $siteusers->links(); ?>

<!-- End Pagination links -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>