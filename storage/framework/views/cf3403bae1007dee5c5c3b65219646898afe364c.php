<?php $__env->startSection('header'); ?>
<?php echo $__env->make('site.partials.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
<div class="container">
	<div class="row">
		<div class="col-md-5">
			
		</div>
		<div class="col-md-7">
			<form action="<?php echo e(route('vendor-signup-process')); ?>" method="post" class="form-horizontal">
				<div class="panel panel-default" style="margin-top:10px">
					<div class="panel-heading" >
						Service Provider Registration
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
				<div class="form-group <?php if($errors->has('vendor_name')): ?> has-error <?php endif; ?>">
					<label for="" class="control-label col-md-3">Company</label>
					<div class="col-md-7">
						<input type="text" name="vendor_name" value="<?php echo e(old('vendor_name')); ?>" class="form-control" placeholder="Company Name / Service Provider Name">
						<?php if($errors->has('vendor_name')): ?>
							<span class="help-block"><?php echo e($errors->first('vendor_name')); ?></span>
						<?php endif; ?>
					</div>
				</div>
				<!--  -->
				<div class="form-group <?php if($errors->has('category_id')): ?> has-error <?php endif; ?>">
					<label for="" class="control-label col-md-3">Category</label>
					<div class="col-md-7">
						<select name="category_id" class="form-control">
						<option value="" disabled selected>Select Category</option>
						<?php if($categories->count()): ?>
								<?php foreach($categories as $category): ?>
								<option <?php if($category->id == old('category_id')): ?> selected <?php endif; ?> value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
								<?php endforeach; ?>
						<?php endif; ?>
						</select>
						
						<?php if($errors->has('category_id')): ?>
							<span class="help-block"><?php echo e($errors->first('category_id')); ?></span>
						<?php endif; ?>
					</div>
				</div>
				<div class="form-group <?php if($errors->has('city_id')): ?> has-error <?php endif; ?>">
					<label for="" class="control-label col-md-3">City</label>
					<div class="col-md-7">
						<select name="city_id" class="form-control">
						<option value="" disabled selected>Select City</option>
						<?php if($cities->count()): ?>
								<?php foreach($cities as $city): ?>
									<option <?php if($city->id == old('city_id')): ?> selected <?php endif; ?> value="<?php echo e($city->id); ?>"><?php echo e($city->name); ?></option>
								<?php endforeach; ?>
						<?php endif; ?>
						</select>
						
						<?php if($errors->has('city_id')): ?>
							<span class="help-block"><?php echo e($errors->first('city_id')); ?></span>
						<?php endif; ?>
					</div>
				</div>
				<!--  -->

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
				<!-- Address -->
				<div class="form-group <?php if($errors->has('addr_line1')): ?> has-error <?php endif; ?>">
					<label for="" class="control-label col-md-3" >Address</label>
					<div class="col-md-7">
						<input type="text" name="addr_line1" value="<?php echo e(old('addr_line1')); ?>" class="form-control" placeholder="Adddress line 1">
						<?php if($errors->has('addr_line1')): ?>
							<span class="help-block"><?php echo e($errors->first('addr_line1')); ?></span>
						<?php endif; ?>
					</div>
				</div>
				<div class="form-group <?php if($errors->has('addr_line2')): ?> has-error <?php endif; ?>">
					<label for="" class="control-label col-md-3" ></label>
					<div class="col-md-7">
						<input type="text" name="addr_line2" value="<?php echo e(old('addr_line2')); ?>" class="form-control" placeholder="Address line 2">
						<?php if($errors->has('addr_line2')): ?>
							<span class="help-block"><?php echo e($errors->first('addr_line2')); ?></span>
						<?php endif; ?>
					</div>
				</div>
				<div class="form-group <?php if($errors->has('addr_line3')): ?> has-error <?php endif; ?>">
					<label for="" class="control-label col-md-3" ></label>
					<div class="col-md-7">
						<input type="text" name="addr_line3" value="<?php echo e(old('addr_line3')); ?>" class="form-control" placeholder="Address line 3">
						<?php if($errors->has('addr_line3')): ?>
							<span class="help-block"><?php echo e($errors->first('addr_line3')); ?></span>
						<?php endif; ?>
					</div>
				</div>
				<div class="form-group <?php if($errors->has('zip_code')): ?> has-error <?php endif; ?>">
					<label for="" class="control-label col-md-3" >Zip Code</label>
					<div class="col-md-3">
						<input type="text" name="zip_code" value="<?php echo e(old('zip_code')); ?>" class="form-control" placeholder="Zip Code">
						<?php if($errors->has('zip_code')): ?>
							<span class="help-block"><?php echo e($errors->first('zip_code')); ?></span>
						<?php endif; ?>
					</div>
				</div>
				<!-- End Address -->
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