<?php
// magic идентификацыя	
$coma[] = "А жену мою отправь?!";
$coma[] = "Да, у него все равно в голове хаос был. ";
$coma[] = "Закон жесток, но справедлив!";
$coma[] = "Здесь будет править Закон, а не Хаос!";
$coma[] = "И с этим хаотиком я хотел дружить... ";
$coma[] = "Мне б жену туда же ";
$coma[] = "Не тыкайте в него пальцами, не надо!";
$coma[] = "С утра ждал этого момента";
$coma[] = "Тащите его сюда, где мое большое клеймо???";
$coma[] = "Теперь твои глазки голубыми не назовешь.";
$coma[] = "Тот, кто попирает закон ногами, не может прочно стоять на них.";
$coma[] = "Ходят тут всякие, а потом вещи пропадают. ";
$coma[] = "Хаос наступает ";
$coma[] = "С вещами на выход.";
$coma[] = "Законы надо соблюдать, клеймо рогатое!";
$coma[] = "Ай-яй-яй, какие люди среди нас! ";
$coma[] = "Присвойте ему номер, а то там такая неразбериха. ";
$coma[] = "Мда…. Надеюсь это не смертельно. ";
$coma[] = "Хвала Мироздателю!";


		if ($_SESSION['uid'] == null) header("Location: index.php");

		$magictime=time()+($_POST['timer']*60*1440);
		$tar = mysqli_fetch_array(db_query("SELECT `id`,`prison`,`room` FROM `users` WHERE `login` = '{$_POST['target']}' LIMIT 1;"));
		db_query("select * from `online`  WHERE `id` = '{$tar['id']}';");
		$target=$_POST['target'];
		if ($tar['id']) {
			$effect = mysqli_fetch_array(db_query("SELECT `time` FROM `effects` WHERE `owner` = '{$tar['id']}' and `type` = '21' LIMIT 1;"));
			
			if ($effect['time']) {
				$time_still=$effect['time'] - time();
				$time_new=$magictime - time();
				if ($time_still < $time_new) {
					$ok=0;
					if (($user['align'] > '2' && $user['align'] < '3') || $user['align'] == '777') {$ok=1;}
					elseif (($user['align'] > '1.6' && $user['align'] < '2') && ($tar['align'] > '1' && $tar['align'] < '2') && ($user['align'] > $tar['align'])) {
						$ok=1;
					}
					elseif (($user['align'] > '1.6' && $user['align'] < '2') && !($tar['align'] > '2' && $tar['align'] < '3') && !($tar['align'] > '1' && $tar['align'] < '2')) {
						$ok=1;
					}
				    elseif ($user['align'] > '3' && $user['align'] < '4') {
					$ok=1;
				    }
                    elseif (($user['align'] > '3.06' && $user['align'] < '4') && ($tar['align'] > '1' && $tar['align'] < '2') && ($user['align'] > $tar['align'])) {
					$ok=1;
					}
					elseif (($user['align'] > '3.06' && $user['align'] < '4') && !($tar['align'] > '2' && $tar['align'] < '3') && !($tar['align'] > '1' && $tar['align'] < '2')) {
						$ok=1;
                                                                                }
					if ($ok == 1) {
						if (db_query("UPDATE `effects` SET `time`='$magictime' WHERE `id` = '{$tar['id']}' LIMIT 1;")) {
							$ldtarget=$target;
							$ldblock=1;
						
							switch($_POST['timer']) {
								case "1": $magictime="один день."; break;
								case "2": $magictime="два дня."; break;
								case "3": $magictime="три дня."; break;
								case "7": $magictime="неделя."; break;
								case "14": $magictime="две недели."; break;
								case "30": $magictime="месяц."; break;
								case "60": $magictime="два месяца."; break;
								case "365": $magictime="бессрочно."; break;
							}
							if ($user['sex'] == 1) {$action="отправил";}
							else {$action="отправила";}
							if ($user['nevid'] == '1') {
                        $angel="невидимка";
                        }
                        elseif ($user['align'] > '2' && $user['align'] < '3')  {
                        $angel="Ангел";
                        }
                        elseif ($user['align'] > '1' && $user['align'] < '2') {
                        $angel="Паладин";
                        }
						elseif ($user['align'] > '3' && $user['align'] <'4') {
						$angel="Тарман";
						}
							$mess="Продление заточения. $angel &quot;{$user['login']}&quot; $action в заточение персонажа &quot;$target&quot; сроком $magictime";
							$messch="Продление заточения. $angel &quot;{$user['login']}&quot; $action в заточение персонажа &quot;$target&quot; сроком $magictime.";
						    if ($user['invis'] == '1') {
						$mess="Продление заточения. $angel &quot;{$user['login']}&quot; $action в заточение персонажа &quot;$target&quot; сроком $magictime";
						$messch="Продление заточения. &quot;невидимка&quot; отправил в заточение персонажа &quot;$target&quot; сроком $magictime";
                        }
							db_query("INSERT INTO `lichka`(`id`,`pers`,`text`,`date`) VALUES ('','".$tar['id']."','$mess','".time()."');");
							db_query("INSERT INTO `paldelo`(`id`,`author`,`text`,`date`) VALUES ('','".$_SESSION['uid']."','$mess','".time()."');");
							addch("<img src=i/magic/jail.gif> $messch");
							addchp($coma[rand(0,count($coma)-1)],"Комментатор");
							echo "<font color=red><b>Персонаж \"$target\" отправлен в заточение</b></font>";	
						}
						else {
							echo "<font color=red><b>Произошла ошибка!<b></font>";
						}
					}
					else {
						echo "<font color=red><b>Вы не можете отправить в заточение этого персонажа!<b></font>";	
					}
				}
				else {
					echo "<font color=red><b>Вы не можете сократить срок наказания!</b></font>";
				}
			}
			else {
				$ok=0;
				if ($user['align'] > '2' && $user['align'] < '3') {
					$ok=1;
				}
				elseif (($user['align'] > '1.6' && $user['align'] < '2') && ($tar['align'] > '1' && $tar['align'] < '2') && ($user['align'] > $tar['align'])) {
					$ok=1;
				}
				elseif (($user['align'] > '1.6' && $user['align'] < '2') && !($tar['align'] > '2' && $tar['align'] < '3') && !($tar['align'] > '1' && $tar['align'] < '2')) {
					$ok=1;
				}
                elseif (($user['align'] > '3.06' && $user['align'] < '4') && ($tar['align'] > '1' && $tar['align'] < '2') && ($user['align'] > $tar['align'])) {
				$ok=1;
					}
				elseif (($user['align'] > '3.06' && $user['align'] < '4') && !($tar['align'] > '2' && $tar['align'] < '3') && !($tar['align'] > '1' && $tar['align'] < '2')) {
						$ok=1;
                                                                                }
				if ($ok == 1) {
					if (db_query("INSERT INTO `effects` (`owner`,`name`,`time`,`type`) values ('".$tar['id']."','Заточение','$magictime',21);")) {
					        include "functions/wake.php";
					        wake($tar['id']);
						db_query("UPDATE `users` SET  `prison`='1', `room`='666' WHERE `id` = {$tar['id']} LIMIT 1;");
						db_query("UPDATE `online` SET  `room`='666' WHERE `id` = {$tar['id']} LIMIT 1;");
						
						$ldtarget=$target;
						$ldblock=1;
						
						switch($_POST['timer']) {
							case "1": $magictime="один день."; break;
							case "2": $magictime="два дня."; break;
							case "3": $magictime="три дня."; break;
							case "7": $magictime="неделя."; break;
							case "14": $magictime="две недели."; break;
							case "30": $magictime="месяц."; break;
							case "60": $magictime="два месяца."; break;
							case "365": $magictime="бессрочно."; break;
						}
						if ($user['sex'] == 1) {$action="отправил";}
						else {$action="отправила";}
                        if ($user['align'] > '2' && $user['align'] < '3')  {
                        $angel="Ангел";
                        }
                        elseif ($user['align'] > '1' && $user['align'] < '2') {
                        $angel="Паладин";
                        }
						elseif ($user['align'] > '3' && $user['align'] <'4') {
						$angel="Тарман";
						}
						$mess="$angel &quot;{$user['login']}&quot; $action в заточение персонажа &quot;$target&quot; сроком $magictime";
						$messch="$angel &quot;{$user['login']}&quot; $action в заточение персонажа &quot;$target&quot; сроком $magictime.";
						if ($user['invis'] == '1') {
						$mess="$angel &quot;{$user['login']}&quot; $action в заточение персонажа &quot;$target&quot; сроком $magictime";
						$messch="&quot;невидимка&quot; отправил в заточение персонажа &quot;$target&quot; сроком $magictime";
                        }
						db_query("INSERT INTO `lichka`(`id`,`pers`,`text`,`date`) VALUES ('','".$tar['id']."','$mess','".time()."');");
						db_query("INSERT INTO `paldelo`(`id`,`author`,`text`,`date`) VALUES ('','".$_SESSION['uid']."','$mess','".time()."');");
						addch("<img src=i/magic/jail.gif> $messch");
						addchp($coma[rand(0,count($coma)-1)],"Комментатор");
						echo "<font color=red><b>Персонаж \"$target\" отправлен в заточение</b></font>";			
					} 
					else {
						echo "<font color=red><b>Произошла ошибка!<b></font>";
					}
				}
				else {
					echo "<font color=red><b>Вы не можете отправить в заточение этого персонажа!<b></font>";
				}
			}
		}
		else {
			echo "<font color=red><b>Персонаж \"$target\" не существует!<b></font>";
		}
?>
