<?php
$us = mysql_fetch_array(mysql_query("SELECT *,(select `id` from `online` WHERE `date` >= ".(time()-60)." AND `id` = users.`id`) as `online`  FROM `users` WHERE `login` = '{$_POST['target']}' LIMIT 1;"));
$magic = mysql_fetch_array(mysql_query("SELECT `chanse` FROM `magic` WHERE `id` = '15' ;"));
$effect = mysql_fetch_array(mysql_query("SELECT `time` FROM `effects` WHERE `owner` = '{$us['id']}' and `type` = '2' LIMIT 1;"));

if ($user['battle'] > 0) {echo "�� � ���...";}
elseif ($effect['time']) {echo "�� ��������� ��� ���� �������� ��������"; }
elseif ($user['room'] != $us['room']) { echo "�������� � ������ �������!"; }
elseif (!$us['online']) {echo "�������� �� � ����!";}
elseif ($us['deal'] == 1) { echo "�� �� ������ �������� �������� �������� �� ����� ���������"; }
elseif ($us['align'] > 2 && $us['align'] < 3) { echo "�������� ������� ���� �� ������?.."; }
else{

            addch("<img src=i/magic/sleep.gif>�������� &quot;{$user['login']}&quot; ������� �������� �������� �� &quot;{$_POST['target']}&quot;, ������ 30 ���.");
            mysql_query("INSERT INTO `effects` (`owner`,`name`,`time`,`type`) values ('".$us['id']."','�������� ��������',".(time()+1800).",2);");
                echo "<font color=red><b>�� ��������� \"{$_POST['target']}\" �������� �������� �������� </b></font>";
                $bet=1;


 }
?>