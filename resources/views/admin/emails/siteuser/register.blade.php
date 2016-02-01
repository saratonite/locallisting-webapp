<!-- Site user account Register -->

@extends('admin.emails.base')

@section('content')
<h3>Greetings!!</h3>
Hi {{$user->first_name}} {{ $user->last_name }}
<p>
 	You are successfully registered with UAE Home Advisor. 
	<!--  -->
</p>
<p>
	Please  <a href="{{url('confirm_email/'.$user->email_verification)}}">confirm email</a> address.
</p>


@endsection