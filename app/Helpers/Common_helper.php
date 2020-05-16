<?php
//use DB;

if(!function_exists("d")){
	function d($array=array()){
		echo "<pre>";
		print_r($array);
		echo "</pre>";
		die();
	}
}

if(!function_exists("country_list")){
	function country_list(){
		return DB::table("country")->get();
	}
}

if(!function_exists("city_list")){
	function city_list($country_id){
		return DB::table("city")->where("country_id",$country_id)->get();
	}
}


if(!function_exists("json_dump")){
	function json_dump($data){
		echo json_encode($data);
		exit();
	}
}

if(!function_exists("display_error_message")){
	function display_error_message($status=false,$message=null){
		$html ='';
		if(!$status && $message):
			$html+="<div class='alert alert-danger' role='alert'>";
			$html+=$message;
			$html+="</div>";
			return $html;
		endif;
		return $html;
	}
}

?>