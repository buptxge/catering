<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>查看播放列表</title>
<link href="images/main.css" rel="stylesheet" type="text/css" />
</head>
<body>

<div id="show_list_div">
<?php
	?><p > <?php echo "playlist.json文件为:"; ?> </p> <?php
	$text = file_get_contents("playlist.txt");
	if ($text=="") ?> <p>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <?php echo "空";?> </p> <?php
	?><p > <?php echo $text;?></p> <?php
?>
</div>

<div id="show_list_button">
	<form action="clear_play_list.php" method="post">
		<input type="submit" value="一键清空播放列表"/>
	</form>
</div>

</body>
</html>

