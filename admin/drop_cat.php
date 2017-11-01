<?php 
include("lock.php");
include("blocks/db.php");
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
		if (isset($id))
		{
		$result0 = mysqli_query($db,"SELECT id FROM data WHERE cat='$id'");
		if (mysqli_num_rows($result0) > 0) {
			echo "<h3 class='admin_title'>В категории,которую вы хотите удалить есть заметки,перекиньте их в другие категории</h3>";
		}
		else{
		$result = mysqli_query($db,"DELETE FROM categories WHERE id='$id'");
		if ($result == 'true') 
		{
		echo "<h3 class='admin_title'>Ваша категория успешно удалена!</h3>";
		}
		else
		{
		echo "<h3 class='admin_title'>Ваша категория не удалена!</h3>";
		}
		}
		}
		else
		{
		echo "<h3 class='admin_title'>Вы запустили данный файл без параметра id и поэтому удалить категорию невозможно!</h3>";
		}
?>
	</div>
	<?php 
	include ("blocks/footer.php");
	include ("blocks/footer_foot.php");
	?>
</body>
</html>