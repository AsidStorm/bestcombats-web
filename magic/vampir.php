<?php

// ���������
	$coma = array (
"��������� ������!",
"������ �� ����� ��������� ��������.",
"��-��, � � �������� ��� ����",
"�������� ������ ����� ��� ���� � ���� � ��� �������.",
"��-�����, ���� � ���� ���� ����� :(",
"� �� ������, ��� ��� ������ ������� ����?",
"�������� ���� �����!",
"��, ���� �� ����������, � � ����� ��� �� ������.",
"��� ���������� ���-�� �������������.",
"� ����� �� ���������� ����.",
"� ������ �������, ��� ������� - ��������� ��� :)",
"���� ���������!",
"������� � ����� �� ��������.",
"� ���� �������������, ������ �� �����, ��� ������� � �������� :)",
"���������, ��� ������ �������...",
"�� ��� �� ��� ��������???",
"������ ��� ����� �� ��� ������.",
"���������...",
"������� �� ����������, �� ���, ������ ???",
"���������, � ������ �� ���� ������ ��������???",
"������ - �� ������ ��� ��������.",
"��� � ���� ������ ��������.",
"�������� ������ - �� ����� ��������...�� ��� ��� ��� ���������....",
"��, � ��� ������� ���� � �������� ������������");

if ($user['battle'] > 0) {
	echo "�� � ���...";                           
} elseif (in_array($user["room"], $noattackrooms) || in_array($user["room"], $canalrooms)) {
  echo "� ���� ������� ��������� ��������!";
} elseif (!canmakequest(5)) {
  echo "�� ��� �� ������������ ���� ����� �������� ����!";
} else {
		if ($_SESSION['uid'] == null) header("Location: index.php");
		$target=$_POST['target'];
		$us = mysql_fetch_array(mysql_query("SELECT *, (SELECT `id` FROM `inventory` WHERE `owner` = `users`.`id` AND `name` LIKE '%������%' LIMIT 1) AS `che`, (SELECT `id` FROM `inventory` WHERE `owner` = `users`.`id` AND `name` LIKE '%�������� ���%' LIMIT 1) AS `kol`,(select `id` from `online` WHERE `date` >= ".(time()-60)." AND `id` = users.`id`) as `online` FROM `users` WHERE `login` = '{$_POST['target']}' LIMIT 1;"));
		$effs = mysql_query("SELECT * FROM `effects` WHERE `owner` = '{$us['id']}' and (`type`=12 or `type`=13 or `type`=14) limit 1;");
		//echo
		if ($us['battle']) { echo "�������� ��������� � ��������!"; }
		elseif ($us['battle']) { echo "�������� ������� ��������!"; }
		elseif ($us['id'] == $user['id']) { echo "�� ������ ����? ��.... ����� ��� � ���� ���� ��������? :)"; }
		elseif ($us['align'] == 0.98) { echo "��� � �� �������, ���?! &quot;{$us['login']}&quot; - ���� ������ ������!"; }
		elseif ($user['hp'] > $user['maxhp']*0.66) { echo "��� ������������� ������, ���� ����� ������������� ���� "; }
		elseif ($us['hp'] < $us['maxhp']*0.33) { echo "������ ������� �����."; }
		elseif ($us['level']<=3) { echo "������ ������� �������, ��� �������� �����������!"; }
		elseif ($us['align'] > 1 && $us['align'] < 2 && $user['klan'] != "FallenAngels") { echo "�� ������� �� ������..."; }
		elseif ($us['align'] > 2 && $us['align'] < 3) { echo "�� ������ ������� ������? ;)"; }
		elseif ($user['room'] != $us['room']) { echo "�������� ��������� � ������ �������.)"; }
		elseif ($user['battle']) { echo "�� � ���..."; }
		elseif ($user['room'] == 31) { echo "������ ������� � ���� �������!"; }
		elseif (((int)date("H") >= 6) && ((int)date("H") < 22)) { echo "������� ������ ������ �� �����"; }
		elseif ($us['level'] > $user['level']) { echo "������ ������� ��������� �������� ������!)"; }
		elseif ($us['online'] == 0) { echo "�������� ��������� � ��������"; }
		else {
			if ($user['sex'] == 1) {$action="�����"; $golod="�����������"; $pil="�����";}
			else {$action="������"; $golod="�����������"; $pil="������";}
			if ($us['sex'] == 1) {$otvet="�� ���"; $who="���";}
			else {$otvet="��� ����"; $who="�";}
			if (($us['che']==0) && ($us['kol']==0)) {
				mysql_query("UPDATE `users` SET `hp` = 1 WHERE `id` = '".$us['id']."';");
				mysql_query("UPDATE `users` SET `hp` = `hp`+'".((($user['maxhp']-$user['hp'])<= $us['hp'])?($user['maxhp']-$user['hp']):$us['hp'])."' WHERE `id` = '".$user['id']."';");
				addch("<img src=i/magic/vampir.gif>{$golod} &quot;{$user['login']}&quot; {$action} �� &quot;{$target}&quot; � {$pil} ��� {$who} �������.");
				addchp($coma[rand(0,count($coma)-1)],"�����������");
				echo "��� ������ ������!";
				makequest(5);
			}
			elseif (($us['kol']!=0 && rand(1,100) < 30) || ($us['id'] == 83 && rand(1,100) < 20)) {
				mysql_query("UPDATE `users` SET `hp` = 1 WHERE `id` = '".$us['id']."';");
				mysql_query("UPDATE `users` SET `hp` = `hp`+'".((($user['maxhp']-$user['hp'])<= $us['hp'])?($user['maxhp']-$user['hp']):$us['hp'])."' WHERE `id` = '".$user['id']."';");
				addch("<img src=i/magic/vampir.gif>{$golod} &quot;{$user['login']}&quot; {$action} �� &quot;{$target}&quot; � {$pil} ��� {$who} �������.");
				addchp($coma[rand(0,count($coma)-1)],"�����������");
				echo "��� ������ ������!";
				makequest(5);
			}
			elseif (($us['kol']!=0) || ($us['id'] == 83)) {
				echo "������ ������!..";
				if ($effs['type'] || in_array($user["room"], $canalrooms)) {
					echo "������ ������!..";
					mysql_query("UPDATE `users` SET `hp` = 1 WHERE `id` = '".$user['id']."';");
					mysql_query("UPDATE `inventory` SET `duration` = `duration`+1 WHERE `id` = '".$us['kol']."' LIMIT 1;");
					addch("<img src=i/magic/vampir.gif>{$golod} &quot;{$user['login']}&quot; {$action} �� &quot;{$target}&quot;, �� {$otvet} ��������� ����� �������.");
				}
				else {
					mysql_query("UPDATE `users` SET `hp` = '".(round(($user['hp']/2),0))."' WHERE `id` = '".$user['id']."';");
					mysql_query("UPDATE `inventory` SET `duration` = `duration`+1 WHERE `id` = '".$us['kol']."' LIMIT 1;");
					addch("<img src=i/magic/vampir.gif>{$golod} &quot;{$user['login']}&quot; {$action} �� &quot;{$target}&quot;, �� {$otvet} ��������� ����� �������.");
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

					// �������� �����
					if($bot) {
						mysql_query("UPDATE `bots` SET `battle` = {$id} WHERE `id` = {$us['id']} LIMIT 1;");
					} else {
						mysql_query("UPDATE `users` SET `battle` = {$id} WHERE `id` = {$us['id']} LIMIT 1;");
					}

					// ������� ���
					$rr = "<b>".nick3($user['id'])."</b> � <b>".nick3($us['id'])."</b>";
					addch ("<a href=logs.php?log=".$id." target=_blank>���</a> ����� <B><b>".nick7($user['id'])."</b> � <b>".nick7($us['id'])."</b> �������.   ",$user['room']);

					//mysql_query("INSERT INTO `logs` (`id`,`log`) VALUES('{$id}','���� ���������� <span class=date>".date("Y.m.d H.i")."</span>, ����� ".$rr." ������� ����� ���� �����. <BR>');");
					addlog($id,'���� ���������� <span class=date>'.date("Y.m.d H.i").'</span>, ����� '.$rr.' ������� ����� ���� �����. <BR>');


					mysql_query("UPDATE users SET `battle` ={$id},`zayavka`=0 WHERE `id`= {$user['id']} OR `id` = {$us['id']}");
					header("Location:fbattle.php");
					die("<script>location.href='fbattle.php';</script>");
				}
			}
			elseif ($us['che']!=0 && rand(1,100) < 30) {
				mysql_query("UPDATE `users` SET `hp` = 1 WHERE `id` = '".$us['id']."';");
				mysql_query("UPDATE `users` SET `hp` = `hp`+'".((($user['maxhp']-$user['hp'])<= $us['hp'])?($user['maxhp']-$user['hp']):$us['hp'])."' WHERE `id` = '".$user['id']."';");
				addch("<img src=i/magic/vampir.gif>{$golod} &quot;{$user['login']}&quot; {$action} �� &quot;{$target}&quot; � {$pil} ��� {$who} �������.");
				addchp($coma[rand(0,count($coma)-1)],"�����������");
				echo "��� ������ ������!";
				makequest(5);
			}
			else {
				echo "������ ������!..";
				mysql_query("UPDATE `users` SET `hp` = 1 WHERE `id` = '".$user['id']."';");
				mysql_query("UPDATE `inventory` SET `duration` = `duration`+1 WHERE `id` = '".$us['che']."' LIMIT 1;");
				addch("<img src=i/magic/vampir.gif>{$golod} &quot;{$user['login']}&quot; {$action} �� &quot;{$target}&quot;, �� {$otvet} ��������� ����� �������.");
			}

		}
}
?>