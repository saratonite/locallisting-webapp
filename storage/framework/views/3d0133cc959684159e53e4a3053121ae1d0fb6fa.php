<?php $__env->startSection('content'); ?>
<div class="container-fluid inner">
  <div class="container">
    <div class="row">
    <div class="col-lg-3 col-md-3 col-sm-3">
    <strong>Filter By Category <i class="fa fa-chevron-down"></i></strong><br><br>
    <p class="lem">

      <?php if($categories->count()): ?>

        <?php foreach($categories as $category): ?>
        <a href="<?php echo e(route('search')); ?>?category=<?php echo e($category->id); ?><?php if($city): ?>&city=<?php echo e($city); ?><?php endif; ?>"><?php echo e($category->name); ?></a><br>
        <?php endforeach; ?>

      <?php endif; ?>

    </p>
<hr>
    </div>
    
    <div class="col-lg-9 col-md-9 col-sm-9">
    <div class="col-lg-9 col-md-9 col-sm-9">
    <input type="text" class="form-control searchbx" placeholder="Architicts & Building Designers">
    </div>
    <div class="col-lg-12 col-md-12 col-sm-12">
    <h2 class="inh1">216,347 Architects and Building Designers</h2>
    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<br><br></p>
    <div class="row">
    <div class="col-lg-4 col-md-4 col-sm-4">
    <input type="text" class="form-control " placeholder="Architicts & Building Designers">
    </div>
    <div class="col-lg-4 col-md-4 col-sm-4">
     <div class="row">
    <div class=" col-lg-2 col-md-2 col-sm-2" style="margin-top:5px;">Near</div><div class="col-lg-10 col-md-10 col-sm-10" > <input type="text" class="form-control " placeholder="City, State"></div>
    </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-4">
     <div class="row">
    <div class=" col-lg-4 col-md-4 col-sm-4" style="margin-top:5px;">Within</div> <div class="col-lg-8 col-md-8 col-sm-8" >
    <select class="form-control ">
    <option>Anywhere</option>
    </select>
    </div>
    </div>
    </div>
    <div class="clearfix"></div><P>&nbsp;</P>
    <div class="col-lg-4 col-md-4 col-sm-4">
     <div class="row">
    <div class=" col-lg-4 col-md-4 col-sm-4" style="margin-top:5px;">Sort By</div> <div class="col-lg-8 col-md-8 col-sm-8" >
    <select class="form-control ">
    <option>Best Match</option>
    </select>
    </div>
    </div>
    </div>
    
    <div class="col-lg-4 col-md-4 col-sm-4">
     <div class="row">
    <div class=" col-lg-4 col-md-4 col-sm-4">
    <button class="btn btn-success">Search</button>
    </div>
    </div>
    </div>
    
    
    </div>
    <hr>
    </div>
        <div class="col-lg-12 col-md-12 col-sm-12">
  <?php if($vendors->count()): ?>

    <?php foreach($vendors as $vendor): ?>
    <!-- Vendor Loops -->

    <div class="row">
    <div class="col-lg-5 col-md-5 col-sm-5">
         
          <?php if($vendor->picture): ?>
          <img src="<?php echo e(url('/images/uploads')); ?>/<?php echo e($vendor->picture->base_dir); ?>/<?php echo e($vendor->picture->file_name); ?>" class="img-responsive" style="width:325px;height:175px">
          <?php else: ?>
           <img src="images/list.jpg" class="img-responsive">
          <?php endif; ?>
    </div>
    <div class="col-lg-7 col-md-7 col-sm-7">
    <div class="profileico">
          <img src="images/profile.jpg" class="img-responsive">
          
    </div>
    <h4 class="flo"><a href="<?php echo e(route('profile',$vendor->id,str_slug($vendor->vendor_name))); ?>"><?php echo e($vendor->vendor_name); ?></a> <br><img src="images/reviews.jpg"></h4>
    <p class="pull-right"><?php if($vendor->contact_number): ?> <?php echo e($vendor->contact_number); ?> <?php else: ?> <?php echo e($vendor->mobile); ?> <?php endif; ?></p>
    <div class="clearfix"></div>
    <p><strong><?php echo e($vendor->addr_line1); ?>,<?php echo e($vendor->addr_line2); ?>,<?php echo e($vendor->addr_line3); ?></strong></p>
    <p class="read"> <?php echo e(str_limit($vendor->description,210  )); ?>

    <br/><a href="<?php echo e(route('profile',$vendor->id,str_slug($vendor->vendor_name))); ?>">Read More</a> </p>
    </div>
    <div class="clearfix"></div>
    <div class="col-lg-12 col-md-12 col-sm-12"><hr></div>
    </div> 

   <!-- End Vendor Loops -->
   <?php endforeach; ?>
   <?php else: ?>
    <p class="alert alert-info"> NO RESULT FOUND :(</p>
   <?php endif; ?>
  
        </div> 


    
    
    </div>
    <nav class="pull-right">
      <?php echo e($vendors->links()); ?>

    </nav>    
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.frontend', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>