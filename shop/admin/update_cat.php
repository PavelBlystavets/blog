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
if (isset($_POST['id'])){
	$id = $_POST['id'];
}
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
			<?php 
			if (isset($title))
			{
			$result = mysqli_query($db,"UPDATE categories_shop SET title='$title' WHERE id='$id'");
			if ($result == 'true') 
			{
			echo "<h1>Ваша категория успешно обновлена!</h1>";
			}
			else
			{
			echo "<h1>Ваша категория не обновлена!</h1>";
			}
			}
			else
			{
			echo "<h1>Вы ввели не всю информацию, поэтому категория в базе не может быть обновлена.</h1>";
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