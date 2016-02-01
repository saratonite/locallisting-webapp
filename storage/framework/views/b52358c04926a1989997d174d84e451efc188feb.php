<!-- Site user account Register -->



<?php $__env->startSection('content'); ?>
<h3>Greetings!!</h3>
Hi <?php echo e($user->first_name); ?> <?php echo e($user->last_name); ?>

<p>
 	You are successfully registered with UAE Home Advisor. 
	<!--  -->
</p>
<p>
	Please  <a href="<?php echo e(url('confirm_email/'.$user->email_verification)); ?>">confirm email</a> address.
</p>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.emails.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>