<html>
<body>
<?php
#echo $_POST["chooselist"];

	$number=$_POST["number"];
	$time=$_POST["time"];
    $conn = mysql_connect("localhost:3306","root","root");
	if (!$conn){
		die ('不能连接到服务器,'.mysql_error());
	}

	mysql_select_db("catering",$conn);
	$sql="insert into ".strval($_POST["chooselist"])." (number,time,groupname) values($number,$time,'group1')";
	$result1 = mysql_query($sql);
	if(!$result1) die ("添加失败,".mysql_error());

	header("Location:http://localhost/catering/makelist.php");
?>

</body>
</html>
