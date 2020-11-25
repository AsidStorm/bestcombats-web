<?php

// Вампиризм
	$coma = array (
"Покупайте чеснок!",
"Теперь на кровь остальные сбегутся.",
"Ню-ню, а я осиновый кол точу",
"Примочки святой водой три раза в день и все пройдет.",
"По-моему, жена у меня тоже такая :(",
"А вы думали, что это просто летучие мыши?",
"Готовьте люди колья!",
"Ну, прям по расписанию, а я думал уже не укусит.",
"Это попахивает чем-то потусторонним.",
"И ничто не предвещало беды.",
"Я всегда говорил, мой любимый - чесночный суп :)",
"Тьма наступает!",
"Никогда к этому не привыкну.",
"А ведь предупреждали, садись на пенек, ешь пирожок с чесноком :)",
"Развелось, тут всякой нечисти...",
"Да что же это делается???",
"Второй раз будет не так больно.",
"Кровососы...",
"Сегодня же полнолуние, вы что, забыли ???",
"Интересно, а теперь он тоже станет вампиром???",
"Чеснок - не только при простуде.",
"Это ж надо такому случится.",
"Озверели совсем - на людей кидаются...Не дай бог так оголодать....",
"Ой, а мне бабушка тоже о вампирах рассказывала");

if ($user['battle'] > 0) {
	echo "Не в бою...";                           
} elseif (in_array($user["room"], $noattackrooms) || in_array($user["room"], $canalrooms)) {
  echo "В этой локации вампиризм запрещён!";
} elseif (!canmakequest(5)) {
  echo "Вы ещё не восстановили силы после прошлого раза!";
} else {
		if ($_SESSION['uid'] == null) header("Location: index.php");
		$target=$_POST['target'];
		$us = mysql_fetch_array(mysql_query("SELECT *, (SELECT `id` FROM `inventory` WHERE `owner` = `users`.`id` AND `name` LIKE '%Чеснок%' LIMIT 1) AS `che`, (SELECT `id` FROM `inventory` WHERE `owner` = `users`.`id` AND `name` LIKE '%Осиновый кол%' LIMIT 1) AS `kol`,(select `id` from `online` WHERE `date` >= ".(time()-60)." AND `id` = users.`id`) as `online` FROM `users` WHERE `login` = '{$_POST['target']}' LIMIT 1;"));
		$effs = mysql_query("SELECT * FROM `effects` WHERE `owner` = '{$us['id']}' and (`type`=12 or `type`=13 or `type`=14) limit 1;");
		//echo
		if ($us['battle']) { echo "Персонаж находится в поединке!"; }
		elseif ($us['battle']) { echo "Персонаж ожидает поединка!"; }
		elseif ($us['id'] == $user['id']) { echo "На самого себя? Хм.... может еще и ногу себе откусишь? :)"; }
		elseif ($us['align'] == 0.98) { echo "Что ж ты делаешь, гад?! &quot;{$us['login']}&quot; - твой темный собрат!"; }
		elseif ($user['hp'] > $user['maxhp']*0.66) { echo "Нет необходимости кусать, силы скоро восстановятся сами "; }
		elseif ($us['hp'] < $us['maxhp']*0.33) { echo "Жертва слишком слаба."; }
		elseif ($us['level']<=3) { echo "Нельзя укусить новичка, они защищены Вознесением!"; }
		elseif ($us['align'] > 1 && $us['align'] < 2 && $user['klan'] != "FallenAngels") { echo "Не грешите со светом..."; }
		elseif ($us['align'] > 2 && $us['align'] < 3) { echo "Вы решили укусить Ангела? ;)"; }
		elseif ($user['room'] != $us['room']) { echo "Персонаж находится в другой комнате.)"; }
		elseif ($user['battle']) { echo "Не в бою..."; }
		elseif ($user['room'] == 31) { echo "Нельзя укусить в этой комнате!"; }
		elseif (((int)date("H") >= 6) && ((int)date("H") < 22)) { echo "Вампиры кусают только по ночам"; }
		elseif ($us['level'] > $user['level']) { echo "Нельзя укусить персонажа большего левела!)"; }
		elseif ($us['online'] == 0) { echo "Персонаж находится в оффлайне"; }
		else {
			if ($user['sex'] == 1) {$action="напал"; $golod="Оголодавший"; $pil="выпил";}
			else {$action="напала"; $golod="Оголодавшая"; $pil="выпила";}
			if ($us['sex'] == 1) {$otvet="он дал"; $who="его";}
			else {$otvet="она дала"; $who="её";}
			if (($us['che']==0) && ($us['kol']==0)) {
				mysql_query("UPDATE `users` SET `hp` = 1 WHERE `id` = '".$us['id']."';");
				mysql_query("UPDATE `users` SET `hp` = `hp`+'".((($user['maxhp']-$user['hp'])<= $us['hp'])?($user['maxhp']-$user['hp']):$us['hp'])."' WHERE `id` = '".$user['id']."';");
				addch("<img src=i/magic/vampir.gif>{$golod} &quot;{$user['login']}&quot; {$action} на &quot;{$target}&quot; и {$pil} всю {$who} энергию.");
				addchp($coma[rand(0,count($coma)-1)],"Комментатор");
				echo "Все прошло удачно!";
				makequest(5);
			}
			elseif (($us['kol']!=0 && rand(1,100) < 30) || ($us['id'] == 83 && rand(1,100) < 20)) {
				mysql_query("UPDATE `users` SET `hp` = 1 WHERE `id` = '".$us['id']."';");
				mysql_query("UPDATE `users` SET `hp` = `hp`+'".((($user['maxhp']-$user['hp'])<= $us['hp'])?($user['maxhp']-$user['hp']):$us['hp'])."' WHERE `id` = '".$user['id']."';");
				addch("<img src=i/magic/vampir.gif>{$golod} &quot;{$user['login']}&quot; {$action} на &quot;{$target}&quot; и {$pil} всю {$who} энергию.");
				addchp($coma[rand(0,count($coma)-1)],"Комментатор");
				echo "Все прошло удачно!";
				makequest(5);
			}
			elseif (($us['kol']!=0) || ($us['id'] == 83)) {
				echo "Полный провал!..";
				if ($effs['type'] || in_array($user["room"], $canalrooms)) {
					echo "Полный провал!..";
					mysql_query("UPDATE `users` SET `hp` = 1 WHERE `id` = '".$user['id']."';");
					mysql_query("UPDATE `inventory` SET `duration` = `duration`+1 WHERE `id` = '".$us['kol']."' LIMIT 1;");
					addch("<img src=i/magic/vampir.gif>{$golod} &quot;{$user['login']}&quot; {$action} на &quot;{$target}&quot;, но {$otvet} достойный отпор вампиру.");
				}
				else {
					mysql_query("UPDATE `users` SET `hp` = '".(round(($user['hp']/2),0))."' WHERE `id` = '".$user['id']."';");
					mysql_query("UPDATE `inventory` SET `duration` = `duration`+1 WHERE `id` = '".$us['kol']."' LIMIT 1;");
					addch("<img src=i/magic/vampir.gif>{$golod} &quot;{$user['login']}&quot; {$action} на &quot;{$target}&quot;, но {$otvet} достойный отпор вампиру.");
					$jert = $us;
					if($jert['zayavka']) {
						$fict1 = mysql_fetch_array(mysql_query("SELECT * FROM `zayavka` WHERE `team1` LIKE '{$jert['id']};%' OR `team1` LIKE '%;{$jert['id']};%' LIMIT 1;"));
						$fict2 = mysql_fetch_array(mysql_query("SELECT * FROM `zayavka` WHERE `team2` LIKE '{$jert['id']};%' OR `team2` LIKE '%;{$jert['id']};%' LIMIT 1;"));
						if($fict1) { $team=1; }
						elseif($fict2) { $team=2; }

						mysql_query("UPDATE `users` SET `zayavka` = '' WHERE `id` = {$jert['id']} LIMIT 1;");
						$z = mysql_fetch_array(mysql_query("SELECT `team{$team}` FROM `zayavka` WHERE `id`=".$jert['zayavka'].";"));

						$teams = str_replace($jert['id'].";","",implode(";",$z[0]));
						mysql_query("UPDATE  `zayavka` SET team{$team} = '{$teams}' WHERE	id = {$jert['zayavka']};");
					}

					$teams = array();
					$teams[$user['id']][$us['id']] = array(0,0,time());
					$teams[$us['id']][$user['id']] = array(0,0,time());
					$sv = array(3,5,7,10);
					//$tou = array_rand($sv,1);
					mysql_query("INSERT INTO `battle`
						(
							`id`,`coment`,`teams`,`timeout`,`type`,`status`,`t1`,`t2`,`to1`,`to2`,`blood`
						)
						VALUES
						(
							NULL,'','".serialize($teams)."','".$sv[rand(0,3)]."','6','0','".$user['id']."','".$us['id']."','".time()."','".time()."','1'
						)");

					$id = mysql_insert_id();

					// апдейтим врага
					if($bot) {
						mysql_query("UPDATE `bots` SET `battle` = {$id} WHERE `id` = {$us['id']} LIMIT 1;");
					} else {
						mysql_query("UPDATE `users` SET `battle` = {$id} WHERE `id` = {$us['id']} LIMIT 1;");
					}

					// создаем лог
					$rr = "<b>".nick3($user['id'])."</b> и <b>".nick3($us['id'])."</b>";
					addch ("<a href=logs.php?log=".$id." target=_blank>Бой</a> между <B><b>".nick7($user['id'])."</b> и <b>".nick7($us['id'])."</b> начался.   ",$user['room']);

					//mysql_query("INSERT INTO `logs` (`id`,`log`) VALUES('{$id}','Часы показывали <span class=date>".date("Y.m.d H.i")."</span>, когда ".$rr." бросили вызов друг другу. <BR>');");
					addlog($id,'Часы показывали <span class=date>'.date("Y.m.d H.i").'</span>, когда '.$rr.' бросили вызов друг другу. <BR>');


					mysql_query("UPDATE users SET `battle` ={$id},`zayavka`=0 WHERE `id`= {$user['id']} OR `id` = {$us['id']}");
					header("Location:fbattle.php");
					die("<script>location.href='fbattle.php';</script>");
				}
			}
			elseif ($us['che']!=0 && rand(1,100) < 30) {
				mysql_query("UPDATE `users` SET `hp` = 1 WHERE `id` = '".$us['id']."';");
				mysql_query("UPDATE `users` SET `hp` = `hp`+'".((($user['maxhp']-$user['hp'])<= $us['hp'])?($user['maxhp']-$user['hp']):$us['hp'])."' WHERE `id` = '".$user['id']."';");
				addch("<img src=i/magic/vampir.gif>{$golod} &quot;{$user['login']}&quot; {$action} на &quot;{$target}&quot; и {$pil} всю {$who} энергию.");
				addchp($coma[rand(0,count($coma)-1)],"Комментатор");
				echo "Все прошло удачно!";
				makequest(5);
			}
			else {
				echo "Полный провал!..";
				mysql_query("UPDATE `users` SET `hp` = 1 WHERE `id` = '".$user['id']."';");
				mysql_query("UPDATE `inventory` SET `duration` = `duration`+1 WHERE `id` = '".$us['che']."' LIMIT 1;");
				addch("<img src=i/magic/vampir.gif>{$golod} &quot;{$user['login']}&quot; {$action} на &quot;{$target}&quot;, но {$otvet} достойный отпор вампиру.");
			}

		}
}
?>