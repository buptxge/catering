<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>清除播放列表</title>
<link href="images/main.css" rel="stylesheet" type="text/css" />
</head>
<script type="text/javascript">
function show_confirm(){
	alert("播放列表生成完毕！");
}

</script>

<body>

<form action="run_list_do.php" method="post">

<div style="margin-left:20px; margin-top:15px;font-size:11pt;">
选择播放列表:
</div>


<div style="margin-left:20px; margin-top:8px;">
	<?php
		$conn = mysql_connect("localhost:3306","root","root");
		mysql_select_db("catering",$conn);
		$sql1 = "select * from playlist";
		$result1 = mysql_query($sql1);
	?>
		<select style="width:145px;" name="chooselist">
		<?php
		while ($row1 = mysql_fetch_array($result1))
		{
			?>	<option value="<?php echo $row1[1]?>"><?php echo $row1[1]?></option><?php
		}
	?>	
		</select>
</div>

<div style="font-size:11pt; margin-left:20px; margin-top:15px;">
请选择终端：
</div>

<div style="margin-left:20px; margin-top:8px;">
	<?php
		$sql2 = "select * from terminal";
		$result2 = mysql_query($sql2);
	?>
		<select style="width:145px;" name="chooseterminal">
		<?php
		while ($row2 = mysql_fetch_array($result2))
		{
			?>	<option value="<?php echo $row2[1]?>"><?php echo $row2[1]?></option><?php
		}
	?>	
		</select>
</div>

<div style="margin-left:20px; margin-top:20px;">
	<input type="submit" onclick="show_confirm()" value="生成播放列表">
</div>

</form>

</body>
</html>
