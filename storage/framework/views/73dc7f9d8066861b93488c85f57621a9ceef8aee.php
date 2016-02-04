<?php $__env->startSection('content'); ?>
<div class="row">
	<div class="col-md-2">
		<?php echo $__env->make('admin.category.partials.sidenav', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	</div>
	<div class="col-md-10">
		<h3>Catogories</h3>
		<?php echo $__env->make('admin.partials.alert', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		<table class="table table-bordered">
			<thead>
				<th class="col-md-1">#</th>
				<th class="col-md-3">Name</th>
				<th class="col-md-4">Description</th>
				<th class="col-md-2">Status</th>
				<th class="col-md-2">Action</th>
			
			</thead>
			<tbody>
		<!-- Loop through categories -->
			<?php if($categories->count()): ?>
			<?php foreach($categories as $category): ?>
				<tr>
					<td><?php echo e($row_count++); ?></td>
					<td><a href="<?php echo e(route('admin::category-edit',$category->id)); ?>"><?php echo e($category->name); ?></a></td>
					<td><?php echo e($category->description); ?></td>
					<td><?php echo e($category->status); ?></td>
					<td><a href="#delete" class="delete" data-record-id="<?php echo e($category->id); ?>"><i class="glyphicon glyphicon-remove-circle"></a></td>
				</tr>
			<?php endforeach; ?>
			<?php else: ?>
				<tr class="info">
					<td colspan="5">No records</td>
				</tr>
			<?php endif; ?>
			<!-- End Loop -->
			</tbody>
		</table>
		<?php echo $categories->links(); ?>

	</div>
</div>
<!--Delete Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <form action="" method="post">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Delete Category</h4>
      </div>
      <div class="modal-body">
        	<p class="alert alert-danger" id="modalContext">

        	This will  delete the category .Are you sure ?;
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
<!-- End Modal -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script>
	$(function(){
		var v = new Confirmbox();
		v.create({'el':'.delete','modal':'#deleteModal','action_url':'delete'});
	});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>