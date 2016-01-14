<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>

    <!-- Fonts -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>

    <!-- Styles -->
    
    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet"> 

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
                    Master Control
                </a>
            </div>

            <div class="collapse navbar-collapse" id="spark-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    <li><a href="{{ route('admin::dashboard') }}">Dashboard</a></li>
                    <li>
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                Vendors<span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu" role="menu">
                                <li> <a href="{{ route('admin::all-vendors') }}">All</a></li>
                                <li> <a href="{{ route('admin::pending-vendors') }}">Pending</a></li>
                                <li> <a href="{{ route('admin::accepted-vendors') }}">Accepted</a></li>
                            </ul>
                    </li>
                    <li><a href="{{ route('admin::all-site-users') }}">Users</a></li>
                    <li><a href="{{ route('admin::all-enquiries') }}">Enquiries</a></li>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->

                    <li><a href="{{ route('admin::list-category') }}">Categories</a></li>
                    <li><a href="{{ route('admin::list-cities') }}">Cities</a></li>
                  
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                Account<span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{route('admin::settings')}}">Settings</a></li>
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
            <div class="col-md-12">
                @yield('content')
            </div>
        </div>
    </div>

    <!-- JavaScripts -->
    <script src="{{ asset('js/vendor.js')}}"></script>
    <script src="{{ asset('js/dashboard.js')}}"></script>
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
