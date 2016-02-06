
<!doctype html>
<html lang="en-US">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>UAE HomeAdvisor</title>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta name="description" content="">
<link rel="icon" type="image/png" href="images/icon.png">
<link rel="stylesheet" href="{{asset('css/stayle.css')}}" type="text/css">
<link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}" type="text/css">
<link rel="stylesheet" href="{{asset('css/bootstrap-theme.min.css')}}" type="text/css">
<link rel="stylesheet" href="{{asset('css/font-awesome/css/font-awesome.min.css')}}" type="text/css">
<link href='https://fonts.googleapis.com/css?family=Open+Sans:300' rel='stylesheet' type='text/css'>
<script src="{{asset('js/bootstrap.min.js')}}" type="text/javascript"></script>
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
  <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
  <![endif]--> 
  
</head>
<body>
<div class="container-fluid head">
  <div class="container">
    <div class="row">
      <div class="col-lg-4 col-md-4 col-sm-4 logo">
        <img src="images/logo.png">
      </div>
      <div class="col-lg-8 col-md-8 col-sm-8 post">
        @if(Auth::check())
        <a href="{{ route("account::appHome")}}" class="log">MY DASHBOARD</a> 

      @else
        <a href="http://sewesys.com/homeadvisor/public/login" class="log">LOGIN</a>/<a href="#" class="log">SIGNUP</a>  <a href="#" class="preq">POST A REQUIREMENT</a>

      @endif
      </div>
    </div>
  </div>
</div>



<div class="container-fluid inner">
  <div class="container">
    <div class="row">
    <div class="col-lg-3 col-md-3 col-sm-3">
    <strong>Filter By type <i class="fa fa-chevron-down"></i></strong><br><br>
    <p class="lem"><a href="#">All Professionals</a><br>
<a href="#" class="actc">Architicts & Building Designers</a><br>
<a href="#">Design-Build Firms</a><br>
<a href="#">General Constractors</a><br>
<a href="#">All Professionals</a><br>
<a href="#">Architicts & Building Designers</a><br>
<a href="#">Design-Build Firms</a><br>
<a href="#">General Constractors</a><br>
<a href="#">Architicts & Building Designers</a><br>
<a href="#">Design-Build Firms</a><br>
<a href="#">General Constractors</a><br>
<a href="#">All Professionals</a><br>
<a href="#">Architicts & Building Designers</a><br>
<a href="#">Design-Build Firms</a><br>
<a href="#">General Constractors</a><br>
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
  @if($vendors->count())

    @foreach($vendors as $vendor)
    <!-- Vendor Loops -->

    <div class="row">
    <div class="col-lg-5 col-md-5 col-sm-5">
         
          @if($vendor->picture)
          <img src="{{url('/images/uploads')}}/{{$vendor->picture->base_dir}}/V325_{{$vendor->picture->file_name}}" class="img-responsive">
          @else
           <img src="images/list.jpg" class="img-responsive">
          @endif
    </div>
    <div class="col-lg-7 col-md-7 col-sm-7">
    <div class="profileico">
          <img src="images/profile.jpg" class="img-responsive">
          
    </div>
    <h4 class="flo"><a href="{{ route('profile',$vendor->id,str_slug($vendor->vendor_name))}}">{{$vendor->vendor_name}}</a> <br><img src="images/reviews.jpg"></h4>
    <p class="pull-right">{{ $vendor->contact_number}}</p>
    <div class="clearfix"></div>
    <p><strong>Millbook,NY,123565</strong></p>
    <p class="read"> {{ $vendor->description }}
    <br/><a href="{{ route('profile',$vendor->id,str_slug($vendor->vendor_name))}}">Read More</a> </p>
    </div>
    <div class="clearfix"></div>
    <div class="col-lg-12 col-md-12 col-sm-12"><hr></div>
    </div> 

   <!-- End Vendor Loops -->
   @endforeach
   @else
    <p class="alert alert-info"> NO RESULT FOUND :(</p>
   @endif
  
        </div> 
    
    
    </div>    
    
    

    </div>
  </div>
</div>

<div class="container-fluid ftbg">
  <div class="container">
    <div class="row">
    <div class="col-lg-7 col-md-7 col-sm-7"><h1>No obligations. No contracts.</h1>
<p>Just quality service for your conference calling.</p></div>
<div class="col-lg-5  col-md-5 col-sm-5 cs"><a href="#"  class="gets pull-right">Get Started</a>
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
        <a href="#">Moving</a><br>
        <a href="#">Storage</a><br>
        <a href="#">Car Shipping</a><br>
        <a href="#">Cleaning</a><br>
        <a href="#">Pest Control</a><br>
        <a href="#">More..</a><br>
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
<a href="#">Home</a>
<a href="#">Terms</a>
<a href="#">Privacy Policy</a>
<a href="#">Partners & Affiliates</a>
<a href="#">SiteMap</a></p>
      </div>
    </div>
  </div>
</div>

</body>
</html>