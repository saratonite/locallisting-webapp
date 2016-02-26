<div class="container-fluid ftbg">
  <div class="container">
    <div class="row">
    <div class="col-lg-7 col-md-7 col-sm-7"><h1>No obligations. No contracts.</h1>
<p>Just quality service for your conference calling.</p></div>
<div class="col-lg-5  col-md-5 col-sm-5 cs"><a href="#" class="gets pull-right">Get Started</a>
</div>
    </div>
  </div>
</div>
<div class="container-fluid footer">
  <div class="container">
    <div class="row">

      <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6 mar">
        <h5><strong>Services</strong></h5>
        <p>
        <?php if(isset($categories) && count($categories)): ?>
        <?php $i=1;?>
          <?php foreach($categories as $key => $cat): ?>

              <?php if($i<=5): ?><a href="<?php echo e(route('search')); ?>?category=<?php echo e($key); ?>"><?php echo e($cat); ?></a><br/><?php endif; ?>
            <?php $i++;?>
          <?php endforeach; ?>
        <?php endif; ?>
        <a href="<?php echo e(route('categories')); ?>">More..</a><br>
        </p>
      </div>
      <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6 mar">
        <h5><strong>Support</strong></h5>
        <p>
        <a href="#">Help & Support</a><br>
        <a href="#">Getting Started</a><br>
        <a href="#">FAQ</a><br>
        <a href="#">Contact Us</a><br>
        <a href="#">I Need Support</a><br>
        <a href="#">Write a Review</a><br>
        </p>
      </div>
      <div class="col-lg-3 col-md-3 col-sm-3  col-xs-6 mar">
        <h5><strong>Contact Us</strong></h5>
        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard </p>
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
          @
        </div>
        <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
          <p>info@homeowner.com
          </P>
        </div>
        
         <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
          A
        </div>
        <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
          <P>1800-1800155-00<br>    
        </div>
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
          T
        </div>
        <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
          <P>Maria Tower, Jew Street, Al Nama City UAE - 55
        </div>


      </div>

      <div class="col-lg-3 col-md-3 col-sm-3 mar">
        <h5><strong>Newsletter</strong></h5>
        <p>Subscribe to our Newsletter -<br>
and all the cool updates </p>

<p><input type="text" class="form-control nelet" placeholder="Enter Email"></p>
       
                <div class="social-links pull-left" style="margin-top:5px;">
          <a href="#"><i class="fa fa-facebook fa-lg"></i></a>
          <a href="#"><i class="fa fa-twitter fa-lg"></i></a>
          <a href="#"><i class="fa fa-skype fa-lg"></i></a>
        </div>
      </div>
      <div class="clearfix"></div>
      <hr>
      <div class="col-lg-7 col-md-7 col-sm-7">
        <P>  <img src="images/logo.png"> All Rights Reserved to the HomeOwner.com LLC</P>
        </div>
        <div class="col-lg-5 col-md-5 col-sm-5">
        <p class="pull-right ftfoot">
<a href="<?php echo e(url('/')); ?>">Home</a>
<a href="<?php echo e(route('terms-conditions')); ?>">Terms</a>
<a href="<?php echo e(route('privacy-policy')); ?>">Privacy Policy</a>
<a href="#">Partners & Affiliates</a>
<a href="#">SiteMap</a></p>
      </div>
    </div>
  </div>
</div>