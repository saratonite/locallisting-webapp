<?php $__env->startSection('content'); ?>

<div class="container-fluid banner" id="get-start">
  <div class="container">
    <div class="row">
<div class="col-lg-12 cs">

    <a href="<?php echo e(route('about')); ?>"  class="join pull-right">Are you a Qualified Service Professional?</a>
 
</div>
<div class="clearfix"></div>
<div class="col-lg-2 col-md-2 col-sm-2">&nbsp;</div>
<div class="col-lg-8 col-md-8 col-sm-8  hedbox"><h1 class="sehed">Find a Trusted Service Provider</h1></div>
<div class="col-lg-2 col-md-2 col-sm-2">&nbsp;</div>
<div class="clearfix"></div>
<div class="col-lg-2 col-md-2 col-sm-2">&nbsp;</div>
<div class="col-lg-8 col-md-8 col-sm-8  sebox">
<div class="row">
<form action="<?php echo e(route('search')); ?>" >
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
    <div class="col-lg-4 col-md-4 col-sm-4"><i class="fa fa-check-circle-o"></i> Verified  Service Providers</div>
    <div class="col-lg-4 col-md-4 col-sm-4"><i class="fa fa-check-circle-o"></i> Preferred choice of UAE Residents</div>
    </div>

  </div>
</div>

<div class="container-fluid howit">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12"><h2 class="topse topse1">How it Works</h2></div>    
    </div>
    <div class="row">
       <div class="col-lg-3 col-md-3 col-sm-6">
        <div class="numberCircle">1</div>
        <h3>Search</h3>
        <p>For top rated service providers in your area</p>
       </div>
       <div class="col-lg-3 col-md-3 col-sm-6">
        <div class="numberCircle">2</div>
        <h3>Verify</h3>
        <p>Check review and ratings by other customers just like you, to help you make an informed decision</p>
       </div>
       <div class="col-lg-3 col-md-3 col-sm-6">
        <div class="numberCircle">3</div>
        <h3>Select</h3>
        <p>Select your Preferred Provider</p>
       </div>
       <div class="col-lg-3 col-md-3 col-sm-6">
        <div class="numberCircle">4</div>
        <h3>Hire</h3>
        <p>Hire with Confidence</p>
       </div>
    </div>
     <div class="row prominent">
     UAE Home Advisor is a word of mouth network to help you find the best service providers in the your city. Ratings are based on authentic customer reviews, and its FREE!
     </div>
  </div>

</div>
<div class="container-fluid">
  <div class="container categ">
    <div class="row"> <div class="col-lg-12 col-md-12 col-sm-12"><h2 class="topse topse1">Top Categories</h2></div>
        </div>
    <div class="row">
    <?php if(count($topCats)): ?>

    <div class="concenterd">
      <?php foreach($topCats as $tc): ?>
      <div class="col-lg-2 col-md-2 col-sm-3 col-xs-12 col-centered">
        <a href="<?php echo e(route('search')); ?>?category=<?php echo e($tc->category_id); ?>"><img src="<?php echo e(url('images/cat-bullet.png')); ?>" class="img-responsive img-circle center-block" style="width: 42px"><br><?php echo e(strtoupper($tc->category->name)); ?></a>
      </div>
      <?php endforeach; ?>
    </div>
      
    <?php endif; ?>
    <div class="clearfix"></div>
     <div class="col-lg-12 col-md-12 col-sm-12 ct">
    <a href="<?php echo e(route('categories')); ?>"  class="cata">See All Categories</a></div>
    </div>

  </div>
</div>

<div class="container-fluid">
  <div class="container">
    <div class="row">
     

        <?php if($featuredVendors && count($featuredVendors)): ?>
        <div class="col-lg-12 col-md-12 col-sm-12"><h2 class="topse topse1">Top Service Providers</h2></div>
        </div>
        <div class="row">
         <div class="concenterd">
            <?php foreach($featuredVendors as $topV): ?>
               <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6 col-centered">
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
                <div class="clearfix"></div>
    </div>
  </div>
</div>
<div class="container-fluid testmo" style="    padding-bottom: 40px;">
  <div class="container">
    <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12"><h2 class="testtitle">LATEST RATINGS AND REVIEWS  <br><i class="fa fa-quote-left"></i></h2>
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


            <?php if($featuredReviews->count()): ?>

              <?php $tmp_count = 0; ?>

              <?php foreach($featuredReviews as $freview): ?>
                 <div class="item <?php if($tmp_count == 0): ?> active <?php endif; ?>">
                       
                    <blockquote>
                      <p><?php echo e(str_limit($freview->title,80)); ?> </p>
                            
                    </blockquote>
                          
                  </div>

                  <?php $tmp_count++ ;?>

                

              <?php endforeach; ?>

            <?php else: ?>

            <p>No Featured Reviews</p><br>

            <?php endif; ?>

				  </div>
          <div><a href="<?php echo e(route('search')); ?>"  class="tem">Write a review</a></div>
          
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