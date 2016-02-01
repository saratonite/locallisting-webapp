<?php

function BS_Status_Class($status=null){
	
	$statusClasses = ['active'=>'success','blocked'=>'danger','pending'=>'info'];

	if(array_key_exists($status, $statusClasses)){
		return $statusClasses[$status];
	}
	return 'default';

}

function BS_Status_Class2($status=null){
	$statusClasses=['pending'=>'info','accepted'=>'success','rejected'=>'warning','spam'=>'danger'];

	if(array_key_exists($status, $statusClasses)){
		return $statusClasses[$status];
	}
	return 'default';
}

function BS_Enquiry_Status_Class($status=null){

	return BS_Status_Class2($status);

}

function BS_StarRating($rating = false, $total_rating=5){

	if($rating>$total_rating) return false;

	$remaining_starts = $total_rating - $rating;

	// Render Rating stars
	for($i=0;$i<$rating;$i++){
		echo '<span class="glyphicon glyphicon-star star-gold"></span>';

	}

	// Render Remaining Starts
	for ($j=0; $j < $remaining_starts ; $j++) { 
		echo '<span class="glyphicon glyphicon-star star-gray"></span>';
		

	}
	

}