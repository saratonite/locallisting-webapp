@extends('layouts.frontend')




@section('content')
<div class="container-fluid inner">
  <div class="container">
    <div class="row">
    <div class="col-lg-3 col-md-3 col-sm-3" style="min-height:440px">
    <strong>Filter By type <i class="fa fa-chevron-down"></i></strong><br><br>
    <p class="lem"><a href="{{route('search')}}">All Professionals</a><br>
 @if(isset($categories) && $categories->count())

        @foreach($categories as $key=>$cat)
        <a href="{{route('search')}}?category={{$key}}">{{$cat}}</a><br>
        @endforeach

      @endif

</p>
<hr>
    </div>
   <div class="col-lg-9 col-md-9 col-sm-9"> 
   <div class="row">
 <div class="col-lg-12 col-md-12 col-sm-12">
    <form action="{{route('search')}}">
      <div class="col-md-10">
        <input type="text" class="form-control searchbx" name="q" placeholder="Search..." value="" >
      </div>
      <div class="col-md-2">
        <button class="btn btn-success">Search</button>

      </div>
      </form>
    </div> 
    </div>
    </div>
<div class="col-lg-9 col-md-9 col-sm-9 inner">
<a href="#">Home <i class="fa fa-chevron-right"></i></a>
<a href="#">Service Providers <i class="fa fa-chevron-right"></i></a>
<a href="#" style="color:#2C7300;">Post Requirement</a>

</div>
  
<div class="col-lg-3 col-md-3 col-sm-3">
<p>&nbsp;</p>
</div>


 <div class="col-lg-7 col-md-7 col-sm-7">

      
        @if(Session::has('success'))
            <p class="alert alert-success"> {{Session::get('success')}} </p>
        @endif

        @if(Session::has('error'))
        <p class="alert alert-danger"> {{Session::get('error')}} </p>

        @endif

         @if(count($errors))
          <ul class="alert alert-danger">
            @foreach($errors->all() as $error)
              <li> {{ $error}}</li>
            @endforeach
          </ul>
        @endif

   <div>
   <form method="post" action="">

  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a id="t1" href="#requirement" aria-controls="requirement" role="tab" data-toggle="tab">Requirments</a></li>
    <li role="presentation"><a id="t2" href="#vendors" aria-controls="vendors" role="tab" data-toggle="tab">Select Provider</a></li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="requirement">
      <!-- First tab content -->
       
          {{csrf_field()}}


          <div class="form-group claerfix">
            <br>
            <label for="">Subject</label>
            <input type="text" name="subject" value="{{ old('subject')}}" placeholder="Subject" class="form-control">
          </div>
          <div class="form-group">
            <label for="">Message</label>
            <textarea class="form-control"  placeholder="Message" rows="5" name="message">{{ old('message')}}</textarea>
            
          </div>
        <hr>
        <input type="button" class="btn btn-success" id="step_1to2" value="NEXT">
        <br><br>
        
      <!-- End First tab content -->

    </div>
    <div role="tabpanel" class="tab-pane" id="vendors">

        

        <div class="vedor-list" >
          <div class="row">
            @if(isset($vendors) && $vendors->count())
            @foreach($vendors as $vendor)
                <div class="col-md-3">
                  <div href="#" class="thumbnail">
                    @if($vendor->logo)
                    <img  style="height: 80px;width: 100%;" src="{{imagePath($vendor->logo,'sm')}}" alt="...">
                    @else
                      <img style="height: 80px;width: 100%;" src="{{url('/')}}/images/logder.jpg" alt="">
                    @endif
                    <label class="caption"><input type="checkbox" class="vendor-chk" name="vendor[]" value="{{$vendor->id}}" />{{$vendor->vendor_name}}</label>
                  </div>

                </div>
            @endforeach
          @endif
          </div>
        </div>

        <div class="col-md-120">
        <hr>
          <button class="btn btn-success pull-right" id="step_2to3">SUBMIT</button>
        </div>
          
          

    </div>
    <div role="tabpanel" class="tab-pane" id="messages">
       lorem
    </div>
    <div role="tabpanel" class="tab-pane" id="settings">...</div>
  </div>
  </form>

</div>
 </div>
<!--  -->
<div class="col-lg-7 col-md-7 col-sm-7"><br>

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
<script type="text/javascript">
  $(function(){

        $('#requirement a').click(function (e) {
          e.preventDefault()
          $(this).tab('show');
          alert('hooi');
        });


        // Step 1 to step 2

        $('#step_1to2').on('click',function(){
            var subject = $('input[name=subject]').val();
            var message = $('textarea[name=message]').val();
            if(subject.trim().length == 0){

              alert('Please enter subject');
              $('input[name=subject]').focus();

              return false;
              
            }
            if(message.trim().length == 0){
              alert('Please enter requirement details');
              $('textarea[name=message]').focus();
              return false;
            }

            $("#t2").tab('show');
        });

        // Step 2 to submit
        $("#step_2to3").on('click',function(e){


            // Check first tab
              var subject = $('input[name=subject]').val();
            var message = $('textarea[name=message]').val();
            if(subject.trim().length == 0){

              alert('Please enter subject');
              $("#t1").tab('show');
              $('input[name=subject]').focus();

              return false;
              
            }
            if(message.trim().length == 0){
              alert('Please enter requirement details');
              $("#t1").tab('show');
              $('textarea[name=message]').focus();
              return false;
            }

            var vendors = $('input:checked');

            if(vendors.length == 0){
              alert('Select at least one vendor');
              e.preventDefault();
              return false;
            }
        });
  });
</script>
@endsection

