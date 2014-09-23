<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>清除播放列表</title>
<link href="images/main.css" rel="stylesheet" type="text/css" />
</head>


<body>
<?php
	$conn = mysql_connect("localhost:3306","root","root");
	mysql_select_db("catering",$conn);
	$sql="truncate table ".strval($_POST["chooselist"]);
	$result=mysql_query($sql);	
	if (!$result) die (mysql_error());

	header("Location:http://localhost/catering/show_list_left.php");
?>

</body>
</html>
