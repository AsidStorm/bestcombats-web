<?php
// magic идентификацыя
if ($user['battle'] > 0) {
	echo "Не в бою...";
} else {

	$magic = mysql_fetch_array(mysql_query("SELECT `chanse` FROM `magic` WHERE `id` = '3' ;"));			
	if ($user['hp'] >= 10) {
		$int=$magic['chanse'] + ($user['hp'] - 10);
		if ($int>98){$int=99;}
	}
	else {$int=0;}


	
		if ($_SESSION['uid'] == null) header("Location: index.php");
	
		$dress = mysql_fetch_array(mysql_query("SELECT * FROM `inventory` WHERE `name` = '{$target}' AND `needident` = 1 LIMIT 1;"));
		if (mysql_query("UPDATE `inventory` SET `needident` = 0 WHERE `id` = {$dress['id']} LIMIT 1;")) {
			echo "<font color=red><b>Предмет \"{$target}\" удачно идентифицирован <b></font>";
			$bet=1;
		} else {
			echo "<font color=red><b>Неправильное имя предмета<b></font>";
		}
}
?>