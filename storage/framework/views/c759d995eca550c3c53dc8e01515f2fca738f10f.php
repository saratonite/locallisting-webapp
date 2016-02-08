<?php $__env->startSection('content'); ?>
<div class="row">

	<div class="col-md-2">
		<div data-spy="affix" data-offset-top="60" data-offset-bottom="200">
		<nav>
			<ul class="list-group">
				<li  class="list-group-item"><a href="<?php echo e(route('admin::vendor-enquiries',$vendor->id)); ?>">All </a> <span class="badge"> <?php echo e($count['all']); ?></span></li>
				<li  class="list-group-item"><a href="<?php echo e(route('admin::vendor-enquiries',$vendor->id)); ?>/accepted">Accepted</a><span class="badge"> <?php echo e($count['accepted']); ?></span></li>
				<li  class="list-group-item"><a href="<?php echo e(route('admin::vendor-enquiries',$vendor->id)); ?>/pending">Pending</a><span class="badge"> <?php echo e($count['pending']); ?></span></li>
				<li  class="list-group-item"><a href="<?php echo e(route('admin::vendor-enquiries',$vendor->id)); ?>/rejected">Rejected</a><span class="badge"> <?php echo e($count['rejected']); ?></span></li>
				<li  class="list-group-item"><a href="<?php echo e(route('admin::vendor-enquiries',$vendor->id)); ?>/spam">Spam</a><span class="badge"> <?php echo e($count['spam']); ?></span></li>
			</ul>
		</nav>
			<ul class="nav nav-list">
				<li><a href="<?php echo e(route('admin::vendor-profile',$vendor->id)); ?>">Profile</a></li>
				<li><a href="<?php echo e(route('admin::edit-vendor',$vendor->id)); ?>">Edit Profile</a></li>
				<li class="active"><a href="<?php echo e(route('admin::vendor-enquiries',$vendor->id)); ?>">Enquiries</a></li>
				<li class="active"><a href="<?php echo e(route('admin::vendor-reviews',$vendor->id)); ?>">Reviews</a></li>
				<li class="active"><a href="<?php echo e(route('admin::vendor-images',$vendor->id)); ?>">Images</a></li>
			</ul>
		</div>
	</div>
	<div class="col-md-10">
		<h3>Enquires of <?php echo e($vendor->vendor_name); ?></h3>
		<table class="table table-bordered">
			<thead>
				<tr>
					<th class="col-md-1">Sl.No</th>
					<th class="col-md-4">Subject</th>
					<th class="col-md-3">From</th>
					<th class="col-md-2">Date</th>
					<th class="col-md-1">Status</th>
				</tr>
				<!-- Loop -->
				<?php if(count($enquiries)): ?>
					<?php foreach($enquiries as $enquiry): ?>
						<tr>
							<td><?php echo e($enquiry->id); ?></td>
							<td><a href="<?php echo e(route('admin::view-enquiry',$enquiry->id)); ?>"><?php echo e($enquiry->subject); ?></a></td>
							<td><?php echo e($enquiry->from->first_name); ?></td>
							<td><?php echo e($enquiry->created_at->toFormattedDateString()); ?></td>
							<td><label class="label label-<?php echo e(BS_Enquiry_Status_Class($enquiry->status)); ?>"><?php echo e(ucfirst($enquiry->status)); ?></label></td>
						</tr>
					<?php endforeach; ?>
				<?php else: ?>
				<tr>
					<td colspan="5" class="alert alert-info">No records</td>
				</tr>
				<?php endif; ?>
				<!-- End Loop -->
			</thead>
		</table>

		<?php echo $enquiries->links(); ?>

	
	</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>