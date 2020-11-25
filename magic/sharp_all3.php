<?php
// magic идентификацыя
$magic = mysql_fetch_array(mysql_query("SELECT `chanse` FROM `magic` WHERE `id` = '108' ;"));  
      
if ($user['intel'] >= 15) {
    $int=$magic['chanse'] + ($user['intel'] - 15)*3;
    if ($int>98){$int=99;}
  }
else {$int=0;}
if ($user['battle'] > 0) {
	echo "Не в бою...";
}
	
		if ($_SESSION['uid'] == null) header("Location: index.php");
	
		$dress = mysql_fetch_array(mysql_query("SELECT * FROM `inventory` WHERE  `type` = '3' AND `dvur` = '0' AND `owner` = '{$user['id']}' AND `name` = '{$_POST['target']}' AND `sharped` = 0 LIMIT 1;"));
		$svitok = mysql_fetch_array(mysql_query("SELECT * FROM `inventory` WHERE `name` = 'Заточка на +3: оружие' AND `owner` = '{$user['id']}' LIMIT 1;"));

		if ($dress && $svitok) {
			if (mysql_query("UPDATE `inventory` SET `sharped` = 1, `cost` = `cost`+18,`name` = CONCAT(`name`,' +3'), `minu` = `minu`+3, `maxu`=`maxu`+3, `nmech` = `nmech`+0, `nvinos` = `nvinos`+0 WHERE `id` = {$dress['id']} LIMIT 1;")) {
				echo "<font color=red><b>Предмет \"{$_POST['target']}\" удачно заточен +3.<b></font> ";
				$bet=1;
			}
			else {
				echo "<font color=red><b>Произошла ошибка!<b></font>";
			}
		} else {
			echo "<font color=red><b>Неправильное имя предмета или неправильный свиток<b></font>";
		}
?>