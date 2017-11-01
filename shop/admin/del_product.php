<?php
	require "eshop_db.inc.php";
	require "eshop_lib.inc.php";
	include("lock.php");
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
			<h1>Выберите товар для удаления</h1>
			<form action="drop_product.php" method="post">
			<?php 
			$result = mysqli_query($db,"SELECT title,id FROM data_shop");
			$myrow = mysqli_fetch_array($result);
			do
			{
			printf("<p><input name='id' type='radio' value='%s'><label> %s</label></p>",$myrow["id"],$myrow["title"]);
			}
			while ($myrow = mysqli_fetch_array($result));
			?>
			<input type="submit" name="submit" value="Удалить товар!!!" class="admin_submit">
		</form>
		</div>
	</div>
</div>
<?php
include ("blocks/footer.php");
?>
</body>
</html>