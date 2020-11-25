<?php

$us = mysql_fetch_array(mysql_query("SELECT honorpoints FROM `users` WHERE `id` = 4475817 LIMIT 1;"));		
	

if ($us['honorpoints'] == 0) {
	echo "Зомби Шейн Уже отозван.";
}  else{		
		
						if ($user['sex'] == 1) {$action="отозвал";}
			else {$action="отозвала";}		
			if ($user['align'] > '2' && $user['align'] < '3')  {
				$angel="Ангел";
			}
			elseif ($user['align'] > '1' && $user['align'] < '2') {
				$angel="Персонаж";
			}
                                mysql_query("UPDATE `users` SET `honorpoints`=0 WHERE `id`='4475817'");
				echo "Вы отозвали Зомби Шейна!";
				addch("<img src=i/magic/1x1.gif> ".$angel." &quot;{$user['login']}&quot; ".$action." Зомби Шейна.");
				
} 	
?>