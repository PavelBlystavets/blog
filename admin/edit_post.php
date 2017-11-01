<?php 
include("lock.php");
include("blocks/db.php");
if (isset($_GET['id'])){
	$id = $_GET['id'];
}
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<title>Страница редактирования заметки</title>
</head>
<body>
	<?php 
	include ("blocks/header.php");
	include ("blocks/sidebar.php");
	?>	
	<div class="admin_index">
	<h3 class="admin_title">Редактирование заметки</h3>
<?php 
if (!isset($id)) 
{
$result = mysqli_query($db,"SELECT title,id FROM data");
$myrow = mysqli_fetch_array($result);
do
{
printf("<div class='admin_blok'><a class='admin_link' href='edit_post.php?id=%s'>%s</a></div>",$myrow["id"],$myrow["title"]);
}
while ($myrow = mysqli_fetch_array($result));
}
else
{
$result = mysqli_query($db,"SELECT * FROM data WHERE id=$id");
$myrow = mysqli_fetch_array($result);
$result2 = mysqli_query($db,"SELECT id,title FROM categories");
$myrow2 = mysqli_fetch_array($result2);
$count = mysqli_num_rows($result2);
echo "<form action='update_post.php' method='post' name='form1'><p>Выберите категорию для заметки<br><select name='cat'>";
do
{
if ($myrow['cat'] == $myrow2['id']) {
	printf("<option value='%s' selected>%s</option>",$myrow2["id"],$myrow2["title"]);
}
else{
printf("<option value='%s'>%s</option>",$myrow2["id"],$myrow2["title"]);
}
}
while ($myrow2 = mysqli_fetch_array($result2));
echo "</select></p>";
print <<<HERE
	<p>Введите название заметки</p>
		<input type="text" name="title" id="title" value="$myrow[title]">
	<p>Введите дату добавления заметки</p>
		<input type="text" name="date" id="date" value="$myrow[date]">
	<p>Введите краткое описание заметки с тэгами абзацев</p>
		<textarea type="text" name="description" id="description">$myrow[description]</textarea>
	<p>Введите полный текст заметки с тэгами</p>
		<textarea type="text" name="text" id="text">$myrow[text]</textarea>
	<p>Введите автора заметки</p>
		<input type="text" name="author" id="author" value="$myrow[author]">
	<p>Введите где лежит миниатюра</p>
		<input type="text" name="img" id="img" value="$myrow[img]"><br>
	<input name="id" type="hidden" value="$myrow[id]">
	<input type="submit" name="submit" id="submit" value="Сохранить изменения" class="submit_lesson">
</form>
HERE;
}
?>
		</div>
	</div>
	<?php 
	include ("blocks/footer.php");
	include ("blocks/footer_foot.php");
	?>
</body>
</html>