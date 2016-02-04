<?php if(Session::has('success')): ?>
<p class="alert alert-success"><?php echo e(Session::get('success')); ?>

	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
  		<span aria-hidden="true">&times;</span>
	</button>
</p>
<?php endif; ?>
<?php if(Session::has('error')): ?>
<p class="alert alert-danger"><?php echo e(Session::get('success')); ?>

	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
  		<span aria-hidden="true">&times;</span>
	</button>
</p>
<?php endif; ?>