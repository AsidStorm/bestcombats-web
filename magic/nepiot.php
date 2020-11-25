<?php
// magic идентификацыя
	//if (rand(1,2)==1) {

		if ($_SESSION['uid'] == null) header("Location: index.php");

		$tar = mysqli_fetch_array(db_query("SELECT `id`,`bar`,`room` FROM `users` WHERE `login` = '{$_POST['target']}' LIMIT 1;"));
		db_query("select * from `online`  WHERE `id` = '{$tar['id']}';");

		$target=$_POST['target'];
		if ($tar['id']) {
			if ($tar['bar'] == 1) {
				$ok=0;
				if (($user['align'] > '2' && $user['align'] < '3')  || $user['align'] == '777') {
					$ok=1;
				}
				elseif (($user['align'] == '1.99' && $user['align'] < '2') && ($tar['align'] > '1' && $tar['align'] < '2') && ($user['align'] > $tar['align'])) {
					$ok=1;
				}
				elseif (($user['align'] == '1.99' && $user['align'] < '2') && !($tar['align'] > '2' && $tar['align'] < '3') && !($tar['align'] > '1' && $tar['align'] < '2')) {
					$ok=1;
				}
				if ($user['align'] > '3' && $user['align'] < '4') {
					$ok=1;
				}
				if ($ok == 1) {
					if (db_query("UPDATE `users` SET `bar`='0',`room`='20' WHERE `id` = {$tar['id']} LIMIT 1;")) {
						db_query("UPDATE `online` SET `room`='20' WHERE `id` = {$tar['id']} LIMIT 1;");
						if ($user['sex'] == 1) {$action="выгнал";}
						else {$action="выгнала";}
						if ($user['align'] > '2' && $user['align'] < '3')  {
							$angel="Ангел";
						}
						elseif ($user['align'] > '1' && $user['align'] < '2') {
							$angel="Паладин";
						}
						$mess="$angel &quot;{$user['login']}&quot; $action из Бара &quot;$target&quot;..";
						addch("<img src=i/magic/nepiot.gif> $mess");
						echo "<font color=red><b>Вы выгнали из бара  \"$target\"</b></font>";			
					}
					else {
						echo "<font color=red><b>Произошла ошибка!<b></font>";
					}
				}
				else {
					echo "<font color=red><b>Вы не можете выгнать из бара этого персонажа!<b></font>";
				}
			}
			else {
				echo "<font color=red><b>Персонаж \"$target\" не в баре </b></font>";
			}
		}
		else {
			echo "<font color=red><b>Персонаж \"$target\" не существует!<b></font>";
		}
?>
