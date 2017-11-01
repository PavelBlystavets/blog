<?php 
require "eshop_db.inc.php";
require "eshop_lib.inc.php";
include("lock.php");
if (isset($_POST['title'])){
	$title = $_POST['title'];
}
if ($title == ''){
	unset($title);
}
if (isset($_POST['cat'])){
	$cat = $_POST['cat'];
}
if ($cat == ''){
	unset($cat);
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<title>Обработчик</title>
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
			<?php 
			if (isset($title) && isset($cat))
			{
			$result = mysqli_query($db,"INSERT INTO pod_cat_shop (title, cat) VALUES ('$title','$cat')");
			if ($result == 'true')
			{
			echo "<h1>Ваша подкатегория успешно добавлен!</h1>";
			}
			else
			{
			echo "<h1>Ваша подкатегория не добавлена!</h1>";
			}
			}
			else
			{
			echo "<h1>Вы ввели не всю информацию, поэтому подкатегория в базу не может быть добавлена.</h1>";
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