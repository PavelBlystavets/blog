<?php
	// запуск сессии
	session_start();
	// подключение библиотек
	require "eshop_db.inc.php";
	require "eshop_lib.inc.php";
?>
<html>
<head>
	<link rel="stylesheet" href="style.css">
	<title>Корзина пользователя</title>
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
		<div class="conteiner_basket">
				<?php
				$goods = myBasket();
				$i = 1;
				$sum = 0;
				foreach ($goods as $item) {
				$id = $item["goodsid"];
				$sql3 = "SELECT number FROM data_shop WHERE id='$id'";
				$result3 = mysqli_query($db,$sql3) or die(mysqli_error($db));
				$row3 = mysqli_fetch_array($result3);
				if ($item["quantity"] > $row3['number']){
					$item["quantity"] = $row3['number'];
				}
			?>
			<div class='product'>
				<div class='product_head'><?=$item["title"]?></div>
				<img src='<?=$item["img"]?>' class='product_img'>
				<div class='product_discripion'>
					<p class='product_name'><?=$item["product"]?></p>
					<p class='product_price'>€ <?=$item["price"]?>,-</p>
					<p class='product_short_discripion'><?=$item["description"]?></p>
					<div class='product_form'>
						<a href='view_product.php?id=<?=$item["goodsid"]?>' class='product_view'>Позырить</a>
						<form action="delete_from_basket.php?id=<?=$item['id']?>" method="post">
							<input type="submit" value="Удалить" class="product_add_bask">
						</form>
						<div class="basket_quantity"><?=$item["quantity"]?></div>
					</div>					
				</div>
			</div>
			<?php
			$i++;
			$sum += $item["price"]*$item["quantity"];
			}
			?>
		<div class="place_order">
		<p>Всего товаров в корзине на сумму: <?=$sum?> €</p>
			<input type="button" value="Оформить заказ!" onClick="location.href='orderform.php'" class="place_order_input">
		</div>
        </div>
	</div>
	
</div>
<?php
include ("blocks/footer.php");
?>
</body>
</html>







