<?php

$us = mysqli_fetch_array(db_query("SELECT honorpoints FROM `users` WHERE `id` = 99 LIMIT 1;"));
	

if ($us['honorpoints'] == 0) {
	echo "Общий Враг Уже отозван.";
}  else{		
		
						if ($user['sex'] == 1) {$action="отозвал";}
			else {$action="отозвала";}		
			if ($user['align'] > '2' && $user['align'] < '3')  {
				$angel="Ангел";
			}
			elseif ($user['align'] > '1' && $user['align'] < '2') {
				$angel="Персонаж";
			}
                                db_query("UPDATE `users` SET `honorpoints`=0 WHERE `id`='99'");
				echo "Вы отозвали Общего Врага!";
				addch("<img src=i/magic/1x1.gif> ".$angel." &quot;{$user['login']}&quot; ".$action." Общего Врага.");
				
} 	
?>