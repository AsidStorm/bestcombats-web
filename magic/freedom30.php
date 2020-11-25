<?php
// Магия Свободы на месяц
		if ($_SESSION['uid'] == null) header("Location: index.php");
		if ($user['spellfreedom']==1) {
		echo"Персонаж уже подвластен магии хаоса";
		}
		elseif ($user['vip']==1) {
		echo"VIP персонаж не может прочесть данный свиток";
		}
		elseif ($user['align']> '1' && $user['align']< '2') {
		echo"Паладин не может использовать данный свиток";
		}
		elseif ($user['align']> '3' && $user['align']< '3') {
		echo"Тарман не может использовать данный свиток";
		}
		elseif ($user['align']=='4') {
		echo"Хаосник не может прочесть данный свиток";
		}
		else{
		$user = mysqli_fetch_array(db_query("SELECT * FROM `users` WHERE `id` = '{$_SESSION['uid']}' LIMIT 1;"));
		$magictime=time()+(30*60*1440);		
		if (db_query("INSERT INTO `effects` (`owner`,`name`,`time`,`type`) values ('".$user['id']."','Магия свободы','$magictime',22);")) {
		db_query("DELETE FROM`effects` WHERE `owner` = '{$user['id']}' and `type` = '10' LIMIT 1 ;");
		db_query("UPDATE `users` SET  `spellfreedom`='1' WHERE `id` = {$user['id']} LIMIT 1;");
		$ldtarget=$user['login'];
		$ldblock=1;
		if ($user['sex'] == 1) {$action="применил";}
		else {$action="применила";}
		if ($user['sex'] == 1)  {$pol="стал свободным";}
		else {$pol="стала свободной";}
		$mess="Персонаж &quot;{$user['login']}&quot; $action магию истинного хаоса и $pol.";
		$messch="Персонаж &quot;{$user['login']}&quot; $action магию истинного хаоса и $pol.";						
		db_query("INSERT INTO `lichka`(`id`,`pers`,`text`,`date`) VALUES ('','".$user['id']."','$mess','".time()."');");
		addch("<img src=i/magic/freedom30.gif> $messch");
		echo "<font color=red><b>Персонаж \"{$user['login']}\" свободен</b></font>";			
		}
		else {
		echo "<font color=red><b>Вы не можете наложить магию Истинного Хаоса на этого персонажа!<b></font>";
		}
	$bet=1;
}
?>