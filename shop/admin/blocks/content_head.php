<?php 
$count = 0;
$sql = "SELECT count(*) FROM basket_shop WHERE customer='".session_id()."'";
$result = mysqli_query($db,$sql) or die(mysql_error($db));
$row = mysqli_fetch_row($result);
$count = $row[0];
?>
<div class="content_head">
	<form action="" class="login_form">
		<input type="text" placeholder="Username" class="login_user">
		<input type="password" placeholder="Password" class="login_user">
		<input type="submit" value="Log in" class="login_submit">
		<input type="submit" value="Registration" class="login_registration">
	</form>
	<div class="basket">
		<p class="basket_goodes">В вашей корзине <?=$count?> продуктов!</p>
		<a href="basket.php" class="view_basket">Позырить корзину</a>
		<a href="orderform.php" class="save_basket">Спасти корзину</a>
	</div>
</div>