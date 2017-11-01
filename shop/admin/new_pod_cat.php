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
			<h1>Страница добавления подкатегорий</h1>
			<form action="add_pod_cat.php" method="post" name="form1">
				<p class="admin_description">Введите название категории</p>
				<input class="admin_input" type="text" name="title" id="title">
				<p class="admin_description">Выберите категорию подкатегории</p>
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