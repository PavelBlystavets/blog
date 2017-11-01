<?php 
session_start();
require "eshop_db.inc.php";
if (isset($_POST['submit_s'])) {
	$submit_s = $_POST['submit_s'];
}
if (isset($_POST['search'])) {
	$search = $_POST['search'];
}
if (isset($submit_s)) {
	if (empty($search)  or strlen($search) < 3){
		exit("<p>Поисковый запрос не введен, либо он менее 3-х символов</p>");
	}
	else {
		$search = trim(mysqli_real_escape_string($db,(strip_tags(stripslashes(htmlspecialchars($search))))));
	}
}
else {
	exit("<p>Вы обратились к файлу без необходимых параметров</p>");
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<title><?php echo "Заметки по запросу - $search"; ?></title>
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
		<div class="conteiner">
		<?php
		$result = mysqli_query($db,"SELECT * FROM data_shop WHERE MATCH(description) AGAINST('$search') OR MATCH(title) AGAINST('$search') OR MATCH(product) AGAINST('$search')");
		if (!$result) {
			echo "<p>Запрос на выборку данных из базы не прошел. Напишите об этом администратора darkandsuffer@gmail.com. <br> <b>Код ошибки:</b></p>";
			exit(mysqli_error($db));
		}
		if (mysqli_num_rows($result)>0) {
			$myrow = mysqli_fetch_array($result);
		}
		else{
			echo "<p>Информация по Вашему запросу на блоге не найдена.</p>";
			exit();
		}
		do{
		printf("		
				<div class='product'>
					<div class='product_head'>%s</div>
					<img src='%s' class='product_img'>
					<div class='product_discripion'>
						<p class='product_name'>%s</p>
						<p class='product_price'>€ %s,-</p>
						<p class='product_short_discripion'>%s</p>
						<div class='product_form'>
						<a href='view_product.php?id=%s' class='product_view'>Позырить</a>
						<a href='add2basket.php?id=%s' class='product_add'>Добавить</a>
						</div>					
					</div>
				</div>
				",$myrow['title'],$myrow['img'],$myrow['product'],$myrow['price'],$myrow['description'],$myrow['id'],$myrow['id']);
		}
		while ($myrow = mysqli_fetch_array($result));
		?>
		</div>
	</div>
</div>
<?php 
include ("blocks/footer.php");
?>
</body>
</html>