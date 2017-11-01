<div class="sidebar">
	<h3>Категории</h3>
	<div class="sidebar_nav">
	<?php 
	include ("blocks/db.php");
	$result2 = mysqli_query($db,"SELECT * FROM categories");
	if (!$result2) {
		echo "<p>Запрос на выборку данных из базы не прошел. Напишите об этом администратора admin@gmail.com. <br> <b>Код ошибки:</b></p>";
		exit(mysqli_error());
	}
	if (mysqli_num_rows($result2)>0) {
		$myrow2 = mysqli_fetch_array($result2);
	do{
	printf("<a class='sidebar_menu' href='cat-%s.php'>%s</a>",$myrow2["id"],$myrow2["title"]);
	}
	while ($myrow2 = mysqli_fetch_array($result2));
	}
	else{
		echo "<p>Информация по запросу не может быть извлечена,в таблице нет записей</p>";
		exit();
	}
	?>
	</div>
	<h3>Последние заметки</h3>
	<div class="sidebar_nav">
		<?php 
	$result3 = mysqli_query($db,"SELECT id,title FROM data ORDER BY date DESC, id DESC LIMIT 5");
if (!$result3) {
	echo "<p>Запрос на выборку данных из базы не прошел. Напишите об этом администратора admin@gmail.com. <br> <b>Код ошибки:</b></p>";
	exit(mysqli_error());
}
if (mysqli_num_rows($result3)>0) {
	$myrow3 = mysqli_fetch_array($result3);
	do{
		printf("<a class='sidebar_menu' href='post-%s.php'>%s</a>",$myrow3["id"],$myrow3["title"]);
	}
	while ($myrow3 = mysqli_fetch_array($result3));
}
?>
	</div>
	<h3>Архив</h3>
	<div class="sidebar_nav">
	<?php 
$result4 = mysqli_query($db,"SELECT DISTINCT left(date,7) AS month FROM data ORDER BY month DESC");
if (!$result4) {
	echo "<p>Запрос на выборку данных из базы не прошел. Напишите об этом администратора admin@gmail.com. <br> <b>Код ошибки:</b></p>";
	exit(mysqli_error());
}
if (mysqli_num_rows($result4)>0) {
	$myrow4 = mysqli_fetch_array($result4);
	do{
		printf("<a class='sidebar_menu' href='date-%s.php'>%s</a>",$myrow4["month"],$myrow4["month"]);
	}
	while ($myrow4 = mysqli_fetch_array($result4));
}
?>
	</div>
	<h3>Поиск</h3>
	<div class="sidebar_nav">
	<form action="view_search.php" method="post" name="form_s">
		<p class="search_discribe">Поисковый запрос должен быть не менее 3-х символов.</p>
		<input class="search" type="text" name="search" size="30">
		<input type="submit" name="submit_s" value="Искать" class="sidebar_submit">
	</form>
	</div>
	<div class="subscribe_conteiner">
	<div id="a61a41883a21fbcd66ec07e26539a44368285ec1eb15f79e26b30f4590a9cadd" style="width: 320px !important;background-color: #ebebeb !important;margin-top:20px; border-style: solid !important;border-width: 1px !important;border-color: #111928 !important;border-radius: 5px !important;"><style>.a61a41883a21fbcd66ec07e26539a44368285ec1eb15f79e26b30f4590a9cadd_form_line p,.a61a41883a21fbcd66ec07e26539a44368285ec1eb15f79e26b30f4590a9cadd_form_line h1,.a61a41883a21fbcd66ec07e26539a44368285ec1eb15f79e26b30f4590a9cadd_form_line h2,.a61a41883a21fbcd66ec07e26539a44368285ec1eb15f79e26b30f4590a9cadd_form_line h3,.a61a41883a21fbcd66ec07e26539a44368285ec1eb15f79e26b30f4590a9cadd_form_line h4,.a61a41883a21fbcd66ec07e26539a44368285ec1eb15f79e26b30f4590a9cadd_form_line h5,.a61a41883a21fbcd66ec07e26539a44368285ec1eb15f79e26b30f4590a9cadd_form_line h6{margin:0!important;color:inherit!important;font:inherit!important;}</style><input type="hidden" name="sform[hash]" value="a61a41883a21fbcd66ec07e26539a44368285ec1eb15f79e26b30f4590a9cadd"><div class="a61a41883a21fbcd66ec07e26539a44368285ec1eb15f79e26b30f4590a9cadd_form_line"><div style="padding: 30px !important;padding-top: 5px !important;padding-bottom: 5px !important;background-color: #1bbc9b !important;border-radius: 4px 4px 0px 0px !important;"><div style="display: inline-block !important;vertical-align: top !important;word-wrap: break-word !important;text-align: center !important;color: #ffffff !important;width: 100% !important;font-family: Arial,'Helvetica Neue',Helvetica,sans-serif !important;font-size: 24px !important;font-weight: normal !important;" elemtype="sform-text"><h3 class="subscribe">Подписка на блог</h3></div></div></div><div class="a61a41883a21fbcd66ec07e26539a44368285ec1eb15f79e26b30f4590a9cadd_form_line"><div style="padding: 5px !important;padding-top: 5px !important;padding-bottom: 5px !important;"><div style="display: inline-block !important;vertical-align: top !important;word-wrap: break-word !important;text-align: none !important;color: #000000 !important;width: 100% !important;font-family: Arial,'Helvetica Neue',Helvetica,sans-serif !important;font-size: 14px !important;font-weight: normal !important;" elemtype="sform-text"><p><span style="font-family: 'Times New Roman'; font-size: medium; font-weight: bold; background-color: #ebebeb;">Подписывайтесь на нашу рассылку и получайте свежие новости прямо в свой почтовый ящик!</span></p></div></div></div><div class="a61a41883a21fbcd66ec07e26539a44368285ec1eb15f79e26b30f4590a9cadd_form_line"><div style="padding: 5px !important;background-color: #ebebeb !important;"><div style="display: inline-block;"><div elemtype="sform-label" style="margin-bottom: 5px;font-family: Arial,'Helvetica Neue',Helvetica,sans-serif; !important;font-size: 12px !important;font-weight: bold !important;color: #B2B2B2 !important;text-align: left !important;">Ваш email:</div><div elemtype="sform-input" style=""><input class="a61a41883a21fbcd66ec07e26539a44368285ec1eb15f79e26b30f4590a9cadd_email" style="padding: 5px !important;border-width: 1px !important;border-style: solid !important;border-color: #eeeeee !important;width: 300px !important;font-family: Arial,'Helvetica Neue',Helvetica,sans-serif; !important;font-size: 12px !important;font-weight: normal !important;color: #666 !important;" maxlength="255" name="sform[email]" type="email" required="required"></div></div></div></div><div class="a61a41883a21fbcd66ec07e26539a44368285ec1eb15f79e26b30f4590a9cadd_form_line"><div style="text-align: center !important;padding: 5px !important;padding-top: 5px !important;padding-bottom: 5px !important;"><div style="display: inline-block;" elemtype="sform-button"><button id="buttona61a41883a21fbcd66ec07e26539a44368285ec1eb15f79e26b30f4590a9cadd" style="text-decoration: none; border-style: solid; text-align: center; border-collapse:inherit;background: linear-gradient(#d1d1d1, #afafaf) repeat scroll 0 0 rgba(0, 0, 0, 0);border-color: #b4b4b4 #b4b4b4 #878787;border-image: none;border-style: solid;border-width: 1px 1px 3px;box-shadow: 0 0 0 1px #e3e3e3 inset;color: #555;text-shadow: 0 1px 0 #d6d6d6;color: #FFFFFF !important;font-family: Arial,'Helvetica Neue',Helvetica,sans-serif !important;font-size: 22px !important;font-weight: normal !important;background-color: #B2B2B2 !important;border-radius: 5px !important;width: 250px !important;height: 40px !important;cursor: pointer;border-width: 1px;border-style: solid;padding: 5px;" onclick="sforma61a41883a21fbcd66ec07e26539a44368285ec1eb15f79e26b30f4590a9cadd._button(this);">Подписаться</button></div></div></div><div class="a61a41883a21fbcd66ec07e26539a44368285ec1eb15f79e26b30f4590a9cadd_form_line"><div style="padding: 5px !important;padding-top: 5px !important;padding-bottom: 5px !important;"><div style="display: inline-block !important;vertical-align: top !important;word-wrap: break-word !important;text-align: center !important;color: #b2b2b2 !important;width: 100% !important;font-family: Arial,'Helvetica Neue',Helvetica,sans-serif !important;font-size: 14px !important;font-weight: normal !important;" elemtype="sform-text"><img src="https://login.sendpulse.com/img/lock.png" alt="email рассылки"> Конфиденциальность гарантирована</div></div></div><div id="_plain_messagea61a41883a21fbcd66ec07e26539a44368285ec1eb15f79e26b30f4590a9cadd" style="display:none;"></div><div><div style="display: inline-block !important;text-align: center !important;width: 100% !important;font-size: 12px !important;font-family: Arial,'Helvetica Neue',Helvetica,sans-serif !important;color='#2A6496' !important;padding: 10px !important;font-weight:normal !important;border-radius: 0px 0px 4px 4px  !important;" elemtype="sform-text"><a href="https://sendpulse.com/?rg=4&uid=6601119"><img src="https://cdn.sendpulse.com/img/logoimage.png" alt="email рассылки" style="width:100px"></a></div></div></div><script type="text/javascript" src="https://login.sendpulse.com/members/forms/user-form-js/ac/a61a41883a21fbcd66ec07e26539a44368285ec1eb15f79e26b30f4590a9cadd/c/1/form.js"></script><script type="text/javascript">var sform_lang = 'ru'</script>
	</div>
</div>