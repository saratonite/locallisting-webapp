@extends('layouts.frontend')
@section('content')
<div class="container-fluid inner">
  <div class="container">
    <div class="row">
    <div class="col-lg-3 col-md-3 col-sm-3">
    <strong>Filter By Category <i class="fa fa-chevron-down"></i></strong><br><br>
    <p class="lem">
      <a href="{{route('search')}}">All</a><br>
      @if($categoriesSide->count())

        @foreach($categoriesSide as $category)
        <a href="{{route('search')}}?category={{$category->id}}@if($city)&city={{$city}}@endif">{{$category->name}}</a><br>
        @endforeach

      @endif

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
    <form action="{{route('search')}}">
    <div class="col-lg-3 col-md-3 col-sm-3">
      <select name="category" class="form-control">
        <option disabled selected> Category</option>
        @if(count($categories))
          @foreach($categories as $key=> $cate)
          <option @if($cat==$key) selected @endif value="{{$key}}">{{$cate}}</option>
          @endforeach
        @endif
      </select>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-3">
     <div class="row">
    <div class=" col-lg-2 col-md-2 col-sm-2" style="margin-top:5px;">Near</div><div class="col-lg-10 col-md-10 col-sm-10" >
     <!--  -->
      <select class="form-control" name="city">
          <option disabled selected> City</option>
          @if($cities->count())
            @foreach($cities as $cit)
              <option @if($cit->id == $city) selected @endif value="{{$cit->id}}">{{$cit->name}}</option>
            @endforeach
          @endif
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
  @if($vendors->count())

    @foreach($vendors as $vendor)
    <!-- Vendor Loops -->

    <div class="row">
    <div class="col-lg-5 col-md-5 col-sm-5">
         
          @if($vendor->picture)
          <img src="{{url('/images/uploads')}}/{{$vendor->picture->base_dir}}/{{$vendor->picture->file_name}}" class="img-responsive" style="width:325px;height:175px">
          @else
           <img src="images/list.jpg" class="img-responsive">
          @endif
    </div>
    <div class="col-lg-7 col-md-7 col-sm-7">
    <div class="profileico">
          @if($vendor->logo)
              <img style="width:50px;height:50px" src="{{url('/images/uploads')}}/{{$vendor->logo->base_dir}}/{{$vendor->logo->file_name}}" class="img-responsive">
          @else
            <img src="images/profile.jpg" class="img-responsive">
          @endif
          
    </div>
    <h4 class="flo"><a href="{{ route('profile',$vendor->id,str_slug($vendor->vendor_name))}}">{{$vendor->vendor_name}}</a> <br><!-- <img src="images/reviews.jpg"> -->
        <p >
            <small style="color:green">  
              @if($vendor->rate)
              {{ FrontStarRating($vendor->rate)}}
              @else
              Not Rated Yet
              @endif {{ $vendor->review->count() }} Reviews</small>
        </p>
    </h4>
    
    <p class="pull-right">@if($vendor->contact_number) {{ $vendor->contact_number}} @else {{$vendor->mobile}} @endif</p>
    <div class="clearfix"></div>
    <p><strong>{{$vendor->addr_line1}},{{$vendor->addr_line2}},{{$vendor->addr_line3}}</strong></p>
    <p class="read"> {{ str_limit($vendor->description,210  ) }}
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
    <nav class="pull-right">
      {{$vendors->links()}}
    </nav>    
    </div>
  </div>
</div>
@endsection