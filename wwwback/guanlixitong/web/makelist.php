<?php
#    if isset($_POST['submit'])
#	{
#		$number=$_POST["number"];
#		$time=$_POST["time"];
#		$conn = mysql_connect("localhost:3306","root","zhangzhi12");
#		if (!$conn){
#			die ('不能连接到服务器,'.mysql_error());
#		}
#		
#		mysql_select_db('catering',$conn);
#		$sql="insert into playlist(number,time,groupname) values($number,$time,'group1')";
#		$result1 = mysql_query($sql);
#		if(!$result1) die ("添加失败".mysql_error());
#		
#	}
#?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title> 生成播放列表</title>
<link href="images/main.css" rel="stylesheet" type="text/css" />
</head>
<body>

<div id="right_div0">
<p> 所有的媒体文件：</p>
</div>

<div id="right_div1">
	<table>
		<tr>
			<th scope="col">序号</th>
			<th scope="col">格式</th>
			<th scope="col">所属组</th>
			<th scope="col">已播放次数</th>
			<th scope="col">上传时间</th>
			<th scope="col">是否审核</th>
			<th scope="col">备注</th>
		</tr>
		<?php
			$sql="select * from mediafiles";
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
				<td width="80"><?php echo $row[7];?> </td>
				<td width="150"><?php echo $row[4];?> </td>
				<td width="150"><?php echo $row[2];?> </td>
				<td width="230"><?php echo $row[5];?> </td>
				<td width="110"><?php echo $row[6];?> </td>
				<td width="130"><?php echo $row[3];?> </td>
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

<div id="pagechange">
	<div id="prepage"><a href="makelist.php" >&#60上一页</a></div>
	<div id="nextpage"><a href="makelist.php">下一页&#62</a></div>
</div>

<form action="http://localhost/guanlixitong/web/insert_into_list.php" method="post">
  <table align="center" color="black" width="75%">
	<tr id="tr_list">
			<td id="td_list">输入序号</td>
			<td id="td_list">
				<input type="text" name="number"/>
			</td>
			<td id="td_list">输入时长</td>
			<td id="td_list">
				<input type="text" name="time"/>
			</td>
			<td id="td_list">
				<input type="submit"  value="添加到播放列表"/>
			</td>
		</tr>
   </table>
</form>


</body>
</html>

