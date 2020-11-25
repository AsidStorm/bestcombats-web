<?php
$us = mysql_fetch_array(mysql_query("SELECT *,(select `id` from `online` WHERE `date` >= ".(time()-60)." AND `id` = users.`id`) as `online`  FROM `users` WHERE `login` = '{$_POST['target']}' LIMIT 1;"));		
$travma = mysql_query("SELECT * FROM `effects` WHERE `owner` = '".$us['id']."' AND (`type`='11' OR `type`='12' OR `type`='13' OR `type`='14') LIMIT 1 ;");
$travma2 = mysql_query("SELECT id FROM `effects` WHERE `owner` = '".$us['id']."' AND (`type`='11' OR `type`='12' OR `type`='13' OR `type`='14');");				
$owntravma2=mysql_fetch_array($travma);

if ($user['battle'] > 0) {
	echo "Не в бою...";}
elseif ($us['battle'] > 0) {
	echo "Персонаж в бою...";} 
elseif (!$travma) {
	echo "У персонажа нет травм...";}
elseif ($user['room'] != $us['room']) {
	echo "Персонаж в другой комнате!";}
elseif ($owntravma2['type']==14) {
	echo "Очень запущенный случай. Лечению не поддается...";}
else{
              
			if ($user['sex'] == 1) {$action="исцелил";}
			else {$action="исцелила";}		
			if ($user['align'] > '1' && $user['align'] < '2') {
				$angel="Персонаж";
			}

			if ($owntravma2['type']>10 && $owntravma2['type']<14) {
			if ($user['invis']==1) {
				addch("<img src=i/magic/cure3.gif> &quot;невидимка&quot; ".$action." от травм &quot;{$_POST['target']}&quot;");
			}else
				addch("<img src=i/magic/cure3.gif> $angel &quot;{$user['login']}&quot; ".$action." от травм &quot;{$_POST['target']}&quot;");

				while ($owntravma = mysql_fetch_array($travma2)) {
					deltravma($owntravma['id']);

				}
echo "Персонаж &quot;{$_POST['target']}&quot; исцелен!";
}

}
?>