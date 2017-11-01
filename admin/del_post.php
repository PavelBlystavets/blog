<?php 
include("lock.php");
include("blocks/db.php");
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<title>Страница удаления заметки</title>
</head>
<body>
	<?php 
	include ("blocks/header.php");
	include ("blocks/sidebar.php");
	?>
	<div class="admin_index">
		<h3 class="admin_title">Выберите заметку для удаления</h3>
		<form action="drop_post.php" method="post">
<?php 
$result = mysqli_query($db,"SELECT title,id FROM data");
$myrow = mysqli_fetch_array($result);
do
{
printf("<p><input name='id' type='radio' value='%s'><label> %s</label></p>",$myrow["id"],$myrow["title"]);
}
while ($myrow = mysqli_fetch_array($result));
?>
		<p><input type="submit" name="submit" value="Удалить заметку!!!"></p>
		</form>
	</div>
	<?php 
	include ("blocks/footer.php");
	include ("blocks/footer_foot.php");
	?>
</body>
</html>