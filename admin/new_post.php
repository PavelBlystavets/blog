<?php 
include("lock.php");
include("blocks/db.php");
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<title>Страница добавления новой заметки</title>
</head>
<body>
	<?php 
	include("blocks/header.php");
	include("blocks/sidebar.php");
	?>	
	<div class="admin_index">
		<h3 class="admin_title">Добавления новой заметки</h3>
		<form action="add_post.php" method="post" name="form1">
				<p>Введите название заметки</p>
					<input type="text" name="title" id="title">
				<p>Введите дату добавления заметки</p>
					<input type="text" name="date" id="date" value="<?php $date = date("Y-m-d");  echo "$date"; ?>">
				<p>Введите краткое описание заметки с тэгами абзацев</p>
					<textarea type="text" name="description" id="description"></textarea>
				<p>Введите полный текст заметки с тэгами</p>
					<textarea type="text" name="text" id="text"></textarea>
				<p>Введите автора заметки</p>
					<input type="text" name="author" id="author">
				<p>Введите где лежит миниатюра</p>
					<input type="text" name="img" id="img"><br>
				<p>Выберите категорию заметки</p>
					<select name="cat" id="cat">
<?php
$result = mysqli_query($db,"SELECT id,title FROM categories");
if (!$result) {
	echo "<p>Запрос на выборку данных из базы не прошел. Напишите об этом администратора admin@gmail.com. <br> <b>Код ошибки:</b></p>";
	exit(mysqli_error($db));
}
if (mysqli_num_rows($result)>0) {
	$myrow = mysqli_fetch_array($result);
	do {
		printf("<option value='%s'>%s</option>",$myrow['id'],$myrow['title']);
	} while ($myrow = mysqli_fetch_array($result));
}
else{
	echo "<p>Информация по запросу не может быть извлечена,в таблице нет записей</p>";
	exit();
}
?>
					</select>
				</p>
				<input type="submit" name="submit" id="submit" value="Внести заметку в базу">
			</form>
		</div>
	</div>
	<?php
	include("blocks/footer.php");
	include("blocks/footer_foot.php");
	?>
</body>
</html>