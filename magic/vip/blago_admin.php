<?php
//��6
$us = mysql_fetch_array(mysql_query("SELECT *,(select `id` from `online` WHERE `date` >= ".(time()-60)." AND `id` = users.`id`) as `online`  FROM `users` WHERE `login` = '".mysql_escape_string($_POST['target'])."' LIMIT 1;"));
$magic = mysql_fetch_array(mysql_query("SELECT `chanse` FROM `magic` WHERE `id` = '252' ;"));
$effect = mysql_fetch_array(mysql_query("SELECT `time` FROM `effects` WHERE `owner` = '{$us['id']}' and `type` = '9990' LIMIT 1;"));

if ($user['intel'] >= 0) {
    $int=$magic['chanse'] + ($user['hp'] - 15)*3;
    if ($int>98){$int=99;}
  }
else {$int=0;}

if ($user['battle'] > 0) {echo "�� � ���...";}
elseif ($user['level'] < 4) { echo "������ ������ �� ���������� ��� ������������� ����� ����������!"; }
elseif ($effect['time']) {echo "�� ��������� ��� ���� �������� ������������� ������"; }
elseif (!$us['online']) {echo "�������� �� � ����!";}
elseif ($us['bot']==1) {echo "�������� ����� ���� �������� ������ �� ����������";}
elseif ($us['login'] != $user['married'] && $us["login"]!=$user['login']) { echo "�������� ������������ �� ���� ���� �������/�������!";}
elseif (rand(1,100) < $int) {

      addch("<img src=i/magic/1x1.gif><font color=red>��������!</font> &quot;{$user['login']}&quot; ������� �������� ������������� ������ �� &quot;{$_POST['target']}&quot;, ������ 2 ����.");
      $addhp=$us['vinos']*6;
      mysql_query("insert into effects (`owner`,`type`,`time`,`name`,`sila`,`intel`,`lovk`,`inta`,`ghp`) values ('".$us['id']."',9990,".(time()+7200).",'������������� ������',15,15,15,15,250);");
      mysql_query("UPDATE `users` SET `sila`=`sila`+'15', `lovk`=`lovk`+'15', `inta`=`inta`+'15', `intel`=`intel`+'15', `maxhp`=`maxhp`+'250', `hp`=`hp`+'250' WHERE `login` = '{$_POST['target']}' LIMIT 1;");      
      echo "<font color=red><b>�� ��������� \"{$_POST['target']}\" �������� �������� \"������������� ������\" </b></font>";
      $bet=1;


} else {
        echo "������ ���������� � ����� �����...";
        $bet=1;
      }
?>
