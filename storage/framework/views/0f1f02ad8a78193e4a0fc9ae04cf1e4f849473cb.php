<?php $__env->startSection('header'); ?>
<?php echo $__env->make('site.partials.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
<div class="container">
	<div class="row">
		<div class="col-md-5">
			
		</div>
		<div class="col-md-7">
			<form action="<?php echo e(route('user-signup-process')); ?>" method="post" class="form-horizontal">
				<div class="panel panel-default" style="margin-top:10px">
					<div class="panel-heading" >
						User registration
					</div>
					<?php if(Session::has('success')): ?>
						<p class="alert alert-success">
							<?php echo Session::get('success'); ?>

						</p>
					<?php endif; ?>
					<div class="panel-body">
							<?php echo e(csrf_field()); ?>

						<div class="form-group <?php if($errors->has('first_name') || $errors->has('last_name')): ?> has-error <?php endif; ?>">
					<label for="" class="control-label col-md-3">Name</label>
					<div class="col-md-4">
						<input type="text" name="first_name" value="<?php echo e(old('first_name')); ?>" class="form-control" placeholder="First name" >
						<?php if($errors->has('first_name')): ?>
							<span class="help-block"><?php echo e($errors->first('first_name')); ?></span>
						<?php endif; ?>
					</div>
					<div class="col-md-3">
						<input type="text" name="last_name" value="<?php echo e(old('last_name')); ?>" class="form-control" placeholder="Last name">
						<?php if($errors->has('last_name')): ?>
							<span class="help-block"><?php echo e($errors->first('last_name')); ?></span>
						<?php endif; ?>
					</div>
				</div>
				<div class="form-group <?php if($errors->has('email')): ?> has-error <?php endif; ?>">
					<label for="" class="control-label col-md-3">Email</label>
					<div class="col-md-7">
						<input type="email" name="email" value="<?php echo e(old('email')); ?>" class="form-control" placeholder="Email">
						<?php if($errors->has('email')): ?>
							<span class="help-block"><?php echo e($errors->first('email')); ?></span>
						<?php endif; ?>
					</div>
				</div>
				<div class="form-group <?php if($errors->has('mobile')): ?> has-error <?php endif; ?>">
					<label for="" class="control-label col-md-3" >Mobile</label>
					<div class="col-md-7">
						<input type="text" name="mobile" value="<?php echo e(old('mobile')); ?>" class="form-control" placeholder="Mobile">
						<?php if($errors->has('mobile')): ?>
							<span class="help-block"><?php echo e($errors->first('mobile')); ?></span>
						<?php endif; ?>
					</div>
				</div>
				<div class="form-group <?php if($errors->has('password')): ?> has-error <?php endif; ?>">
					<label for="" class="control-label col-md-3">Password</label>
					<div class="col-md-7">
						<input type="password" name="password" class="form-control">
						<?php if($errors->has('first_name')): ?>
							<span class="help-block"><?php echo e($errors->first('password')); ?></span>
						<?php endif; ?>
					</div>
				</div>
				<div class="form-group <?php if($errors->has('password')): ?> has-error <?php endif; ?>">
					<label for="" class="control-label col-md-3">Confirm Password</label>
					<div class="col-md-7">
						<input type="password" name="password_confirmation" class="form-control">

					</div>
				</div>
				<div class="form-group">
					<div class="col-md-7 col-md-offset-3">
						<input type="submit" class="btn btn-success" value="SIGNUP">
					</div>
				</div>
					</div>
				</div>
				
			</form>
		</div>
   </div>
 </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
<?php echo $__env->make('site.partials.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.frontend', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>