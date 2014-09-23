<?php
	$systemtime = date("Y-m-d H:i:s");
	$updatetime = "{\"updateTime\":\"".$systemtime."\"}";
	file_put_contents($updateurl,$updatetime);
	copy($updateurl,$updateurljson);
	chmod($updateurljson,0777);
?>
