<?php
function delFileUnderDir($dirName){	
	if ($handle = opendir("$dirName")){
		while (($item = readdir($handle))!=false){
			if ($item!="." && $item!="..") unlink("$dirName/$item");
		}
	}
	closedir($handle);
}
?>


<?php
	delFileUnderDir('/var/www/sources');
	$sql = "truncate table mediafiles";
	require("conn.php");
?>
