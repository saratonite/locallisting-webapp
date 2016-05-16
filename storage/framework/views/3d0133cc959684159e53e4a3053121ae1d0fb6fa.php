<?php $__env->startSection('content'); ?>
<div class="container-fluid inner">
  <div class="container">
    <div class="row">
    <div class="col-lg-3 col-md-3 col-sm-3">
    <strong>Filter By Category <i class="fa fa-chevron-down"></i></strong><br><br>
    <p class="lem">
      <a href="<?php echo e(route('search')); ?>">All</a><br>
      <?php if($categoriesSide->count()): ?>

        <?php foreach($categoriesSide as $category): ?>
        <a href="<?php echo e(route('search')); ?>?category=<?php echo e($category->id); ?><?php if($city): ?>&city=<?php echo e($city); ?><?php endif; ?>"><?php echo e($category->name); ?></a><br>
        <?php endforeach; ?>

      <?php endif; ?>

    </p>
<hr>
    </div>
    
    <div class="col-lg-9 col-md-9 col-sm-9">
    <div class="col-lg-12 col-md-12 col-sm-12">
    <form action="">
      <div class="col-md-10">
        <input type="text" class="form-control searchbx" name="q" placeholder="Search..." value="<?php if($q): ?><?php echo e($q); ?><?php endif; ?>" >
      </div>
      <div class="col-md-2">
        <button class="btn btn-success">Search</button>

      </div>
      </form>
    </div>
    <div class="col-lg-12 col-md-12 col-sm-12">
    <h2 class="inh1"><?php echo e($vendors->total()); ?> Vendor(s) found </h2>
    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<br><br></p>
    <div class="row">
    <form action="<?php echo e(route('search')); ?>">
    <div class="col-lg-3 col-md-3 col-sm-3">
      <select name="category" class="form-control">
        <option disabled selected> Category</option>
        <?php if(count($categories)): ?>
          <?php foreach($categories as $key=> $cate): ?>
          <option <?php if($cat==$key): ?> selected <?php endif; ?> value="<?php echo e($key); ?>"><?php echo e($cate); ?></option>
          <?php endforeach; ?>
        <?php endif; ?>
      </select>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-3">
     <div class="row">
    <div class=" col-lg-2 col-md-2 col-sm-2" style="margin-top:5px;">Near</div><div class="col-lg-10 col-md-10 col-sm-10" >
     <!--  -->
      <select class="form-control" name="city">
          <option disabled selected> City</option>
          <?php if($cities->count()): ?>
            <?php foreach($cities as $cit): ?>
              <option <?php if($cit->id == $city): ?> selected <?php endif; ?> value="<?php echo e($cit->id); ?>"><?php echo e($cit->name); ?></option>
            <?php endforeach; ?>
          <?php endif; ?>
      </select>
     <!--  -->
    </div>


    </div>
    
  
    <div class="clearfix"></div><P>&nbsp;</P>

    
    
    </div>
        <div class=" col-lg-2 col-md-2 col-sm-2">
    <button class="btn btn-success">Search</button>
    </div>
      </form>
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
          <?php if($vendor->logo): ?>
              <img style="width:50px;height:50px" src="<?php echo e(url('/images/uploads')); ?>/<?php echo e($vendor->logo->base_dir); ?>/<?php echo e($vendor->logo->file_name); ?>" class="img-responsive">
          <?php else: ?>
            <img src="images/profile.jpg" class="img-responsive">
          <?php endif; ?>
          
    </div>
    <h4 class="flo"><a href="<?php echo e(route('profile',$vendor->id,str_slug($vendor->vendor_name))); ?>"><?php echo e($vendor->vendor_name); ?></a> <br><!-- <img src="images/reviews.jpg"> -->
        <p >
            <small style="color:green">  
              <?php if($vendor->rate): ?>
              <?php echo e(FrontStarRating($vendor->rate)); ?>

              <?php else: ?>
              Not Rated Yet
              <?php endif; ?> <?php echo e($vendor->review->count()); ?> Reviews</small>
        </p>
    </h4>
    
    <p class="pull-right"> <i class="glyphicon glyphicon-earphone"></i><?php if($vendor->contact_number): ?> <?php echo e($vendor->contact_number); ?> <?php else: ?> <?php echo e($vendor->mobile); ?> <?php endif; ?></p>
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