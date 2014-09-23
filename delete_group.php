<?php
	$conn=mysql_connect("localhost","root","root");
	mysql_select_db("catering",$conn);
	$choosegroup=$_POST["choosegroup"];
	$sql="update terminal set groupname='none' where groupname='".strval($choosegroup)."'";
	$result=mysql_query($sql);
	if (!$result) die (mysql_error());

	$sql1 = "delete from groups where name='".strval($choosegroup)."'";
	$result1=mysql_query($sql1);
	if (!$result1) die (mysql_error());

	header("Location:http://localhost/catering/group.php");	
	
?>
