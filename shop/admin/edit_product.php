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
			<h1>Страница редактирования товара</h1>
<?php 
if (!isset($id)) 
{
$result = mysqli_query($db,"SELECT title,id FROM data_shop");
$myrow = mysqli_fetch_array($result);
do
{
printf("<div class='cat_of_goods'><a class='product_pod_cat' href='edit_product.php?id=%s'>%s</a></div>",$myrow["id"],$myrow["title"]);
}
while ($myrow = mysqli_fetch_array($result));
}
else
{
$result = mysqli_query($db,"SELECT * FROM data_shop WHERE id=$id");
$myrow = mysqli_fetch_array($result);
$result2 = mysqli_query($db,"SELECT id,title FROM categories_shop");
$myrow2 = mysqli_fetch_array($result2);
$count = mysqli_num_rows($result2);
echo "<form action='update_product.php' class='admin_input' method='post' name='form1'><p class='admin_description'>Выберите категорию для товара<br><select name='cat'>";
do
{
if ($myrow['cat'] == $myrow2['id']) {
	printf("<option class='admin_input' value='%s' selected>%s</option>",$myrow2["id"],$myrow2["title"]);
}
else{
	printf("<option class='admin_input' value='%s'>%s</option>",$myrow2["id"],$myrow2["title"]);
}
}
while ($myrow2 = mysqli_fetch_array($result2));
echo "</select></p>";
$result3 = mysqli_query($db,"SELECT id,title FROM pod_cat_shop");
$myrow3 = mysqli_fetch_array($result3);
$count2 = mysqli_num_rows($result3);
echo "<form action='update_product.php' class='admin_input' method='post' name='form1'><p class='admin_description'>Выберите родкатегорию для товара<br><select name='pod_cat'>";
do
{
if ($myrow['pod_cat'] == $myrow3['id']) {
	printf("<option value='%s' selected>%s</option>",$myrow3["id"],$myrow3["title"]);
}
else{
printf("<option value='%s'>%s</option>",$myrow3["id"],$myrow3["title"]);
}
}
while ($myrow3 = mysqli_fetch_array($result3));
echo "</select></p>";
print <<<HERE
<form action='update_product.php' method='post' name='form1'>
<p class="admin_description">Введите название товара</p>
<input class="admin_input" type="text" name="title" id="title" value="$myrow[title]">
<p class="admin_description">Введите краткое описание продукта</p>
<textarea class="admin_input" type="text" name="description" id="description">$myrow[description]</textarea>
<p class="admin_description">Введите полный текст описания продукта</p>
<textarea class="admin_input" type="text" name="text" id="text">$myrow[text]</textarea>
<p class="admin_description">Введите где лежит миниатюра</p>
<input class="admin_input" type="text" name="img" id="img" value="$myrow[img]">
<p class="admin_description">Введите имя продукта</p>
<input class="admin_input" type="text" name="product" id="product" value="$myrow[product]">
<p class="admin_description">Введите цену продукта</p>
<input class="admin_input" type="text" name="price" id="price" value="$myrow[price]">
<p class="admin_description">Введите количество продукта</p>
<input class="admin_input" type="text" name="number" id="number" value="$myrow[number]">
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