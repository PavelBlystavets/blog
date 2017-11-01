<?php 
include("lock.php");
include("blocks/db.php");
if (isset($_GET['id'])) {$id = $_GET['id'];}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<title>Страница изменения текстов</title>
</head>
<body>
	<?php 
	include("blocks/header.php");
	include("blocks/sidebar.php");
	?>	
	<div class="admin_index">
	<h3 class="admin_title">Выберите страницу для редактирования</h3>
<?php 
if (!isset($id)) 
{
$result = mysqli_query($db,"SELECT title,id FROM settings");
$myrow = mysqli_fetch_array($result);
do
{
printf("<div class='admin_blok'><a class='admin_link' href='edit_page.php?id=%s'>%s</a></div>",$myrow["id"],$myrow["title"]);
}
while ($myrow = mysqli_fetch_array($result));
}
else
{
$result = mysqli_query($db,"SELECT * FROM settings WHERE id=$id");
$myrow = mysqli_fetch_array($result);
print <<<HERE
<form action="update_page.php" method="post" name="form_update_page" class="form_update_page">
	<p>Введите название страницы</p>
		<input type="text" name="title" id="title" value="$myrow[title]">
	<p>Введите полный текст страницы с тэгами</p>
		<textarea type="text" name="text" id="text">$myrow[text]</textarea>
	<input name="id" type="hidden" value="$myrow[id]">
	<input type="submit" name="submit" id="submit" value="Сохранить изменения">
</form>
HERE;
}
?>
		</div>
	</div>
	<?php
	include("blocks/footer.php");
	include("blocks/footer_foot.php");
	?>
</body>
</html>