<?php
// magic идентификацыя
	//if (rand(1,2)==1) {

		if ($_SESSION['uid'] == null) header("Location: index.php");

		$tar = mysql_fetch_array(mysql_query("SELECT `id`,`prison`,`room` FROM `users` WHERE `login` = '{$_POST['target']}' LIMIT 1;")); 
		mysql_query("select * from `online`  WHERE `id` = '{$tar['id']}';");
		$target=$_POST['target'];
		if ($tar['id']) {
			$effect = mysql_fetch_array(mysql_query("SELECT `time` FROM `effects` WHERE `owner` = '{$tar['id']}' and `type` = '21' LIMIT 1;")); 
			if ($effect['time']) {
				$ok=0;
				if ($user['align'] > '2' && $user['align'] < '3') {
					$ok=1;
				}
				elseif (($user['align'] == '1.99') && ($tar['align'] > '1' && $tar['align'] < '2') && ($user['align'] > $tar['align'])) {
					$ok=1;
				}
				elseif (($user['align'] == '1.99') && !($tar['align'] > '2' && $tar['align'] < '3') && !($tar['align'] > '1' && $tar['align'] < '2')) {
					$ok=1;
				}
				if (($user['align'] > '3' && $user['align'] < '4')  || $user['align'] == '777') {
					$ok=1;
				}
				if ($ok == 1) {
					if (mysql_query("DELETE FROM`effects` WHERE `owner` = '{$tar['id']}' and `type` = '21' LIMIT 1 ;")) {
						mysql_query("UPDATE `users` SET `palcom` = '',`prison`='0', `room`='20' WHERE `id` = {$tar['id']} LIMIT 1;");
						mysql_query("UPDATE `online` SET  `room`='20' WHERE `id` = {$tar['id']} LIMIT 1;");
						if ($user['sex'] == 1) {$action="выпустил";}
						else {$action="выпустила";}
                        if ($user['align'] > '2' && $user['align'] < '3')  {
                        $angel="Ангел";
                        }
                        elseif ($user['align'] > '1' && $user['align'] < '2') {
                        $angel="Паладин";
                        }
						elseif ($user['align'] > '3' && $user['align'] <'4') {
						$angel="Тарман";
						}
						$mess="$angel &quot;{$user['login']}&quot; $action из заточения персонажа &quot;$target&quot;.";
						$messch="$angel &quot;{$user['login']}&quot; $action из заточения персонажа &quot;$target&quot;.";
						if ($user['invis'] == '1') {
						$messch="&quot;невидимка&quot; выпустил из заточения персонажа &quot;$target&quot;.";
						$mess="$angel &quot;{$user['login']}&quot; $action из заточения персонажа &quot;$target&quot;.";
                        }
						mysql_query("INSERT INTO `lichka`(`id`,`pers`,`text`,`date`) VALUES ('','".$tar['id']."','$mess','".time()."');");
						mysql_query("INSERT INTO `paldelo`(`id`,`author`,`text`,`date`) VALUES ('','".$_SESSION['uid']."','$mess','".time()."');");
						addch("<img src=i/magic/jail_off.gif> $messch");
						echo "<font color=red><b>Персонаж \"$target\" выпущен на свободу</b></font>";			
					}
					else {
						echo "<font color=red><b>Произошла ошибка!<b></font>";
					}
				}
				else {
					echo "<font color=red><b>Вы не можете выпустить персонажа!<b></font>";
				}
			}
			else {
				echo "<font color=red><b>Персонаж \"$target\" не в тюрьме </b></font>";
			}
		}
		else {
			echo "<font color=red><b>Персонаж \"$target\" не существует!<b></font>";
		}
?>
