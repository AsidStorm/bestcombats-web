<?php

$us = mysql_fetch_array(mysql_query("SELECT *,(select `id` from `online` WHERE `date` >= ".(time()-60)." AND `id` = users.`id`) as `online`  FROM `users` WHERE `login` = '".mysql_escape_string($_POST['target'])."' LIMIT 1;"));    
$magic = mysql_fetch_array(mysql_query("SELECT `chanse` FROM `magic` WHERE `id` = '63' ;"));  
$effect = mysql_fetch_array(mysql_query("SELECT `time` FROM `effects` WHERE `owner` = '{$us['id']}' and `type` = '400' LIMIT 1;")); 
      
if ($user['hp'] >= 0) {
    $int=$magic['chanse'] + ($user['hp'] - 0);
    if ($int>98){$int=99;}
  }
else {$int=0;}

if ($user['battle'] > 0) {echo "�� � ���...";}
elseif ($user['level'] < 4) { echo "������ ������ �� ���������� ��� ������������� ����� ����������!"; }
elseif ($user['room'] != $us['room']) { echo "�������� � ������ �������!"; }
elseif (!$us['online']) {echo "�������� �� � ����!";}
elseif (rand(1,100) < $int) {    
		if ($user['invis']==1) {
		addch("<img src=i/magic/1x1.gif><font color=red>��������!</font> &quot;���������&quot; ������� �������� ������ ������ �� &quot;{$_POST['target']}&quot;, ������ 2 ����.");
    	}else
		addch("<img src=i/magic/1x1.gif><font color=red>��������!</font> &quot;{$user['login']}&quot; ������� �������� ������ ������ �� &quot;{$_POST['target']}&quot;, ������ 2 ����.");
      $user = mysql_fetch_array(mysql_query("SELECT `id` FROM `users` WHERE `login` = '{$_POST['target']}' LIMIT 1;")); 
      mysql_query("INSERT INTO `effects` (`owner`,`name`,`time`,`type`,`stihiya`) values ('".$user['id']."','������ ������ (������)',".(time()+7200).",'400','vozduh');");    
      echo "<font color=red><b>�� ��������� \"{$_POST['target']}\" �������� �������� \"������ ������ (������)\" </b></font>";      
      $bet=1;
      

} else {
        echo "������ ���������� � ����� �����...";
        $bet=1;
      }  
?>