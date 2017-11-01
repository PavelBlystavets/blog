<?php
// запуск сессии
session_start();
// подключение библиотек
require "eshop_db.inc.php";
require "eshop_lib.inc.php";
if (isset($_POST["name"])){
	$name = clearData($_POST["name"],"sf");
}
else{
	$name = "";
}
if (isset($_POST["email"])){
	$email = clearData($_POST["email"],"sf");
}
else{
	$email = "";
}
if (isset($_POST["phone"])){
	$phone = clearData($_POST["phone"],"sf");
}
else{
	$phone = "";
}
if (isset($_POST["address"])){
	$address = clearData($_POST["address"],"sf");
}
else{
	$address = "";
}
if (empty($name) or empty($email) or empty($phone) or empty($address)){
	exit("<p>Вы ввели не всю информацию,вернитесь назад и заполните все поля.<br><input name='back' type='button' value='Вернуться назад' onclick='javascript:history.back();'></p>");
}
$customer = session_id();
$datetime = time();
$order = "$name|$email|$phone|$address|$customer|$datetime\n";
file_put_contents(ORDERS_LOG,$order,FILE_APPEND);
?>
<html>
<head>
	<title>Сохранение данных заказа</title>
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
		<div class="order_conteiner">
			<p class="order_booking">Ваш заказ принят.</p>
			<?php
				$goods = myBasket();
				$i = 1;
				$sum = 0;
				foreach ($goods as $item) {
			?>
			<p class="order_booking">Вы заказали <?=$item["title"]?></p>
			<?php
				$i++;
				$sum += $item["price"]*$item["quantity"];
				$goodsid = $item["goodsid"];
				$sql = "SELECT number FROM data_shop WHERE id='$goodsid'";
				$result = mysqli_query($db,$sql) or die(mysqli_error($db));
				$row = mysqli_fetch_array($result);
				$number = $row['number'] - $item["quantity"];
				$sql3 = "UPDATE data_shop SET number=$number WHERE id='$goodsid'";
				mysqli_query($db,$sql3) or die(mysqli_error($db));
				}
			?>
			<p class="order_booking">Сумма заказа <?=$sum?> зайцев</p>
			<p class="order_booking">В ближайшее время с вами свяжется наш менеджер...а может и не свяжется,тут как повезет</p>
			<p><a href="index.php" class='order_product'>Каталог товаров</a></p>
		</div>
	</div>
</div>
<?php
resave($datetime);
include ("blocks/footer.php");
?>
</body>
</html>