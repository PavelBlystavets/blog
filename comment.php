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
if (isset($_POST['author'])){
	$author = $_POST['author'];
}
if (isset($_POST['text'])){
	$text = $_POST['text'];
}
if (isset($_POST['pr'])){
	$pr = $_POST['pr'];
}
if (isset($_POST['sub_com'])){
	$sub_com = $_POST['sub_com'];
}
if (isset($_POST['id'])){
	$id = $_POST['id'];
}
if (isset($sub_com)){
	if (isset($author)){
		$author = trim($author);
	}
	else {
		$author = "";
	}
	if (isset($text)){
		$text = trim($text);
	}
	else {
		$text = "";
	}
	if (empty($author) or empty($text)){
		exit("<p>Вы ввели не всю информацию,вернитесь назад и заполните все поля.<br><input name='back' type='button' value='Вернуться назад' onclick='javascript:history.back();'></p>");
	}
}
$author = mysqli_real_escape_string($db,(strip_tags(stripslashes(htmlspecialchars($author)))));
$text = mysqli_real_escape_string($db,(strip_tags(stripslashes(htmlspecialchars($text)))));
$date = date("Y-m-d");
$result = mysqli_query($db,"INSERT INTO comments (post,author,text,date) VALUES ('$id','$author','$text','$date')");
$address = "darkandsuffer@gmail.com";
$subject = "Новый комментарий на блоге";
$result3 = mysqli_query($db,"SELECT title FROM data WHERE id='$id'");
$myrow3 = mysqli_fetch_array($result3);
$post_title = $myrow3["title"];
$message = "Появился комментарий к заметке - ".$post_title."\nКомментарий добавил(а): ".$author."\nТекст комментария: ".$text."\nСсылка на заметку: http://localhost/phpblog/view_post.php?id=".$id."";
mail($address, $subject, $message,"Content-type:text/plain; Charset=utf-8\r\n");
echo "<html><head>
	<meta http-equiv='Refresh' content='0; URL=view_post.php?id=$id'>
</head></html>";
exit();
?>