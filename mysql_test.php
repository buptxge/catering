<?php
	$conn = mysql_connect("localhost:3306","root","root");
	if (!$conn) die ("mysql_error()"); else echo "ok"; 

?>
