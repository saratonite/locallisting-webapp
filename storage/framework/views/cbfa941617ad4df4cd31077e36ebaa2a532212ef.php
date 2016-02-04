<?php $__env->startSection('content'); ?>
<div class="row">
	
	<?php echo $__env->make('admin.partials.alert', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<div class="col-md-2">
		<?php echo $__env->make('admin.city.partials.sidenav', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	</div>
	<div class="col-md-6">
		<h3>Add City</h3>
		<form action="<?php echo e(route("admin::city-create")); ?>" method="post">
			<?php echo e(csrf_field()); ?>

			<div class="form-group <?php if($errors->has('name')): ?> has-error <?php endif; ?>">
				<label class="control-label">Name</label>
				<input type="text" class="form-control" name="name" value="<?php echo e(old('name')); ?>">
				<?php if($errors->has('name')): ?>
					<span class="help-block"><?php echo e($errors->first('name')); ?></span>
				<?php endif; ?>
			</div>
			<div class="form-group <?php if($errors->has('description')): ?> has-error <?php endif; ?>">
				<label class="control-label">Description</label>
				<input type="text" class="form-control" name="description" value="<?php echo e(old('description')); ?>">
				<?php if($errors->has('description')): ?>
					<span class="help-block"><?php echo e($errors->first('description')); ?></span>
				<?php endif; ?>
			</div>
			<div class="form-group <?php if($errors->has('slug')): ?> has-error <?php endif; ?>">
				<label class="control-label">slug</label>
				<input type="text" class="form-control" name="slug" value="<?php echo e(old('slug')); ?>">
				<?php if($errors->has('slug')): ?>
					<span class="help-block"><?php echo e($errors->first('slug')); ?></span>
				<?php endif; ?>
			</div>
			<div class="form-group">
				<input type="submit" class="btn btn-primary" name="submit">
			</div>
		</form>
	</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>