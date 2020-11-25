<?php
include "functions/attack.php";
//нападение
$us = mysql_fetch_array(mysql_query("SELECT *,(select `id` from `online` WHERE `real_time` >= ".(time()-60)." AND `id` = users.`id`) as `online`  FROM `users` WHERE `login` = '{$_POST['target']}' LIMIT 1;"));
$bd = mysql_fetch_array(mysql_query("SELECT * FROM `battle` WHERE `id` = '{$us['battle']}' ;"));


/*if ($user['intel'] >= 4) {
  $int=$magic['chanse'] + ($user['intel'] - 4)*3;
  if ($int>98){$int=99;}
} else {$int=0;}*/


$cant=cantjoinbattle($user, $us, $bd);

if (!$cant) $cant2=cantattack($us);

$checkLevels = $user['level'] - $us['level'];
if ($checkLevels < 0) {
    $checkLevels = $checkLevels * (-5); 
} 

if ($cant) {
  echo $cant;
} elseif ($cant2) {
  echo $cant2;
} elseif ($checkLevels > 5) {
  echo "Вы можете напасть только на свой уровень, на 2 уровня ниже или на 2 уровня выше своего!";
} else
//if (rand(1,100) < $int)
{
  takefromzayavka($us["id"]);
            //if ($battle["coment"]=="Кулачный поединок") undressall($user['id']);

            if ($user['sex'] == 1) {$action="напал";}   else {$action="напала";}
            if ($user['align'] > '2' && $user['align'] < '3')  {
                $angel="Ангел";
            } elseif ($user['align'] > '1' && $user['align'] < '2') {
                $angel="Персонаж";
            }


            $jert = mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `login` = '{$_POST['target']}' LIMIT 1;"));
            if($jert['id']!=$user['id']) {
                if ($user['invis']==1) {
                addch("<img src=i/magic/attack.gif> <B>невидимка</B>, применив магию нападения, внезапно ".$action." на &quot;{$_POST['target']}&quot;");
                addchp ('<font color=red>Внимание!</font> На вас '.$action.' <B>невидимка</B>.<BR>\'; top.frames[\'main\'].location=\'fbattle.php\'; var z = \'   ','{[]}'.nick7 ($jert['id']).'{[]}');
                }else{
                addch("<img src=i/magic/attack.gif> <B>{$user['login']}</B>, применив магию нападения, внезапно ".$action." на &quot;{$_POST['target']}&quot;");
                addchp ('<font color=red>Внимание!</font> На вас '.$action.' <B>'.$user['login'].'</B>.<BR>\'; top.frames[\'main\'].location=\'fbattle.php\'; var z = \'   ','{[]}'.nick7 ($jert['id']).'{[]}');
                }
                //destructitem($row['id']);
                $bet=1;
                //арх
                if($jert['id'] > _BOTSEPARATOR_) {
                    $arha = mysql_fetch_array(mysql_query ('SELECT * FROM `bots` WHERE `prototype` = '.$jert['id'].' LIMIT 1;'));
                    $jert['battle'] = $arha['battle'];
                    $jert['id'] = $arha['id'];
                    $bot=1;
                }
                if($jert['battle'] > 0) {
                    //вмешиваемся
                    //$bd = mysql_fetch_array(mysql_query ('SELECT * FROM `battle` WHERE `id` = '.$jert['battle'].' LIMIT 1;'));
                    $battle = unserialize($bd['teams']);
                    $ak = array_keys($battle[$jert['id']]);
                    $battle[$user['id']] = $battle[$ak[0]];
                    foreach($battle[$user['id']] as $k => $v) {
                        $battle[$user['id']][$k] =array(0,0,time());
                        $battle[$k][$user['id']] = array(0,0,time());
                    }
                    $t1 = explode(";",$bd['t1']);
                    // проставляем кто-где
                    if (in_array ($jert['id'],$t1)) {
                        $ttt = 2;
                    } else {
                        $ttt = 1;
                    }
                    addch ("<b>".nick7($user['id'])."</b> вмешался в <a href=logs.php?log=".$id." target=_blank>поединок »»</a>.  ",$user['room']);

                    //mysql_query('UPDATE `logs` SET `log` = CONCAT(`log`,\'<span class=date>'.date("H:i").'</span> '.nick5($user['id'],"B".$ttt).' вмешался в поединок!<BR>\') WHERE `id` = '.$jert['battle'].'');
                    if ($user['id']=='111' OR $user['id']=='4717') {
                    addlog($jert['battle'],'<span class=date>'.date("H:i").'</span> Внезапно небо потемнело, засверкали молнии, в их сполохах стали видны приближающиеся тени с горяими глазами. Бойцы, забыв про свои обиды, в страхе прижались друг к другу...<BR>');
                    }
                    if ($user['invis']==1) {
                    addlog($jert['battle'],'<span class=date>'.date("H:i").'</span> <b>невидимка</b> вмешался в поединок!<BR>');
                    }else
                    addlog($jert['battle'],'<span class=date>'.date("H:i").'</span> '.nick5($user['id'],"B".$ttt).' вмешался в поединок!<BR>');

                    mysql_query('UPDATE `battle` SET `teams` = \''.serialize($battle).'\', `t'.$ttt.'`=CONCAT(`t'.$ttt.'`,\';'.$user['id'].'\')  WHERE `id` = '.$jert['battle'].' ;');
                    mysql_query("UPDATE users SET `battle` =".$jert['battle'].",`zayavka`=0 WHERE `id`= ".$user['id']);

                    header("Location:fbattle.php");
                    //die("<script>location.href='fbattle.php';</script>");
                }
                else
                {
                    // начинаем бой
                    //$bet=1;
                    // если чел в заявке, выбиваем его
                    if($jert['zayavka']) {
                        $fict1 = mysql_fetch_array(mysql_query("SELECT * FROM `zayavka` WHERE `team1` LIKE '{$jert['id']};%' OR `team1` LIKE '%;{$jert['id']};%' LIMIT 1;"));
                        $fict2 = mysql_fetch_array(mysql_query("SELECT * FROM `zayavka` WHERE `team2` LIKE '{$jert['id']};%' OR `team2` LIKE '%;{$jert['id']};%' LIMIT 1;"));
                        if($fict1) { $team=1; }
                        elseif($fict2) { $team=2; }

                        mysql_query("UPDATE `users` SET `zayavka` = '' WHERE `id` = {$jert['id']} LIMIT 1;");
                        $z = mysql_fetch_array(mysql_query("SELECT `team{$team}` FROM `zayavka` WHERE `id`=".$jert['zayavka'].";"));

                        $teams = str_replace($jert['id'].";","",$z[0]);
                        mysql_query("UPDATE  `zayavka` SET team{$team} = '{$teams}' WHERE   id = {$jert['zayavka']};");
                    }

                    //arch
                    if($bot) {
                        mysql_query("INSERT INTO `bots` (`name`,`prototype`,`battle`,`hp`) values ('Архивариус','83','','".$jert['hp']."');");
                        $jert['id'] = mysql_insert_id();
                    }

                    $teams = array();
                    $teams[$user['id']][$jert['id']] = array(0,0,time());
                    $teams[$jert['id']][$user['id']] = array(0,0,time());
                    $sv = array(3,4,5);
                    //$tou = array_rand($sv,1);
                    mysql_query("INSERT INTO `battle`
                        (
                            `id`,`coment`,`teams`,`timeout`,`type`,`status`,`t1`,`t2`,`to1`,`to2`,`blood`, date
                        )
                        VALUES
                        (
                            NULL,'','".serialize($teams)."','".$sv[rand(0,2)]."','1','0','".$user['id']."','".$jert['id']."','".time()."','".time()."','0', '".date("Y-m-d H:i")."'
                        )");

                    $id = mysql_insert_id();

                    // апдейтим врага
                    if($bot) {
                        mysql_query("UPDATE `bots` SET `battle` = {$id} WHERE `id` = {$jert['id']} LIMIT 1;");
                    } else {
                        mysql_query("UPDATE `users` SET `battle` = {$id} WHERE `id` = {$jert['id']} LIMIT 1;");
                    }

                    // создаем лог

                    if ($user['invis']==1) {
                    $rr = "<b>невидимка</b> и <b>".nick3($jert['id'])."</b>";
                    }else
                    $rr = "<b>".nick3($user['id'])."</b> и <b>".nick3($jert['id'])."</b>";
                    addch ("<a href=logs.php?log=".$id." target=_blank>Бой</a> между <B><b>".nick7($user['id'])."</b> и <b>".nick7($jert['id'])."</b> начался.   ",$user['room']);

                    //mysql_query("INSERT INTO `logs` (`id`,`log`) VALUES('{$id}',"Часы показывали <span class=date>".date("Y.m.d H.i")."</span>, когда ".$rr." бросили вызов друг другу. <BR>");
                    if ($user['id']=='111' OR $user['id']=='4717') {
                    addlog($id,"<span class=date>".date("Y.m.d H.i")."</span> Внезапно небо потемнело, засверкали молнии, в их сполохах стали видны приближающиеся тени с горяими глазами. Бойцы, забыв про свои обиды, в страхе прижались друг к другу...<BR>");
                    }
                    addlog($id,"Часы показывали <span class=date>".date("Y.m.d H.i")."</span>, когда ".$rr." бросили вызов друг другу. <BR>");

                    mysql_query("UPDATE users SET `battle` ={$id},`zayavka`=0 WHERE `id`= {$user['id']} OR `id` = {$jert['id']}");
                    header("Location:fbattle.php");
                    //die("<script>location.href='fbattle.php';</script>");
                }
               $bet=1;
            } else {
                echo '<font color=red>Мазохист?...</font>';
            }
        //$bet=1;
}// else {
//      echo "Свиток рассыпался в ваших руках...";
//  }
?>