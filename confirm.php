<html>
<body>

<?php
$user=$_POST["user"];
$password=$_POST["password"];
$con = mysql_connect("localhost:3306","root","root");
if (!$con)
{
	die('不能链接到服务器：'.mysql_error());
}
#echo $user.$password;
#echo "asdf";
mysql_select_db("catering",$con);


$query1 = "select password from userinfo where user='{$user}'";
$result1 = mysql_query($query1);
if (!$result1)
{
	die("登录错误:".mysql_error());
}
$result1 = mysql_fetch_assoc($result1);
if ($password==$result1['password'])
{	
	header("Location: http://localhost/catering/main.html");
}
else 
{	
	echo "密码错误";
}

?>

</body>
</html>
