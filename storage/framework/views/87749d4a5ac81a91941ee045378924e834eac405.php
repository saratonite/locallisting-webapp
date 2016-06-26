<?php $__env->startSection('content'); ?>
<h3>Users</h3>
<?php echo $__env->make('admin.partials.alert', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
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
			<td>
				
				<a href="<?php echo e(route('admin::view-site-user',$user->id)); ?>"><i class="glyphicon glyphicon-eye-open"></i></a>
				<a href="#delete" class="action-delete" data-record-id="<?php echo e($user->id); ?>"><i class="glyphicon glyphicon-remove"></i></a>
			</td>
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

        	Delete User ?; this will affect the following.
        	<ul>
        		<li>Delete enquiries</li>
        		<li>Delete reviews</li>
        		<li>Delete images</li>
        	</ul>
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
	var userBase = "<?php echo e(route('admin::all-site-users')); ?>";
	var delBox = new Confirmbox();
	delBox.create({"el":".action-delete",'modal':'#delete-modal','action_url':userBase+'/delete'});

</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>