<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>清除播放列表</title>
</head>

<body>
<table style="margin-left:40px;"border="0">
	<tr>
		<th width="100">序号   </th>
		<th width="150">文件名</th>
		<th width="200">播放时长</th>
	</tr>

	<?php
		$conn=mysql_connect("localhost:3306","root","root");
	    mysql_select_db("catering",$conn);

		$sql="select * from ".strval($_POST["chooselist"]);
		$result=mysql_query($sql);
		$sum=0;
		while ($row = mysql_fetch_row($result)){
		$sum++;
		$sql1="select filename from mediafiles where id=".strval($row[1]);
		$result1=mysql_query($sql1);
		$row1=mysql_fetch_row($result1);
	?>
		<tr>
			<td align="center"><?php echo $sum?></td>
			<td align="center"><?php echo $row1[0]?></td>
			<td align="center"><?php echo $row[2]?></td>
		</tr>
	<?php
		}
	?>	
</table>
</body>
</html>
