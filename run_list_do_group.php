
<?php
	$conn=mysql_connect("localhost:3306","root","root");
	mysql_select_db("catering",$conn);

	$text="[";
	$sql1="select * from ".strval($_POST["chooselist"]);
	$result1=mysql_query($sql1);

	
	while ($row1=mysql_fetch_row($result1)){
		$numbertmp=$row1[1];
		$sql2 ="select * from mediafiles where id = $numbertmp";
		$result2 = mysql_query($sql2);
		$row2 = mysql_fetch_row($result2);
		$format = $row2[6];
		$text = $text."{";
		$mainurl = "http://localhost/catering/sources/";
		$numbertmpstr = strval($numbertmp);
		$time = $row1[2];
		$timestr = strval($time);

		$text = $text."\"data\":"."\"".$mainurl.$numbertmpstr.".".$format."\",";
		$text = $text."\n";
		$text = $text."\"time\":"."\"".$timestr."\"";
		$text = $text."}";
		$text = $text.",";
	}
	
    $text = substr($text,0,strlen($text)-1);
   	$text = $text."]";

	$group=$_POST["choosegroup"];
	$sql3="select * from terminal where groupname='".strval($group)."';";
	echo $sql3;
	$result3=mysql_query($sql3) or die(mysql_error());
	while ($row3=mysql_fetch_row($result3)){

		$listurljson="playlist_".strval($row3[1]).".json";
		$listurl="playlist_".strval($row3[1]).".txt";
		if (file_exists($listurl)) {
			chmod($listurl,0777);
		}

		if (file_exists($listurljson)){
			chmod($listurljson,0777);
		}

		file_put_contents($listurl,$text) or (die ("列表写入失败"));
		$listurljson="playlist_".strval($row3[1]).".json";

		$updateurljson="timestamp_".strval($row3[1]).".json";
		$updateurl="timestamp_".strval($row3[1]).".txt";

		if (file_exists($listurl)){
			chmod($listurl,0777);
		}

		if (file_exists($updateurl)){
			chmod($listurl,0777);
		}	

		copy($listurl,$listurljson);
		chmod($listurljson,0777);
		require("update_list_time.php");
	}

	header("Location:http://localhost/catering/run_list.php");
?>

