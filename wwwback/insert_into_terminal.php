<?php
#	if (empty($_POST["name"]))
	$conn=mysql_connect("localhost:3306","root","root");
	if (!$conn) die (mysql_error());
	mysql_select_db("catering",$conn) or die (mysql_error());

	$name=$_POST["name"];
	$desc=$_POST["desc"];

	$sql="insert into terminal (name,description) values ('".$name."','".$desc."')";
	$result1=mysql_query($sql);
    if (!$result1) die (mysql_error());
	
	header("Location:http://localhost/catering/terminal.php");
	
?>
