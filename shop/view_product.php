<?php 
session_start();
include ("blocks/db.php");
if (isset($_GET['id'])){
	$id = $_GET['id'];
}
if (!isset($id)){
	$id = 1;
}
if (!preg_match("|^[\d]+$|", $id)) {
	exit("<p>Неверный формат запроса! Проверте URL!</p>");
}
$result = mysqli_query($db,"SELECT * FROM data_shop WHERE id='$id'");
if (!$result) {
	echo "<p>Запрос на выборку данных из базы не прошел. Напишите об этом администратора admin@gmail.com. <br> <b>Код ошибки:</b></p>";
	exit(mysqli_error($db));
}
else{
	$myrow = mysqli_fetch_array($result);
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<title></title>
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
		<div class="view_conteiner">
		<?php
		printf("<h1 class='view_product_title'>%s</h1>
				<div class='view_product_img_block'>
					<img src='%s' class='view_product_img'>
				</div>
				<div class='view_product_discription'>
					<h2 class='view_product_name'>%s</h2>
					<p class='view_product_text'>%s</p>
					<p class='view_product_price'>Цена: %s грн.</p>
					<p class='view_product_number'>Количество: %s</p>
					<form action='add2basket.php?id=%s' method='post'>
						<input type='submit' value='Добавить' class='product_view_add_bask'>
						<input type='text' class='product_quantity_add' value='1' name='quantity'>
					</form>
			",$myrow['title'],$myrow['img'],$myrow['product'],$myrow['text'],$myrow['price'],$myrow['number'],$myrow['id']);
		?>
		</div>
	</div>
</div>
<?php 
	include ("blocks/footer.php");
?>
</body>
</html>