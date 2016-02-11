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

<p class="pt"><a href="#"> <img src="{{url('/')}}/images/fdhdh.jpg"></a></p>

</div>
</div>

</div> 
<!--  -->
<div class="col-lg-7 col-md-7 col-sm-7"><br>
<h4>POST YOUR RIVEWS</h4>

<br>
<div>
<h6><strong>select a star Rating</strong></h6>
<div class="star-rating rating-sm rating-active"><div class="clear-rating clear-rating-active" title="Clear"><i class="glyphicon glyphicon-minus-sign"></i></div><div class="rating-container rating-uni" data-content="★★★★★"><div class="rating-stars" data-content="★★★★★" style="width: 100%;"></div><input class="rating form-control hide" min="0" max="5" step="0.5" data-size="sm" data-glyphicon="false"></div><div class="caption"><span class="star">Excellent job! Highest recommendation.</span></div></div>
</div>
<div>
<h6><strong>select a star Rating</strong></h6>
<div class="star-rating rating-sm rating-active"><div class="clear-rating clear-rating-active" title="Clear"><i class="glyphicon glyphicon-minus-sign"></i></div><div class="rating-container rating-uni" data-content="★★★★★"><div class="rating-stars" data-content="★★★★★" style="width: 0%;"></div><input class="rating form-control hide" min="0" max="5" step="0.5" data-size="sm" data-glyphicon="false"></div><div class="caption"><span class="label label-default"></span></div></div>
</div>
<div>
<h6><strong>select a star Rating</strong></h6>
<div class="star-rating rating-sm rating-active"><div class="clear-rating clear-rating-active" title="Clear"><i class="glyphicon glyphicon-minus-sign"></i></div><div class="rating-container rating-uni" data-content="★★★★★"><div class="rating-stars" data-content="★★★★★" style="width: 0%;"></div><input class="rating form-control hide" min="0" max="5" step="0.5" data-size="sm" data-glyphicon="false"></div><div class="caption"><span class="label label-default"></span></div></div>
</div><br>
<h4>Overall Rating:3.5/5</h4><br>

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
<textarea class="form-control" rows="5"></textarea>
<br></div>
<h5><strong>Your relationship to the professional</strong></h5>
 
<ul style="color:#999; list-style:none; padding:0px;">
<li><input type="radio"> I hired this company</li>
<li><input type="radio"> Iam a professional who worked with this company</li>
<li><input type="radio"> I recived an estimate/consultation but did not hire them</li>
<li><p style="float:left; margin:5px 10px 0 0"><input type="radio"> other</p><input type="text" class="form-control" style="width:50%"></li>
</ul>
<div style="background-color:
#fcf8e3">&nbsp;
<p>&nbsp; <input type="checkbox">&nbsp; I conform that the information submited here is true and accurate.I conform that i do not&nbsp;
work <br>&nbsp; &nbsp; &nbsp; for,am not in complete with and am not related  to this service provider</p><br>

</div>
<hr>
<input type="submit" class="btn btn-success" value="Submit">
<br><br>
</div>
<!--  -->

 

</div>
</div>
</div>

@endsection

