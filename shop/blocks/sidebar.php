<div class="sidebar">
	<div class="search">
		<div class="search_head">Поиск штук</div>
		<form action="search.php" class="search_form" method="post">
			<input type="text" class="search_input" name="search">
			<input type="submit" class="search_submit" value="Поиск" name="submit_s">
		</form>
	</div>
	<div class="cat_of_goods">
		<?php 
			include ("blocks/db.php");
			$result2 = mysqli_query($db,"SELECT id,title FROM categories_shop");
			if (!$result2) {
				echo "<p>Запрос на выборку данных из базы не прошел. Напишите об этом администратора admin@gmail.com. <br> <b>Код ошибки:</b></p>";
				exit(mysqli_error($db));
			}
			
			if (mysqli_num_rows($result2)>0) {
				$myrow2 = mysqli_fetch_array($result2);
			do{
				$id = $myrow2["id"];
				printf("<a class='product_cat' href='index.php?cat=%s'>%s</a>",$myrow2["id"],$myrow2["title"]);
				$result3 = mysqli_query($db,"SELECT id,title FROM pod_cat_shop WHERE cat=$id");
				if (!$result3) {
					echo "<p>Запрос на выборку данных из базы не прошел. Напишите об этом администратора admin@gmail.com. <br> <b>Код ошибки:</b></p>";
					exit(mysqli_error($db));
				}
				if (mysqli_num_rows($result3)>0) {
					$myrow3 = mysqli_fetch_array($result3);
				do{
					printf("<a class='product_pod_cat' href='categories.php?pod_cat=%s'>%s</a>",$myrow3["id"],$myrow3["title"]);
				}
				while ($myrow3 = mysqli_fetch_array($result3));
				}
				else{
					exit();
				}
			}
			while ($myrow2 = mysqli_fetch_array($result2));
			}
			else{
				echo "<p>Информация по запросу не может быть извлечена,в таблице нет записей</p>";
				exit();
			}
		?>
	</div>
</div>
