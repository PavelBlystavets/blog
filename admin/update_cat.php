<?php 
include("lock.php");
include("blocks/db.php");
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
	$result = mysqli_query($db,"UPDATE categories SET title='$title' WHERE id='$id'");
	if ($result == 'true') 
	{
	echo "<h3 class='admin_title'>Ваша категория успешно обновлена!</h3>";
	}
	else
	{
	echo "<h3 class='admin_title'>Ваша категория не обновлена!</h3>";
	}
	}
	else
	{
	echo "<h3 class='admin_title'>Вы ввели не всю информацию, поэтому категория в базе не может быть обновлена.</h3>";
	}
	?>
	</div>
	<?php 
	include ("blocks/footer.php");
	include ("blocks/footer_foot.php");
	?>
</body>
</html>