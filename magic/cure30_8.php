<?php
// magic �������������
if ($_SESSION['uid'] == null) header("Location: index.php");
	
		$us = mysql_fetch_array(mysql_query("SELECT *, (select `id` from `online` WHERE `date` >= ".(time()-60)." AND `id` = users.`id`) as `online` FROM `users` WHERE `login` = '{$_POST['target']}' LIMIT 1;"));
		
		if(!$us) {
			$bots = mysql_fetch_array(mysql_query ('SELECT * FROM `bots` WHERE `name` = \''.$_POST['target'].'\' LIMIT 1;'));
			/*if($bots) {
				$id=$bots['prototype'];
				$us = mysql_fetch_array(mysql_query("SELECT *, (select `id` from `online` WHERE `date` >= ".(time()-60)." AND `id` = users.`id`) as `online` FROM `users` WHERE `id` = '{$id}' LIMIT 1;"));
				$us['login'] = $bots['name'];
				$us['hp'] = $bots['hp'];
				$us['id'] = $bots['id'];
				$us['battle'] = $bots['battle'];
				
			}*/
		} 	
		//echo 
		echo "<font color=red><B>";
		if ($bots) { echo "������ ������ ������!"; }
		elseif ($us['battle'] != $user['battle']) { echo "�������� ��������� � ��������!"; }
		elseif ($user['room'] != $us['room'] && !$us['battle']) { echo "�������� � ������ �������!"; }
		elseif ($us['battle'] && !in_array($us['id'],$fbattle->team_mine)) { echo "������ ������ �����������!"; }
                elseif ($us['battle'] && $us["hp"]<=0) { echo "������ ������ ������!"; }
		else {				
		

				
				if ($user['sex'] == 1) {$action="";}
				else {$action="�";}	
				
				if(($us['hp']+30) > $us['maxhp']) {			
					$hp = $us['maxhp'];
				} else {
					$hp = $us['hp']+30;
				}
				if ($user['battle'] > 0) {
					//mysql_query('UPDATE `logs` SET `log` = CONCAT(`log`,\'<span class=date>'.date("H:i").'</span> '.nick5($user['id'],$fbattle->my_class).' ����������� �������� �������������� ������� '.(($us['id']!=$user['id'])?"�� ".nick5($us['id'],$fbattle->my_class):"").' � ����������� ������� ����� <B>+60</B> ['.($hp).'/'.$us['maxhp'].']<BR>\') WHERE `id` = '.$us['battle'].'');
					$fbattle->add_log('<span class=date>'.date("H:i").'</span> '.nick5($user['id'],$fbattle->my_class).' �����������'.$action.' �������� �������������� ������� '.(($us['id']!=$user['id'])?"�� ".nick5($us['id'],$fbattle->my_class):"").' � �����������'.$action.' ������� ����� <B>+30</B> ['.($hp).'/'.$us['maxhp'].']<BR>');
					//$fbattle->add_log('');
						mysql_query("UPDATE `battle` SET `to1` = '".time()."', `to2` = '".time()."' WHERE `id` = ".$user['battle']." LIMIT 1;");							
					
					$fbattle->write_log ();
				}
				
				mysql_query("UPDATE `users` SET `hp` = ".$hp." WHERE `id` = ".$us['id'].";");
                                global $updatebattleunit;
                                $updatebattleunit=$us['id'];
				echo "�� ������������ 30 �� ��������� ".$us['login']."!";
				$bet=1;
				
		}	
		echo "</B></FONT>";
	

?>