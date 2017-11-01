<?php 
include("lock.php");
include("blocks/db.php");
if (isset($_POST['title'])){
	$title = $_POST['title'];
}
if ($title == ''){
	unset($title);
}
if (isset($_POST['date'])){
	$date = $_POST['date'];
}
if ($date == ''){
	unset($date);
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
if (isset($_POST['author'])){
	$author = $_POST['author'];
}
if ($author == ''){
	unset($author);
}
if (isset($_POST['img'])){
	$img = $_POST['img'];
}
if ($img == ''){
	unset($img);
}
if (isset($_POST['cat'])){
	$cat = $_POST['cat'];
}
if ($cat == ''){
	unset($cat);
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
	if (isset($title) && isset($date) && isset($description) && isset($text) && isset($author) && isset($cat) && isset($img))
	{
	$result = mysqli_query($db,"UPDATE data SET title='$title',date='$date',description='$description',text='$text',author='$author',cat='$cat',img='$img' WHERE id='$id'");
	if ($result == 'true') 
	{
	echo "<h3 class='admin_title'>Ваша заметка успешно обновлена!</p>";
	}
	else
	{
	echo "<h3 class='admin_title'>Ваша заметка не обновлена!</p>";
	}
	}
	else
	{
	echo "<h3 class='admin_title'>Вы запустили данный файл без параметра id и поэтому обновлена заметку невозможно!</p>";
	}
	?>
	</div>
	<?php 
	include ("blocks/footer.php");
	include ("blocks/footer_foot.php");
	?>
</body>
</html>