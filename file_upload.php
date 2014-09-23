<?php
	
	$conn=mysql_connect("localhost:3306","root","root");
	if (!$conn) die ("链接数据库错误");
	mysql_select_db('catering',$conn);

	$sql1="select id from mediafiles order by id desc limit 1";
	$result1 = mysql_query($sql1);
	$row1 = mysql_fetch_array($result1);
	
	
	$uploadtime= date("Y-m-d h:i:s");
	$uploadtime= strval($uploadtime);
	if (strval($_FILES['file']['type'])=="image/jpeg") $format="jpg";
	if (strval($_FILES['file']['type'])=="image/png") $format="png";
	if (strval($_FILES['file']['type'])=="video/mp4") $format="mp4";
	if (strval($_FILES['file']['type'])=="video/3gp") $format="3gp";

	$id = $row1[0]+1;

	if ($_FILES['file']['name']!="")
	{
		copy ($_FILES['file']['tmp_name'],"/var/www/html/catering/sources/".strval($id).'.'.$format);
		chmod("/var/www/html/catering/sources/".strval($id).'.'.$format,0777);
	}	
	else
	{
		die ("没有选择文件！");
	}

	$filename=$_FILES['file']['name'];
	$sql2="insert into mediafiles (id,picplaytimes,videoplaytimes,remarks,uploadtime,authority,format,filename) values (".strval($id).",0,-1,'','".$uploadtime."','YES','".$format."','".$filename."')";
	$result2 = mysql_query($sql2);
	if (!$result2) die ("查询失败".mysql_error());


?>

<html>
<body>
<h3> 文件上传成功！</h3>
<ul>
<li> 文件名 : <?php echo $_FILES['file']['name'];?> </li>
<li> 文件大小 : <?php echo $_FILES['file']['size'];?> </li>
<li> 文件类型 : <?php echo $_FILES['file']['type'];?> </li>
</ul>

</body>
</html>
