<?php
// magic �������������
$magic = mysql_fetch_array(mysql_query("SELECT `chanse` FROM `magic` WHERE `id` = '110' ;"));  
      
if ($user['intel'] >= 15) {
    $int=$magic['chanse'] + ($user['intel'] - 15)*3;
    if ($int>98){$int=99;}
  }
else {$int=0;}
if ($user['battle'] > 0) {
	echo "�� � ���...";
}
	
		if ($_SESSION['uid'] == null) header("Location: index.php");
	
		$dress = mysql_fetch_array(mysql_query("SELECT * FROM `inventory` WHERE  `type` = '3' AND `dvur` = '0' AND `owner` = '{$user['id']}' AND `name` = '{$_POST['target']}' AND `sharped` = 0 LIMIT 1;"));
		$svitok = mysql_fetch_array(mysql_query("SELECT * FROM `inventory` WHERE `name` = '������� �� +5: ������' AND `owner` = '{$user['id']}' LIMIT 1;"));
		
		if ($dress && $svitok) {
			if (mysql_query("UPDATE `inventory` SET `sharped` = 1, `name` = CONCAT(`name`,' +5'), `minu` = `minu`+5, `maxu`=`maxu`+5, `nmech` = `nmech`+0, `cost` = `cost`+30, `nvinos` = `nvinos`+0 WHERE `id` = {$dress['id']} LIMIT 1;")) {
				echo "<font color=red><b>������� \"{$_POST['target']}\" ������ ������� +5.<b></font> ";
				$bet=1;
			}
			else {
				echo "<font color=red><b>��������� ������!<b></font>";
			}
		} else {
			echo "<font color=red><b>������������ ��� �������� ��� ������������ ������<b></font>";
		}
?>