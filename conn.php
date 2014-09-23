
<?php
$db_host='localhost';
$db_user='root';
$db_password='root';
$db_name='catering';

$conn=mysql_connect($db_host,$db_user,$db_password) or die("数据库连接失败！");
mysql_select_db($db_name,$conn) or die('找不到指定的数据库');
$result=mysql_query($sql) or die ('数据库查询失败');
?>

