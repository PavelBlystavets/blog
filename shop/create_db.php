<?php
// Создание структуры Базы Данных гостевой книги
	define("DB_HOST", "localhost");
	define("DB_LOGIN", "root");
	define("DB_PASSWORD", "");

$db = mysqli_connect(DB_HOST, DB_LOGIN, DB_PASSWORD) or die(mysqli_error());

$sql = 'CREATE DATABASE eshop';
mysqli_query($db,$sql) or die(mysqli_error($db));
mysqli_select_db($db,'eshop') or die(mysqli_error($db));
$sql = "
CREATE TABLE catalog (
	id int(11) NOT NULL auto_increment,
	author varchar(50) NOT NULL default '',
	title varchar(50) NOT NULL default '',
	pubyear int(4) NOT NULL default 0,
	price int(11) NOT NULL default 0,
	PRIMARY KEY (id)
)";
mysqli_query($db,$sql) or die(mysqli_error($db));
$sql = "
CREATE TABLE basket (
	id int(11) NOT NULL auto_increment,
	customer varchar(32) NOT NULL default '',
	goodsid int(11) NOT NULL default 0,
	quantity int(4) NOT NULL default 0,
	datetime int(11) NOT NULL default 0,
	PRIMARY KEY (id)
)";
mysqli_query($db,$sql) or die(mysqli_error($db));
$sql = "
CREATE TABLE orders (
	id int(11) NOT NULL auto_increment,
	author varchar(50) NOT NULL default '',
	title varchar(50) NOT NULL default '',
	pubyear int(4) NOT NULL default 0,
	price int(11) NOT NULL default 0,
	customer varchar(32) NOT NULL default '',
	quantity int(4) NOT NULL default 0,
	datetime int(11) NOT NULL default 0,
	PRIMARY KEY (id)
)";
mysqli_query($db,$sql) or die(mysqli_error($db));

mysqli_close($db);

print '<p>Структура базы данных успешно создана!</p>';
?>
