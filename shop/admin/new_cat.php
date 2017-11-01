<?php
	require "eshop_db.inc.php";
	require "eshop_lib.inc.php";
	include("lock.php");
?>
<html>
<head>
	<title>Каталог товаров</title>
	<link rel="stylesheet" href="style.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
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
			<form action="add_cat.php" method="post" name="form1">
			<p class="admin_description">Введите название категории</p>
				<input class="admin_input" type="text" name="title" id="title">
			<input type="submit" class="admin_submit" name="submit" id="submit" value="Внести категорию в базу">
		</form>
		</div>
	</div>
</div>
<?php
include ("blocks/footer.php");
?>
</body>
</html>