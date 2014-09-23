<html>
<body>
<?php
	$number=$_POST["number"];
	$time=$_POST["time"];
    $conn = mysql_connect("localhost:3306","root","zhangzhi12");
	if (!$conn){
		die ('不能连接到服务器,'.mysql_error());
	}

	mysql_select_db("catering",$conn);
	$sql="insert into playlist(number,time,groupname) values($number,$time,'group1')";
	$result1 = mysql_query($sql);
	if(!$result1) die ("添加失败,".mysql_error());
	$text="[";

	$sql2="select * from playlist";
	$result2=mysql_query($sql2);

	
	while ($row2=mysql_fetch_row($result2)){
		$numbertmp=$row2[1];
		$sql3 ="select * from mediafiles where id = $numbertmp";
		$result3 = mysql_query($sql3);
		$row3 = mysql_fetch_row($result3);
		$format = $row3[7];
		$text = $text."{";
		$mainurl = "http://localhost/sources/";
		$numbertmpstr = strval($numbertmp);
		$time = $row2[2];
		$timestr = strval($time);

		$text = $text."\"data\":"."\"".$mainurl.$numbertmpstr.".".$format."\",";
		$text = $text."\n";
		$text = $text."\"time\":"."\"".$timestr."\"";
		$text = $text."}";
		$text = $text.",";
	}
	
	$text = substr($text,0,strlen($text)-1);
	$text = $text."]";

	file_put_contents("playlist.txt",$text) or (die ("adsf"));
    copy("playlist.txt","playlist.json");

	header("Location:http://localhost/guanlixitong/web/makelist.php");
?>

</body>
</html>
