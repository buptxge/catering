
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>清除播放列表</title>
</head>

<body>
<table style="margin-left:10px;"border="0">
	<tr>
		<th width="100">序号   </th>
		<th width="150">终端名</th>
	</tr>

	<?php
		$conn=mysql_connect("localhost:3306","root","root");
	    mysql_select_db("catering",$conn);

		$sql="select * from terminal where groupname ='".strval($_POST["choosegroup"])."'";
		$result=mysql_query($sql);
		if (!$result) die ("asdf");
		$sum=0;
		while ($row = mysql_fetch_row($result)){
		$sum++;
	?>
		<tr>
			<td align="center"><?php echo $sum?></td>
			<td align="center"><?php echo $row[1]?></td>
		</tr>
	<?php
		}
	?>	
</table>
</body>
</html>
