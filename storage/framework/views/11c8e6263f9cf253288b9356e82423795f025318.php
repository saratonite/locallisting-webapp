<?php $__env->startSection('content'); ?>

<div class="container-fluid banner">
  <div class="container">
    <div class="row">
    <div class="col-lg-12 text-right">
<p>Are you a Qualified Service Professional ?</p></div>
<div class="col-lg-12 cs"><a href="<?php echo e(route('vendor-signup')); ?>"  class="join pull-right">JOIN WITH US</a>
</div>
<div class="clearfix"></div>
<div class="col-lg-12"><h1 class="sehed">Find a trusted service provider</h1></div>
<div class="col-lg-2 col-md-2 col-sm-2">&nbsp;</div>
<div class="col-lg-8 col-md-8 col-sm-8  sebox">
<div class="row">
<form action="<?php echo e(route('search')); ?>">
<div class="col-lg-10 col-md-10 col-sm-10">
<select class="ctg col-lg-6 col-md-6 col-sm-6 col-xs-12" name="category">
<option value="0" disabled selected>All Category</option>
    <?php if(count($categories)): ?>
      <?php foreach($categories as $key => $category): ?>
        <option value="<?php echo e($key); ?>"><?php echo e($category); ?></option>
      <?php endforeach; ?>
    <?php endif; ?>
</select>

<select class="ctg col-lg-6 col-md-6 col-sm-6 col-xs-12" name="city" style="    border-left: 0px;
    border-radius: 0px 4px 4px 0px;">
<option disabled value="0" selected>City</option>
    <?php if(count($cities)): ?>
      <?php foreach($cities as $key => $city): ?>
        <option value="<?php echo e($key); ?>"><?php echo e($city); ?></option>
      <?php endforeach; ?>
    <?php endif; ?>
</select>
</div>
<div class="col-lg-2 col-md-2 col-sm-2 btpad" >
<button type="submit" class="btfi col-lg-12  col-md-12  col-sm-12 col-xs-12">Find</button>
  
</form>
</div>
</div>

</div>
<div class="clearfix"></div>
<div class="col-lg-2 col-md-2 col-sm-2">&nbsp;</div>
<div class="col-lg-8 col-md-8 col-sm-8 seboxli ">
1.CHOOSE THE SERVICE YOU NEED &nbsp; &nbsp; &nbsp;
2.SELECT YOUR SERVICE PROVIDER &nbsp; &nbsp; &nbsp;
3.ADD YOUR LOCATION &nbsp; &nbsp; &nbsp;
4.GET MULTIPLE OFFERS
</div>


    </div>
  </div>
</div>
<div class="container-fluid treef text-center">
  <div class="container">
    <div class="row">
    <div class="col-lg-4 col-md-4 col-sm-4"><i class="fa fa-check-circle-o"></i> Always Free !</div>
    <div class="col-lg-4 col-md-4 col-sm-4"><i class="fa fa-check-circle-o"></i> Verified Service Provider's</div>
    <div class="col-lg-4 col-md-4 col-sm-4"><i class="fa fa-check-circle-o"></i> Preffered choice of UAE Residents</div>
    </div>
  </div>
</div>
<div class="container-fluid">
  <div class="container categ">
    <div class="row">
    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
    <a href="#"><img src="images/category.jpg" class="img-responsive center-block">MOVING</a></div>
    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6"> <a href="#"><img src="images/category.jpg"class="img-responsive center-block">STORAGE</a></div>
   <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6"> <a href="#"><img src="images/category.jpg"class="img-responsive center-block">CAR SHIPPING</a></div>
    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6"> <a href="#"><img src="images/category.jpg"class="img-responsive center-block">CLEANING</a></div>
    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6"> <a href="#"><img src="images/category.jpg"class="img-responsive center-block">MAINTENANCE</a></div>
    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6"> <a href="#"><img src="images/category.jpg"class="img-responsive center-block">PEST CONTROL</a></div>
    <div class="clearfix"></div>
     <div class="col-lg-12 col-md-12 col-sm-12 ct">
    <a href="#"  class="cata">See All Categories</a></div>
    </div>

  </div>
</div>

<div class="container-fluid">
  <div class="container">
    <div class="row">
    

        <?php if($featuredVendors && count($featuredVendors)): ?>
        <div class="col-lg-12 col-md-12 col-sm-12"><h4 class="topse">Top Service Provider's</h4></div>
            <?php foreach($featuredVendors as $topV): ?>
               <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6 clearfix">
                      <a href="<?php echo e(route('profile',$topV->id)); ?>" title="<?php echo e($topV->vendor_name); ?>">
                           <?php if($topV->logo): ?>
                              <img style="width:150px;hiegth:80px" src="<?php echo e(imagePath($topV->logo)); ?>"class="img-responsive center-block">
                
                           <?php else: ?>
                              <img style="width:150px;hiegth:80px" src="<?php echo e(url('/')); ?>/images/logder.jpg" class="img-responsive center-block">
                           <?php endif; ?>
                      </a>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
  </div>
</div>
<div class="container-fluid testmo">
  <div class="container">
    <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12"><h2 class="testtitle">What our clients say ? <br><i class="fa fa-quote-left"></i></h2>
    <section id="carousel"> 
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="carousel slide" id="fade-quote-carousel" data-ride="carousel" data-interval="3000">
				  <!-- Carousel indicators -->
                  <ol class="carousel-indicators">
				    <li data-target="#fade-quote-carousel" data-slide-to="0"></li>
				    <li data-target="#fade-quote-carousel" data-slide-to="1"></li>
				    <li data-target="#fade-quote-carousel" data-slide-to="2" class="active"></li>
				  </ol>
				  <!-- Carousel items -->
				  <div class="carousel-inner">
				    <div class="item">
                       
				    	<blockquote>
				    		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. </p>
                            <a href="#"  class="tem">Write a review</a>
				    	</blockquote>
                        	
				    </div>
				    <div class="item">
                      
				    	<blockquote>
				    		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. </p>
                             <a href="#"  class="tem">Write a review</a>
				    	</blockquote>
				    </div>
				    <div class="active item">
                       
				    	<blockquote>
				    		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. </p>
                             <a href="#"  class="tem">Write a review</a>
				    	</blockquote>
				    </div>
				  </div>
				</div>
			</div>							
		</div>    
    </section>
    
    
    </div>

    </div>
  </div>
</div>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.frontend', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>