<?php

$coma[] = "Итак ели двигались, теперь вовсе несможете... ";
		if ($_SESSION['uid'] == null) header("Location: index.php");
		if (!@$_POST["timer"]) $magictime=time()+900;
		else $magictime=time()+($_POST['timer']*60*1440);
		$tar = mysql_fetch_array(mysql_query("SELECT `id`,`align`, room, login FROM `users` WHERE `login` = '{$_POST['target']}' LIMIT 1;"));
		$target=$_POST['target'];
		if ($tar['id']) {
			$effect = mysql_fetch_array(mysql_query("SELECT `time` FROM `effects` WHERE `owner` = '{$tar['id']}' and `type` = '10' LIMIT 1;")); 
			if ($effect['time']) {
				echo "<font color=red><b>На персонаже \"$target\" уже есть путы </b></font>";
			} elseif ($tar["room"]!=$user["room"]) {
              echo "<font color=red><b>$tar[login] в другой комнате</b></font>";
			} else {
					if (mysql_query("INSERT INTO `effects` (`owner`,`name`,`time`,`type`) values ('".$tar['id']."','Путы','$magictime',10);")) {
						$ldtarget=$target;
						switch($_POST['timer']) {
							case "2": $magictime="два дня."; break;
							case "3": $magictime="три дня."; break;
							case "14": $magictime="две недели."; break;
							case "30": $magictime="месяц."; break;
							case "60": $magictime="два месяца."; break;
							case "365": $magictime="бессрочно."; break;
							default: $magictime="15 минут."; break;
						}
						if ($user['sex'] == 1) {$action="наложил";}
						else {$action="наложила";}
						if ($user['align'] > '2' && $user['align'] < '3')  {
							$angel="Ангел";
						}
						$mess="$angel &quot;{$user['login']}&quot; $action путы на персонажа &quot;$target&quot; сроком $magictime";
						$messch="$angel &quot;{$user['login']}&quot; $action путы на персонажа &quot;$target&quot; сроком $magictime.";
						if ($user['invis'] == '1') {
						$mess="$angel &quot;{$user['login']}&quot; $action путы на персонажа &quot;$target&quot; сроком $magictime";
						$messch="&quot;невидимка&quot; наложил путы на персонажа &quot;$target&quot; сроком $magictime";
                        }
						mysql_query("INSERT INTO `lichka`(`id`,`pers`,`text`,`date`) VALUES ('','".$tar['id']."','$mess','".time()."');");
						mysql_query("INSERT INTO `paldelo`(`id`,`author`,`text`,`date`) VALUES ('','".$_SESSION['uid']."','$mess','".time()."');");
						addch("<img src=i/magic/chains.gif> $messch");	
						addchp($coma[rand(0,count($coma)-1)],"Комментатор");					
						echo "<font color=red><b>Вы наложили путы на персонажа \"$target\"</b></font>";	
						$bet=1;
					} 
					else {
						echo "<font color=red><b>Произошла ошибка!<b></font>";
					}
				}
			}
		else {
			echo "<font color=red><b>Персонаж \"$target\" не существует!<b></font>";
		}
?>