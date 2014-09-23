<html xmlns="http://www.w3.org/1999/xhtml">
<head>


<script type="text/javascript">
function form_confirm(){
	var flag=true;
	var checkText= document.getElementById("checkname").value;
	if (checkText=="" || CheckText==null){
		alert("请输入终端名");
		flag=false;
	}
	else 
	{
		alert("终端添加成功！");
	}
	return flag;
}
</script>


<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title> 添加终端</title>
<link href="images/main.css" rel="stylesheet" type="text/css" />
</head>
<body>
</div>

<form action="insert_into_terminal.php" method="post" onsubmit="return form_confirm()">
  <table align="center" color="black" width="90%">
	<tr width="300" id="tr_list">
			<td id="td_list">输入终端名</td>
			<td id="td_list">
				<input id="checkname" type="text" name="name"/>
			</td>
			<td id="td_list">输入描述信息</td>
			<td id="td_list">
				<input type="text" name="desc"/>
			</td>
			<td id="td_list">
				<input type="submit" value="添加终端" />
			</td>
		</tr>
   </table>
</form>

<div id="right_div0">
<p> 全部终端：</p> 
</div>

<div id="right_div1">
<table>
        <tr>
			<th scope="col">序号</th>
			<th scope="col">终端名</th>
			<th scope="col">所属组</th>
			<th scope="col">IP地址</th>
			<th scope="col">描述</th>
		</tr>
		<?php
			$sql="select * from terminal";
			require('conn.php');
		?>

		<?php
			$sum=0;
			while ($row = mysql_fetch_row($result))
			{
			$sum=$sum+1;
		?>
			<tr align="center" valign="middle">
				<td width="80"><?php echo $row[0];?> </td>
				<td width="150"><?php echo $row[1];?> </td>
				<td width="150"><?php echo $row[2];?> </td>
				<td width="230"><?php echo $row[3];?> </td>
				<td width="400"><?php echo $row[4];?> </td>
			</tr>
		<?php
			}
			while ($sum<10) 
			{
		?>	
			<tr align="center" valign="middle">
				<td width="80" height="21"> </td>
				<td width="150"> </td>
				<td width="150"> </td>
				<td width="230"> </td>
				<td width="400"> </td>
			</tr>
		<?php
			$sum++;
			}
	
		?>

	</table>
</div>


</body>
</html>

