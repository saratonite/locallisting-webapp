<div class="container-fluid ftbg">
  <div class="container">
    <div class="row">
    <div class="col-lg-7 col-md-7 col-sm-7"><h1>No obligations. No contracts.</h1>
<p>UAE Home Advisor helps customers find quality professionals by providing a source of reviews and ratings to help make an educated choice.</p></div>
<div class="col-lg-5  col-md-5 col-sm-5 cs">
      
       @if(Auth::check())
          @if(Auth::user()->type == "admin")
          <a href="{{ route("admin::dashboard")}}" class="gets pull-right">Get Started</a> 
          @else
          <a href="{{ route("account::appHome")}}" class="gets pull-right">Get Started</a> 
          @endif

      @else
        <a href="{{ route('user-signup')}}" class="gets pull-right">Get Started</a>
      @endif
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
        @if(isset($categories) && count($categories))
        <?php $i=1;?>
          @foreach($categories as $key => $cat)

              @if($i<=5)<a href="{{route('search')}}?category={{$key}}">{{$cat}}</a><br/>@endif
            <?php $i++;?>
          @endforeach
        @endif
        <a href="{{route('categories')}}">More..</a><br>
        </p>
      </div>
      <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6 mar">
        <h5><strong>Support</strong></h5>
        <p>
        <a href="{{route('help-support')}}">Help & Support</a><br>
        <a href="{{route('about')}}">About Us</a><br>
        <a href="{{route('faq')}}">FAQ</a><br>
        <a href="{{route('contactus')}}">Contact Us</a><br>
        <a href="{{route('search')}}">Write a Review</a><br>
        </p>
      </div>
      <div class="col-lg-3 col-md-3 col-sm-3  col-xs-6 mar">
        <h5><strong>Contact Us</strong></h5>
        <p>Have questions about UAE Home Advisor? Let us help. Email us with as much detail as you can so we can give you the best help possible.</p>
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
          @
        </div>
        <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
          <p>info@uaehomeadvisor.com
          </P>
        </div>
        
       


      </div>

      <div class="col-lg-3 col-md-3 col-sm-3 mar">
        <form id="newsletterapp">
        <h5><strong>Newsletter</strong></h5>
       
<p><input type="email" class="form-control nelet" placeholder="Enter Email"></p>
   <div class="social-links pull-left" style="margin-top:5px;">
          <a href="#"><i class="fa fa-facebook fa-lg"></i></a>
          <a href="#"><i class="fa fa-twitter fa-lg"></i></a>
          <a href="#"><i class="fa fa-instagram fa-lg"></i></a>
          <a href="#"><i class="fa fa-google-plus fa-lg"></i></a>
          <a href="#"><i class="fa fa-skype fa-lg"></i></a>
        </div>
        </form>
       

      </div>
      <div class="clearfix"></div>
      <hr>
      <div class="col-lg-7 col-md-7 col-sm-7">
        <P>  <img src="images/logo.png"></P>
        </div>
        <div class="col-lg-5 col-md-5 col-sm-5">
        <p class="pull-right ftfoot">
<a href="{{ url('/') }}">Home</a>
<a href="{{route('terms-conditions')}}">Terms</a>
<a href="{{route('privacy-policy')}}">Privacy Policy</a>
<a href="{{route('sitemap')}}">SiteMap</a></p>
      </div>
    </div>
  </div>
</div>