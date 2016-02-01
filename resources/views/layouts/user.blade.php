<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>

    <!-- Fonts -->
    <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'> -->
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>

    <!-- Styles -->
    
    <link href="{{ asset('css/theme.userapp.css') }}" rel="stylesheet"> 
    <link href="{{ asset('css/vendor.userapp.css') }}" rel="stylesheet"> 

    @yield('stylesheets')

    <style>
        body {
            font-family: 'Lato';
        }

        .fa-btn {
            margin-right: 6px;
        }
    </style>
</head>
<body id="app-layout">
    <nav class="navbar navbar-default">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#spark-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    My Dashboard
                </a>
            </div>

            <div class="collapse navbar-collapse" id="spark-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    <!-- <li><a href="{{ route('admin::dashboard') }}">Dashboard</a></li> -->
                    <li>
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                Profile<span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu" role="menu">
                               <!--  <li> <a href="{{ route('account::profile') }}">View</a></li>
                                <li> <a href="{{ route('admin::pending-vendors') }}">Edit</a></li> -->
                            </ul>
                    </li>
                    
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->

                    
                  
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                Account<span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <!-- <li><a href="{{route('admin::settings')}}">Settings</a></li> -->
                                <li><a href="#"></a></li>
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                            </ul>
                        </li>
                    
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="row">
            <div class="col-md-2">
                <!--  -->
                <ul class="list-group">
  <a href="#/" class="list-group-item ">
    My Dashboard
  </a>
  <a href="#/profile" class="list-group-item">My Profile</a>
  @if(Auth::user()->type =="vendor")
  <a href="#vendor/profile" class="list-group-item">Vendor Profile</a>
  @endif
  @if(Auth::user()->type == "user")
  <a href="#/myreviews" class="list-group-item">My Reviews</a>
  @endif
    <a href="#notifications" class="list-group-item">Notifications</a>
  <a href="#stats" class="list-group-item">Stats</a>
  <a href="#settings" class="list-group-item">Account Settings</a>
</ul>
                <!--  -->
            </div>
            <div class="col-md-9">
                @yield('breadcrumbs')
                @yield('content')
            </div>
        </div>
    </div>

    <!-- JavaScripts -->
    <script src="{{ asset('js/vendor.userapp.js')}}"></script>
    <script src="{{ asset('js/userapp.js')}}"></script>
    <script type="text/javascript">
    //  GLOBAL SCRPTSS //
    $(function () {
          $('[data-toggle="tooltip"]').tooltip()
    });
    //  ///////////////
    </script>
    @yield('scripts')
</body>
</html>
