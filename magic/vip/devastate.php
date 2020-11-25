<?php
$us = mysql_fetch_array(mysql_query("SELECT *,(select `id` from `online` WHERE `date` >= ".(time()-60)." AND `id` = users.`id`) as `online`  FROM `users` WHERE `login` = '".mysql_escape_string($_POST['target'])."' LIMIT 1;"));
$magic = mysql_fetch_array(mysql_query("SELECT `chanse` FROM `magic` WHERE `id` = '14' ;"));
$effect = mysql_fetch_array(mysql_query("SELECT `time` FROM `effects` WHERE `owner` = '{$us['id']}' and `type` = '202' LIMIT 1;"));
if ($user['intel'] >= 0) {
$int=$magic['chanse'] + ($user['intel'] - 0);
if ($int>98){$int=99;}
}
else {$int=0;}
if ($user['battle'] > 0) {echo "Не в бою...";}
elseif ($us['battle']) { echo "Персонаж в бою."; }
elseif ($effect['time']) {echo "На персонаже уже есть заклятие Сокрушение"; }
elseif ($us['login'] != $user['married'] && $us["login"]!=$user['login']) { echo "Возможно использовать на себя либо супругу/супруга!"; }
elseif ($user['room'] != $us['room'] && $user["id"]!=7) { echo "Персонаж в другой комнате!"; }
elseif (!$us['online']) {echo "Персонаж не в игре!";}
elseif (rand(1,100) < $int) {
addch("<img src=i/magic/spell_powerup10.gif>".($user["invis"]?"Невидимка":"Персонаж &quot;{$user['login']}&quot;")." наложил заклятие \"Сокрушение\" на &quot;".($user["invis"] && $user["login"]==$_POST['target']?"Невидимка":"$_POST[target]")."&quot;, сроком 2 часа.");
mysql_query("INSERT INTO `effects` (`owner`,`name`,`time`,`type`,caster) values ('$us[id]','Сокрушение',".(time()+7200).",202,'$user[id]');");
echo "<font color=red><b>На персонажа \"{$_POST['target']}\" наложено заклятие \"Сокрушение\" </b></font>";
$bet=1;
} else {
echo "Свиток рассыпался в ваших руках...";
$bet=1;
}
?>