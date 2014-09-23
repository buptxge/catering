<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>管理菜单</title>
<link href="images/main.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
function form_confirm(){
	var flag=true;
	var checkText=document.getElementById("name").value;
	if (checkText==""||checkText==null){
		flag=false;
		alert("请输入组名！");
	}	
	if (flag==true){
		alert(checkText+"组添加成功！")
	}
	return flag;

}

function check_show(){
	form1.action="show_group.php";
	form1.target="group_buttom";
}


function check_insert(){
	form1.action="insert_into_group.php";
	form1.target="_self";
	var terminal=document.getElementById("terminal").value;
	var group=document.getElementById("group").value;
	var insert_confirm="您已成功添加"+terminal+"终端到"+group+"组内";
	alert(insert_confirm);	
}

function check_delete(){
	form1.action="delete_group.php";
	form1.target="_self";
	var group=document.getElementById("group").value;
	alert(group+"组已成功删除");
}
</script>

</head>

<body>

<form method="post" name="form1" action="" target="" >
	<div id="groupdiv00">
		<p>组查看，终端分组：</p>
		<div style="height:30px">
			<div style="float:left;height:30px;margin-top:-7px"><p>选择组：</p></div>
			<div style="float:left">
				<?php
					$conn = mysql_connect("localhost:3306","root","root");
					mysql_select_db("catering",$conn);
					$sql1 = "select * from groups";
					$result1 = mysql_query($sql1);
				?>
					<select style="width:145px;" name="choosegroup" id="group">
					<?php
					while ($row1 = mysql_fetch_array($result1))
					{
						?>	<option value="<?php echo $row1[1]?>"><?php echo $row1[1]?></option><?php
					}
				?>
					<option value="none">无分组</option>	
					</select>
					
			</div>

			<div style="margin-left:10px; float:left; margin-top:-7px"><p>选择终端：</p></div>
			<div style="float:left">
				<?php
					$conn = mysql_connect("localhost:3306","root","root");
					mysql_select_db("catering",$conn);
					$sql1 = "select * from terminal";
					$result1 = mysql_query($sql1);
				?>
					<select style="width:145px;" name="chooseterminal" id="terminal">
						<?php
						while ($row1 = mysql_fetch_array($result1))
						{
							?>	<option value="<?php echo $row1[1]?>"><?php echo $row1[1]?></option><?php
						}
				?>	
					</select>
			</div>
		</div>
		<div style="clear:both; height:30px; width:400px">
			<input style="float:left; width:115px; margin-left:10px;" type="submit" value="查看组内终端" onclick="check_show()"/> 
			<input style="float:left; width:115px; margin-left:20px;" type="submit" value="添加终端到组" onclick="check_insert()"/> 
			<input style="float:left; width:115px; margin-left:20px;" type="submit" value="删除该组" onclick="check_delete()"/> 
		</div>

	</div>
</form>
<div id="groupdiv0">
	<div id="groupdiv1">
		<p>新建组，请输入组名</p>
	</div>

	<form action="add_new_group.php" method="post" onsubmit="return form_confirm()" >
		<div class="groupdiv2"> 
			<input id="name" type="text" name="name"/>
		</div>
		<div class="groupdiv2">
			<input type="submit" value="添加新组">
		</div>
	</form>

</div>

</body>
</html>
