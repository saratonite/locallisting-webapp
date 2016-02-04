<?php $__env->startSection('title','Dasboard'); ?>

<?php $__env->startSection('content'); ?>
<div class="page-header">
	<h2>Dashboard</h2>
</div>

<div class="col-md-5">
	<div class="list-group">
	  <span href="#" class="list-group-item active">
	    <h4>Daily Status</h4>
	  </span>
	  <li href="#" class="list-group-item">REVENUE</li>
	  <li href="#" class="list-group-item">VENDORS <span class="badge">0</span></li>
	  <li href="#" class="list-group-item">USERS <span class="badge">0</span></li>
	  <li href="#" class="list-group-item">INQUIRIES <span class="badge">0</span></li>
	</div>
</div>
<div class="col-md-7">
	<div class="list-group">
	  <span href="#" class="list-group-item active">
	    <h4>Overall Status</h4>
	  </span>
	  <a href="#" class="list-group-item">REVENUE </a>
	  <a href="#" class="list-group-item">VENDORS <span></span> <span class="badge"><?php echo e($count["vendors"]); ?></span></a>
	  <a href="#" class="list-group-item">USERS <span class="badge"><?php echo e($count['users']); ?></span></a>
	  <a href="#" class="list-group-item">INQUIRIES <span class="badge"><?php echo e($count['enquiries']); ?></span></a>
	</div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>