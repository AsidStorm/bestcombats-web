<?php
if ($user['align']==4){ echo "Хаосникам запрещено колдовать!";}	
else{
$us = mysqli_fetch_array(db_query("SELECT *,(select `id` from `online` WHERE `date` >= ".(time()-60)." AND `id` = users.`id`) as `online`  FROM `users` WHERE `login` = '{$_POST['target']}' LIMIT 1;"));
$travma = db_query("SELECT * FROM `effects` WHERE `owner` = '".$us['id']."' AND (`type`='11' OR `type`='12' OR `type`='13' OR `type`='14');");				
if ($user['battle'] > 0) {
	echo "Не в бою...";
} elseif ($us['battle'] > 0) {
	echo "Персонаж в бою...";
} elseif (!$travma) {
	echo "У персонажа нет травм...";
} elseif ($user['room'] != $us['room']) {
	echo "Персонаж в другой комнате!";
} elseif ($user['align'] >= 0) {		
		
			if ($user['sex'] == 1) {$action="исцелен";}
			else {$action="исцелина";}		
				if ($user['align'] >= '0') {
				$angel="Персонаж ";
			}
					
				if ($user['invis']==1) {
				addch(" <font color=red>Внимание! </font><img src=i/magic/cure3.gif> <i><b>невидимка </i></b> {$_POST['target']}  ".$action." от травм ");
				}else
				addch("<font color=red>Внимание! </font><img src=i/magic/align_2.5.gif>    {$_POST['target']}  ".$action." от травм ");
				while ($owntravma=mysqli_fetch_array($travma)) {
					deltravma($owntravma['id']);
				}

} else {
				echo "Что-то тут не то...";
	}	
	}
?>
