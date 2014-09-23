<?php
@header('charset=utf-8');
$jsonarr = Array(
	0=> array(
		'data'=>'http://192.168.1.100:5901/sources/1.jpg',
	    'time'=>'5'
		),
	1=> array(
		'data'=>'http://192.168.1.100:5901/sources/2.png',
	    'time'=>'7'
		),
	2=> array(
		'data'=>'http://192.168.1.100:5901/sources/3.mp4',
	    'time'=>'10'
		)
	);
echo json_encode($jsonarr);

?>

