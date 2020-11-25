<?php
include "config/weptypes.php";
// magic идентификацыя
$magic = mysql_fetch_array(mysql_query("SELECT `chanse` FROM `magic` WHERE `id` = '106' ;"));  
      
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
                $svitok = mysql_fetch_array(mysql_query("SELECT * FROM `inventory` WHERE `name` = 'Заточка на +1: оружие' AND `owner` = '{$user['id']}' LIMIT 1;"));

                if ($dress && $svitok) {
                  $weptype=$weptypes[$dress["otdel"]];
                  if ($weptype) {
                    if (mysql_query("UPDATE `inventory` SET `sharped` = 1, `name` = CONCAT(`name`,' +1'), `minu` = `minu`+1, `maxu`=`maxu`+1, `n$weptype` = `n$weptype`+1, `cost` = `cost`+6, `nvinos` = `nvinos`+0 WHERE `id` = {$dress['id']} LIMIT 1;")) {
                      echo "<font color=red><b>Предмет \"{$_POST['target']}\" удачно заточен +1.<b></font> ";
                      $bet=1;
                    } else {
                      echo "<font color=red><b>Произошла ошибка!<b></font>";
                    }
                  }
                } else {
                  echo "<font color=red><b>Неправильное имя предмета или неправильный свиток<b></font>";
                }
?>