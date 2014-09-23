<?php
	$systemtime = date("Y-m-d H:i:s");
	$updatetime = "{\"updateTime\":\"".$systemtime."\"}";
	file_put_contents("update.txt",$updatetime);
	copy("update.txt","update.json");
?>
