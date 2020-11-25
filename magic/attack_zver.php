<?php
// magic идентификацыя
if ($_SESSION['uid'] == null) header("Location: index.php");

if ($user['battle'] == 0) {
	echo "Это боевая магия...";
} else {
	$magic = mysqli_fetch_array(db_query("SELECT `chanse` FROM `magic` WHERE `id` = '202' ;"));
	if ($user['intel'] >= 4) {
		$int=$magic['chanse'] + ($user['intel'] - 4)*3;
		if ($int>98){$int=99;}
	}
	else {$int=0;}

	//if (rand(1,100) < $int) {
	    $zver=mysqli_fetch_array(db_query("SELECT * FROM `users` WHERE `id` = '{$user['zver_id']}' LIMIT 1;"));
    if($zver){
	if($zver['sitost']>=3){
		$nb = mysqli_fetch_array(db_query("SELECT id FROM `bots` WHERE `name` LIKE '".$zver['login']."';"));
		if(!$nb){
		db_query("INSERT INTO `bots` (`name`,`prototype`,`battle`,`hp`) values ('".$zver['login']."','".$zver['id']."','".$user['battle']."','".$zver['hp']."');");
		$bot = db_insert_id();
		
		$bd = mysqli_fetch_array(db_query ('SELECT * FROM `battle` WHERE `id` = '.$user['battle'].' LIMIT 1;'));
		$battle = unserialize($bd['teams']);
		$battle[$bot] = $battle[$user['id']];
		foreach($battle[$bot] as $k => $v) {
			$battle[$k][$bot] = array(0,0,time());
		}
		$t1 = explode(";",$bd['t1']);		
		if (in_array ($user['id'],$t1)) {$ttt = 1;} else {	$ttt = 2;}					
		addlog($user['battle'],'<span class=date>'.date("H:i").'</span> '.nick5($user['id'],"B".$ttt).' призвал своего зверя '.nick5($bot,"B".$ttt).'<BR>');
					
		db_query('UPDATE `battle` SET `teams` = \''.serialize($battle).'\', `t'.$ttt.'`=CONCAT(`t'.$ttt.'`,\';'.$bot.'\')  WHERE `id` = '.$user['battle'].' ;');
		
		db_query("UPDATE `battle` SET `to1` = '".time()."', `to2` = '".time()."' WHERE `id` = ".$user['battle']." LIMIT 1;");
				
		$bet=1;
		echo "Ваш зверь призван в бой.";
		
		}else{echo "Ваш зверь уже был призван в бой.";}
		}else{echo "Ваш зверь слишком голодный.";}
		}else{echo "У вас нет зверя!";}
//	} //else {
		//echo "Свиток рассыпался в ваших руках...";
		//$bet=1;
	//}
}

?>