<!doctype html>
<html lang="en-US">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>UAE HomeAdvisor</title>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta name="description" content="">
<meta name="_token" content="<?php echo csrf_token() ?>"/>
<link rel="icon" type="image/png" href="images/icon.png">
<link rel="stylesheet" href="{{asset('css/stayle.css')}}" type="text/css">
<link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}" type="text/css">
<link rel="stylesheet" href="{{asset('css/vendor.style.css')}}" type="text/css">
<!-- <link rel="stylesheet" href="{{asset('css/bootstrap-theme.min.css')}}" type="text/css"> -->
<link rel="stylesheet" href="{{asset('css/font-awesome/css/font-awesome.min.css')}}" type="text/css">
<link href='https://fonts.googleapis.com/css?family=Open+Sans:300' rel='stylesheet' type='text/css'>
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
  <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
  <![endif]--> 
  @yield('stylesheets')

</head>
<body>
@include('site.partials.header')



@yield('content')


@include('site.partials.footer')
    <script type="text/javascript">
      
      var GLOBAL_BASE_URL = "{{url('/')}}";
    </script>

    <script src="{{asset('js/jquery-1.10.2.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/vendor.scripts.js')}}"></script>
    <script src="{{asset('js/newsletter.js')}}"></script>

    <script type="text/javascript">
      $(function(){
        $('select[multiple]').select2();
      });
    </script>
  @yield('scripts')




</body>
</html>