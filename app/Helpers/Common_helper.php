<?php

if(!function_exists("d")){
	function d($array=array()){
		echo "<pre>";
		print_r($array);
		echo "</pre>";
		die();
	}
}

?>