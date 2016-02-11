<div class="container-fluid head">
  <div class="container">
    <div class="row">
      <div class="col-lg-4 col-md-4 col-sm-4 logo">
        <a href="{{url('/')}}"><img src="{{url('/')}}/images/logo.png"></a>
      </div>
      <div class="col-lg-8 col-md-8 col-sm-8 post">

      @if(Auth::check())
          @if(Auth::user()->type == "admin")
          <a href="{{ route("admin::dashboard")}}" class="log">ADMIN DASHBOARD</a> 
          @else
          <a href="{{ route("account::appHome")}}" class="log">MY DASHBOARD</a> 
          @endif

      @else
        <a href="{{url('login')}}" lass="log">LOGIN</a>/
        <a href="{{ route('user-signup')}}" class="log">SIGNUP</a>
        <a href="#" class="preq">POST A REQUIREMENT</a>

      @endif
      </div>
    </div>
  </div>
</div>

