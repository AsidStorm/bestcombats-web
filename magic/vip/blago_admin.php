<?php
//жж6
$us = mysqli_fetch_array(db_query("SELECT *,(select `id` from `online` WHERE `date` >= ".(time()-60)." AND `id` = users.`id`) as `online`  FROM `users` WHERE `login` = '".db_escape_string($_POST['target'])."' LIMIT 1;"));
$magic = mysqli_fetch_array(db_query("SELECT `chanse` FROM `magic` WHERE `id` = '252' ;"));
$effect = mysqli_fetch_array(db_query("SELECT `time` FROM `effects` WHERE `owner` = '{$us['id']}' and `type` = '9990' LIMIT 1;"));

if ($user['intel'] >= 0) {
    $int=$magic['chanse'] + ($user['hp'] - 15)*3;
    if ($int>98){$int=99;}
  }
else {$int=0;}

if ($user['battle'] > 0) {echo "Не в бою...";}
elseif ($user['level'] < 4) { echo "Вашего уровня не достаточно для использования этого заклинания!"; }
elseif ($effect['time']) {echo "На персонаже уже есть заклятие Благословение Ангела"; }
elseif (!$us['online']) {echo "Персонаж не в игре!";}
elseif ($us['bot']==1) {echo "Заклятие может быть наложено только на персонажей";}
elseif ($us['login'] != $user['married'] && $us["login"]!=$user['login']) { echo "Возможно использовать на себя либо супругу/супруга!";}
elseif (rand(1,100) < $int) {

      addch("<img src=i/magic/1x1.gif><font color=red>Внимание!</font> &quot;{$user['login']}&quot; наложил заклятие Благословение Ангела на &quot;{$_POST['target']}&quot;, сроком 2 часа.");
      $addhp=$us['vinos']*6;
      db_query("insert into effects (`owner`,`type`,`time`,`name`,`sila`,`intel`,`lovk`,`inta`,`ghp`) values ('".$us['id']."',9990,".(time()+7200).",'Благословение Ангела',15,15,15,15,250);");
      db_query("UPDATE `users` SET `sila`=`sila`+'15', `lovk`=`lovk`+'15', `inta`=`inta`+'15', `intel`=`intel`+'15', `maxhp`=`maxhp`+'250', `hp`=`hp`+'250' WHERE `login` = '{$_POST['target']}' LIMIT 1;");
      echo "<font color=red><b>На персонажа \"{$_POST['target']}\" наложено заклятие \"Благословение Ангела\" </b></font>";
      $bet=1;


} else {
        echo "Свиток рассыпался в ваших руках...";
        $bet=1;
      }
?>
