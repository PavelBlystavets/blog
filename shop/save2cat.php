<?php
// подключение библиотек
require "eshop_db.inc.php";
require "eshop_lib.inc.php";
//Получение и фильтрация данных из формы
if (isset($_POST["description"]))
$description = clearData($_POST["description"]);
if (isset($_POST["title"]))
$title = clearData($_POST["title"]);
if (isset($_POST["product"]))
$product = clearData($_POST["product"]);
if (isset($_POST["price"]))
$price = clearData($_POST["price"],"i");
//сохранение нового товара в БД
save($description,$title,$product,$price);
//Переадресация пользователя на страницу добавления нового товара
header("Location: add2cat.php");
?>