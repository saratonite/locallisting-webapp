@extends('layouts.admin')

@section('title','Dasboard')

@section('content')
<div class="page-header">
	<h2>Dashboard</h2>
</div>

<div class="col-md-5">
	<div class="list-group">
	  <span href="#" class="list-group-item active">
	    <h4>Daily Status</h4>
	  </span>
	  <li href="#" class="list-group-item">REVENUE</li>
	  <li href="#" class="list-group-item">VENDORS <span class="badge">0</span></li>
	  <li href="#" class="list-group-item">USERS <span class="badge">0</span></li>
	  <li href="#" class="list-group-item">INQUIRIES <span class="badge">0</span></li>
	</div>
</div>
<div class="col-md-7">
	<div class="list-group">
	  <span href="#" class="list-group-item active">
	    <h4>Overall Status</h4>
	  </span>
	  <a href="#" class="list-group-item">REVENUE </a>
	  <a href="#" class="list-group-item">VENDORS <span></span> <span class="badge">{{$count["vendors"]}}</span></a>
	  <a href="#" class="list-group-item">USERS <span class="badge">{{ $count['users']}}</span></a>
	  <a href="#" class="list-group-item">INQUIRIES <span class="badge">{{ $count['enquiries']}}</span></a>
	</div>
</div>

@endsection