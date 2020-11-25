<?php
// Право на переименование (звери)
if($_SESSION['uid'] == null) header("Location: index.php");
$user = mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id` = '{$_SESSION['uid']}' LIMIT 1;"));
if($user['zver_id']>0){
 if(!$_POST){$targeted=4;}
	echo "Логин может содержать от 4 до 20 символов, и состоять только из букв русского или английского алфавита, цифр, символов '_',  '-' и пробела. <br>Логин не может начинаться или заканчиваться символами '_', '-' или пробелом<br>Также в логине не должно присутствовать подряд более 1 символа '_' или '-' и более 1 пробела, а также более 3-х других одинаковых символов.";
	}else{
	mysql_fetch_array(mysql_query("UPDATE `users` SET `login` = '{$_POST['target']}' WHERE `user_id` = '".$user['id']."'  LIMIT 1;"));
	echo "Вы успешно переименовали своего зверя...";
	$bet=1;
	}	
}else{
echo "У вас нету зверя...";
}

?>