<?php $__env->startSection('content'); ?>
	<div ng-app="userApp">
	<div ng-view></div>
	</div>
	
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.user', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>