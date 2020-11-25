<?php

$us = mysql_fetch_array(mysql_query("SELECT *,(select `id` from `online` WHERE `real_time` >= ".(time()-60)." AND `id` = users.`id`) as `online`  FROM `users` WHERE `login` = '{$_POST['target']}' LIMIT 1;"));
$battle = mysql_fetch_array(mysql_query("SELECT `closed` FROM `battle` WHERE `id` = '{$us['battle']}' ;"));
$owntravma = mysql_fetch_array(mysql_query("SELECT * FROM `effects` WHERE `owner` = ".$us['id']." AND (type=13 OR ND type=12 OR  type=14);"));
$magic = mysql_fetch_array(mysql_query("SELECT `chanse` FROM `magic` WHERE `id` = '23' ;"));

if ($battle['closed']== 1) {
	echo "Этот бой изолирован от внешнего мира";
}
elseif ($user['battle'] > 0) {
	echo "Не в бою...";
}
elseif (!$us['online']) {
	echo "Персонаж не в игре!";
}
elseif ($user['zayavka'] > 0) {
	echo "Вы ожидаете поединка...";
} elseif ($user['room'] != $us['room']) {
	echo "Персонаж в другой комнате!";
} elseif ($us['room'] == 31) {
	echo "Нападения в этой локации запрещены!";
} elseif ($us['room'] == 402) {
	echo "Нападения в этой локации запрещены!";
} elseif ($us['room'] == 403) {
	echo "Нападения в этой локации запрещены!";
} elseif ($us['room'] == 404) {
	echo "Нападения в этой локации запрещены!";
} elseif ($us['battle'] <= 0) {
	echo "Персонаж не в бою!";
} elseif ($us['level'] < 1) {
	echo "Новички находятся под защитой мироздателя!";
} elseif ($user['hp'] < $user['maxhp']*0.33) {
	echo "Вы слишком ослаблены для нападения!";
} elseif ($us['hp'] < 1  && $us['battle']) {
	echo "Вы не можете вмешаться за погибшего!";
} else { //if (rand(1,100) < $int) {

			if ($user['sex'] == 1) {$action="заступился";}	else {$action="заступилась";}
			if ($user['align'] > '2' && $user['align'] < '3')  {
				$angel="Ангел";
			} elseif ($user['align'] > '0.98' && $user['align'] < '2') {
				$angel="Персонаж";
			}


			$jert = mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `login` = '{$_POST['target']}' LIMIT 1;"));
			if($jert['id']!=$user['id']) {
				addch("<img src=i/magic/bratl.gif> <B>{$user['login']}</B>, применив магию помощь союзнику, ".$action." за &quot;{$_POST['target']}&quot;");
				addchp ('<font color=red>Внимание!</font> За Вас '.$action.' в бой <B>'.$user['login'].'</B>.<BR>\'; top.frames[\'main\'].location=\'fbattle.php\'; var z = \'   ','{[]}'.nick7 ($jert['id']).'{[]}');
				//destructitem($row['id']);
				$bet=1;
				//арх
				if($jert['id'] > _BOTSEPARATOR_) {
					$arha = mysql_fetch_array(mysql_query ('SELECT * FROM `bots` WHERE `prototype` = '.$jert['id'].' LIMIT 1;'));
					$jert['battle'] = $arha['battle'];
					$jert['id'] = $arha['id'];
					$bot=1;
				}
				if($jert['battle'] > 0) {
					//вмешиваемся
					$bd = mysql_fetch_array(mysql_query ('SELECT * FROM `battle` WHERE `id` = '.$jert['battle'].' LIMIT 1;'));
					$battle = unserialize($bd['teams']);
			//		$ak = array_keys($battle[$jert['id']]);
					$battle[$user['id']] = $battle[$jert['id']];
					foreach($battle[$user['id']] as $k => $v) {
						$battle[$user['id']][$k] =array(0,0,time());
						$battle[$k][$user['id']] = array(0,0,time());
					}
					$t1 = explode(";",$bd['t1']);
					// проставляем кто-где
					if (in_array ($jert['id'],$t1)) {
						$ttt = 1;
					} else {
						$ttt = 2;
					}
					addch ("<b>".nick7($user['id'])."</b> вмешался в <a href=logs.php?log=".$id." target=_blank>поединок »»</a>.  ",$user['room']);

					//mysql_query('UPDATE `logs` SET `log` = CONCAT(`log`,\'<span class=date>'.date("H:i").'</span> '.nick5($user['id'],"B".$ttt).' вмешался в поединок!<BR>\') WHERE `id` = '.$jert['battle'].'');

					addlog($jert['battle'],'<span class=date>'.date("H:i").'</span> '.nick5($user['id'],"B".$ttt).' вмешался в поединок!<BR>');

					mysql_query('UPDATE `battle` SET `teams` = \''.serialize($battle).'\', `t'.$ttt.'`=CONCAT(`t'.$ttt.'`,\';'.$user['id'].'\')  WHERE `id` = '.$jert['battle'].' ;');
					mysql_query("UPDATE users SET `battle` =".$jert['battle'].",`zayavka`=0 WHERE `id`= ".$user['id']);

					header("Location:fbattle.php");
					//die("<script>location.href='fbattle.php';</script>");
				}
				else
				{
					// начинаем бой
					//$bet=1;
					// если чел в заявке, выбиваем его
					if($jert['zayavka']) {
						$fict1 = mysql_fetch_array(mysql_query("SELECT * FROM `zayavka` WHERE `team1` LIKE '{$jert['id']};%' OR `team1` LIKE '%;{$jert['id']};%' LIMIT 1;"));
						$fict2 = mysql_fetch_array(mysql_query("SELECT * FROM `zayavka` WHERE `team2` LIKE '{$jert['id']};%' OR `team2` LIKE '%;{$jert['id']};%' LIMIT 1;"));
						if($fict1) { $team=1; }
						elseif($fict2) { $team=2; }

						mysql_query("UPDATE `users` SET `zayavka` = '' WHERE `id` = {$jert['id']} LIMIT 1;");
						$z = mysql_fetch_array(mysql_query("SELECT `team{$team}` FROM `zayavka` WHERE `id`=".$jert['zayavka'].";"));

						$teams = str_replace($jert['id'].";","",$z[0]);
						mysql_query("UPDATE  `zayavka` SET team{$team} = '{$teams}' WHERE	id = {$jert['zayavka']};");
					}

					//arch
					if($bot) {
						mysql_query("INSERT INTO `bots` (`name`,`prototype`,`battle`,`hp`) values ('Архивариус','83','','".$jert['hp']."');");
						$jert['id'] = mysql_insert_id();
					}

					$teams = array();
					$teams[$user['id']][$jert['id']] = array(0,0,time());
					$teams[$jert['id']][$user['id']] = array(0,0,time());
					$sv = array(3,4,5);
					//$tou = array_rand($sv,1);
					mysql_query("INSERT INTO `battle`
						(
							`id`,`coment`,`teams`,`timeout`,`type`,`status`,`t1`,`t2`,`to1`,`to2`,`blood`
						)
						VALUES
						(
							NULL,'','".serialize($teams)."','".$sv[rand(0,2)]."','1','0','".$user['id']."','".$jert['id']."','".time()."','".time()."','0'
						)");

					$id = mysql_insert_id();

					// апдейтим врага
					if($bot) {
						mysql_query("UPDATE `bots` SET `battle` = {$id} WHERE `id` = {$jert['id']} LIMIT 1;");
					} else {
						mysql_query("UPDATE `users` SET `battle` = {$id} WHERE `id` = {$jert['id']} LIMIT 1;");
					}

					// создаем лог


					$rr = "<b>".nick3($user['id'])."</b> и <b>".nick3($jert['id'])."</b>";
					addch ("<a href=logs.php?log=".$id." target=_blank>Бой</a> между <B><b>".nick7($user['id'])."</b> и <b>".nick7($jert['id'])."</b> начался.   ",$user['room']);

					//mysql_query("INSERT INTO `logs` (`id`,`log`) VALUES('{$id}',"Часы показывали <span class=date>".date("Y.m.d H.i")."</span>, когда ".$rr." бросили вызов друг другу. <BR>");

					addlog($id,"Часы показывали <span class=date>".date("Y.m.d H.i")."</span>, когда ".$rr." бросили вызов друг другу. <BR>");

					mysql_query("UPDATE users SET `battle` ={$id},`zayavka`=0 WHERE `id`= {$user['id']} OR `id` = {$jert['id']}");
					header("Location:fbattle.php");
					//die("<script>location.href='fbattle.php';</script>");
				}
			} else {
				echo '<font color=red>Мазохист?...</font>';
			}
		//$bet=1;
} /*else {
		echo "Свиток рассыпался в ваших руках...";
		$bet=1;
	}*/
?>