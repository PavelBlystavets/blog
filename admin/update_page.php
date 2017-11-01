<?php 
include("lock.php");
include("blocks/db.php");
if (isset($_POST['title'])){
	$title = $_POST['title'];
}
if ($title == ''){
	unset($title);
}
if (isset($_POST['meta_d'])){
	$meta_d = $_POST['meta_d'];
}
if (isset($_POST['text'])){
	$text = $_POST['text'];
}
if ($text == '')
	{unset($text);
}
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
	include("blocks/header.php");
	include("blocks/sidebar.php"); 
	?>	
	<div class="admin_index">
<?php 
if (isset($title) && isset($text))
{
$result = mysqli_query($db,"UPDATE settings SET title='$title',text='$text' WHERE id='$id'");
if ($result == 'true') 
{
echo "<h3 class='admin_title'>Ваша страница успешно обновлена!</h3>";
}
else
{
echo "<h3 class='admin_title'>Ваша страница не обновлена!</h3>";
}
}
else
{
echo "<h3 class='admin_title'>Вы ввели не всю информацию, поэтому данные этой страницы в базе не могут быть обновлены.</h3>";
}
?>
	</div>
	<?php
	include("blocks/footer.php");
	include ("blocks/footer_foot.php");
	?>
</body>
</html>