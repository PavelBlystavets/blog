<?php 
require "eshop_db.inc.php";
require "eshop_lib.inc.php";
include("lock.php");
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
?>
<div class="content">
	<?php 
		include ("blocks/content_head.php");
	?>
	<div class="content_parts">
		<?php 
			include ("blocks/sidebar.php");
		?>
		<div class="conteiner_admin">
			<h1>Страница добавления категорий</h1>
<?php 
if (!isset($id)) 
{
$result = mysqli_query($db,"SELECT title,id FROM categories_shop");
$myrow = mysqli_fetch_array($result);
do
{
printf("<div class='cat_of_goods'><a class='product_pod_cat' href='edit_cat.php?id=%s'>%s</a></div>",$myrow["id"],$myrow["title"]);
}
while ($myrow = mysqli_fetch_array($result));
}
else
{
$result = mysqli_query($db,"SELECT * FROM categories_shop WHERE id=$id");
$myrow = mysqli_fetch_array($result);
print <<<HERE
<form action='update_cat.php' method='post' name='form1'>
<p class="admin_description">Введите название категории</p>
	<input class="admin_input" type="text" name="title" id="title" value="$myrow[title]">
<input name="id" type="hidden" value="$myrow[id]">
<input type="submit" name="submit" id="submit" value="Сохранить изменения" class="admin_submit">
</form>
HERE;
}
?>
		</div>
	</div>
</div>
<?php
include ("blocks/footer.php");
?>
</body>
</html>