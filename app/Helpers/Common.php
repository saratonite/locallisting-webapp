<?php

function pagination_row_num($page=1,$perpage){


	if(!$page){
		return 1;
	}


	return ($perpage * ($page-1))+1;


}