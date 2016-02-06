<?php $__env->startSection('content'); ?>
<div class="row">
	<div class="col-md-2">
		<div data-spy="affix" data-offset-top="60" data-offset-bottom="200">
			<ul class="nav nav-list">
				<li><a href="<?php echo e(route('admin::vendor-profile',$vendor->id)); ?>">Profile</a></li>
				<li><a href="<?php echo e(route('admin::edit-vendor',$vendor->id)); ?>">Edit Profile</a></li>
				<li class="active"><a href="<?php echo e(route('admin::vendor-enquiries',$vendor->id)); ?>">Enquiries</a></li>
			</ul>
		</div>
	</div>
	
	<div class="col-md-6">
	<h3>Edit Vendor </h3>
	<?php echo $__env->make('admin.partials.alert', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		<form action="<?php echo e(route('admin::update-vendor',$vendor->id)); ?>" method="post">
			<?php echo e(csrf_field()); ?>

			<input type="hidden" name="_method" value="put">
			<div class="form-group <?php if($errors->has('vendor_name')): ?> has-error <?php endif; ?>">
				<label for="" class="control-label">Vendor Name</label>
				<input type="text" class="form-control" name="vendor_name" value="<?php echo e(old('vendor_name',$vendor->vendor_name)); ?>">
				<?php if($errors->has('vendor_name')): ?>
					<span class="help-block"><?php echo e($errors->first('vendor_name')); ?></span>
				<?php endif; ?>
			</div>
			<div class="form-group <?php if($errors->has('description')): ?> has-error <?php endif; ?>">
				<label for="" class="control-label">Description</label>
				<textarea class="form-control" name="description" ><?php echo e(old('description',$vendor->description)); ?></textarea>
				<?php if($errors->has('description')): ?>
					<span class="help-block"><?php echo e($errors->first('description')); ?></span>
				<?php endif; ?>
			</div>
			<div class="form-group <?php if($errors->has('category_id')): ?> has-error <?php endif; ?>">
				<label for="" class="control-label">Category</label>
				<select  id="" class="form-control" name="categories[]" multiple size="5">
					<option disabled >Select Category</option>
					<?php if(count($categories)): ?>
						<?php foreach($categories as $key => $name): ?>
							<option 

							<?php if(count($vendor->categories)): ?>
								<?php foreach($vendor->categories as $vcat): ?>

									<?php if(old("categories[]",$vcat->category_id) == $key ): ?> selected <?php endif; ?>
								<?php endforeach; ?>
							<?php endif; ?>

							value="<?php echo e($key); ?>"><?php echo e($name); ?></option>
						<?php endforeach; ?>
					<?php endif; ?>
				</select>
				<?php if($errors->has('category_id')): ?>
					<div class="help-block"><?php echo e($errors->first('category_id')); ?></div>
				<?php endif; ?>
			</div>
			<div class="form-group <?php if($errors->has('city_id')): ?> has-error <?php endif; ?>">
				<label for="" class="control-label">City</label>
				<select  id="" class="form-control" name="cities[]" multiple>
					<?php if(count($cities)): ?>
						<?php foreach($cities as $key => $name): ?>
							<option 
								<?php if(count($vendor->cities)): ?>
									<?php foreach($vendor->cities as $vcity): ?>

										<?php if(old("cities[]",$vcity->city_id) == $key ): ?> selected <?php endif; ?>
									<?php endforeach; ?>
								<?php endif; ?>

								value="<?php echo e($key); ?>"><?php echo e($name); ?></option>
						<?php endforeach; ?>
					<?php endif; ?>
				</select>
				<?php if($errors->has('city_id')): ?>
					<span class="help-block"><?php echo e($errors->first('city_id')); ?></span>
				<?php endif; ?>
			</div>
			<div class="form-group <?php if($errors->has('addr_line1')): ?> has-error <?php endif; ?>">
				<label for="" class="control-label">Address (Building / Room)</label>
				<input type="text" class="form-control" name="addr_line1" value="<?php echo e(old('addr_line1',$vendor->addr_line1)); ?>">
				<?php if($errors->has('addr_line1')): ?>
					<span class="help-block"><?php echo e($errors->first('addr_line1')); ?></span>
				<?php endif; ?>
			</div>
			<div class="form-group <?php if($errors->has('addr_line2')): ?> has-error <?php endif; ?>">
				<label for="" class="control-label">Address (Street / Landmark )</label>
				<input type="text" class="form-control" name="addr_line2" value="<?php echo e(old('addr_line2',$vendor->addr_line2)); ?>">
				<?php if($errors->has('addr_line2')): ?>
					<span class="help-block"><?php echo e($errors->first('addr_line2')); ?></span>
				<?php endif; ?>
			</div>
			<div class="form-group <?php if($errors->has('addr_line3')): ?> has-error <?php endif; ?>">
				<label for="" class="control-label">Address (Place )</label>
				<input type="text" class="form-control" name="addr_line3" value="<?php echo e(old('addr_line3',$vendor->addr_line3)); ?>">
				<?php if($errors->has('addr_line3')): ?>
					<span class="help-block"><?php echo e($errors->first('addr_line3')); ?></span>
				<?php endif; ?>
			</div>
			<div class="form-group <?php if($errors->has('post_code')): ?> has-error <?php endif; ?>">
				<label for="" class="control-label">Post Code</label>
				<input type="text" class="form-control" name="post_code" value="<?php echo e(old('post_code',$vendor->post_code)); ?>">
				<?php if($errors->has('post_code')): ?>
					<span class="help-block"><?php echo e($errors->first('post_code')); ?></span>
				<?php endif; ?>
			</div>
			<div class="form-group <?php if($errors->has('contact_number')): ?> has-error <?php endif; ?>">
				<label for="" class="control-label">Contact Number</label>
				<input type="text" class="form-control" name="contact_number" value="<?php echo e(old('contact_number',$vendor->contact_number)); ?>">
				<?php if($errors->has('city_id')): ?>
					<span class="help-block"><?php echo e($errors->first('contact_number')); ?></span>
				<?php endif; ?>
			</div>
			<div class="form-group <?php if($errors->has('mobile')): ?> has-error <?php endif; ?>">
				<label for="" class="control-label">Mobile</label>
				<input type="text" class="form-control" name="mobile" value="<?php echo e(old('mobile',$vendor->mobile)); ?>">
				<?php if($errors->has('mobile')): ?>
					<span class="help-block"><?php echo e($errors->first('mobile')); ?></span>
				<?php endif; ?>
			</div>
			
			<div class="form-group">
				<input type="submit" class="btn btn-primary" value="Update">

			</div>
		</form>
	</div>

	<!-- Picture update section -->
	<div class="col-md-4">
	<form action="<?php echo e(route('admin::update-vendor-picture',$vendor->id)); ?>" method="post" enctype="multipart/form-data">
		<div class="panel panel-default">
			<div class="panel-heading">
				Picture
			</div>
			<div class="panel-body">
				<?php if($vendor->picture): ?>
				<img src="<?php echo e(ImagePath($vendor->picture,'md')); ?>" alt="">
				<?php else: ?> 
					<strong>No Picture</strong>
				<?php endif; ?>
				<input type="file" name="file">
				<?php echo e(csrf_field()); ?>


				<?php if($errors->has('file')): ?>
					<span class="text-danger"> <?php echo e($errors->first('file')); ?></span>
				<?php endif; ?>
			</div>
			<div class="panel-footer">

					<button type="submit" class="btn">Upload</button>
					<button type="button" class="btn btn-danger	" id="remove-pic" data-record-id="<?php echo e($vendor->id); ?>">Remove</button>
				</div>
		</div>
	</form>
	</div>
	<!-- End Picture update section -->
</div>

<!-- Modals -->
	<!-- Modal 1 -->
	<div class="modal fade" id="removePicModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <form action="<?php echo e(route('admin::all-vendors')); ?>" method="post">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Delete Vendor Picture</h4>
      </div>
      <div class="modal-body">
        	<p class="alert alert-danger" id="modalContext">

        	Delete picture . Are you sure ?;
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
	<!-- End Modal 1 -->
<!-- End Modals -->
<?php $__env->stopSection(); ?>


<?php $__env->startSection('scripts'); ?>
<script type="text/javascript">
	$(function(){
		 $('select[multiple]').select2();


		 // Remove pic modal
		 var removePic = new Confirmbox();
		 removePic.setActionUrl('remove-picture');
		 removePic.create({'el':'#remove-pic','modal':'#removePicModal','action_url':'remove-picture'});
	});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>