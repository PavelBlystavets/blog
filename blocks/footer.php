<footer>
	<div class="footer_block">
		<h3 class="footer_title">Ссылки</h3>
		<div class="footer_info">
			<a href="#" class="footer_info_link">Интернет магазин</a>
			<a href="#" class="footer_info_link">Форум</a>
			<a href="view_cat.php" class="footer_info_link">Блог</a>
			<a href="index.php">Главная</a>
		</div>
	</div>
	<div class="footer_block">
		<h3 class="footer_title">Какой-то текст</h3>
		<div class="footer_info_center">
			Учебный сайт,создананый с помощью PHP,с админкой,поиском,подпиской 
		</div>
	</div>
	
	<div class="footer_block">
		<h3 class="footer_title">Последние комментарии</h3>
		<div class="footer_info">
			<?php
			$result3 = mysqli_query($db,"SELECT text FROM comments ORDER BY date DESC, id DESC LIMIT 4");
			if (mysqli_num_rows($result3) > 0){
			$myrow3 = mysqli_fetch_array($result3);
			do{
				printf("<p class='footer_comment'>%s</p>",$myrow3["text"]);
			}
			while ($myrow3 = mysqli_fetch_array($result3));
			}
			?>
		</div>
	</div>
</footer>