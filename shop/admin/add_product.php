<?php 
require "eshop_db.inc.php";
require "eshop_lib.inc.php";
include("lock.php");
if (isset($_POST['title'])){
	$title = $_POST['title'];
}
if ($title == ''){
	unset($title);
}
if (isset($_POST['description'])){
	$description = $_POST['description'];
}
if ($description == ''){
	unset($description);
}
if (isset($_POST['text'])){
	$text = $_POST['text'];
}
if ($text == ''){
	unset($text);
}
if (isset($_POST['img'])){
	$img = $_POST['img'];
}
if ($img == ''){
	unset($img);
}
if (isset($_POST['product'])){
	$product = $_POST['product'];
}
if ($product == ''){
	unset($product);
}
if (isset($_POST['price'])){
	$price = $_POST['price'];
}
if ($price == ''){
	unset($price);
}
if (isset($_POST['number'])){
	$number = $_POST['number'];
}
if ($number == ''){
	unset($number);
}
if (isset($_POST['cat'])){
	$cat = $_POST['cat'];
}
if ($cat == ''){
	unset($cat);
}
if (isset($_POST['pod_cat'])){
	$pod_cat = $_POST['pod_cat'];
}
if ($pod_cat == ''){
	unset($pod_cat);
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<title>Обработчик</title>
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
			<?php 
			if (isset($title) && isset($description) && isset($text) && isset($img) && isset($product) && isset($price) && isset($number) && isset($cat) && isset($pod_cat))
			{
			$result = mysqli_query($db,"INSERT INTO data_shop (title, description, text, img, product, price, number, cat, pod_cat) VALUES ('$title', '$description', '$text', '$img', '$product', $price, $number, $cat, $pod_cat)");
			if ($result == 'true')
			{
			echo "<h1>Ваш товар успешно добавлен!</h1>";
			}
			else
			{
			echo "<h1>Ваш товар не добавлен!</h1>";
			}
			}
			else
			{
			echo "<h1>Вы ввели не всю информацию, поэтому товар в базу не может быть добавлен.</h1>";
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