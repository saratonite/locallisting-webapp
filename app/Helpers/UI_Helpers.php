<?php

function BS_Status_Class($status=null){
	
	$statusClasses = ['active'=>'success','blocked'=>'danger','pending'=>'info'];

	if(array_key_exists($status, $statusClasses)){
		return $statusClasses[$status];
	}
	return 'default';

}