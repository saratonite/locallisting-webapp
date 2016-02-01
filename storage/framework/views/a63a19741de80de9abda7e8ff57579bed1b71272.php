<div class="container-fluid head">
  <div class="container">
    <div class="row">
      <div class="col-lg-4 col-md-4 col-sm-4 logo">
        <a href="<?php echo e(url('/')); ?>"><img src="images/logo.png"></a>
      </div>
      <div class="col-lg-8 col-md-8 col-sm-8 post">

      <?php if(Auth::check()): ?>
        <a href="<?php echo e(route("account::appHome")); ?>" class="log">MY DASHBOARD</a> 

      <?php else: ?>
        <a href="<?php echo e(url('login')); ?>" lass="log">LOGIN</a>/
        <a href="<?php echo e(route('user-signup')); ?>" class="log">SIGNUP</a>  <a href="#" class="preq">POST A REQUIREMENT</a>

      <?php endif; ?>
      </div>
    </div>
  </div>
</div>

