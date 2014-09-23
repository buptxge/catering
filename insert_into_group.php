<?php
	$conn = mysql_connect("localhost:3306","root","root");
	mysql_select_db("catering",$conn);
	$chooseterminal=$_POST["chooseterminal"];
	$choosegroup=$_POST["choosegroup"];

	$sql1 = "update terminal set groupname='".strval($choosegroup)."' where name ='".strval($chooseterminal)."'"; 
	$result1 = mysql_query($sql1);
	if (!$result1) die (mysql_error());
    header("Location:http://localhost/catering/group.php");
?>
	
