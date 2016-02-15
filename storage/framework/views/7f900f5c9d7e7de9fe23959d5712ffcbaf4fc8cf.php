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
			<th class="col-md-2">Featured</th>
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
				<td>
					<?php if($vendor->featured): ?>
						<button class="btn btn-xs btn-warning unset-featured" data-record-id="<?php echo e($vendor->id); ?>">Remove Freatured</button>
					<?php else: ?>
						<button class="btn btn-xs btn-primary set-featured" data-record-id="<?php echo e($vendor->id); ?>">Set As Featured</button>

					<?php endif; ?>

				</td>
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
<!-- Modals -->

<!--Delete Modal -->
<div class="modal fade" id="modalSetFeatured" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <form action="" method="post">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Make Featured</h4>
      </div>
      <div class="modal-body">
        	<p class="alert alert-danger" id="modalContext">

        	Make this vendor as featured ?;
        	</p>
        	<?php echo e(csrf_field()); ?>

        <input type="hidden" name="_method" value="put">
        <input type="hidden" name="id" >
        <input type="hidden" name="action" >
      </div>
      <div class="modal-footer">
      	<button type="submit" class="btn btn-success">Make Featured</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
  </form>
</div>
<!-- End Set as Featured -->
<div class="modal fade" id="modalUnsetFeatured" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <form action="" method="post">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Remove Featured</h4>
      </div>
      <div class="modal-body">
        	<p class="alert alert-danger" id="modalContext">

        	Remove this vendor from featured ?;
        	</p>
        	<?php echo e(csrf_field()); ?>

        <input type="hidden" name="_method" value="put">
        <input type="hidden" name="id" >
        <input type="hidden" name="action" >
      </div>
      <div class="modal-footer">
      	<button type="submit" class="btn btn-danger">CONTINUE</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
  </form>
</div>
<!-- End Set as Featured -->
<!-- End Modal -->
<?php $__env->stopSection(); ?>


<?php $__env->startSection('scripts'); ?>

<script type="text/javascript">
	var vendorsBaseUrl= "<?php echo e(route('admin::all-vendors')); ?>";
	var setFeatured = new Confirmbox();
	setFeatured.create({"el":".set-featured","modal":"#modalSetFeatured","action_url":vendorsBaseUrl+"/setfeatured"});


	var UnsetFeatured = new Confirmbox();
	UnsetFeatured.create({"el":".unset-featured","modal":"#modalUnsetFeatured","action_url":vendorsBaseUrl+"/unsetfeatured"});

</script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>