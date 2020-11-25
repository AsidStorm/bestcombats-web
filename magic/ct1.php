<?php

$us = mysql_fetch_array(mysql_query("SELECT *,(select `id` from `online` WHERE `date` >= ".(time()-60)." AND `id` = users.`id`) as `online`  FROM `users` WHERE `login` = '{$_POST['target']}' LIMIT 1;"));		
$owntravma = mysql_fetch_array(mysql_query("SELECT * FROM `effects` WHERE `owner` = ".$us['id']." AND `type`=11;"));	
$magic = mysql_fetch_array(mysql_query("SELECT `chanse` FROM `magic` WHERE `id` = '19' ;"));	

if ($user['intel'] >= 4) {
		$int=$magic['chanse'] + ($user['intel'] - 4)*3;
		if ($int>98){$int=99;}
	}
else {$int=0;}
	

	
if ($user['battle'] > 0) {
	echo "Не в бою...";
} elseif ($us['battle'] > 0) {
	echo "Персонаж в бою...";
} elseif (!$owntravma['id']) {
	echo "У персонажа нет легких травм...";
} elseif ($user['room'] != $us['room']) {
	echo "Персонаж в другой комнате!";
} elseif (!$us['online']) {
	echo "Персонаж не в игре!";
} elseif (rand(1,100) < $int) {		
		
			if ($user['sex'] == 1) {$action="исцелил";}
			else {$action="исцелила";}		
			if ($user['align'] > '2' && $user['align'] < '3')  {
				$angel="Ангел";
			}
			elseif ($user['align'] > '1' && $user['align'] < '2') {
				$angel="Персонаж";
			}
				$bet=1;
				echo "Персонаж &quot;{$_POST['target']}&quot; исцелен!";
				if($user['invis']==1) {
				addch("<img src=i/magic/cure1.gif> &quot;невидимка&quot; ".$action." от легких травм &quot;{$_POST['target']}&quot;");
				}else
				addch("<img src=i/magic/cure1.gif> ".$angel." &quot;{$user['login']}&quot; ".$action." от легких травм &quot;{$_POST['target']}&quot;");
				deltravma($owntravma['id']);	
				} else {
				echo "Свиток рассыпался в ваших руках...";
				$bet=1;
				}	
?>