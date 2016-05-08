@extends('layouts.frontend')




@section('content')
<div class="container-fluid inner">
  <div class="container">
    <div class="row">
    <div class="col-lg-3 col-md-3 col-sm-3" style="min-height:440px">
    <strong>Filter By type <i class="fa fa-chevron-down"></i></strong><br><br>
    <p class="lem"><a href="{{route('search')}}">All Professionals</a><br>
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
    <input type="text" class="form-control searchbx" placeholder="Search...">
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
          @if($vendor->picture)

          <img src="{{ imagePath($vendor->picture) }}" class="img-responsive img-circle" style="width:148px;height:148px">

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
            @if($vendor->rate)
              {{ FrontStarRating($vendor->rate)}}
            @else
              Not Rated Yet
            @endif
          </span>
          <span class="pull-right"><small>{{$vendor->review->count() }}  Reviews</small></span>
          </div>
      <div class="review-widget-bottom" >
          <a href="{{ route('submit-enquiry',$vendor->id)}}" >Contact us</a> 
      </div>
    </div>

</div>
</div>

</div> 
<!--  -->
<div class="col-lg-7 col-md-7 col-sm-7"><br>
<form method="post" action="{{route('submit_review',$vendor->id)}}">
<h4>POST YOUR RIVEWS</h4>

<br>
@if(count($errors))
	<ul class="alert alert-danger">
		@foreach($errors->all() as $error)
			<li> {{ $error}}</li>
		@endforeach
	</ul>
@endif
<div>
	{{csrf_field()}}

	<label for="">Rate Price</label>
	<input id="input-2a" name="rate_price" value="{{ old('rate_price')}}" class="rating rating-md" data-min="0" data-max="5" data-step="1" data-stars="5" data-glyphicon="true">
</div>
<div>

	<label for="">Rate Timeliness</label>
	<input id="input-2a" name="rate_timeliness" value="{{ old('rate_timeliness')}}" class="rating rating-xs" data-min="0" data-max="5" data-step="1" data-stars="5" data-glyphicon="true">
</div>
<div>

	<label for="">Rate Quality</label>
	<input id="input-2a" name="rate_quality" value="{{ old('rate_quality')}}" class="rating rating-xs" data-min="0" data-max="5" data-step="1" data-stars="5" data-glyphicon="true">
</div>
<div>

	<label for="">Rate Professionalism</label>
	<input id="input-2a" name="rate_professionalism" value="{{ old('rate_professionalism')}}"  class="rating rating-xs" data-min="0" data-max="5" data-step="1" data-stars="5" data-glyphicon="true">
</div>

<h5><strong>Your Review</strong></h5>
<div style=" color:#999" ;="">
<h5>Discribe the Service Provided and Specific Details of your experience<br></h5>
<div style="float:left">
<ol style=" padding:0px; margin-left:14px;">
<li>Be Respectfull</li>
<li>Provide a complete description</li>
<li>Focus on the fact</li>
<li>Write at least 20 Words</li>
</ol></div>

<br></div>
	<div class="form-group claerfix">
		<br>
		<input type="text" name="title" value="{{ old('title')}}" placeholder="Review title" class="form-control">
	</div>
	<div class="form-group">
		<textarea class="form-control"  placeholder="Review body" rows="5" name="body">{{ old('body')}}</textarea>
		
	</div>

<div style="background-color:
#fcf8e3">&nbsp;
<p>&nbsp; <input type="checkbox" name="confirm">&nbsp; I confirm that the information submitted here is true and accurate. I confirm that I do not work for, am not in competition with and am not related to this service provider.</p><br>

</div>
<hr>
<input type="submit" class="btn btn-success" value="Submit">
<br><br>
</form>
</div>
<!--  -->

 

</div>
</div>
</div>

@endsection
@section('stylesheets')
<link rel="stylesheet" href="{{asset('css/star-rating.css')}}">
<style type="text/css">
	.rating-md {
    font-size: 2.13em;
}
</style>
@endsection
@section('scripts')
<script src="{{asset('js/star-rating.js')}}"></script>
@endsection

