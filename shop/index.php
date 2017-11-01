<?php
	// запуск сессии
	session_start();
	// подключение библиотек
	require "eshop_db.inc.php";
	require "eshop_lib.inc.php";
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
		<div class="conteiner">
		<?php
		$goods = selectAll();
		foreach ($goods as $item) {
		?>
			<div class='product'>
				<div class='product_head'><?=$item["title"]?></div>
				<img src='<?=$item["img"]?>' class='product_img'>
				<div class='product_discripion'>
					<p class='product_name'><?=$item["product"]?></p>
					<p class='product_price'><?=$item["price"]?> грн.</p>
					<p class='product_short_discripion'><?=$item["description"]?></p>
					<p class="product_number">Количество: <?=$item["number"]?></p>
					<div class='product_form'>
						<a href='view_product.php?id=<?=$item["id"]?>' class='product_view'>Позырить</a>
						<form action="add2basket.php?id=<?=$item["id"]?>" method="post">
							<input type="submit" value="Добавить" class="product_add_bask">
							<input type="text" class="product_quantity_add" value="1" name="quantity">
						</form>
					</div>					
				</div>
			</div>
			<?php
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