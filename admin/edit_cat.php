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
	<h3 class='admin_title'>Редактирование категории</h3>
<?php 
if (!isset($id)) 
{
$result = mysqli_query($db,"SELECT title,id FROM categories");
$myrow = mysqli_fetch_array($result);
do
{
printf("<div class='admin_blok'><a class='admin_link' href='edit_cat.php?id=%s'>%s</a></div>",$myrow["id"],$myrow["title"]);
}
while ($myrow = mysqli_fetch_array($result));
}
else
{
$result = mysqli_query($db,"SELECT * FROM categories WHERE id=$id");
$myrow = mysqli_fetch_array($result);
print <<<HERE
	<form action='update_cat.php' method='post' name='form1'>
	<p>Введите название категории</p>
		<input type="text" name="title" id="title" value="$myrow[title]">
	<input name="id" type="hidden" value="$myrow[id]">
	<input type="submit" name="submit" id="submit" value="Сохранить изменения" class="submit_lesson">
</form>
HERE;
}
?>
	</div>
	<?php 
	include ("blocks/footer.php");
	include ("blocks/footer_foot.php");
	?>
</body>
</html>