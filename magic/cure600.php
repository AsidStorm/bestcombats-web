<?php
// magic идентификацыя
if ($_SESSION['uid'] == null) header("Location: index.php");
if ($user['s_duh']<1000 && $user['battle']>0) {
echo'Не достаточно духа';
} else {
  $us = mysql_fetch_array(mysql_query("SELECT *, (select `id` from `online` WHERE `date` >= ".(time()-60)." AND `id` = users.`id`) as `online` FROM `users` WHERE `login` = '{$_POST['target']}' LIMIT 1;"));
  $magic = mysql_fetch_array(mysql_query("SELECT `chanse` FROM `magic` WHERE `id` = '12' ;"));

        if(!$us) {
            $bots = mysql_fetch_array(mysql_query ('SELECT * FROM `bots` WHERE `name` = \''.$_POST['target'].'\' LIMIT 1;'));
            /*if($bots) {
                $id=$bots['prototype'];
                $us = mysql_fetch_array(mysql_query("SELECT *, (select `id` from `online` WHERE `date` >= ".(time()-60)." AND `id` = users.`id`) as `online` FROM `users` WHERE `id` = '{$id}' LIMIT 1;"));
                $us['login'] = $bots['name'];
                $us['hp'] = $bots['hp'];
                $us['id'] = $bots['id'];
                $us['battle'] = $bots['battle'];

            }*/
        }
        //echo
        $int=99;
        echo "<font color=red><B>";
        if ($bots) { echo "Нельзя лечить клонов!"; }
        elseif ($us['battle'] != $user['battle']) { echo "Персонаж находится в поединке!"; }
        elseif ($user['room'] != $us['room'] && !$us['battle']) { echo "Персонаж в другой комнате!"; }
        elseif ($us['battle'] && !in_array($us['id'],$fbattle->team_mine)) { echo "Нельзя лечить противников!"; }
        elseif ($us['battle'] && $us["hp"]<=0) { echo "Нельзя лечить мёртвых!"; }
        else {

            if (rand(1,100) < $int) {

                if ($user['sex'] == 1) {$action="";}
                else {$action="а";}

                if(($us['hp']+600) > $us['maxhp']) {
                    $hp = $us['maxhp'];
                } else {
                    $hp = $us['hp']+600;
                }
                if ($user['battle'] > 0) {
                    //mysql_query('UPDATE `logs` SET `log` = CONCAT(`log`,\'<span class=date>'.date("H:i").'</span> '.nick5($user['id'],$fbattle->my_class).' использовал заклятие восстановления энергии '.(($us['id']!=$user['id'])?"на ".nick5($us['id'],$fbattle->my_class):"").' и восстановил уровень жизни <B>+600</B> ['.($hp).'/'.$us['maxhp'].']<BR>\') WHERE `id` = '.$us['battle'].'');
                    $fbattle->add_log('<span class=date>'.date("H:i").'</span> '.nick5($user['id'],$fbattle->my_class).' использовал'.$action.' заклятие восстановления энергии '.(($us['id']!=$user['id'])?"на ".nick5($us['id'],$fbattle->my_class):"").' и восстановил'.$action.' уровень жизни <B>+600</B> ['.($hp).'/'.$us['maxhp'].']<BR>');
                    //$fbattle->add_log('');
                    mysql_query("UPDATE `battle` SET `to1` = '".time()."', `to2` = '".time()."' WHERE `id` = ".$user['battle']." LIMIT 1;");

                    $fbattle->write_log ();
                }

                mysql_query("UPDATE `users` SET `hp` = ".$hp.",`s_duh` = s_duh-1000 WHERE `id` = ".$us['id'].";");
                global $updatebattleunit;
                $updatebattleunit=$us['id'];
                echo "Вы восстановили 600 НР персонажу ".$us['login']."!";
                $bet=1;
            } else {
                echo "Свиток рассыпался в ваших руках...";
                $bet=1;
            }

        }
        echo "</B></FONT>";
    }

?>