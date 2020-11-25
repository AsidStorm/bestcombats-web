<?php
// магия "шаг назад"
$uses_zel = mqfa1("SELECT id FROM `effects` WHERE `owner` = ".$user['id']." AND (sila>0 or lovk>0 or inta>0 or intel>0 or mudra>0)");

if ($user['battle'] > 0) {
	echo "Не в бою...";
} elseif ($uses_zel) {
  echo "Эту магию нельзя использовать под воздействием эликсира или имея травму.";
} elseif (rand(1,100)!=1) {
  getadditdata($user["id"]);
	undressall($user['id']);
	$user = mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id` = '{$_SESSION['uid']}' LIMIT 1;"));	
	if ($_SESSION['uid'] == null) header("Location: index.php");
	if($user['sila']>3){
	  mysql_query("UPDATE `users` SET `stats`=`stats`+1,`sila` = `sila`-1 WHERE `id` = '{$_SESSION['uid']}' LIMIT 1");
	  mysql_query("UPDATE `userdata` SET `stats`=`stats`+1,`sila` = `sila`-1 WHERE `id` = '{$_SESSION['uid']}' LIMIT 1");
	}
	if($user['inta']>3){
	  mysql_query("UPDATE `users` SET `stats`=`stats`+1,`inta` = `inta`-1 WHERE `id` = '{$_SESSION['uid']}' LIMIT 1");
	  mysql_query("UPDATE `userdata` SET `stats`=`stats`+1,`inta` = `inta`-1 WHERE `id` = '{$_SESSION['uid']}' LIMIT 1");
	}
	if($user['lovk']>3){
	  mysql_query("UPDATE `users` SET `stats`=`stats`+1,`lovk` = `lovk`-1 WHERE `id` = '{$_SESSION['uid']}' LIMIT 1");
	  mysql_query("UPDATE `userdata` SET `stats`=`stats`+1,`lovk` = `lovk`-1 WHERE `id` = '{$_SESSION['uid']}' LIMIT 1");
	}
	if($user['vinos']>3){
	  if($user['hp']<= ($user['maxhp']-6)) {
	    mysql_query("UPDATE `users` SET `stats`=`stats`+1, `maxhp`=`maxhp`-'6',`vinos` = `vinos`-1 WHERE `id` = '{$_SESSION['uid']}' LIMIT 1");
	  } else {
	    mysql_query("UPDATE `users` SET `stats`=`stats`+1, `maxhp`=`maxhp`-'6', `hp`=`hp`-'6',`vinos` = `vinos`-1 WHERE `id` = '{$_SESSION['uid']}' LIMIT 1");
	  }
	  mysql_query("UPDATE `userdata` SET `stats`=`stats`+1,`vinos` = `vinos`-1 WHERE `id` = '{$_SESSION['uid']}' LIMIT 1");
	}
	if($user['intel'] >0) {
	  mysql_query("UPDATE `users` SET `stats`=`stats`+1,`intel` = `intel`-1 WHERE `id` = '{$_SESSION['uid']}' LIMIT 1");
	  mysql_query("UPDATE `userdata` SET `stats`=`stats`+1,`intel` = `intel`-1 WHERE `id` = '{$_SESSION['uid']}' LIMIT 1");
	}
	if($user['mudra'] >0) {
	  mysql_query("UPDATE `users` SET `stats`=`stats`+1,`mudra` = `mudra`-1 WHERE `id` = '{$_SESSION['uid']}' LIMIT 1");
	  mysql_query("UPDATE `userdata` SET `stats`=`stats`+1,`mudra` = `mudra`-1 WHERE `id` = '{$_SESSION['uid']}' LIMIT 1");
	}
	if($user['sexy'] >0) {
	  mysql_query("UPDATE `users` SET `stats`=`stats`+1,`sexy` = `sexy`-1 WHERE `id` = '{$_SESSION['uid']}' LIMIT 1");
	  mysql_query("UPDATE `userdata` SET `stats`=`stats`+1,`sexy` = `sexy`-1 WHERE `id` = '{$_SESSION['uid']}' LIMIT 1");
	}
	if($user['spirit'] >0) {
	  mysql_query("UPDATE `users` SET `stats`=`stats`+1,`spirit` = `spirit`-1 WHERE `id` = '{$_SESSION['uid']}' LIMIT 1");
	  mysql_query("UPDATE `userdata` SET `stats`=`stats`+1,`spirit` = `spirit`-1 WHERE `id` = '{$_SESSION['uid']}' LIMIT 1");
	}
	echo "<font color=red><b>Удачно использована магия \"Шаг назад\"<b></font>";
	$bet=1;
} else {
  echo "Заклинание не удалось.";
  $bet=1;
}
?>