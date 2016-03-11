<!-- Site user account Register -->

@extends('admin.emails.base')

@section('content')
<p>
	{!! nl2br($content) !!}
</p>
<p>
	  <a href="{{url('unsubscribe/'.$subscriber->unsubscribe_token)}}">Unsubscribe</a>.
</p>


@endsection