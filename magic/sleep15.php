<?php
$us = mysqli_fetch_array(db_query("SELECT *,(select `id` from `online` WHERE `date` >= ".(time()-60)." AND `id` = users.`id`) as `online`  FROM `users` WHERE `login` = '{$_POST['target']}' LIMIT 1;"));
$magic = mysqli_fetch_array(db_query("SELECT `chanse` FROM `magic` WHERE `id` = '14' ;"));
$effect = mysqli_fetch_array(db_query("SELECT `time` FROM `effects` WHERE `owner` = '{$us['id']}' and `type` = '2' LIMIT 1;"));

if ($user['intel'] >= 1) {
        $int=$magic['chanse'] + ($user['intel'] - 1)*3;
        if ($int>98){$int=99;}
    }
else {$int=0;}

if ($user['battle'] > 0) {echo "Не в бою...";}
elseif ($effect['time']) {echo "На персонаже уже есть заклятие молчания"; }
elseif ($user['room'] != $us['room']) { echo "Персонаж в другой комнате!"; }
elseif (!$us['online']) {echo "Персонаж не в игре!";}
elseif ($us['deal'] == 1) { echo "Вы не можете наложить заклятие молчания на этого персонажа"; }
elseif ($us['align'] > 2 && $us['align'] < 3) { echo "Решились поднять руку на Ангела?.."; }
elseif (rand(1,100) < $int) {

            addch("<img src=i/magic/sleep.gif>Персонаж &quot;{$user['login']}&quot; наложил заклятие молчания на &quot;{$_POST['target']}&quot;, сроком 15 мин.");
            db_query("INSERT INTO `effects` (`owner`,`name`,`time`,`type`) values ('".$us['id']."','Заклятие молчания',".(time()+900).",2);");
            echo "<font color=red><b>На персонажа \"{$_POST['target']}\" наложено заклятие молчания </b></font>";
            $bet=1;


} else {
                echo "Свиток рассыпался в ваших руках...";
                $bet=1;
            }
?>