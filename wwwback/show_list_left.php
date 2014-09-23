<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>查看播放列表</title>
<link href="images/main.css" rel="stylesheet" type="text/css" />
</head>

<script type="text/javascript">

function showcheck(){
	form1.target="show_list_right";
	form1.action="showlist.php";
}

function clearcheck(){
	alert("播放列表已清空！");
	form1.target="_self";
	form1.action="clearlist.php";
}

</script>


<body>
<div id="div0">
<p>请选择播放列表：</p>
</div>

<form target="" method="post" action="" name="form1">

	<div id="div1">
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

	<div id="div2">
		<input type="submit" onclick="showcheck()" value="查看播放列表" >
	</div>

	<div id="div3">
		<input type="submit" onclick="clearcheck()" value="一键清空播放列表"/>
	</div>

</form>
</body>
</html>

