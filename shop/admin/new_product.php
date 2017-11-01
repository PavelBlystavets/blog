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
			<h1>Страница добавления продукта</h1>
			<form action="add_product.php" method="post" name="form1">
			<p class="admin_description">Введите название продукта</p>
			<input class="admin_input" type="text" name="title" id="title">
			<p class="admin_description">Введите краткое описание продукта</p>
			<textarea class="admin_input" name="description" id="description"></textarea>
			<p class="admin_description">Введите полный текст описания продукта</p>
			<textarea class="admin_input" type="text" name="text" id="text"></textarea>
			<p class="admin_description">Введите где лежит миниатюра</p>
			<input class="admin_input" type="text" name="img" id="img">
			<p class="admin_description">Введите имя продукта</p>
			<input class="admin_input" type="text" name="product" id="product">
			<p class="admin_description">Введите цену продукта</p>
			<input class="admin_input" type="text" name="price" id="price">
			<p class="admin_description">Введите количество продукта</p>
			<input class="admin_input" type="text" name="number" id="number">
			<p class="admin_description">Выберите категорию продукта</p>
			<select class="admin_input" name="cat" id="cat">
			<?php
			$result = mysqli_query($db,"SELECT id,title FROM categories_shop");
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
			<p class="admin_description">Выберите подкатегорию продукта</p>
			<select class="admin_input" name="pod_cat" id="pos_cat">
			<?php
			$result = mysqli_query($db,"SELECT id,title FROM pod_cat_shop");
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
			<input type="submit" class="admin_submit" name="submit" id="submit" value="Внести продукт в базу">
		</form>
		</div>
	</div>
</div>
<?php
include ("blocks/footer.php");
?>
</body>
</html>