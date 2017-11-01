<?php
session_start();
header("Content-Type: text/html; charset=utf-8");
$result = "";
if ($_SERVER["REQUEST_METHOD"]=="POST") {
	if(isset($_SESSION["randStr"])){
		if($_SESSION["randStr"]!=$_POST["str"])
			exit("<p>Вы ввели не правильно капчу.<br><input name='back' type='button' value='Вернуться назад' onclick='javascript:history.back();'></p>");
	}
}
include ("blocks/db.php");
if (isset($_POST['name'])){
	$name = $_POST['name'];
}
if (isset($_POST['mail'])){
	$mail = $_POST['mail'];
}
if (isset($_POST['website'])){
	$website = $_POST['website'];
}
if (isset($_POST['text'])){
	$text = $_POST['text'];
}
if (isset($name)){
	$name = trim($name);
}
else{
	$name = "";
}
if (isset($mail)){
	$mail = trim($mail);
}
else{
	$mail = "";
}
if (isset($website)){
	$website = trim($website);
}
else{
	$website = "";
}
if (isset($text)){
	$text = trim($text);
}
else{
	$text = "";
}
if (empty($name) or empty($mail) or empty($website) or empty($text)){
	exit("<p>Вы ввели не всю информацию,вернитесь назад и заполните все поля.<br><input name='back' type='button' value='Вернуться назад' onclick='javascript:history.back();'></p>");
}
$name = mysqli_real_escape_string($db,(strip_tags(stripslashes(htmlspecialchars($name)))));
$mail = mysqli_real_escape_string($db,(strip_tags(stripslashes(htmlspecialchars($mail)))));
$website = mysqli_real_escape_string($db,(strip_tags(stripslashes(htmlspecialchars($website)))));
$text = mysqli_real_escape_string($db,(strip_tags(stripslashes(htmlspecialchars($text)))));
$address = "darkandsuffer@gmail.com";
$subject = "Новое письмо";
$message = $name."\n".$mail."\n".$website."\n".$text;
mail($address, $subject, $message,"Content-type:text/plain; Charset=utf-8\r\n");
header("Location: contact.php");
?>