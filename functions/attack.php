<?
  function attack($target, $type=3, $blood=0, $lock=1, $extraroom=0, $help=0, $timeout=1, $jert=0, $bd=0, $bot=0, $comment="", $noredir=0) {
    global $user, $joinedbattle, $startedbattle;
    $joinedbattle=0;
    if ($lock) mq("LOCK TABLES `bots` WRITE, `battle` WRITE, `users` WRITE, `inventory` WRITE, `effects` WRITE");
    
    if (!$jert) {
      if ((int)$target>0) $jert = mqfa("SELECT id, room, hp, battle FROM `users` WHERE `id` = '$target'");
      elseif ($target) $jert = mqfa("SELECT id, room, hp, battle FROM `users` WHERE `login` = '$target'");
      else $jert = mqfa("SELECT id, room, hp, battle FROM `users` WHERE `login` = '$help'");
    }

    $b=mqfa1("select battle from users where id='$user[id]'");
    if ($b) {
      header("Location:fbattle.php");
      die("<script>location.href='fbattle.php';</script>");
    } elseif (!$jert) {
      $ret='Такого персонажа не существует.';
    } elseif ($jert["hp"]<=0 && $help) {
      $ret='Мёртвому помощь уже не нужна.';
    } elseif(($jert['room'] == $user['room'] || $jert["room"]==$extraroom) && $jert['id']!=$user['id']) {
      if($jert['battle'] > 0) {
        $joinedbattle=$jert['battle'];
        if (!$bd) $bd = mysql_fetch_array(mq ('SELECT * FROM `battle` WHERE `id` = '.$jert['battle'].' LIMIT 1;'));
        //if ($bd["coment"]=="Кулачный поединок") undressall($user['id']);
        $battle = unserialize($bd['teams']);
        if ($help) {
          $battle[$user['id']]=$battle[$jert["id"]];
        } else {
          if ($bd["type"]==11) {
            foreach ($battle as $k=>$v) $battle[$user['id']][$k]=array(0,0,time());
          } else {
            $ak = array_keys($battle[$jert['id']]);
            $battle[$user['id']] = $battle[$ak[0]];
          }
        }
        foreach($battle[$user['id']] as $k => $v) {
          if ($battle[$k]) {
            $battle[$k][$user['id']] = array(0,0,time());
            $battle[$user['id']][$k] = array(0,0,time());
          }
        }
        $t1 = explode(";",$bd['t1']);
        // проставляем кто-где
        if (in_array ($jert['id'],$t1)) {
          if ($help) {
            $ttt = 1;$ttt2 = 2;
          } else {
            $ttt = 2;$ttt2 = 1;
          }
        } else {
          if ($help) {
            $ttt=2;$ttt2=1;
          } else {
            $ttt=1;$ttt2=2;
          }
        }
        //addch ("<b>".nick7($user['id'])."</b> вмешал".($jert["sex"]==1?"ся":"ась")." в <a href=logs.php?log=".$id." target=_blank>поединок »»</a>.  ",$user['room']);

        //mq('UPDATE `logs` SET `log` = CONCAT(`log`,\'<span class=date>'.date("H:i").'</span> '.nick5($user['id'],"B".$ttt).' вмешался в поединок!<BR>\') WHERE `id` = '.$jert['battle'].'');
        
        addlog($jert['battle'],'<span class=date>'.date("H:i").'</span> '.fullnick($user, 1, "B".$ttt).' вмешал'.($jert["sex"]==1?"ся":"ась").' в поединок!<BR>');
        mq('UPDATE `battle` SET `teams` = \''.serialize($battle).'\', `t'.$ttt.'`=CONCAT(`t'.$ttt.'`,\';'.$user['id'].'\'), `to'.$ttt.'` = \''.time().'\', `to'.$ttt2.'` = \''.(time()-1).'\'  WHERE `id` = '.$jert['battle'].' ;');
        mq("UPDATE users SET `battle` =".$jert['battle'].",`zayavka`=0 WHERE `id`= ".$user['id']);
        //mq('UPDATE `deztow_turnir` SET `log` = CONCAT(`log`,\''."<span class=date>".date("d.m.y H:i")."</span>  ".nick3($user['id'])." вмешался в поединок против ".nick3($jert['id'])." <a href=\"logs.php?log={$jert['battle']}\" target=_blank>»»</a><BR>".'\') WHERE `active` = TRUE;');
        if (!$noredir) {
          @header("Location:fbattle.php");
          die("<script>location.href='fbattle.php';</script>");
        }
      } elseif ($jert["hp"]<=0) {
        $ret="Не стоит издеваться над трупами.";
      } elseif ($help) {
        $ret="Персонаж не в бою.";
      } else {
        // начинаем бой

        if($bot) {
          mq("INSERT INTO `bots` (`name`,`prototype`,`battle`,`hp`) values ('$jert[login]','$jert[id]','0','$jert[maxhp]');");
          $jert['id'] = mysql_insert_id();
        }

        $teams = array();
        $teams[$user['id']][$jert['id']] = array(0,0,time());
        $teams[$jert['id']][$user['id']] = array(0,0,time());
        $sv = array(1,2,3,4,5);
        //$tou = array_rand($sv,1);
        mq("INSERT INTO `battle` (`coment`,`teams`,`timeout`,`type`,`status`,`t1`,`t2`,`to1`,`to2`,`blood`, date)
            VALUES ('$comment','".serialize($teams)."','$timeout','$type','0','".$user['id']."','".$jert['id']."','".time()."','".time()."','$blood', '".date("Y-m-d H:i")."')");
        $id = mysql_insert_id();
        $startedbattle=$id;

        mq("update bots set battle='$id' where id='$jert[id]'");

        $rr = "<b>".nick3($user['id'])."</b> и <b>".nick3($jert['id'])."</b>";

        //addch ("<B><b>".nick7($user['id'])."</b> , применив магию нападения, внезапно напал на <b>".nick7($jert['id'])."</b>.   ",$user['room']);
        //mq("INSERT INTO `logs` (`id`,`log`) VALUES('{$id}','Часы показывали <span class=date>".date("Y.m.d H.i")."</span>, когда ".$rr." бросили вызов друг другу. <BR>');");
        addlog($id,"Часы показывали <span class=date>".date("Y.m.d H.i")."</span>, когда ".$rr." бросили вызов друг другу. <BR>");

        mq("UPDATE users SET `battle` ={$id},`zayavka`=0 WHERE `id`= {$user['id']} OR `id` = {$jert['id']}");
        if (!$noredir) {
          @header("Location:fbattle.php");
          die("<script>location.href='fbattle.php';</script>");
        }
      }
    } elseif ($jser==$user["id"]) {
      $ret='Вы действительно хотите убить себя?';
    } else {
      $ret='Жертва ускользнула из комнаты...';
    }
    if ($lock) mq("UNLOCK TABLES");
    return $ret;
  }

  function cantjoinbattle($user, $enemy, $battle) {

    if (!@$battle["id"]) return false;

    if ($battle['closed']==1) return "Этот бой изолирован от внешнего мира";
    if ($battle["blood"]) {
      $e=mqfa1("select id from effects where owner='$user[id]' and type=".TRAVMARESISTANCE2);
      if ($e) return "Вы находитесь под защитой Мироздетеля и не можете вступать в кровавые поединки.";
    }
    if (!$user["klan"]) return false;

    if ($user["klan"]==$enemy["klan"]) return "Чтите честь ваших сокланов.";
    $t1=explode(";", $battle["t1"]);
    $t2=explode(";", $battle["t2"]);
    if (in_array($user["id"],$t1) || in_array($user["id"],$t2)) return "Вы не можете вступить в этот бой.";
    if (in_array($enemy["id"],$t2) || $enemy["id"]==99) $team=$t2;
    else $team=$t1;
    $i=mqfa1("select id from users where klan='$user[klan]' and (id=".implode(" or id=", $team).")");
    if ($i) return "Чтите честь ваших сокланов.";

    return false;
  }

  function cantattack($us, $blood=0, $unhealable=0, $canbeoff=0) {
    if (!$us) return "Такого персонажа не существует.";
    global $user, $testusers, $noattackrooms, $caverooms;
    include "config/extrausers.php";
    $nic1=0;
    $nic2=0;
    if ($unhealable) $pregn=mqfa1("select id from effects where owner=$us[id] and type=30");
    if (incastle($user["room"])) {
      $siege=getvar("siege");
      if ($siege && $siege<10) {
        $co=getvar("castleowner");
        if ($user["klan"]!=$co && $us["klan"]!=$co) $nic1=1;
      } elseif($siege && $siege-time()<60*60*21) $nic2=1;
    }
    if ($blood) {
      $e=mqfa1("select id from effects where owner='$user[id]' and type=".TRAVMARESISTANCE2);
      if ($e) return "Вы находитесь под защитой Мироздетеля и не можете вступать в кровавые поединки.";
    }
    if ($user["klan"] && $user["klan"]==$us["klan"]) {
      return "Чтите честь ваших сокланов.";
    } elseif ($nic1) {
      return "Для начала надо разобраться с защитниками замка.";
    } elseif ($nic2) {
      return "До начала осады нападения в этой локации запрещены.";
    } elseif (mqfa("SELECT id FROM `effects` WHERE `owner` = ".$user['id']." AND (type=13 OR type=12 OR  type=14)")) {
      return "Вы не можете нападать имея травму.";
    } elseif (in_array($user["id"], $noattack) || in_array($user["id"], $testusers)) {
      return "Для вас нападения запрещены.";
    } elseif ($user['battle'] > 0) {
      return "Не в бою...";
    } elseif ($unhealable && $pregn) {
      return "Нелечимые нападения на беременных запрещены.";
    } elseif ((!$us['online'] && !$canbeoff) || $us['invis']) {
      return "Персонаж не в игре!";
    } elseif ($user['zayavka'] > 0) {
      return "Вы ожидаете поединка...";
    } elseif ($blood && $user["level"]-$us["level"]>1 && $us["level"]<9) {
      return "Если уровнь персонажа ниже 9-го, то кровавым нападением может нападать персонаж, который не более чем на 1 уровень старше.";
    } elseif (!$us['battle'] && mqfa("SELECT id FROM `effects` WHERE `owner` = ".$us['id']." AND (type=13 OR type=12 OR  type=14)")) {
      return "Персонаж тяжело травмирован...";
    } elseif ($user['room'] != $us['room']) {
      return "Персонаж в другой комнате!";
    } elseif (in_array($us["room"], $noattackrooms) || in_array($us["room"], $caverooms)) {
      return "Нападения в этой локации запрещены!";
    } elseif ($us['level'] < 1) {
      return "Новички находятся под защитой мироздателя!";
    } elseif ($us['hp'] < $us['maxhp']*0.33  && !$us['battle']) {
      return "Жертва слишком слаба!";
    } elseif ($user['hp'] < $user['maxhp']*0.33) {
      return "Вы слишком ослаблены для нападения!";
    } elseif ($us['hp'] < 1  && $us['battle']) {
      return "Вы не можете напасть на погибшего!";
    } elseif ($t=mqfa1("select time from effects where owner='$us[id]' and type=".PROTFROMATTACK)) {
      return "Этот персонаж защищён от нападений ещё ".($t-time())." сек.";
    }
  }
?>