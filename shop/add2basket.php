<?php
	// запуск сессии
	session_start();
	// подключение библиотек
	require "eshop_db.inc.php";
	require "eshop_lib.inc.php";
	$customer = session_id();
	$id = clearData($_GET["id"],"i");
	$sql = "SELECT goodsid,quantity FROM basket_shop WHERE customer='$customer'";
	$result = mysqli_query($db,$sql) or die(mysqli_error($db));
	$row = mysqli_fetch_array($result);
	$quantity = clearData($_POST["quantity"],"i");
	$datetime = time();
	$sql3 = "SELECT number FROM data_shop WHERE id='$id'";
	$result3 = mysqli_query($db,$sql3) or die(mysqli_error($db));
	$row3 = mysqli_fetch_array($result3);
	if($row3['number'] == 0){
		$quantity = 0;
	}
	elseif ($quantity==0){
		exit(header('Location: ' . $_SERVER['HTTP_REFERER']));
	}
	elseif ($id == $row['goodsid']) {
		$quantity = $row['quantity'] + clearData($_POST["quantity"],"i");
		add2basket($customer, $id, $quantity, $datetime);
		$sql2 = "DELETE FROM basket_shop WHERE (customer='$customer' AND goodsid=$id AND quantity!=$quantity)";
		mysqli_query($db,$sql2) or die(mysqli_error($db));
	}
	else{
		add2basket($customer, $id, $quantity, $datetime);
	}
	header('Location: ' . $_SERVER['HTTP_REFERER']);
?>