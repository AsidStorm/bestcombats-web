<?php
// magic идентификацыя
	//if (rand(1,2)==1) {

		if ($_SESSION['uid'] == null) header("Location: index.php");

		$tar = mysqli_fetch_array(db_query("SELECT `id`,`align` FROM `users` WHERE `login` = '{$_POST['target']}' LIMIT 1;"));
		$target=$_POST['target'];
		if ($tar['id']) {
			if ($tar['align'] > '1' && $tar['align'] < '2') {
				$ok=0;
				if (($user['align'] > '2' && $user['align'] < '3')  || $user['align'] == '777') {
					$ok=1;
				}
				elseif (($user['align'] == '1.99') && ($tar['align'] != '1.99')) {
					$ok=1;
				}
				if ($ok == 1) {
					if (db_query("UPDATE `users` SET `align`='0' WHERE `id` = {$tar['id']} LIMIT 1;")) {
						if ($user['sex'] == 1) {$action="лишил";}
						else {$action="лишила";}
						if ($user['align'] > '2' && $user['align'] < '3')  {
							$angel="Ангел";
						}
						elseif ($user['align'] > '1' && $user['align'] < '2') {
							$angel="Паладин";
						}
						$mess="$angel &quot;{$user['login']}&quot; $action &quot;$target&quot; звания &quot;Паладин&quot;.";
						$messch="$angel &quot;{$user['login']}&quot; $action &quot;$target&quot; звания &quot;Паладин&quot;.";
						if ($user['invis'] == '1') {
						$mess="$angel &quot;{$user['login']}&quot; $action &quot;$target&quot; звания &quot;Паладин&quot;.";
						$messch="&quot;невидимка&quot; лишил звания Паладин персонажа &quot;$target&quot;..";
                        }
						db_query("INSERT INTO `lichka`(`id`,`pers`,`text`,`date`) VALUES ('','".$tar['id']."','$mess','".time()."');");
						db_query("INSERT INTO `paldelo`(`id`,`author`,`text`,`date`) VALUES ('','".$_SESSION['uid']."','$mess','".time()."');");
						addch("<img src=i/magic/pal_off.gif> $messch");
						echo "<font color=red><b>Персонаж \"$target\" лишен звания \"Паладин\"</b></font>";			
					}
					else {
						echo "<font color=red><b>Произошла ошибка!<b></font>";
					}
				}
				else {
					echo "<font color=red><b>Вы не можете снять крест этого персонажа!<b></font>";
				}
			}
			else {
				echo "<font color=red><b>Персонаж \"$target\" не состоит в Ордене </b></font>";
			}
		}
		else {
			echo "<font color=red><b>Персонаж \"$target\" не существует!<b></font>";
		}
?>
