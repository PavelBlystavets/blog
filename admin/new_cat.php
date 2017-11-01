<?php 
include("lock.php");
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<title>Страница добавления категорий</title>
</head>
<body>
	<?php 
	include ("blocks/header.php");
	include ("blocks/sidebar.php");
	?>	
	<div class="admin_index">
		<h3 class="admin_title">Страница добавления категорий</h3>
		<form action="add_cat.php" method="post" name="form1">
			<p>Введите название категории</p>
				<input type="text" name="title" id="title"><br>
			<input type="submit" name="submit" id="submit" value="Внести категорию в базу">
		</form>
	</div>
	<?php 
	include ("blocks/footer.php");
	include ("blocks/footer_foot.php");
	?>
</body>
</html>