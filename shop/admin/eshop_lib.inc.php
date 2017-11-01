<?php
//фильтрация данных
function clearData($data, $type="s"){
	global $db;
	switch ($type) {
		case "s":
			return mysqli_real_escape_string($db,trim(strip_tags($data)));
			break;
		case "i":
			return (int)$data;
			break;
		case 'sf':
			return trim(strip_tags($data));
			break;
	}
}
//сохраняет новый товар в таблицу catalog
function save($description,$title,$product,$price){
	$sql = "INSERT INTO data_shop (description,title,product,price) VALUES ('$description','$title',$product,$price)";
	global $db;
	mysqli_query($db,$sql) or die(mysqli_error($db));
}
//Конвертируем данные в массив
function db2Array($data){
	$arr = array();
	while ($row = mysqli_fetch_assoc($data)) {
		$arr[] = $row;
	}
	return $arr;
}
//Возвращение всего содержимого каталога товаров
function selectAll(){
	if (isset($_GET['cat'])){
	$cat = $_GET['cat'];
	}
	if (!isset($cat)){
		$cat = 1;
	}
	if (!preg_match("|^[\d]+$|", $cat)) {
		exit("<p>Неверный формат запроса! Проверте URL!</p>");
	}
	$sql = "SELECT * FROM data_shop WHERE cat='$cat'";
	global $db;
	$result = mysqli_query($db,$sql) or die(mysqli_error($db));
	return db2Array($result);
}

function selectAllPod(){
	if (isset($_GET['pod_cat'])){
	$pod_cat = $_GET['pod_cat'];
	}
	if (!isset($pod_cat)){
		$pod_cat = 1;
	}
	if (!preg_match("|^[\d]+$|", $pod_cat)) {
		exit("<p>Неверный формат запроса! Проверте URL!</p>");
	}
	$sql = "SELECT * FROM data_shop WHERE pod_cat='$pod_cat'";
	global $db;
	$result = mysqli_query($db,$sql) or die(mysqli_error($db));
	return db2Array($result);
}

function add2basket($customer,$goodsid,$quantity,$datetime){
	$sql = "INSERT INTO basket_shop (customer,goodsid,quantity,datetime) VALUES ('$customer',$goodsid,$quantity,$datetime)";
	global $db;
	mysqli_query($db,$sql) or die(mysqli_error($db));
}

function myBasket(){
	$sql = "SELECT description,title,product,price,img,basket_shop.id,goodsid,customer,quantity FROM data_shop,basket_shop WHERE customer='".session_id()."' AND data_shop.id=basket_shop.goodsid";
	global $db;
	$result = mysqli_query($db,$sql) or die(mysqli_error($db));
	return db2Array($result);
}

function basketDel($id){
	$sql = "DELETE FROM basket_shop WHERE id=$id";
	global $db;
	mysqli_query($db,$sql) or die(mysqli_error($db));
}
	
function resave($datetime){
	$goods = myBasket();
	foreach ($goods as $item) {
		$sql = "INSERT INTO orders (description,title,product,price,customer,quantity,datetime,img) VALUES ('{$item["description"]}','{$item["title"]}','{$item["product"]}',{$item["price"]},'{$item["customer"]}',{$item["quantity"]},$datetime,'{$item["img"]}')";
		global $db;
		mysqli_query($db,$sql) or die(mysqli_error($db));
	}
	$sql = "DELETE FROM basket_shop WHERE customer='".session_id()."'";
	global $db;
	mysqli_query($db,$sql) or die(mysqli_error($db));
}

function getOrders(){
	if (!file_exists(ORDERS_LOG))
		return false;
	$allorders = array();
	$orders = file(ORDERS_LOG);
	foreach ($orders as $order) {
		list($name,$email,$phone,$address,$customer,$datetime) = explode("|", $order);
		$orderinfo = array();
			$orderinfo["name"] = $name;
			$orderinfo["email"] = $email;
			$orderinfo["phone"] = $phone;
			$orderinfo["address"] = $address;
			$orderinfo["datetime"] = $datetime*1;
			$sql = "SELECT * FROM orders WHERE customer='$customer' AND datetime=".$orderinfo["datetime"];
			global $db;
			$result = mysqli_query($db,$sql) or die(mysqli_error($db));
			$orderinfo["goods"] = db2Array($result);
		$allorders[] = $orderinfo;
	}
	return $allorders;
}
?>