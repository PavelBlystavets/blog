<?php
$count = 0;
//соединение с сервером баз данных mySQL
$db = mysqli_connect("localhost", "root", "", "blog") or die(mysqli_error($db));
$sql = "SELECT count(*) FROM basket_shop WHERE customer='".session_id()."'";
$result = mysqli_query($db,$sql) or die(mysqli_error($db));
?>