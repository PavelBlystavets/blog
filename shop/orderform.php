<?php
	// запуск сессии
	session_start();
	// подключение библиотек
	require "eshop_db.inc.php";
	require "eshop_lib.inc.php";
?>
<html>
<head>
	<title>Форма оформления заказа</title>
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
			<form action="saveorder.php" method="post" class="saveorder">
				<p>Заказчик:</p>
				<input type="text" name="name" class="saveorder_input">
				<p>Email заказчика:</p>
				<input type="text" name="email" class="saveorder_input">
				<p>Телефон для связи:</p>
				<input type="text" name="phone" class="saveorder_input">
				<p>Адрес доставки:</p>
				<textarea name="address" class="saveorder_textarea"></textarea>
				<input type="submit" value="Заказать" class="saveorder_submit">
			</form>
		</div>
	</div>
	<?php
		include ("blocks/footer.php");
	?>
</body>
</html>