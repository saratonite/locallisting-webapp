<?php

function pagination_row_num($page=1,$perpage){


	if(!$page){
		return 1;
	}


	return ($perpage * ($page-1))+1;


}

function getYearMonthDir($baseDir = ""){
	//$path = "uploads/";
$path = $baseDir;
$year_folder = $path . date("Y");
$month_folder = $year_folder . '/' . date("m");

!file_exists($year_folder) && mkdir($year_folder , 0777);
!file_exists($month_folder) && mkdir($month_folder, 0777);

$path = date("Y")."/".date("m");

return $path;

}