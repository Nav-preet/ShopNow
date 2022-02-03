<?php

function prx($arr){
	echo'<pre>';
	print_r($arr);
	die();
}
function safe_value($conn,$str){
	if($str !=''){
		$str=trim($str);
 		return mysqli_real_escape_string($conn,$str);
	}
	
}
?>