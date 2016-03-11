@extends('layouts.frontend')

@section('header')
@include('site.partials.header')
@endsection


@section('content')
<div class="container">
	<div class="row" style="padding: 10px;margin:10px">
	
		<div class="col-md-12">
			<h3>Categories</h3>
				
					@if($categories)
						@foreach($categories as $key => $name)
							<div class="col-md-4"> <a href="{{ route('search')}}?category={{$key}}">{{$name}}</a></div>
						@endforeach
					@endif
				
		</div>
   </div>
 </div>
@endsection

@section('footer')
@include('site.partials.footer')
@endsection