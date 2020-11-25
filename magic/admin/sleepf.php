<?php
$coma[] = "А может того... сразу в хаос? ";
$coma[] = "А будешь еще флудить на форуме - несчастный случай приключится... или авария какая...";
$coma[] = "Неграмотные могут поставить крестик вместо подписи";
$coma[] = "Отмодерили? Расслабься и получай удовольствие";
$coma[] = "Позор флудерастам!";
$coma[] = "Согласные с приговором - могут опустить руки и отойти от стенки";
$coma[] = "Флуд есть зло!";
$coma[] = "Тебе повезло, что не навсегда";
$coma[] = "Иди и напиши 5000 раз: 'Я больше не буду флудить на форуме' ";
$coma[] = "Повышаем, повышаем уровень грамотности";

	
		if ($_SESSION['uid'] == null) header("Location: index.php");

		$magictime=time()+($_POST['timer']*60);
		$target=$_POST['target'];
		$tar = mysql_fetch_array(mysql_query("SELECT `id`,`align` FROM `users` WHERE `login` = '{$_POST['target']}' LIMIT 1;")); 
		if ($tar['id']) {
			$effect = mysql_fetch_array(mysql_query("SELECT `time` FROM `effects` WHERE `owner` = '{$tar['id']}' and `type` = '3' LIMIT 1;")); 
			if ($effect['time']) {
				echo "<font color=red><b>На персонаже \"$target\" уже есть заклятие форумного молчания </b></font>";
			}
			else {
				$ok=0;
				if (($user['align'] > '2' && $user['align'] < '3')  || $user['align'] == '777') {
					$ok=1;
				}
				elseif (($user['align'] > '1.2' && $user['align'] < '2') && ($tar['align'] > '1' && $tar['align'] < '2') && ($user['align'] > $tar['align'])) {
					$ok=1;
				}
				elseif (($user['align'] > '1.2' && $user['align'] < '2') && !($tar['align'] > '2' && $tar['align'] < '3') && !($tar['align'] > '1' && $tar['align'] < '2')) {
					$ok=1;
				}
				if ($user['align'] > '3' && $user['align'] < '4' || $user['align']>='7.01' && $user['align']<='7.04') {
					$ok=1;
				}
				if ($ok == 1) {
					if (mysql_query("INSERT INTO `effects` (`owner`,`name`,`time`,`type`) values ('".$tar['id']."','Заклятие форумного молчания','$magictime',3);")) {
						$ldtarget=$target;
						
						switch($_POST['timer']) {
							case "15": $magictime="15 мин."; break;
							case "30": $magictime="30 мин."; break;
							case "60": $magictime="1 час."; break;
							case "180": $magictime="3 часа."; break;
							case "360": $magictime="6 часов."; break;
							case "720": $magictime="12 часов."; break;
							case "1440": $magictime="1 сутки."; break;
							case "4320": $magictime="3 суток."; break;
							case "10080": $magictime="1 неделя."; break;
						}
						if ($user['sex'] == 1) {$action="наложил";}
						else {$action="наложила";}
						if ($user['align'] > '2' && $user['align'] < '3')  {
                        $angel="Гвардеец";
                        }
                        elseif ($user['align'] > '1' && $user['align'] < '2') {
                        $angel="Паладин";
                        }
						elseif ($user['align'] > '3' && $user['align'] <'4') {
						$angel="Тарман";
						}
						$mess="$angel &quot;{$user['login']}&quot; $action заклятие форумного молчания на персонажа &quot;$target&quot; сроком $magictime";
						$messch="$angel &quot;{$user['login']}&quot; $action заклятие форумного молчания на персонажа &quot;$target&quot; сроком $magictime";
						if ($user['invis'] == '1') {
						$mess="$angel &quot;{$user['login']}&quot; $action заклятие форумного молчания на персонажа &quot;$target&quot; сроком $magictime";
				        $messch="<i><b>невидимка</b></i> наложил заклятие форумного молчания на персонажа &quot;$target&quot; сроком $magictime";
						}
						mysql_query("INSERT INTO `lichka`(`id`,`pers`,`text`,`date`) VALUES ('','".$tar['id']."','$mess','".time()."');");
						mysql_query("INSERT INTO `paldelo`(`id`,`author`,`text`,`date`) VALUES ('','".$_SESSION['uid']."','$mess','".time()."');");
						addch("<font color=red><b>Внимание!</b> </font><img src=http://img.bestcombats.net/pbuttons/sleepf.gif> $messch");
						addchp($coma[rand(0,count($coma)-1)],"Комментатор");
						echo "<font color=red><b>Успешно наложено заклятие форумного молчания на персонажа \"$target\"</b></font>";			
					} 
					else {
						echo "<font color=red><b>Произошла ошибка!<b></font>";
					}
				}
				else {
					echo "<font color=red><b>Вы не можете наложить заклятие форумного молчания на этого персонажа!<b></font>";
				}
			}
		}
		else {
			echo "<font color=red><b>Персонаж \"$target\" не существует!<b></font>";
		}
?>
