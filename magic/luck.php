<?php
$us = mysql_fetch_array(mysql_query("SELECT *,(select `id` from `online` WHERE `date` >= ".(time()-60)." AND `id` = users.`id`) as `online`  FROM `users` WHERE `login` = '{$_POST['target']}' LIMIT 1;"));		

			if ($user['sex'] == 1) {$action="благословил";}
			else {$action="благославила";}		
			if ($user['align'] > '2' && $user['align'] < '3')  {
				$angel="Ангел";
			}
			elseif ($user['align'] > '1' && $user['align'] < '2') {
				$angel="Персонаж";
			}
			
				addch("<img src=i/magic/spell_luck.gif> ".$angel." &quot;{$user['login']}&quot; ".$action." &quot;{$_POST['target']}&quot;");
				//deltravma($owntravma['id']);
				//echo "<font color=red><b>На персонажа \"{$_POST['target']}\" наложено заклятие молчания </b></font>";			
				$bet=1;

?>