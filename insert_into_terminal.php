<?php
	$conn=mysql_connect("localhost:3306","root","root");
	if (!$conn) die (mysql_error());
	mysql_select_db("catering",$conn) or die (mysql_error());

	$name=$_POST["name"];
	$desc=$_POST["desc"];
	
	$sql2="select * from terminal where name = \"".strval($name)."\"";
	$result2=mysql_query($sql2);
	$row=mysql_num_rows($result2);
	if ($row==0){
		$sql="insert into terminal (name,description) values ('".strval($name)."','".strval($desc)."')";
		$result1=mysql_query($sql);
		if (!$result1) die (mysql_error());
	} 
    header("Location:http://localhost/catering/terminal.php");
	
?>
