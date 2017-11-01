<?php 
include("lock.php");
include("blocks/db.php");
if (isset($_POST['title'])){
	$title = $_POST['title'];
}
if ($title == ''){
	unset($title);
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
	include ("blocks/sidebar.php");
	?>	
	<div class="admin_index">
	<?php 
	if (isset($title))
	{
	$result = mysqli_query($db,"INSERT INTO categories (title) VALUES ('$title')");
	if ($result == 'true')
	{
	echo "<h3 class='admin_title'>Ваша категория успешно добавлен!</h3>";
	}
	else
	{
	echo "<h3 class='admin_title'>Ваша категория не добавлена!</h3>";
	}
	}
	else
	{
	echo "<h3 class='admin_title'>Вы ввели не всю информацию, поэтому категория в базу не может быть добавлена.</h3>";
	}
	?>
	</div>
	<?php 
	include ("blocks/footer.php");
	include ("blocks/footer_foot.php");
	?>
</body>
</html>