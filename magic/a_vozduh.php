<?php

$us = mysql_fetch_array(mysql_query("SELECT *,(select `id` from `online` WHERE `date` >= ".(time()-60)." AND `id` = users.`id`) as `online`  FROM `users` WHERE `login` = '".mysql_escape_string($_POST['target'])."' LIMIT 1;"));    
$magic = mysql_fetch_array(mysql_query("SELECT `chanse` FROM `magic` WHERE `id` = '63' ;"));  
$effect = mysql_fetch_array(mysql_query("SELECT `time` FROM `effects` WHERE `owner` = '{$us['id']}' and `type` = '400' LIMIT 1;")); 
      
if ($user['hp'] >= 0) {
    $int=$magic['chanse'] + ($user['hp'] - 0);
    if ($int>98){$int=99;}
  }
else {$int=0;}

if ($user['battle'] > 0) {echo "Не в бою...";}
elseif ($user['level'] < 4) { echo "Вашего уровня не достаточно для использования этого заклинания!"; }
elseif ($user['room'] != $us['room']) { echo "Персонаж в другой комнате!"; }
elseif (!$us['online']) {echo "Персонаж не в игре!";}
elseif (rand(1,100) < $int) {    
		if ($user['invis']==1) {
		addch("<img src=i/magic/1x1.gif><font color=red>Внимание!</font> &quot;невидимка&quot; наложил заклятие Астрал стихий на &quot;{$_POST['target']}&quot;, сроком 2 часа.");
    	}else
		addch("<img src=i/magic/1x1.gif><font color=red>Внимание!</font> &quot;{$user['login']}&quot; наложил заклятие Астрал стихий на &quot;{$_POST['target']}&quot;, сроком 2 часа.");
      $user = mysql_fetch_array(mysql_query("SELECT `id` FROM `users` WHERE `login` = '{$_POST['target']}' LIMIT 1;")); 
      mysql_query("INSERT INTO `effects` (`owner`,`name`,`time`,`type`,`stihiya`) values ('".$user['id']."','Астрал стихий (воздух)',".(time()+7200).",'400','vozduh');");    
      echo "<font color=red><b>На персонажа \"{$_POST['target']}\" наложено заклятие \"Астрал стихий (воздух)\" </b></font>";      
      $bet=1;
      

} else {
        echo "Свиток рассыпался в ваших руках...";
        $bet=1;
      }  
?>