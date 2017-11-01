<?php 
include("lock.php");
include("blocks/db.php");
if (isset($_POST['id']))
	{$id = $_POST['id'];
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
	if (isset($id))
	{
	$result = mysqli_query($db,"DELETE FROM data WHERE id='$id'");
	if ($result == 'true') 
	{
	echo "<h3 class='admin_title'>Ваша заметка успешно удалена!</p>";
	}
	else
	{
	echo "<h3 class='admin_title'>Ваша заметка не удалена!</p>";
	}
	}
	else
	{
	echo "<h3 class='admin_title'>Вы запустили данный файл без параметра id и поэтому удалить заметка невозможно!</p>";
	}
	?>
	</div>
	<?php 
	include ("blocks/footer.php");
	include ("blocks/footer_foot.php");
	?>
</body>
</html>