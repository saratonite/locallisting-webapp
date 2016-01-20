<?php

function BS_Status_Class($status=null){
	
	$statusClasses = ['active'=>'success','blocked'=>'danger','pending'=>'info'];

	if(array_key_exists($status, $statusClasses)){
		return $statusClasses[$status];
	}
	return 'default';

}

function BS_Enquiry_Status_Class($status=null){
	$statusClasses=['pending'=>'info','accepted'=>'success','rejected'=>'warning','spam'=>'danger'];

	if(array_key_exists($status, $statusClasses)){
		return $statusClasses[$status];
	}
	return 'default';
}