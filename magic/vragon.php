<?php

$us = mysql_fetch_array(mysql_query("SELECT honorpoints FROM `users` WHERE `id` = 99 LIMIT 1;"));		
	

if ($us['honorpoints'] > 0) {
	echo "Общий Враг Уже вызван.";
}  else{		
		
						if ($user['sex'] == 1) {$action="вызвал";}
			else {$action="вызвала";}		
			if ($user['align'] > '2' && $user['align'] < '3')  {
				$angel="Ангел";
			}
			elseif ($user['align'] > '1' && $user['align'] < '2') {
				$angel="Персонаж";
			}
                                mysql_query("UPDATE `users` SET `honorpoints`=1 WHERE `id`='99'");
				echo "Вы вызвали Общего Врага!";
				addch("<img src=i/magic/1x1.gif> ".$angel." &quot;{$user['login']}&quot; ".$action." Общего Врага.");
				
} 	
?>