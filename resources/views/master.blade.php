<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>@yield('title')</title>
	<link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
	<!-- Navigation -->
	@include('navs.default')
	<!-- End Navigation -->
	<!-- Main -->
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				@yield('main')

			</div>
		</div>
	</div>

	<!-- End Main -->

	<!-- Footer -->
	<!-- End Footer -->
</body>
</html>