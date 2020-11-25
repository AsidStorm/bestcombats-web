<?php

$us = mysqli_fetch_array(db_query("SELECT honorpoints FROM `users` WHERE `id` = 4475817 LIMIT 1;"));
	

if ($us['honorpoints'] > 0) {
	echo "Зомби Шейн Уже вызван.";
}  else{		
		
						if ($user['sex'] == 1) {$action="вызвал";}
			else {$action="вызвала";}		
			if ($user['align'] > '2' && $user['align'] < '3')  {
				$angel="Ангел";
			}
			elseif ($user['align'] > '1' && $user['align'] < '2') {
				$angel="Персонаж";
			}
                                db_query("UPDATE `users` SET `honorpoints`=1 WHERE `id`='4475817'");
				echo "Вы вызвали Зомби Шейна!";
				addch("<img src=i/magic/1x1.gif> ".$angel." &quot;{$user['login']}&quot; ".$action." Зомби Шейна.");
				
} 	
?>