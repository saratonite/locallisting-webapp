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

function FrontStarRating($rating,$total_rating=5){

	$rating = ceil($rating);

	if($rating){


		$remaining_starts = $total_rating - $rating;

		// Render Rating stars
		for($i=0;$i<$rating;$i++){
			echo '<span class="glyphicon glyphicon-star star-gold"></span>';

		}

		// Render Remaining Starts
		for ($j=0; $j < $remaining_starts ; $j++) { 
			echo '<span class="glyphicon glyphicon-star-empty star-gray"></span>';
			

		}


	}
	else{
		"No rates";
	}



}

function calculateReviewRate($review){

		$total_rate = ($review->rate_price+$review->rate_timeliness+$review->rate_quality+$review->rate_professionalism);
		
		$overall_rate = 0;
		if($total_rate>0){
			$overall_rate = ceil($total_rate/4);
		}

		return $overall_rate;

}
function BS_StarRating($rating = false, $total_rating=5){

	if($rating  > $total_rating) return false;

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

function ImagesDir(){

	return url('/').'/'.config('settings.uploads.images');

}

function ImagePath(App\Image $image,$version=false){

		$v_type = '';


	if(config('settings.images.thumb') == true){

		if($version){
			$version = strtolower($version);
			switch ($version) {
			case 'sm':
				$v_type = "V200_";
				break;
			case 'md':
				$v_type = "V325_";
				break;
			
			default:
				$v_type = '';
				break;
			}
		}

	}

	


	return url('/').'/'.config('settings.uploads.images').$image->base_dir.'/'.$v_type.$image->file_name;

}

function vendorPictureUrl(App\Image $picture,$version=false){

	return ImagePath($picture,$version);

}