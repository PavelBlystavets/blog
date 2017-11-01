<?php 
include ("blocks/db.php");
if (isset($_POST['submit_s'])) {
	$submit_s = $_POST['submit_s'];
}
if (isset($_POST['search'])) {
	$search = $_POST['search'];
}
if (isset($submit_s)) {
	if (empty($search)  or strlen($search) < 3){
		exit("<p>Поисковый запрос не введен, либо он менее 3-х символов</p>");
	}
	else {
		$search = trim(mysqli_real_escape_string($db,(strip_tags(stripslashes(htmlspecialchars($search))))));

	}
}
else {
	exit("<p>Вы обратились к файлу без необходимых параметров</p>");
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<title><?php echo "Заметки по запросу - $search"; ?></title>
</head>
<body>
	<?php 
	include ("blocks/header.php");
	include ("blocks/sidebar.php"); 
	?>
	<div class='content_index'>
	<?php
	$result = mysqli_query($db,"SELECT id,title,description,date,author,img,view FROM data WHERE MATCH(text) AGAINST('$search') OR MATCH(description) AGAINST('$search') OR MATCH(title) AGAINST('$search')");
	if (!$result) {
		echo "<p>Запрос на выборку данных из базы не прошел. Напишите об этом администратора darkandsuffer@gmail.com. <br> <b>Код ошибки:</b></p>";
		exit(mysqli_error($db));
	}
	if (mysqli_num_rows($result)>0) {
		$myrow = mysqli_fetch_array($result);
	}
	else{
		echo "<p>Информация по Вашему запросу на блоге не найдена.</p>";
		exit();
	}
	do{
	printf("		
			<div class='blog'>
				<div class='post_title'>
					<a class='blog_post' href='view_post.php?id=%s'>%s</a><p class='post_adds'>Дата добавления: %s</p><p class='post_adds'>Автор статьи: %s</p>
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
</div>
<?php 
include ("blocks/footer.php");
include ("blocks/footer_foot.php");
?>
</body>
</html>