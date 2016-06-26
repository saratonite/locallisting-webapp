@extends('layouts.frontend')

@section('header')
@include('site.partials.header')
@endsection


@section('content')
<?php 

	$name = " ";
	$email = " ";
	$message = " ";
	if( isset($_POST['name']) ){
		$name = $_POST['name'];
	}
    if( isset($_POST['email']) ){
		$email = $_POST['email'];
	}
    if( isset($_POST['message']) ){
		$message = $_POST['message'];
	}

    $from = 'From: Demo'; 
    $to = 'urosvelickovic123@gmail.com'; 
    $subject = 'Hello';
    $body = "From: $name\n E-Mail: $email\n Message:\n $message";

?>



<div class="container">
	<div class="row" style="padding: 15px">
	
		<div class="col-md-12">
			<h2>Contact Us</h2>
			
			<form method="post" action="" data-validate="parsley" data-persist="garlic">
<h4>POST YOUR ENQUIRY</h4>
<div class="form-group claerfix">
{{csrf_field()}}
		<br>
    <label for="">Name</label>
		<input type="text" name="name" value="" placeholder="Name" class="form-control" required="required">
	</div>
	<div class="form-group claerfix">
		<br>
    <label for="">Email</label>
		<input type="email" name="email" value="" placeholder="Email" class="form-control" required="required">
	</div>
	<div class="form-group">
    <label for="">Message</label>
		<textarea class="form-control"  placeholder="Message" rows="5" name="message" required="required"></textarea>
		
	</div>
<hr>
<input type="submit" class="btn btn-success" value="Submit">
<br><br>
</form>
<?php
if( isset($_POST['submit']) ){
if ($_POST['submit']) {
    if (mail ($to, $subject, $body, $from)) { 
        echo '<p>Your message has been sent!</p>';
    } else { 
        echo '<p>Something went wrong, go back and try again!</p>'; 
    }
}
}
?>
		</div>
   </div>
 </div>
@endsection

@section('footer')
@include('site.partials.footer')
@endsection