<?php
	session_start();
	$nChars = 5;
	$randStr = substr(md5(uniqid()),0,$nChars);
	$_SESSION["randStr"] = $randStr;
	$img = imageCreateFromJPEG("img/noise.jpg");
	$color = imageColorAllocate($img, 64, 64, 64);
	imageAntiAlias($img, true);
	$x = 20;
	$y = 30;
	$deltaX = 40;
	for($i=0; $i<$nChars; $i++){
		$size = rand(18, 30);
		$angle = -30 + rand(0, 60);
		imagettftext($img, $size, $angle, $x, $y, $color, "fonts/bellb.ttf", $randStr{$i});
		$x += $deltaX;
	}
	header("Content-Type: image/jpeg");
	imageJPEG($img);
?>