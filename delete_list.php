<?php
	
	$conn=mysql_connect("localhost:3306","root","root");
	mysql_select_db("catering",$conn);
	$sql="drop table ".strval($_POST["chooselist"]);
	$result=mysql_query($sql);
	if (!$result) die (mysql_error());
	$sql1="delete from playlist where listname='".strval($_POST["chooselist"])."'";
	$result1=mysql_query($sql1);
	header("Location:show_list_left.php");
?>
