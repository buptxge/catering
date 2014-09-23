<?php
	$conn=mysql_connect("localhost:3306","root","root");
	mysql_select_db("catering",$conn);
	$blanklist=$_POST["blanklist"];
	
	$sql="insert into playlist (listname) values ('".strval($blanklist)."')";
	$result=mysql_query($sql);
	if (!$result) {die (mysql_error());}

	$sql1="create table ".strval($blanklist)." (id int(4) not null primary key auto_increment,number int(4),time int(4),groupname varchar(20))";
	$result1 = mysql_query($sql1);	
	if (!$result1) {die (mysql_error());}
	header("Location:http://localhost/catering/makelist.php");

?>
