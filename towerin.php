<?php
    session_start();
    if ($_SESSION['uid'] == null) header("Location: index.php");
    include "connect.php";
    $rooms[0] = "";
    $rhar = array(
                    "501" => array (
                                    20,     0,502,505,0
                            ),
                    "502" => array (
                                    15,     0,0,0,501
                            ),
                    "503" => array (
                                    15,     0,0,507,0
                            ),
                    "504" => array (
                                    15,     0,0,508,0
                            ),
                    "505" => array (
                                    20,     501,0,510,0
                            ),
                    "506" => array (
                                    15,     0,507,511,0
                            ),
                    "507" => array (
                                    15,     503,508,0,506
                            ),
                    "508" => array (
                                    25,     504,0,513,507
                            ),
                    "509" => array (
                                    20,     0,0,515,0
                            ),
                    "510" => array (
                                    20,     505,511,0,0
                            ),
                    "511" => array (
                                    20,     506,0,0,510
                            ),
                    "512" => array (
                                    30,     0,513,519,0
                            ),
                    "513" => array (
                                    25,     508,514,0,512
                            ),
                    "514" => array (
                                    20,     0,0,0,513
                            ),
                    "515" => array (
                                    20,     509,0,522,0
                            ),
                    "516" => array (
                                    25,     0,517,523,0
                            ),
                    "517" => array (
                                    25,     0,518,0,516
                            ),
                    "518" => array (
                                    35,     0,519,525,517
                            ),
                    "519" => array (
                                    35,     512,520,526,518
                            ),
                    "520" => array (
                                    35,     0,521,0,519
                            ),
                    "521" => array (
                                    15,     0,0,528,0
                            ),
                    "522" => array (
                                    20,     515,0,529,0
                            ),
                    "523" => array (
                                    15,     516,0,530,0
                            ),
                    "524" => array (
                                    20,     0,525,531,0
                            ),
                    "525" => array (
                                    35,     518,526,532,524
                            ),
                    "526" => array (
                                    40,     519,527,533,525
                            ),
                    "527" => array (
                                    35,     0,0,0,526
                            ),
                    "528" => array (
                                    15,     521,529,535,0
                            ),
                    "529" => array (
                                    20,     522,0,0,528
                            ),
                    "530" => array (
                                    20,     523,531,537,0
                            ),
                    "531" => array (
                                    35,     524,0,538,530
                            ),
                    "532" => array (
                                    20,     525,533,539,0
                            ),
                    "533" => array (
                                    20,     526,534,540,532
                            ),
                    "534" => array (
                                    15,     0,0,0,533
                            ),
                    "535" => array (
                                    20,     528,0,541,0
                            ),
                    "536" => array (
                                    20,     0,537,0,535
                            ),
                    "537" => array (
                                    35,     530,0,543,536
                            ),
                    "538" => array (
                                    20,     531,0,544,0
                            ),
                    "539" => array (
                                    20,     532,0,545,0
                            ),
                    "540" => array (
                                    15,     533,0,546,0
                            ),
                    "541" => array (
                                    20,     535,542,547,0
                            ),
                    "542" => array (
                                    15,     0,543,0,541
                            ),
                    "543" => array (
                                    40,     537,0,549,542
                            ),
                    "544" => array (
                                    40,     538,545,550,543
                            ),
                    "545" => array (
                                    40,     539,0,551,544
                            ),
                    "546" => array (
                                    15,     540,0,552,0
                            ),
                    "547" => array (
                                    20,     541,548,553,0
                            ),
                    "548" => array (
                                    20,     0,549,0,547
                            ),
                    "549" => array (
                                    35,     543,550,0,548
                            ),
                    "550" => array (
                                    40,     544,551,554,549
                            ),
                    "551" => array (
                                    40,     545,0,555,550
                            ),
                    "552" => array (
                                    15,     546,0,556,0
                            ),
                    "553" => array (
                                    20,     547,0,557,0
                            ),
                    "554" => array (
                                    20,     550,555,0,0
                            ),
                    "555" => array (
                                    35,     551,0,0,554
                            ),
                    "556" => array (
                                    15,     552,0,559,0
                            ),
                    "557" => array (
                                    15,     553,0,0,0
                            ),
                    "558" => array (
                                    20,     0,559,0,0
                            ),
                    "559" => array (
                                    20,     556,560,0,558
                            ),
                    "560" => array (
                                    20,     0,0,0,559
                            )

    );
    mq("LOCK TABLES `bots` WRITE, `users` WRITE, `deztow_items` WRITE, `inventory` WRITE, `battle` WRITE,
                `logs` WRITE, `deztow_turnir` WRITE, `effects` WRITE,`shop` WRITE, `online` WRITE, `deztow_gamers_inv` WRITE,
                `deztow_realchars` WRITE, `deztow_eff` WRITE, `variables` WRITE, obshagastorage write, obshagaeffects write, setstats write, userdata write;");

    include "functions.php";
    if ($user['in_tower']!=1 && $user['in_tower']!=2) { mq("unlock tables"); header('Location: main.php'); die(); }
    $deztowtype=$user['in_tower'];
    if ($user['battle'] != 0) { mq("unlock tables"); header('Location: fbattle.php'); die(); }
    if ($user["room"]<500) {
      gotoroom(501);
      $user["room"]=501;
    }

    $ls = mysql_fetch_array(mq("select count(`id`), SUM(`bot`) from `users` WHERE `in_tower` = '$deztowtype';"));
    $tur_data = mysql_fetch_array(mq("SELECT * FROM `deztow_turnir` WHERE `active` = TRUE"));
    if($_GET['give']) {
        $obj = mysql_fetch_array(mq("SELECT * FROM `deztow_items` WHERE `id` = '".$_GET['give']."' AND `room` = '".$user['room']."' LIMIT 1;"));
        if($obj) {
            if($_SESSION['timei']-time()<=0) {
              if ($obj["iteam_id"]==1766) {
                mq("update users set money=money+1 where id='$_SESSION[uid]'");
                echo "<font color=red>Вы нашли 1 кр.</font>";
              } else {
                $_SESSION['timei'] = time()+3;
                $dress = mysql_fetch_array(mq("SELECT * FROM `shop` WHERE `id` = '".$obj['iteam_id']."' LIMIT 1;"));

                mq("INSERT INTO `inventory`
                (`prototype`,`owner`,`name`,`type`,`massa`,`cost`,`img`,`maxdur`,`isrep`,`gsila`,`glovk`,`ginta`,`gintel`,`ghp`,`gmana`,`gnoj`,`gtopor`,`gdubina`,`gmech`,`gposoh`,`gluk`,`gfire`,`gwater`,`gair`,`gearth`,`glight`,`ggray`,`gdark`,`needident`,`nsila`,`nlovk`,`ninta`,`nintel`,`nmudra`,`nvinos`,`nnoj`,`ntopor`,`ndubina`,`nmech`,`nposoh`,`nluk`,`nfire`,`nwater`,`nair`,`nearth`,`nlight`,`ngray`,`ndark`,`mfkrit`,`mfakrit`,`mfuvorot`,`mfauvorot`,`bron1`,`bron2`,`bron3`,`bron4`,`maxu`,`minu`,`magic`,`nlevel`,`nalign`,`dategoden`,`goden`,`otdel`,`gmp`,`gmeshok`,`destinyinv`,`gift`,`mfkritpow`,`mfantikritpow`,`mfparir`,`mfshieldblock`,`mfcontr`,`mfrub`,`mfkol`,`mfdrob`,`mfrej`,`mfdhit`,`mfdmag`,`mfhitp`,`mfmagp`,`opisan`,`second`,`vid`,`sitost`,`dvur`,`chkol`,`chrub`,`chrej`,`chdrob`,`chmag`,`mfproboj`,`stats`,`mfdkol`,`mfdrub`,`mfdrej`,`mfddrob`,`bronmin1`,`bronmin2`,`bronmin3`,`bronmin4`,`blockzones`,`mffire, mfwater`,`mfair, mfearth`,`mflight`,`mfdark`,`minusmfdmag`,`minusmfdfire`,`minusmfdair`,`minusmfdwater`,`minusmfdearth`,`manausage`,`includemagic`,`includemagicdex`,`includemagicmax`,`includemagicname`,`includemagicuses`,`includemagiccost`,`includemagicusesperday`,`mfdair`,`mfdwater`,`mfdearth`,`mfdfire`,`mfddark`,`mfdlight`,`bs`)
                VALUES('{$dress['id']}','{$_SESSION['uid']}','{$dress['name']}','{$dress['type']}','{$dress['massa']}','{$dress['cost']}','{$dress['img']}','{$dress['maxdur']}','{$dress['isrep']}','{$dress['gsila']}','{$dress['glovk']}','{$dress['ginta']}','{$dress['gintel']}','{$dress['ghp']}','{$dress['gmana']}','{$dress['gnoj']}','{$dress['gtopor']}','{$dress['gdubina']}','{$dress['gmech']}','{$dress['gposoh']}','{$dress['gluk']}','{$dress['gfire']}','{$dress['gwater']}','{$dress['gair']}','{$dress['gearth']}','{$dress['glight']}','{$dress['ggray']}','{$dress['gdark']}','{$dress['needident']}','{$dress['nsila']}','{$dress['nlovk']}','{$dress['ninta']}','{$dress['nintel']}','{$dress['nmudra']}','{$dress['nvinos']}','{$dress['nnoj']}','{$dress['ntopor']}','{$dress['ndubina']}','{$dress['nmech']}','{$dress['nposoh']}','{$dress['nluk']}','{$dress['nfire']}','{$dress['nwater']}','{$dress['nair']}','{$dress['nearth']}','{$dress['nlight']}','{$dress['ngray']}','{$dress['ndark']}','{$dress['mfkrit']}','{$dress['mfakrit']}','{$dress['mfuvorot']}','{$dress['mfauvorot']}','{$dress['bron1']}','{$dress['bron2']}','{$dress['bron3']}','{$dress['bron4']}','{$dress['maxu']}','{$dress['minu']}','{$dress['magic']}','{$dress['nlevel']}','{$dress['nalign']}','".(($dress['goden'])?($dress['goden']*24*60*60+time()):"")."','{$dress['goden']}','{$dress['razdel']}','{$dress['gmp']}','{$dress['gmeshok']}','{$dress['destiny']}','{$dress['gift']}','{$dress['mfkritpow']}','{$dress['mfantikritpow']}','{$dress['mfparir']}','{$dress['mfshieldblock']}','{$dress['mfcontr']}','{$dress['mfrub']}','{$dress['mfkol']}','{$dress['mfdrob']}','{$dress['mfrej']}','{$dress['mfdhit']}','{$dress['mfdmag']}','{$dress['mfhitp']}','{$dress['mfmagp']}','{$dress['opisan']}','{$dress['second']}','{$dress['vid']}','{$dress['sitost']}','{$dress['dvur']}','{$dress['chkol']}','{$dress['chrub']}','{$dress['chrej']}','{$dress['chdrob']}','{$dress['chmag']}','{$dress['mfproboj']}','{$dress['stats']}',
                '{$dress['mfdkol']}','{$dress['mfdrub']}','{$dress['mfdrej']}','{$dress['mfddrob']}','{$dress['bronmin1']}','{$dress['bronmin2']}','{$dress['bronmin3']}','{$dress['bronmin4']}','{$dress['blockzones']}','$dress[mffire]','$dress[mfwater]','$dress[mfair]','$dress[mfearth]','$dress[mflight]','$dress[mfdark]','$dress[minusmfdmag]','$dress[minusmfdfire]','$dress[minusmfdair]','$dress[minusmfdwater]', '$dress[minusmfdearth]','$dress[manausage]','$dress[includemagic]','$dress[includemagicdex]','$dress[includemagicmax]', '$dress[includemagicname]','$dress[includemagicuses]','$dress[includemagiccost]','$dress[includemagicusesperday]','$dress[mfdair]','$dress[mfdwater]','$dress[mfdearth]','$dress[mfdfire]','$dress[mfddark]','$dress[mfdlight]','1') ;");
                echo mysql_error();
              }
              mq("DELETE FROM `deztow_items` WHERE `id` = '".$_GET['give']."' AND `room` = '".$user['room']."' LIMIT 1;");
            }
            else {
                echo "<font color=red>Вы сможте поднять вещь через ".($_SESSION['timei']-time())." секунд...</font>";
            }
        } else {
            echo "<font color=red>Кто-то оказался быстрее...</font>";
        }

    }
    if($_POST['attack']) {
      $b=mqfa1("select battle from users where id='$user[id]'");
      if ($b) {
        mq("unlock tables"); header('Location: fbattle.php'); die();
      }
            $jert = mysql_fetch_array(mq("SELECT * FROM `users` WHERE `login` = '{$_POST['attack']}' LIMIT 1;"));
            if($jert['room'] == $user['room'] && $jert['id']!=$user['id'] && ($jert["hp"]>0 || $jert["battle"])) {
                if($jert['id'] == 233) {
                    $arha = mysql_fetch_array(mq ('SELECT * FROM `bots` WHERE `prototype` = '.$jert['id'].' LIMIT 1;'));
                    $jert['battle'] = $arha['battle'];
                    $jert['id'] = $arha['id'];
                    $bot=1;
                }
                if($jert['battle'] > 0) {
                    $bd = mysql_fetch_array(mq ('SELECT * FROM `battle` WHERE `id` = '.$jert['battle'].' LIMIT 1;'));
                    if ($bd["coment"]=="Кулачный поединок") undressall($user['id']);
                    $battle = unserialize($bd['teams']);
                    $ak = array_keys($battle[$jert['id']]);
                    $battle[$user['id']] = $battle[$ak[0]];
                    foreach($battle[$user['id']] as $k => $v) {
                        $battle[$k][$user['id']] = array(0,0,time());
                        $battle[$user['id']][$k] = array(0,0,time());
                    }
                    $t1 = explode(";",$bd['t1']);
                    if (in_array ($jert['id'],$t1)) {
                        $ttt = 2;
                        $ttt2 = 1;
                    } else {
                        $ttt = 1;
                        $ttt2 = 2;
                    }
                    addch ("<b>".nick7($user['id'])."</b> вмешался в <a href=logs.php?log=".$id." target=_blank>поединок »»</a>.  ",$user['room']);

                    addlog($jert['battle'],'<span class=date>'.date("H:i").'</span> '.nick5($user['id'],"B".$ttt).' вмешался в поединок!<BR>');

                    mq('UPDATE `battle` SET `teams` = \''.serialize($battle).'\', `t'.$ttt.'`=CONCAT(`t'.$ttt.'`,\';'.$user['id'].'\'), `to'.$ttt.'` = \''.time().'\', `to'.$ttt2.'` = \''.(time()-1).'\'  WHERE `id` = '.$jert['battle'].' ;');
                    mq("UPDATE users SET `battle` =".$jert['battle'].",`zayavka`=0 WHERE `id`= ".$user['id']);
                    mq('UPDATE `deztow_turnir` SET `log` = CONCAT(`log`,\''."<span class=date>".date("d.m.y H:i")."</span>  ".nick3($user['id'])." вмешался в поединок против ".nick3($jert['id'])." <a href=\"logs.php?log={$jert['battle']}\" target=_blank>»»</a><BR>".'\') WHERE `active` = TRUE;');

                    header("Location:fbattle.php");
                    die("<script>location.href='fbattle.php';</script>");
                }
                else
                {
                    if($bot) {
                        mq("INSERT INTO `bots` (`name`,`prototype`,`battle`,`hp`) values ('Архивариус','233','','".$jert['hp']."');");
                        $jert['id'] = mysql_insert_id();
                    }

                    $teams = array();
                    $teams[$user['id']][$jert['id']] = array(0,0,time());
                    $teams[$jert['id']][$user['id']] = array(0,0,time());
                    $sv = array(1,2,3,4,5);
                    $sv = array(1,1,1,1,1);
                    mq("INSERT INTO `battle`
                        (
                            `id`,`coment`,`teams`,`timeout`,`type`,`status`,`t1`,`t2`,`to1`,`to2`,`blood`
                        )
                        VALUES
                        (
                            NULL,'','".serialize($teams)."','".$sv[rand(0,3)]."','10','0','".$user['id']."','".$jert['id']."','".time()."','".time()."','1'
                        )");

                    $id = mysql_insert_id();

                    if($bot) {
                        mq("UPDATE `bots` SET `battle` = {$id} WHERE `id` = {$jert['id']} LIMIT 1;");
                    } else {
                        mq("UPDATE `users` SET `battle` = {$id} WHERE `id` = {$jert['id']} LIMIT 1;");
                    }
                    $rr = "<b>".nick3($user['id'])."</b> и <b>".nick3($jert['id'])."</b>";
                    addch ("<B><b>".nick7($user['id'])."</b> , применив магию нападения, внезапно напал на <b>".nick7($jert['id'])."</b>.   ",$user['room']);
                    addlog($id,"Часы показывали <span class=date>".date("Y.m.d H.i")."</span>, когда ".$rr." бросили вызов друг другу. <BR>");


                    mq("UPDATE users SET `battle` ={$id},`zayavka`=0 WHERE `id`= {$user['id']} OR `id` = {$jert['id']}");
                    mq('UPDATE `deztow_turnir` SET `log` = CONCAT(`log`,\''."<span class=date>".date("d.m.y H:i")."</span>  ".nick3($user['id'])." напал на ".nick3($jert['id'])." завязался <a href=\"logs.php?log={$id}\" target=_blank>бой »»</a><BR>".'\') WHERE `active` = TRUE');
                    header("Location:fbattle.php");
                    die("<script>location.href='fbattle.php';</script>");
                }
            } else {
                echo '<font color=red>Жертва ускользнула из комнаты...</font>';
            }
    }
    $_GET['path'] = (int)$_GET['path'];
    if($rhar[$user['room']][$_GET['path']] > 0 && $_GET['path'] < 5 && $_GET['path'] > 0 && ($user["movetime"] <= time())) {
        $rr = mysql_fetch_array(mq("SELECT * FROM `effects` WHERE `type` = 10 AND `owner` = {$user['id']};"));
        if(!$rr) {
        $list = mq("SELECT `id`,`room`,`login` FROM `users` WHERE `room` = '".$user['room']."' AND `in_tower`='$deztowtype';");
        while($u = mysql_fetch_array($list)) {
            if($u['id']!=$user['id']) addchp ('<font color=red>Внимание!</font> <B>'.$user['login'].'</B> отправился в <B>'.$rooms[$rhar[$user['room']][$_GET['path']]].'</B>.   ','{[]}'.$u['login'].'{[]}');
        }
        $list = mq("SELECT `id`,`room`,`login` FROM `users` WHERE `room` = '".$rhar[$user['room']][$_GET['path']]."' AND `in_tower`='$deztowtype';");
        while($u = mysql_fetch_array($list)) {
            addchp ('<font color=red>Внимание!</font> <B>'.$user['login'].'</B> вошел в комнату.   ','{[]}'.$u['login'].'{[]}');
        }
        mq("UPDATE `users`,`online` SET `users`.`room` = '".$rhar[$user['room']][$_GET['path']]."', users.movetime='".(time()+$rhar[$rhar[$user['room']][$_GET['path']]][0])."',`online`.`room` = '".$rhar[$user['room']][$_GET['path']]."' WHERE `online`.`id` = `users`.`id` AND `online`.`id` = '{$_SESSION['uid']}' ;");
        header('Location:towerin.php');
        die("<script>location.href='towerin.php';</script>");
        } else {
            err('Вы парализованы и не можете двигатся...');
        }
    }

    $list = mq("SELECT users.*, effects.id as travma FROM `users` left join effects on effects.owner=users.id and (effects.type=11 or effects.type=12 or effects.type=13 or effects.type=14) WHERE users.in_tower='$deztowtype' AND users.battle=0 and (users.hp<=0 or effects.id>0)");
    while($u = mysql_fetch_array($list)) {

    if ($u["hp"]>0) $ddtravma = mysql_fetch_array(mq("SELECT * FROM `effects` WHERE `owner` = ".$u['id']." and (`type`=11 or `type`=12 or `type`=13 or `type`=14) limit 1;"));
    else $ddtravma=0;

    if($u['hp'] <= 0 || $ddtravma) {
        undressall($u['id']);
        $rep = mq("SELECT * FROM `inventory` WHERE `owner` = '".$u['id']."' and prototype <> 114 AND `bs` = 1;");
        while($r = mysql_fetch_array($rep)) {
            mq("INSERT `deztow_items` (`iteam_id`, `name`, `img`, `room`) values ('".$r['prototype']."', '".$r['name']."', '".$r['img']."', '".$u['room']."');");
        }
        mq("DELETE FROM `inventory` WHERE `owner` = '".$u['id']."' AND `bs` = 1;");
        $dtt=mqfa1("select value from variables where var='deztowtype'");

        if ($dtt==1) {
          mq("UPDATE `inventory` SET `owner` = '".$u['id']."' WHERE `owner` = '".($u["id"]+_BOTSEPARATOR_)."' and id not in (select id_it as id from obshagastorage);");
          mq("DELETE FROM `effects` WHERE `owner` = '".$u['id']."' AND `type` <> 11 AND `type` <> 12 AND `type` <> 13 AND `type` <> 14;");
          mq("UPDATE `effects` SET `owner` = '".$u['id']."' WHERE `owner` = '".($u["id"]+_BOTSEPARATOR_)."';");

          statsback($u["id"], 31);
        } else {
          mq("update users set room='31', in_tower=0 where id='$u[id]'");
        }
        mq('UPDATE `deztow_turnir` SET `log` = CONCAT(`log`,\''."<span class=date>".date("d.m.y H:i")."</span> ".nick3($u['id'])." повержен и выбывает из турнира<BR>".'\') WHERE `active` = TRUE');
        addchp ('<font color=red>Внимание!</font> Вы выбыли из турнира Башни Смерти.    ', '{[]}'.$u['login'].'{[]}');
        if ($u["id"]==$user["id"]) {
          header('Location:tower.php');
          die("<script>location.href='tower.php';</script>");
        }
    }
    }
    if(($ls[0]-$ls[1]) < 2 && ($tur_data['start_time']+60) <= time()) {
        //
        $dtt=mqfa1("select value from variables where var='deztowtype'");

        $tur = mysql_fetch_array(mq("select * from `deztow_turnir` WHERE `active` = TRUE;"));

        undressall($user['id']);
        $rep = mq("SELECT * FROM `inventory` WHERE `owner` = '".$user['id']."' AND `bs` = 1;");
        while($r = mysql_fetch_array($rep)) {
            mq("INSERT `deztow_items` (`iteam_id`, `name`, `img`, `room`) values ('".$r['prototype']."', '".$r['name']."', '".$r['img']."', '".$user['room']."');");
        }

        mq("DELETE FROM `inventory` WHERE `owner` = '".$user['id']."' AND `bs` = 1 and prototype<>114;");
        if ($dtt==1) {
          mq("UPDATE `inventory` SET `owner` = '".$user['id']."' WHERE `owner` = '".($user["id"]+_BOTSEPARATOR_)."' and id not in (select id_it as id from obshagastorage);");

          mq("DELETE FROM `effects` WHERE `owner` = '".$user['id']."' AND `type` <> 11 AND `type` <> 12 AND `type` <> 13 AND `type` <> 14;");
          mq("UPDATE `effects` SET `owner` = '".$user['id']."' WHERE `owner` = '".($user["id"]+_BOTSEPARATOR_)."';");

          statsback($user["id"], 31);
        }
        mq("UPDATE `users` SET `money`=`money`+'".$tur['coin']."',`in_tower` = 0, `room` = '31' ".resetmax($user['id'],1)." WHERE `id` = '".$user['id']."';");
        mq("UPDATE `online` SET  `room` = '31' WHERE `id` = '".$user['id']."';");

        mq('UPDATE `deztow_turnir` SET `winner` = \''.$user['id'].'\', `winnerlog`=\''.nick3($user['id']).'\',`endtime` = \''.time().'\',`active` = FALSE, `log` = CONCAT(`log`,\''."<span class=date>".date("d.m.y H:i")."</span> Турнир завершен. Победитель: ".nick3($user['id'])." Приз: <B>".$tur['coin']."</B> кр. <BR>".'\') WHERE `active` = TRUE');
        addchp ('<font color=red>Внимание!</font> Поздравляем! Вы победитель турнира Башни смерти! Получаете <B>'.$tur['coin'].'</B> кр.     ', '{[]}'.$user['login'].'{[]}');
        mq("insert into effects (type, name, time, owner) values ('396', 'Победитель Башни Смерти', ".(time()+(60*60*24)).", '$user[id]')");
        sysmsg('Победитель турнира Башни смерти <B>'.$user['login'].'</B>.');
        if ($dtt==1) {
          $d=date('N');
          if ($d==5 || $d==6) {
            $tme=mktime(14,0);
          } else $tme=mktime(19,0);
          if (date('H')>12) $tme+=60*60*24;
        } else {
          $d=date('N');
          if ($d==7) $tme=mktime(16,0);
          else $tme=mktime(21,0);
        }
        if ($tme<time()-(60*15)) $tme=time()+(60*15);
        mq('UPDATE `variables` SET `value` = \'3600\' WHERE `var` = \'startbs\';');
        mq('UPDATE `variables` SET `value` = \''.($dtt==1?"2":"1").'\' WHERE `var` = \'deztowtype\';');
        mq("UNLOCK TABLES;");
        mq("TRUNCATE TABLE `deztow_items`");
        header('Location:tower.php');
        die("<script>location.href='tower.php';</script>");
    }

    // cнимаем блокировку
    mq("UNLOCK TABLES;");
    if ($user['hp'] <= 0) { header('Location: tower.php'); die(); }
?>
<HTML><HEAD>
<link rel=stylesheet type="text/css" href="i/main.css">
<meta content="text/html; charset=windows-1251" http-equiv=Content-type>
<META Http-Equiv=Cache-Control Content=no-cache>
<meta http-equiv=PRAGMA content=NO-CACHE>
<META HTTP-EQUIV=Expires CONTENT=0>
<META HTTP-EQUIV=imagetoolbar CONTENT=no>
<STYLE>
.H3         { COLOR: #8f0000;  FONT-FAMILY: Arial;  FONT-SIZE: 12pt;  FONT-WEIGHT: bold;}
</STYLE>
<SCRIPT src='i/commoninf.js'></SCRIPT>
<SCRIPT LANGUAGE="JavaScript" >
var Hint3Name = '';
function findlogin(title, script, name){
    document.all("hint3").innerHTML = '<form action="'+script+'" method=POST><table width=100% cellspacing=1 cellpadding=0 bgcolor=CCC3AA><tr><td align=center><B>'+title+'</td><td width=20 align=right valign=top style="cursor: hand" onclick="closehint3();"><BIG><B>x</td></tr><tr><td colspan=2>'+
    '<table width=100% cellspacing=0 cellpadding=2 bgcolor=FFF6DD><tr><INPUT TYPE=hidden name=sd4 value="<? echo @$user['id']; ?>"><td colspan=2>'+
    'Укажите логин персонажа:<small><BR>(можно щелкнуть по логину в чате)</TD></TR><TR><TD width=50% align=right><INPUT TYPE=text NAME="'+name+'"></TD><TD width=50%><INPUT TYPE="submit" value=" »» "></TD></TR></TABLE></td></tr></table></form>';
    document.getElementById("hint3").style.visibility = "visible";
    document.getElementById("hint3").style.left = 100;
    document.getElementById("hint3").style.top = 100;
    Hint3Name = name;
    document.all(name).focus();
}


function returned2(s){
    if (top.oldlocation != '') { top.frames['main'].navigate(top.oldlocation+'?'+s+'tmp='+Math.random()); top.oldlocation=''; }
    else { top.frames['main'].navigate('main.php?'+s+'tmp='+Math.random()) }
}
<?
$step=1;
if ($step==1) $idkomu=0;
?>
function closehint3(){
    document.all("hint3").style.visibility="hidden";
    Hint3Name='';
}
</script>
</HEAD>
<body leftmargin=2 topmargin=2 marginwidth=2 marginheight=2 bgcolor=e2e0e0 onload="<?=topsethp()?>">
<div id=hint4 class=ahint></div>
<TABLE width=100% cellspacing=0 cellpadding=0>

<TR><TD><?nick($user);?></TD>
<TD class='H3' align=right><?=$rooms[$user['room']];?>&nbsp; &nbsp;
<IMG SRC=i/tower/attack.gif WIDTH=66 HEIGHT=24 ALT="Напасть на..." style="cursor:pointer" onclick="findlogin('Напасть на','towerin.php','attack')">
</TD>
<TR>
<TD valign=top>
<FONT COLOR=red></FONT>

<?

    $its = mq("SELECT * FROM `deztow_items` WHERE `room` = '".$user['room']."';");
    if(mysql_num_rows($its)>0) {
        echo '<H4>В комнате разбросаны вещи:</H4>';
    }
    while($it = mysql_fetch_array($its)) {
        echo ' <A HREF="towerin.php?give=',$it['id'],'"><IMG SRC="i/sh/',$it['img'],'" ALT="Подобрать предмет \'',$it['name'],'\'"></A>';
    }

?>
</TD>
<TD colspan=3 valign=top align=right nowrap>
<script language="javascript" type="text/javascript">
function fastshow2 (content) {
    var el = document.getElementById("mmoves");
    var o = window.event.srcElement;
    if (content == '') { el.innerHTML =  '';}
    if (content!='' && el.style.visibility != "visible") {el.innerHTML = '<small>'+content+'</small>';}
    var x = window.event.clientX + document.documentElement.scrollLeft + document.body.scrollLeft - el.offsetWidth + 5;
    var y = window.event.clientY + document.documentElement.scrollTop + document.body.scrollTop+20;
    if (x + el.offsetWidth + 3 > document.body.clientWidth + document.body.scrollLeft) { x=(document.body.clientWidth + document.body.scrollLeft - el.offsetWidth - 5); if (x < 0) {x=0}; }
    if (y + el.offsetHeight + 3 > document.body.clientHeight  + document.body.scrollTop) { y=(document.body.clientHeight + document.body.scrollTop - el.offsetHeight - 3); if (y < 0) {y=0}; }
    if (x<0) {x=0;}
    if (y<0) {y=0;}
    el.style.left = x + "px";
    el.style.top  = y + "px";
    if (el.style.visibility != "visible") {
        el.style.visibility = "visible";
    }
}
function hideshow () {
    document.getElementById("mmoves").style.visibility = 'hidden';
}
</script>

<script language="javascript" type="text/javascript">
var solo_store;
function solo(n, name) {
    if (check_access()==true) {
        window.location.href = '?path='+n+'&rnd='+Math.random();
    } else if (name && n) {
        solo_store = n;
        var add_text = (document.getElementById('add_text') || document.createElement('div'));
        add_text.id = 'add_text';
        add_text.innerHTML = 'Вы перейдете в: <strong>' + name +'</strong> (<a href="#" onclick="return clear_solo();">отмена</a>)';
        document.getElementById('ione').parentNode.parentNode.nextSibling.firstChild.appendChild(add_text);
        ch_counter_color('red');
    }
    return false;
}
function clear_solo () {
    document.getElementById('add_text').removeNode(true);
    solo_store = false;
    ch_counter_color('#00CC00');
    return false;
}
var from_map = false;
function imover(im) {
    im.filters.Glow.Enabled=true;
    if ( from_map == false && im.id.match(/mo_(\d)/) && document.getElementById('b' + im.id)) {
        from_map = true;
        document.getElementById('b' + im.id).runtimeStyle.color = '#666666';
        from_map = false;
    }

}
function imout(im) {
    im.filters.Glow.Enabled=false;
    if ( from_map == false && im.id.match(/mo_(\d)/) && document.getElementById('b' + im.id)) {
        from_map = true;
        document.getElementById('b' + im.id).runtimeStyle.color = document.getElementById('b' + im.id).style.color;
        from_map = false;
    }
}
function bimover (im) {
    if ( from_map==false && document.getElementById(im.id.substr(1)) ) {
        from_map = true;
        imover(document.getElementById(im.id.substr(1)));
        from_map = false;
    }
}
function bimout (im) {
    if ( from_map==false && document.getElementById(im.id.substr(1)) ) {
        from_map = true;
        imout(document.getElementById(im.id.substr(1)));
        from_map = false;
    }
}
function bsolo (im) {
    if (document.getElementById(im.id.substr(1))) {
        document.getElementById(im.id.substr(1)).click();
    }
    return false;
}
function Down() {top.CtrlPress = window.event.ctrlKey}
document.onmousedown = Down;

var fireworks_types = new Array('04',21, '03',21, '05',21, '06',21, '07',27, '08',27, '02',34, '09',34,
                '10',34, '11',42, '14', 27, '16', 32, '15', 37 );

function fireworks (x,y,type) {
    return start_fireworks(x,y,type);
}

function start_fireworks (x,y,type) {
    myFW = new JSFX.FireworkDisplay(1, "i/fireworks/fw"+fireworks_types[type*2], fireworks_types[type*2+1], x, y);
    myFW.start();
    return false;
}

function stop_fireworks (id) {
    document.getElementById(id).style.display = 'none';
    document.getElementById(id).removeNode(true);
    return false;
}

</script>
<style type="text/css">
    img.aFilter { filter:Glow(color=,Strength=,Enabled=0); cursor:hand }
    hr { height: 1px; }
</style>

<table  border="0" cellpadding="0" cellspacing="0">
    <tr align="right" valign="top">
        <td>

            <table cellpadding="0" cellspacing="0" border="0" width="1"><tr><td>
            <div style="position:relative; cursor: pointer;" id="ione"><img src="i/tower/<?=(500+$user['room'])?>.jpg" alt="" border="1"/>

            </div></td></tr>

                <tr><td align="right"><div align="right" id="btransfers"><table cellpadding="0" cellspacing="0" border="0" id="bmoveto">
                <tr><td bgcolor="#D3D3D3">

                </td>
                </tr>
                </table></div></td></tr>

            </table>

            </td>
        <td>

            <table width="80" border="0" cellspacing="0" cellpadding="0">
                <tr>

                    <td><table width="80"  border="0" cellspacing="0" cellpadding="0">
                        <tr>
                            <td colspan="3" align="center"><img src="i/move/navigatin_46.gif" width="80" height="4" /></td>
                            </tr>
                        <tr>
                            <td colspan="3" align="center"><table width="80"  border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                        <td><img src="i/move/navigatin_48.gif" width="9" height="8" /></td>
                                        <td width="100%" bgcolor="#000000"><table border="0" cellspacing="0" cellpadding="0">
                                                <tr>
                                                    <td nowrap="nowrap" align="center"><div align="center" style="font-size:4px;padding:0px;border:solid black 0px; text-align:center" id="prcont"></div>
                                                            <script language="javascript" type="text/javascript">
                                                var s="";for (i=1; i<=32; i++) {s+='<span id="progress'+i+'">&nbsp;</span>';if (i<32) {s+='&nbsp;'};}document.getElementById('prcont').innerHTML=s;
                                                </script>
                                                        </td>
                                                    </tr>
                                                </table></td>
                                        <td><img src="i/move/navigatin_50.gif" width="7" height="8" /></td>
                                        </tr>
                                    </table></td>
                            </tr>

    <tr>
        <td><table width="100%"  border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td><img src="i/move/navigatin_51.gif" width="31" height="8" /></td>
                </tr>
                <tr>
                    <td><img src="i/move/navigatin_54.gif" width="9" height="20" /><img src="i/move/navigatin_55i.gif" width="22" height="20" border="0" /></td>
                </tr>
                <tr>
                    <td><a onclick="return check('m7');" <?if($rooms[$rhar[$user['room']][4]]) { echo 'id="m7"';}?> href="?rnd=0.817371946556865&path=4"><img src="i/move/navigatin_59<?if(!$rooms[$rhar[$user['room']][4]]) { echo 'i';}?>.gif" width="21" height="20" border="0" o<?if(!$rooms[$rhar[$user['room']][4]]) { echo 'i';}?>nmousemove="fastshow2('<?=$rooms[$rhar[$user['room']][4]]?>');" onmouseout="hideshow();" /></a><img src="i/move/navigatin_60.gif" width="10" height="20" border="0" /></td>
                </tr>
                <tr>
                    <td><img src="i/move/navigatin_63.gif" width="11" height="21" /><img src="i/move/navigatin_64i.gif" width="20" height="21" border="0" /></td>
                </tr>
                <tr>
                    <td><img src="i/move/navigatin_68.gif" width="31" height="8" /></td>
                </tr>
        </table></td>
        <td><table width="100%"  border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td><a onclick="return check('m1');" <?if($rooms[$rhar[$user['room']][1]]) { echo 'id="m1"';}?> href="?rnd=0.817371946556865&path=1"><img src="i/move/navigatin_52<?if(!$rooms[$rhar[$user['room']][1]]) { echo 'i';}?>.gif" width="19" height="22" border="0" <?if(!$rooms[$rhar[$user['room']][1]]) { echo 'i';}?>onmousemove="fastshow2('<?=$rooms[$rhar[$user['room']][1]]?>');" onmouseout="hideshow();" /></a></td>
                </tr>
                <tr>
                    <td><a href="?rnd=0.817371946556865"><img src="i/move/navigatin_58.gif" width="19" height="33" border="0" o nmousemove="fastshow2('<strong>Обновить</strong><br />Переходы:<br />Картинная галерея 1<br />Зал ораторов<br />Картинная галерея 3');" onmouseout="hideshow();" /></a></td>
                </tr>
                <tr>
                    <td><a onclick="return check('m5');" <?if($rooms[$rhar[$user['room']][3]]) { echo 'id="m5"';}?> href="?rnd=0.817371946556865&path=3"><img src="i/move/navigatin_67<?if(!$rooms[$rhar[$user['room']][3]]) { echo 'i';}?>.gif" width="19" height="22" border="0" <?if(!$rooms[$rhar[$user['room']][3]]) { echo 'i';}?>onmousemove="fastshow2('<?=$rooms[$rhar[$user['room']][3]]?>');" onmouseout="hideshow();" /></a></td>
                </tr>
        </table></td>
        <td><table width="100%"  border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td><img src="i/move/navigatin_53.gif" width="30" height="8" /></td>
                </tr>
                <tr>
                    <td><img src="i/move/navigatin_56i.gif" width="21" height="20" border="0" /><img src="i/move/navigatin_57.gif" width="9" height="20" /></td>
                </tr>
                <tr>
                    <td><img src="i/move/navigatin_61.gif" width="8" height="21" /><a onclick="return check('m3');" <?if($rooms[$rhar[$user['room']][2]]) { echo 'id="m3"';}?> href="?rnd=0.817371946556865&path=2"><img src="i/move/navigatin_62<?if(!$rooms[$rhar[$user['room']][2]]) { echo 'i';}?>.gif" width="22" height="21" border="0" <?if(!$rooms[$rhar[$user['room']][2]]) { echo 'i';}?>onmousemove="fastshow2('<?=$rooms[$rhar[$user['room']][2]]?>');" onmouseout="hideshow();" /></a></td>
                </tr>
                <tr>
                    <td><img src="i/move/navigatin_65i.gif" width="21" height="20" border="0" /><img src="i/move/navigatin_66.gif" width="9" height="20" /></td>
                </tr>
                <tr>
                    <td><img src="i/move/navigatin_69.gif" width="30" height="8" /></td>
                </tr>
        </table></td>
    </tr>

                    </table></td>
                </tr>
            </table>

            <table  border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td nowrap="nowrap" id="moveto">
                        <table width="100%"  border="0" cellpadding="0" cellspacing="1" bgcolor="#DEDEDE">

                        </table>
                    </td>
                </tr>
            </table>
            </td>
    </tr>
</table>
<div id="mmoves" style="background-color:#FFFFCC; visibility:hidden; overflow:visible; position:absolute; border-color:#666666; border-style:solid; border-width: 1px; padding: 2px; white-space: nowrap;"></div>
<script language="javascript" type="text/javascript">
var progressEnd = 32;
var progressColor = '#00CC00';
var mtime = parseInt('<?=($user['movetime']-time())?>');
if (!mtime || mtime<=0) {mtime=0;}
var progressInterval = Math.round(mtime*1000/progressEnd);
var is_accessible = true;
var progressAt = progressEnd;
var progressTimer;
function progress_clear() {
    for (var i = 1; i <= progressEnd; i++) document.getElementById('progress'+i).style.backgroundColor = 'transparent';
    progressAt = 0;

    for (var t = 1; t <= 8; t++) {
        if (document.getElementById('m'+t) ) {
            var tempname = document.getElementById('m'+t).children[0].src;
            if (tempname.match(/b\.gif$/)) {
                    document.getElementById('m'+t).children[0].id = 'backend';
            }
            var newname;
            newname = tempname.replace(/(b)?\.gif$/,'i.gif');
            document.getElementById('m'+t).children[0].src = newname;
        }
    }

    is_accessible = false;
    set_moveto(true);
}
function progress_update() {
    progressAt++;
    if (progressAt > progressEnd) {

        for (var t = 1; t <= 8; t++) {
            if (document.getElementById('m'+t) ) {
                var tempname = document.getElementById('m'+t).children[0].src;
                var newname;
                newname = tempname.replace(/i\.gif$/,'.gif');
                if (document.getElementById('m'+t).children[0].id == 'backend') {
                    tempname = newname.replace(/\.gif$/,'b.gif');
                    newname = tempname;
                }
                document.getElementById('m'+t).children[0].src = newname;
            }
        }

        is_accessible = true;
        if (window.solo_store && solo_store) { solo(solo_store); } // go to stored
        set_moveto(false);
    } else {document.getElementById('progress'+progressAt).style.backgroundColor = progressColor;
        progressTimer = setTimeout('progress_update()',progressInterval);
    }
}
function set_moveto (val) {
    document.getElementById('moveto').disabled = val;
    if (document.getElementById('bmoveto')) {
        document.getElementById('bmoveto').disabled = val;
    }
}
function progress_stop() {
    clearTimeout(progressTimer);
    progress_clear();
}
function check(it) {
    return is_accessible;
}
function check_access () {
    return is_accessible;
}
function ch_counter_color (color) {
    progressColor = color;
    for (var i = 1; i <= progressAt; i++) {
        document.getElementById('progress'+i).style.backgroundColor = progressColor;
    }
}
// brrr
if (mtime>0) {
    progress_clear();
    progress_update();
} else {
    for (var i = 1; i <= progressEnd; i++) {
        document.getElementById('progress'+i).style.backgroundColor = progressColor;
    }
}
</script>

</TD>
</TR>
</TABLE>
<BR>Всего живых участников на данный момент: <B><?
    echo "<B>".($ls[0]-$ls[1])."</B> + <B>".$ls[1]."</B>";
?></B>...<BR>
<div id=hint3 class=ahint></div>
<script>top.onlineReload(true)</script>
</BODY>
</HTML>
