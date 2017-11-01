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
		
		<div class="conteiner_order">
			<h2>Поступившие заказы:</h2>
				
				<?php
					$result = getOrders();
					foreach ($result as $order) {
				?>
			<div class="order_clien_list">
				<p><b>Заказчик</b>: <?php echo $order["name"] ?></p>
				<p><b>Email</b>: <?php echo $order["email"] ?></p>
				<p><b>Телефон</b>: <?php echo $order["phone"] ?></p>
				<p><b>Адрес доставки</b>: <?php echo $order["address"] ?></p>
				<p><b>Дата размещения заказа</b>: <?php echo date("d.m.y H:i", $order["datetime"]) ?></p>
			</div>
			<h3>Купленные товары:</h3>
			<?php
				$i = 1;
				$sum = 0;
				foreach ($order["goods"] as $item){
			?>
			<div class='product_order'>
				<div class='product_head'><?=$item["title"]?></div>
				<img src='<?=$item["img"]?>' class='product_img'>
				<div class='product_discripion'>
					<p class='product_name'><?=$item["product"]?></p>
					<p class='product_price'>€ <?=$item["price"]?>,-</p>
					<p class='product_short_discripion'><?=$item["description"]?></p>
					<p class="product_number">Количество: <?=$item["quantity"]?></p>			
				</div>
			</div>
			<?php
			$i++;
			$sum += $item["price"]*$item["quantity"];
			}
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