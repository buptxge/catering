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

function set_terminal_disabled(){	
	document.getElementById('terminal1').disabled="disabled";
	document.getElementById('terminal2').disabled="disabled";
	document.getElementById('group1').disabled=false;
	document.getElementById('group2').disabled=false;
}

function set_group_disabled(){
	document.getElementById('terminal1').disabled=false;
	document.getElementById('terminal2').disabled=false;
	document.getElementById('group1').disabled="disabled";
	document.getElementById('group2').disabled="disabled";
}

function checkGroup(){
	form1.action="run_list_do_group.php";
	form1.target="_self";
	alert("成功按组生成播放列表！");
}

function checkTerminal(){
	form1.action="run_list_do_terminal.php";
	form1.target="_self";
	alert("成功按终端生成播放列表！");
}
</script>

<body>

<div style="font-size:11pt; margin-left:20px; margin-top:15px">
	选择生成方式：
</div>

<div style="font-size:11pt; margin-left:20px; margin-top:4px; height:20px;">
	<form>
		<div style=" font-size:11pt; float:left;">组</div>
		<input name="choose" style="martin-left:5px; float:left;" type="radio" onclick="set_terminal_disabled()" checked="checked"/>
		<div style="font-size:11pt; float:left; martin-left:10px;">终端</div>
		<input name="choose" style="float:left; margin-left:5px;" type="radio" onclick="set_group_disabled()"/>
	</form>
</div>

<div style="clear:both; height:0px;"></div>


<form name="form1" action="" method="post" target="">

<div style="margin-left:20px; margin-top:15px;font-size:11pt;">
选择播放列表:
</div>


<div style="margin-left:20px; margin-top:4px;">
	<?php
		$conn = mysql_connect("localhost:3306","root","root");
		mysql_select_db("catering",$conn);
		$sql1 = "select * from playlist";
		$result1 = mysql_query($sql1);
	?>
		<select style="width:185px;" name="chooselist">
		<?php
		while ($row1 = mysql_fetch_array($result1))
		{
			?>	<option value="<?php echo $row1[1]?>"><?php echo $row1[1]?></option><?php
		}
	?>	
		</select>
</div>
<div style="font-size:11pt; margin-left:20px; margin-top:5px;">
	请选择组：
</div>

<div style="margin-left:20px; margin-top:4px;">
	<?php
		$sql2 = "select * from groups";
		$result2 = mysql_query($sql2);
	?>
		<select style="width:185px;" name="choosegroup" id="group1">
		<?php
		while ($row2 = mysql_fetch_array($result2))
		{
			?>	<option value="<?php echo $row2[1]?>"><?php echo $row2[1]?></option><?php
		}
	?>	
		</select>
</div>

<div style="margin-left:20px; margin-top:4px;">
	<input type="submit" onclick="checkGroup()" value="按组生成播放列表" id="group2">
</div>

<div style="font-size:11pt; margin-left:20px; margin-top:15px;">
	请选择终端：
</div>

<div style="margin-left:20px; margin-top:4px;">
	<?php
		$sql3 = "select * from terminal";
		$result3 = mysql_query($sql3);
	?>
		<select disabled="disabled" style="width:185px;" name="chooseterminal" id="terminal1">
		<?php
		while ($row3 = mysql_fetch_array($result3))
		{
			?>	<option value="<?php echo $row3[1]?>"><?php echo $row3[1]?></option><?php
		}
	?>	
		</select>
</div>

<div style="margin-left:20px; margin-top:4px;">
	<input disabled="disabled" type="submit" onclick="checkTerminal()" value="按终端生成播放列表" id="terminal2"/>
</div>

</form>

</body>
</html>
