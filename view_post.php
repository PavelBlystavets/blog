<?php 
include ("blocks/db.php");
if (isset($_GET['id'])) {$id = $_GET['id'];}
if (!isset($id)) {$id = 1;}
if (!preg_match("|^[\d]+$|", $id)) {
	exit("<p>Неверный формат запроса! Проверте URL!</p>");
}
$result = mysqli_query($db,"SELECT * FROM data WHERE id='$id'");
if (!$result) {
	echo "<p>Запрос на выборку данных из базы не прошел. Напишите об этом администратора admin@gmail.com. <br> <b>Код ошибки:</b></p>";
	exit(mysqli_error());
}
if (mysqli_num_rows($result)>0) {
	$myrow = mysqli_fetch_array($result);
	$new_view = $myrow["view"] + 1;
	$update = mysqli_query($db,"UPDATE data SET view='$new_view' WHERE id='$id'");
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
	<title><?php echo $myrow['title']; ?></title>
</head>
<body>
	<?php 
	include ("blocks/header.php");
	include ("blocks/under_head.php");
	include ("blocks/sidebar.php");
printf("<div class='blog_title'><p class='blog_post_title'>%s</p><p class='post_adds'>Автор: %s</p><p class='post_adds'>Дата: %s</p></div>%s<p class='post_view_blog'>Просмотров: %s</p>",$myrow['title'],$myrow['author'],$myrow['date'],$myrow['text'],$myrow['view']);
echo "<p class='post_comment'>Комментарии к этой заметке</p>";
$result3 = mysqli_query($db,"SELECT * FROM comments WHERE post='$id'");
if (mysqli_num_rows($result3) > 0){
	$myrow3 = mysqli_fetch_array($result3);
	do{
		printf("<div class='post_div'><p class='post_comment_add'>Комментарий добавил(а): <b>%s</b><br>Дата: <b>%s</b></p><p>%s</p></div>",$myrow3["author"],$myrow3["date"],$myrow3["text"]);
	}
	while ($myrow3 = mysqli_fetch_array($result3));
}
?>
			<p class='post_comment'>Добавить Ваш комментарий</p>
			<form action="comment.php" method="post" name="form_com" class="form_com">
				<p class="comment_discription">Ваше Имя: </p>
				<input type="text" name="author">
				<p class="comment_discription">Текс комментария: </p>
				<textarea name="text"></textarea>
				<p>Введите символы с картинки: </p>
				<div>
					<img src="noise-picture.php">
				</div>
				<input type="text" name="str">
				<input type="hidden" name="id" value="<?php echo $id; ?>">
				<input class="submit_contact" type="submit" value="Send Massage">
			</form>
		</div>
	</div>
	<?php
	include ("blocks/footer.php");
	include ("blocks/footer_foot.php");
	?>
</body>
</html>