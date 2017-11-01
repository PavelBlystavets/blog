<?php 
include("blocks/db.php");
$result = mysqli_query($db,"SELECT title,text FROM settings WHERE page='index'");
$myrow = mysqli_fetch_array($result);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<title><?php  echo $myrow['title']; ?></title>
</head>
<body>
	<?php 
	include ("blocks/header.php");
	include ("blocks/sidebar.php");
	echo $myrow['text'];
	include ("blocks/footer.php");
	include ("blocks/footer_foot.php"); ?>
</body>
</html>