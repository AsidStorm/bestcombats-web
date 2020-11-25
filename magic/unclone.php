<?php
// magic идентификацы€
if ($_SESSION['uid'] == null) header("Location: index.php");

if ($user['battle'] == 0) {
	echo "Ёто боева€ маги€...";
} else {
	$magic = mysql_fetch_array(mysql_query("SELECT `chanse` FROM `magic` WHERE `id` = '17' ;"));
	
	if ($user['intel'] >= 3) {
		$int=$magic['chanse'] + ($user['intel'] - 3)*3;
		if ($int>98){$int=99;}
	}
	else {$int=0;}

	if (rand(1,100) < $int) {
		//$nb = mysql_fetch_array(mysql_query("SELECT count(`id`) FROM `bots` WHERE `name` LIKE '".$user['login']." (клон%';"));
		//mysql_query("INSERT INTO `bots` (`name`,`prototype`,`battle`,`hp`) values ('".$user['login']." (клон ".($nb[0]+1).")','".$user['id']."','".$user['battle']."','".$user['hp']."');");
		//$bot = mysql_insert_id();
		$bot =  mysql_fetch_array(mysql_query("SELECT * FROM `bots` WHERE `name` = '".$_POST['target']."';"));
		if($bot && strpos($_POST['target'],"клон" )) {
			$bot = $bot[0];
		
			$bd = mysql_fetch_array(mysql_query ('SELECT * FROM `battle` WHERE `id` = '.$user['battle'].' LIMIT 1;'));
			$battle = unserialize($bd['teams']);			
			$battle[$bot] = $battle[$user['id']];
			foreach($battle as $k => $v) {
				unset($battle[$k][$bot]);
			}
			
			foreach($battle[$user['id']] as $k => $v) {
				$battle[$k][$bot] = array(0,0,time());
			}
			$t1 = explode(";",$bd['t1']);	
			$t2 = explode(";",$bd['t2']);
			foreach($t1 as $k=>$v) {
				if($v==$bot) {
					unset($t1[$k]);
				}
			}
			foreach($t2 as $k=>$v) {
				if($v==$bot) {
					unset($t2[$k]);
				}
			}			
			// проставл€ем кто-где
			if (in_array ($user['id'],$t1)) {
				$ttt = 1;
				$t1[] = $bot;
			} else {	
				$ttt = 2;
				$t2[] = $bot;
			}	
			
			$t1 = implode(";",$t1);
			$t2 = implode(";",$t2);
			
			//mysql_query('UPDATE `logs` SET `log` = CONCAT(`log`,\'<span class=date>'.date("H:i").'</span> '.nick5($user['id'],"B".$ttt).' переманил клона '.nick5($bot,"B").' на свою сторону<BR>\') WHERE `id` = '.$user['battle'].';');
			addlog($user['battle'],'<span class=date>'.date("H:i").'</span> '.nick5($user['id'],"B".$ttt).' переманил клона '.nick5($bot,"B").' на свою сторону<BR>');
			mysql_query('UPDATE `battle` SET `teams` = \''.serialize($battle).'\', `t1` = \''.$t1.'\', `t2` = \''.$t2.'\'  WHERE `id` = '.$user['battle'].' ;');
			
			mysql_query("UPDATE `battle` SET `to1` = '".time()."', `to2` = '".time()."' WHERE `id` = ".$user['battle']." LIMIT 1;");							
					
			$bet=1;
			echo "¬ы переманили клона";
		} else {
			echo "Ќет такого клона";
		}
	} else {
		echo "—виток рассыпалс€ в ваших руках...";
		$bet=1;
	}
}

?>