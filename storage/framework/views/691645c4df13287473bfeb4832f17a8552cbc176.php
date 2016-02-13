<!doctype html>
<html lang="en-US">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>UAE HomeAdvisor</title>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta name="description" content="">
<link rel="icon" type="image/png" href="images/icon.png">
<link rel="stylesheet" href="<?php echo e(asset('css/stayle.css')); ?>" type="text/css">
<link rel="stylesheet" href="<?php echo e(asset('css/bootstrap.min.css')); ?>" type="text/css">
<link rel="stylesheet" href="<?php echo e(asset('css/vendor.style.css')); ?>" type="text/css">
<!-- <link rel="stylesheet" href="<?php echo e(asset('css/bootstrap-theme.min.css')); ?>" type="text/css"> -->
<link rel="stylesheet" href="<?php echo e(asset('css/font-awesome/css/font-awesome.min.css')); ?>" type="text/css">
<link href='https://fonts.googleapis.com/css?family=Open+Sans:300' rel='stylesheet' type='text/css'>
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
  <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
  <![endif]--> 
  <?php echo $__env->yieldContent('stylesheets'); ?>

</head>
<body>
<?php echo $__env->make('site.partials.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>



<?php echo $__env->yieldContent('content'); ?>


<?php echo $__env->make('site.partials.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <script src="<?php echo e(asset('js/jquery-1.10.2.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/vendor.scripts.js')); ?>"></script>

    <script type="text/javascript">
      $(function(){
        $('select[multiple]').select2();
      });
    </script>
  <?php echo $__env->yieldContent('scripts'); ?>




</body>
</html>