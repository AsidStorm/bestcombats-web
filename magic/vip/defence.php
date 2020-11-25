<?php
//Сокрушение для випки
$us = mysqli_fetch_array(db_query("SELECT *,(select `id` from `online` WHERE `date` >= ".(time()-60)." AND `id` = users.`id`) as `online`  FROM `users` WHERE `login` = '".db_escape_string($_POST['target'])."' LIMIT 1;"));
$magic = mysqli_fetch_array(db_query("SELECT `chanse` FROM `magic` WHERE `id` = '14' ;"));
$effect = mysqli_fetch_array(db_query("SELECT `time` FROM `effects` WHERE `owner` = '{$us['id']}' and `type` = '201' LIMIT 1;"));

if ($user['intel'] >= 15) {
    $int=$magic['chanse'] + ($user['intel'] - 15)*3;
    if ($int>98){$int=99;}
  }
else {$int=0;}

if ($user['battle'] > 0) {echo "Не в бою...";}
elseif ($us['battle']) { echo "Персонаж в бою."; }
elseif ($user['level'] < 7) { echo "Вашего уровня не достаточно для использования этого заклинания!"; }
elseif ($effect['time']) {echo "На персонаже уже есть заклятие Защита от Оружия"; }
elseif ($user['room'] != $us['room']) { echo "Персонаж в другой комнате!"; }
elseif ($us['login'] != $user['married'] && $us["login"]!=$user['login']) { echo "Возможно использовать на себя либо супругу/супруга!"; }
elseif (!$us['online']) {echo "Персонаж не в игре!";}
elseif (rand(1,100) < $int) {

      addch("<img src=i/magic/spell_protect10.gif>".($user["invis"]?"Невидимка":"Персонаж &quot;{$user['login']}&quot;")." наложил заклятие \"Защита от оружия\" на &quot;".($user["invis"] && $user["login"]==$_POST['target']?"Невидимка":"$_POST[target]")."&quot;, сроком 2 часа.");
      db_query("INSERT INTO `effects` (`owner`,`name`,`time`,`type`,caster) values ('$us[id]','Защита от оружия',".(time()+7200).",201,'$user[id]');");
      echo "<font color=red><b>На персонажа \"{$_POST['target']}\" наложено заклятие \"Защита от оружия\" </b></font>";
      $bet=1;


} else {
        echo "Свиток рассыпался в ваших руках...";
        $bet=1;
      }
?>
