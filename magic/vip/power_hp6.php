<?php
//жж6
$us = mysql_fetch_array(mysql_query("SELECT *,(select `id` from `online` WHERE `date` >= ".(time()-60)." AND `id` = users.`id`) as `online`  FROM `users` WHERE `login` = '".mysql_escape_string($_POST['target'])."' LIMIT 1;"));
$magic = mysql_fetch_array(mysql_query("SELECT `chanse` FROM `magic` WHERE `id` = '303' ;"));
$effect = mysql_fetch_array(mysql_query("SELECT `time` FROM `effects` WHERE `owner` = '{$us['id']}' and `type` = '26' LIMIT 1;"));

if ($user['intel'] >= 0) {
    $int=$magic['chanse'] + ($user['hp'] - 15)*3;
    if ($int>98){$int=99;}
  }
else {$int=0;}

if ($user['battle'] > 0) {echo "Не в бою...";}
elseif ($user['level'] < 4) { echo "Вашего уровня не достаточно для использования этого заклинания!"; }
elseif ($effect['time']) {echo "На персонаже уже есть заклятие Жажда Жизни +6"; }
elseif (!$us['online']) {echo "Персонаж не в игре!";}
elseif ($us['bot']==1) {echo "Заклятие может быть наложено только на персонажей";}
elseif ($us['login'] != $user['married'] && $us["login"]!=$user['login']) { echo "Возможно использовать на себя либо супругу/супруга!";}
elseif (rand(1,100) < $int) {

      addch("<img src=i/magic/spell_protect10.gif>".($user["invis"]?"Невидимка":"Персонаж &quot;{$user['login']}&quot;")." наложил заклятие \"Жажда Жизни +6\" на &quot;".($user["invis"] && $user["login"]==$_POST['target']?"Невидимка":"$_POST[target]")."&quot;, сроком 2 часа.");
      $addhp=$us['vinos']*6;
      mysql_query("insert into effects (`owner`,`hpforvinos`,`time`,`name`,`type`) values ('".$us['id']."','6',".(time()+7200).",'Жажда Жизни +6',26);");
	  mysql_query("UPDATE `users` SET `maxhp`=`maxhp`+'".$addhp."', `hp`=`hp`+'".$addhp."' WHERE `login` = '{$_POST['target']}' LIMIT 1;");
      echo "<font color=red><b>На персонажа \"{$_POST['target']}\" наложено заклятие \"Жажда Жизни +6\" </b></font>";
      $bet=1;


} else {
        echo "Свиток рассыпался в ваших руках...";
        $bet=1;
      }
?>
