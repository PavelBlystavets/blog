<?php 
include("blocks/db.php");
if (isset($_GET['cat'])) {$cat = $_GET['cat'];}
if (!isset($cat)) {$cat = 1;}
if (!preg_match("|^[\d]+$|", $cat)) {
	exit("<p>Неверный формат запроса! Проверте URL!</p>");
}
$result = mysqli_query($db,"SELECT * FROM categories WHERE id='$cat'");
if (!$result) {
	echo "<p>Запрос на выборку данных из базы не прошел. Напишите об этом администратора admin@gmail.com. <br> <b>Код ошибки:</b></p>";
	exit(mysqli_error());
}
if (mysqli_num_rows($result)>0) {
	$myrow = mysqli_fetch_array($result);
}
else{
	echo "<p>Информация по запросу не может быть извлечена,в таблице нет записей</p>";
	exit();
}
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
	include ("blocks/under_head.php");
	include ("blocks/sidebar.php");
	?>
	<div class='content_index'>
	<?php 
	$result = mysqli_query($db,"SELECT id,title,description,date,author,img,view FROM data WHERE cat='$cat'");
	if (!$result) {
		echo "<p>Запрос на выборку данных из базы не прошел. Напишите об этом администратора admin@gmail.com. <br> <b>Код ошибки:</b></p>";
		exit(mysqli_error());
	}
	if (mysqli_num_rows($result)>0) {
		$myrow = mysqli_fetch_array($result);
	}
	else{
		echo "<p>Информация по запросу не может быть извлечена,в таблице нет записей</p>";
		exit();
	}
	do{
		printf("		
			<div class='blog'>
				<div class='post_title'>
					<a class='blog_post' href='post-%s.php'>%s</a><p class='post_adds'>Дата добавления: %s</p><p class='post_adds'>Автор статьи: %s</p>
					<img class='mini' align='left' src='%s'>
				</div>
				<div class='post_description'>
					<p>%s</p>
					<p class='post_view'>Просмотров: %s</p>
				</div>
			</div>
			",$myrow["id"],$myrow["title"],$myrow["date"],$myrow["author"],$myrow["img"],$myrow["description"],$myrow["view"]);
		}
	while ($myrow = mysqli_fetch_array($result));
	?>
	</div>
	<?php 
	include ("blocks/footer.php");
	include ("blocks/footer_foot.php");
	?>
</body>
</html>