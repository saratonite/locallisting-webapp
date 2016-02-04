<?php $__env->startSection('content'); ?>
<div class="row">
	<h3>Edit User</h3>
	<?php echo $__env->make('admin.partials.alert', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<div class="col-md-6">
		<h3></h3>
		<form action="<?php echo e(route('admin::update-site-user',$user->id)); ?>" method="post">
			<?php echo e(csrf_field()); ?>

			<input type="hidden" name="_method" value="put">
			<div class="form-group <?php if($errors->has('first_name')): ?> has-error <?php endif; ?>">
				<label for="" class="control-label">First Name</label>
				<input type="text" class="form-control" name="first_name" value="<?php echo e(old('first_name',$user->first_name)); ?>">
				<?php if($errors->has('first_name')): ?>
					<span class="help-block"><?php echo e($errors->first('first_name')); ?></span>
				<?php endif; ?>
			</div>
			<div class="form-group <?php if($errors->has('last_name')): ?> has-error <?php endif; ?>">
				<label for="" class="control-label">Last Name</label>
				<input type="text" class="form-control" name="last_name" value="<?php echo e(old('last_name',$user->last_name)); ?>" >
				<?php if($errors->has('last_name')): ?>
					<span class="help-block"><?php echo e($errors->first('last_name')); ?></span>
				<?php endif; ?>
			</div>
			<div class="form-group <?php if($errors->has('email')): ?> has-error <?php endif; ?>">
				<label for="" class="control-label">Email</label>
				<input type="text" class="form-control" name="email" value="<?php echo e(old('email',$user->email)); ?>">
				<?php if($errors->has('email')): ?>
					<span class="help-block"><?php echo e($errors->first('email')); ?></span>
				<?php endif; ?>
			</div>
			<div class="form-group <?php if($errors->has('mobile')): ?> has-error <?php endif; ?>">
				<label for="" class="control-label">Mobile</label>
				<input type="text" class="form-control" name="mobile" value="<?php echo e(old('mobile',$user->mobile)); ?>">
				<?php if($errors->has('mobile')): ?>
					<span class="help-block"><?php echo e($errors->first('mobile')); ?></span>
				<?php endif; ?>
			</div>
			<div class="form-group <?php if($errors->has('addr_line1')): ?> has-error <?php endif; ?>">
				<label for="" class="control-label">Address line 1</label>
				<input type="text" class="form-control" name="addr_line1" value="<?php echo e(old('addr_line1',$user->addr_line1)); ?>">
				<?php if($errors->has('addr_line1')): ?>
					<span class="help-block"><?php echo e($errors->first('addr_line1')); ?></span>
				<?php endif; ?>
			</div>
			<div class="form-group <?php if($errors->has('addr_line2')): ?> has-error <?php endif; ?>">
				<label for="" class="control-label">Address line 2</label>
				<input type="text" class="form-control" name="addr_line2" value="<?php echo e(old('addr_line2',$user->addr_line2)); ?>">
				<?php if($errors->has('addr_line2')): ?>
					<span class="help-block"><?php echo e($errors->first('addr_line2')); ?></span>
				<?php endif; ?>
			</div>
			<div class="form-group <?php if($errors->has('addr_line3')): ?> has-error <?php endif; ?>">
				<label for="" class="control-label">Address line 3</label>
				<input type="text" class="form-control" name="addr_line3" value="<?php echo e(old('addr_line3',$user->addr_line3)); ?>">
				<?php if($errors->has('addr_line3')): ?>
					<span class="help-block"><?php echo e($errors->first('addr_line3')); ?></span>
				<?php endif; ?>
			</div>
			<div class="form-group <?php if($errors->has('status')): ?> has-error <?php endif; ?>">
				<label for="" class="control-label">Status</label>
				<select name="status" class="form-control">
					<?php if($user->StatusArray()): ?>
						<?php foreach($user->StatusArray() as $status): ?>
						<option <?php if(old('status',$user->status) == $status): ?> selected <?php endif; ?> value="<?php echo e($status); ?>"><?php echo e(ucfirst($status)); ?></option>
						<?php endforeach; ?>
					<?php endif; ?>
				</select>
				<?php if($errors->has('status')): ?>
					<span class="help-block"><?php echo e($errors->first('status')); ?></span>
				<?php endif; ?>
			</div>
			<div class="form-group">
				<input type="submit" class="btn btn-primary" value="Update">

			</div>
		</form>
	</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>