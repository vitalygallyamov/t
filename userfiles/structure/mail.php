<?php
/*
вставьте ваш е-мейл адрес сюда
*/
$mymail = "yuliya@tpatp.ru";
/*
проверяем-отправляем
*/
if(isset($_POST['sender']) && isset($_POST['email']) && isset($_POST['theme']) && isset($_POST['letter'])){
	$sender = $_POST['sender'];
	$email = $_POST['email'];
	$theme = $_POST['theme'];
	$letter = $_POST['letter'];
	$headers = "MIME-Version: 1.0\r\n";
	$headers .= "Content-type: text/html; charset=utf-8\r\n";
	$headers .= "From: ".$sender." <".$email.">\r\n";
	$success = mail($mymail, $theme, $letter, $headers);
	if($success) {
		echo "status=ok&mes=Сообщение успешно отправлено.";
	} else {
		echo "status=no&mes=Не удалось отправить сообщение.";
	}
}else{
	echo "status=no&mes=Отсутствуют необходимые данные.";
}
?>