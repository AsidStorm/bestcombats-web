<?php
// magic �������������
if ($_SESSION['uid'] == null) header("Location: index.php");

if ($user['battle'] == 0) {
	echo "��� ������ �����...";
} else {
	$magic = mysql_fetch_array(mysql_query("SELECT `chanse` FROM `magic` WHERE `id` = '16' ;"));			
	if ($user['hp'] >= 0) {
		$int=$magic['chanse'] + ($user['hp'] - 0);
		if ($int>98){$int=99;}
	}
	else {$int=0;}

	if (rand(1,100) < $int) {
		$nb = mysql_fetch_array(mysql_query("SELECT count(`id`) FROM `bots` WHERE `name` LIKE '".$user['login']." (����%';"));
		mysql_query("INSERT INTO `bots` (`name`,`prototype`,`battle`,`hp`) values ('".$user['login']." (���� ".($nb[0]+1).")','".$user['id']."','".$user['battle']."','".$user['hp']."');");
		$bot = mysql_insert_id();
		
		$bd = mysql_fetch_array(mysql_query ('SELECT * FROM `battle` WHERE `id` = '.$user['battle'].' LIMIT 1;'));
		$battle = unserialize($bd['teams']);
		$battle[$bot] = $battle[$user['id']];
		foreach($battle[$bot] as $k => $v) {
			$battle[$k][$bot] = array(0,0,time());
		}
		$t1 = explode(";",$bd['t1']);		
		// ����������� ���-���
		if (in_array ($user['id'],$t1)) {
			$ttt = 1;
		} else {	
			$ttt = 2;
		}					
		//mysql_query('UPDATE `logs` SET `log` = CONCAT(`log`,\'<span class=date>'.date("H:i").'</span> '.nick5($user['id'],"B".$ttt).' ������� ������ ����� '.nick5($bot,"B".$ttt).'<BR>\') WHERE `id` = '.$user['battle'].';');
		addlog($user['battle'],'<span class=date>'.date("H:i").'</span> '.nick5($user['id'],"B".$ttt).' ������� ������ ����� '.nick5($bot,"B".$ttt).'<BR>');
					
		mysql_query('UPDATE `battle` SET `teams` = \''.serialize($battle).'\', `t'.$ttt.'`=CONCAT(`t'.$ttt.'`,\';'.$bot.'\')  WHERE `id` = '.$user['battle'].' ;');
		
		mysql_query("UPDATE `battle` SET `to1` = '".time()."', `to2` = '".time()."' WHERE `id` = ".$user['battle']." LIMIT 1;");							
				
		$bet=1;
		echo "���� ������";
		
	} else {
		echo "������ ���������� � ����� �����...";
		$bet=1;
	}
}

?>