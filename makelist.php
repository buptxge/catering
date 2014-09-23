<html xmlns="http://www.w3.org/1999/xhtml">
<head>


<script type="text/javascript">
function show_confirm(){
	alert("播放列表添加成功！");
}

function show_confirm1(){
	alert("新列表已生成！");
}
</script>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title> 生成播放列表</title>
<link href="images/main.css" rel="stylesheet" type="text/css" />
</head>
<body>

<?php

$conn = mysql_connect("localhost:3306","root","root");
mysql_select_db("catering",$conn);

?>

<form action="make_new_list.php" method="post">
  <table style="margin-left:77px;"align="center" width="86%">


	<tr id="tr_list">
			<td width="325">输入想要新建的空白列表名称:</td>
			<td id="td_list">
				<input width="300" size="40" type="text" name="blanklist"/>
			</td>
			<td width="177" id="td_list">
				<input type="submit" value="生成新空白列表" onclick="show_confirm1()"/>
			</td>
		</tr>
   </table>
</form>

<form action="insert_into_list.php" method="post">
  <table style="margin-left:77px;"align="center" width="86%">

	<tr id="tr_list">
			<td width="50" id="td_list">序号</td>
			<td width="220" id="td_list">
				<input style="width:200px;" type="text" name="number"/>
			</td>
			<td width="50" id="td_list">时长</td>
			<td width="220" id="td_list">
				<input style="width:200px;" type="text" name="time"/>
			</td>
			<td width="80" id="td_list">选择列表</td>

			<?php
				$sql1 = "select * from playlist";
				$result1 = mysql_query($sql1);
			?>
			<td width="138" id="td_list">
		        <select style="width:135px;" name="chooselist">
				<?php
					while ($row1 = mysql_fetch_array($result1))
					{
				?>	<option value="<?php echo $row1[1]?>"><?php echo $row1[1]?></option><?php
					}
				?>	
				</select>
			</td>
			<td id="td_list">
				<input type="submit" value="添加到播放列表" onclick="show_confirm()"/>
			</td>
		</tr>
   </table>
</form>

<div style="margin-left:20px; font-size:11pt;">
<p> 所有的媒体文件：</p>
</div>

<div id="right_div1">
	<table style="margin-left:20px;">
		<tr>
			<th scope="col">序号</th>
			<th scope="col">文件名</th>
			<th scope="col">格式</th>
			<th scope="col">已播放次数</th>
			<th scope="col">上传时间</th>
			<th scope="col">是否审核</th>
			<th scope="col">备注</th>
			<th scope="col"></th>
		</tr>
		<?php
			$sql="select * from mediafiles";
			$result=mysql_query($sql);
		?>

		<?php
			$sum=0;
			while ($row = mysql_fetch_row($result))
			{
			$sum=$sum+1;
		?>
			<tr align="center" valign="middle">
				<td width="50"><?php echo $row[0];?> </td>
				<td width="180"><?php echo $row[7];?> </td>
				<td width="60"><?php echo $row[6];?> </td>
				<td width="120"><?php echo $row[2];?> </td>
				<td width="250"><?php echo $row[4];?> </td>
				<td width="80"><?php echo $row[5];?> </td>
				<td width="150"><?php echo $row[3];?> </td>
				<td width="60">
					
				</td>
			</tr>
		<?php
			}
			while ($sum<10) 
			{
		?>	
			<tr align="center" valign="middle">
				<td width="80" height="21"> </td>
				<td width="80"> </td>
				<td width="150"> </td>
				<td width="150"> </td>
				<td width="230"> </td>
				<td width="110"> </td>
				<td width="130"> </td>
			</tr>
		<?php
			$sum++;
			}
	
		?>

	</table>
</div>
</body>
</html>

