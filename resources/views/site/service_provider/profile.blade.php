@extends('layouts.frontend')




@section('content')
<div class="container-fluid inner">
  <div class="container">
    <div class="row">
    <div class="col-lg-3 col-md-3 col-sm-3" style="min-height:440px">
    <strong>Filter By type <i class="fa fa-chevron-down"></i></strong><br><br>
    <p class="lem"><a href="#">All Professionals</a><br>
 @if($categories->count())

        @foreach($categories as $key=>$cat)
        <a href="{{route('search')}}?category={{$key}}">{{$cat}}</a><br>
        @endforeach

      @endif

</p>
<hr>
    </div>
   <div class="col-lg-9 col-md-9 col-sm-9"> 
   <div class="row">
<div class="col-lg-9 col-md-9 col-sm-9">
    <input type="text" class="form-control searchbx" placeholder="Architicts &amp; Building Designers">
    </div>  
    
<div class="col-lg-3 col-md-3 col-sm-3">
    <a href="#">Back to Advanced Search</a>
    </div>
    </div>
    </div>
<div class="col-lg-9 col-md-9 col-sm-9 inner">
<a href="#">Home <i class="fa fa-chevron-right"></i></a>
<a href="#">Service Providers <i class="fa fa-chevron-right"></i></a>
<a href="#" style="color:#2C7300;">{{$vendor->vendor_name}}</a>

</div>
  
<div class="col-lg-3 col-md-3 col-sm-3">
<p>&nbsp;</p>
</div>
<div class="col-lg-9 col-md-9 col-sm-9">
<div class="banner_t" style="@if($vendor->cover)background: url('{{imagePath($vendor->cover)}}') no-repeat center center ; 
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;@endif">
<div class="col-lg-8 col-md-8 col-sm-8">
<div class="col-lg-4 topma">
          @if($vendor->logo)

          <img src="{{ imagePath($vendor->logo) }}" class="img-responsive img-circle" style="width:148px;height:148px">

          @else
            <img src="{{url('/')}}/images/logder.jpg" class="img-responsive img-circle">
          @endif
</div>
<div class="col-lg-8 topma">
<span class="seh">{{$vendor->vendor_name}}</span><br><br>
<span style="background:#FFFFFF; padding:5px;">{{$vendor->addr_line1}} @if($vendor->addr_line2), {{$vendor->addr_line2}}@endif @if($vendor->addr_line2), {{$vendor->addr_line3}}@endif</span>
</div>

</div>

<div class="col-lg-4 col-md-4 col-sm-4 socico">
    <a href="#"><img src="{{url('/')}}/images/facebook.jpg"> </a> 
    <a href="#"><img src="{{url('/')}}/images/twitter.jpg"></a>
    <a href="#"> <img src="{{url('/')}}/images/googleplus.jpg"></a>

    <div class="review-widget" class="pull-right" >
      <div class="review-wiget-top" style="">
          <span>
            <?php 
              $star_rating = $vendor->rating->avg('overall_rate');
            ?>
            @if($star_rating)
              {{ FrontStarRating($star_rating)}}
            @else
              Not Rated Yet
            @endif
          </span>
          <span class="pull-right"><small>{{$vendor->review->count() }}  Reviews</small></span>
          </div>
      <div class="review-widget-bottom" >
          <a href="{{ route('submit-enquiry',$vendor->id)}}" >Contact me</a> 
      </div>
    </div>

<!-- <p class="pt">
    <div style="width:150px;background:#fff">
      hel
    </div>
    <a href="#"> <img src="{{url('/')}}/images/fdhdh.jpg"></a>
</p> -->


</div>
</div>

</div>  
  
<div class="col-lg-6 col-md-6 col-sm-6">

@if(Session::has('success'))
  <br>
  <br>
  <p class="alert alert-success">
      {{ Session::get('success')}}
  </p>
@endif

<h4><strong>Overview</strong></h4>
<p>
  {{{ $vendor->description }}}
</p>

<p><strong>Services Provided</strong></p>
    @if($vendor->categories->count())
      <ul>
          @foreach($vendor->categories as $cate)
            <li>{{$cate->category->name}}</li>
          @endforeach
      </ul>
    @else
    Non specified.
    @endif
</div>
<div class="col-lg-3 col-md-3 col-sm-3">
<h5><strong>
  @if($vendor->contact_number) {{$vendor->contact_number}} @else {{$vendor->mobile}} @endif
<br>
<br>
  <?php 
    $ServiceCities = array();
  if($vendor->cities->count())
        {
          foreach ($vendor->cities as $city) {
            $ServiceCities[]= $city->city->name;
          }
        }
   ?>
   {{ implode(',',$ServiceCities)}}
</strong></h5>
<p style="line-height:25px;">
<strong><i class="fa fa-user"></i> Contact</strong>: @if($vendor->user) {{$vendor->user->first_name}} {{$vendor->user->last_name}} @endif
<br>

<strong><i class="fa fa-map-marker"></i> Location</strong>:
  {{$vendor->addr_line1}} @if($vendor->addr_line2), {{$vendor->addr_line2}}@endif @if($vendor->addr_line2), {{$vendor->addr_line3}}@endif

  <br>
  <a href="{{route('submit_review',$vendor->id)}}"><i>Write Review </i></a>

</p>
</div>   
</div>

<br>
<p>&nbsp;&nbsp;</p>
<div class="row">
<div class="col-lg-3 col-md-3 col-sm-3">
</div>

<div class="col-lg-6 col-md-6 col-sm-6">

<h4><strong>{{$vendor->images->count()}} projects</strong></h4>
<div class="row">
      @if($vendor->images->count())
        @foreach($vendor->images as $image)
          <div class="col-lg-6 col-md-6 col-sm-6" style="margin-top:10px;">
            <a href="{{ImagePath($image)}}" data-lightbox="{{$image->id}}">
              <img src="{{ImagePath($image)}}" class="img-responsive" style="height:208px">
            </a>
            <div class="col-lg-12 col-md-12 col-sm-12 back">
            <h5><strong>{{str_limit($image->title,100)}}</strong></h5>
            </div>
          </div>
        @endforeach
      @endif
  
</div>


</div>


<div class="col-lg-3 col-md-3 col-sm-3">

<h4><strong>{{$vendor->review->count()}} Reviews</strong> <small><a href="{{route('submit_review',$vendor->id)}}">Write Review</a></small></h4>
  @if($vendor->review->count())
      @foreach($vendor->review as $re)
        <div>
          <strong>{{$re->title}}</strong> @if($re->user) <span> <i>by {{$re->user->first_name}}</i></span> @endif
          <!-- <img src="{{url('/')}}/images/star.png" class="img-responsive"> -->
          <p style="color=#2C7300;">{{FrontStarRating(calculateReviewRate($re))}}</p>
          <p>{{$re->body}}</p>
          <a href="#" style="color:#2C7300">More <i class="fa fa-chevron-right"></i></a>
          <p>&nbsp;&nbsp;&nbsp;</p>
        </div>
      @endforeach
  @endif
</div>


</div>
</div>
</div>

@endsection

