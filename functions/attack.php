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
      $ret='������ ��������� �� ����������.';
    } elseif ($jert["hp"]<=0 && $help) {
      $ret='̸������ ������ ��� �� �����.';
    } elseif(($jert['room'] == $user['room'] || $jert["room"]==$extraroom) && $jert['id']!=$user['id']) {
      if($jert['battle'] > 0) {
        $joinedbattle=$jert['battle'];
        if (!$bd) $bd = mysql_fetch_array(mq ('SELECT * FROM `battle` WHERE `id` = '.$jert['battle'].' LIMIT 1;'));
        //if ($bd["coment"]=="�������� ��������") undressall($user['id']);
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
        // ����������� ���-���
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
        //addch ("<b>".nick7($user['id'])."</b> ������".($jert["sex"]==1?"��":"���")." � <a href=logs.php?log=".$id." target=_blank>�������� ��</a>.  ",$user['room']);

        //mq('UPDATE `logs` SET `log` = CONCAT(`log`,\'<span class=date>'.date("H:i").'</span> '.nick5($user['id'],"B".$ttt).' �������� � ��������!<BR>\') WHERE `id` = '.$jert['battle'].'');
        
        addlog($jert['battle'],'<span class=date>'.date("H:i").'</span> '.fullnick($user, 1, "B".$ttt).' ������'.($jert["sex"]==1?"��":"���").' � ��������!<BR>');
        mq('UPDATE `battle` SET `teams` = \''.serialize($battle).'\', `t'.$ttt.'`=CONCAT(`t'.$ttt.'`,\';'.$user['id'].'\'), `to'.$ttt.'` = \''.time().'\', `to'.$ttt2.'` = \''.(time()-1).'\'  WHERE `id` = '.$jert['battle'].' ;');
        mq("UPDATE users SET `battle` =".$jert['battle'].",`zayavka`=0 WHERE `id`= ".$user['id']);
        //mq('UPDATE `deztow_turnir` SET `log` = CONCAT(`log`,\''."<span class=date>".date("d.m.y H:i")."</span>  ".nick3($user['id'])." �������� � �������� ������ ".nick3($jert['id'])." <a href=\"logs.php?log={$jert['battle']}\" target=_blank>��</a><BR>".'\') WHERE `active` = TRUE;');
        if (!$noredir) {
          @header("Location:fbattle.php");
          die("<script>location.href='fbattle.php';</script>");
        }
      } elseif ($jert["hp"]<=0) {
        $ret="�� ����� ���������� ��� �������.";
      } elseif ($help) {
        $ret="�������� �� � ���.";
      } else {
        // �������� ���

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

        $rr = "<b>".nick3($user['id'])."</b> � <b>".nick3($jert['id'])."</b>";

        //addch ("<B><b>".nick7($user['id'])."</b> , �������� ����� ���������, �������� ����� �� <b>".nick7($jert['id'])."</b>.   ",$user['room']);
        //mq("INSERT INTO `logs` (`id`,`log`) VALUES('{$id}','���� ���������� <span class=date>".date("Y.m.d H.i")."</span>, ����� ".$rr." ������� ����� ���� �����. <BR>');");
        addlog($id,"���� ���������� <span class=date>".date("Y.m.d H.i")."</span>, ����� ".$rr." ������� ����� ���� �����. <BR>");

        mq("UPDATE users SET `battle` ={$id},`zayavka`=0 WHERE `id`= {$user['id']} OR `id` = {$jert['id']}");
        if (!$noredir) {
          @header("Location:fbattle.php");
          die("<script>location.href='fbattle.php';</script>");
        }
      }
    } elseif ($jser==$user["id"]) {
      $ret='�� ������������� ������ ����� ����?';
    } else {
      $ret='������ ����������� �� �������...';
    }
    if ($lock) mq("UNLOCK TABLES");
    return $ret;
  }

  function cantjoinbattle($user, $enemy, $battle) {

    if (!@$battle["id"]) return false;

    if ($battle['closed']==1) return "���� ��� ���������� �� �������� ����";
    if ($battle["blood"]) {
      $e=mqfa1("select id from effects where owner='$user[id]' and type=".TRAVMARESISTANCE2);
      if ($e) return "�� ���������� ��� ������� ����������� � �� ������ �������� � �������� ��������.";
    }
    if (!$user["klan"]) return false;

    if ($user["klan"]==$enemy["klan"]) return "����� ����� ����� ��������.";
    $t1=explode(";", $battle["t1"]);
    $t2=explode(";", $battle["t2"]);
    if (in_array($user["id"],$t1) || in_array($user["id"],$t2)) return "�� �� ������ �������� � ���� ���.";
    if (in_array($enemy["id"],$t2) || $enemy["id"]==99) $team=$t2;
    else $team=$t1;
    $i=mqfa1("select id from users where klan='$user[klan]' and (id=".implode(" or id=", $team).")");
    if ($i) return "����� ����� ����� ��������.";

    return false;
  }

  function cantattack($us, $blood=0, $unhealable=0, $canbeoff=0) {
    if (!$us) return "������ ��������� �� ����������.";
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
      if ($e) return "�� ���������� ��� ������� ����������� � �� ������ �������� � �������� ��������.";
    }
    if ($user["klan"] && $user["klan"]==$us["klan"]) {
      return "����� ����� ����� ��������.";
    } elseif ($nic1) {
      return "��� ������ ���� ����������� � ����������� �����.";
    } elseif ($nic2) {
      return "�� ������ ����� ��������� � ���� ������� ���������.";
    } elseif (mqfa("SELECT id FROM `effects` WHERE `owner` = ".$user['id']." AND (type=13 OR type=12 OR  type=14)")) {
      return "�� �� ������ �������� ���� ������.";
    } elseif (in_array($user["id"], $noattack) || in_array($user["id"], $testusers)) {
      return "��� ��� ��������� ���������.";
    } elseif ($user['battle'] > 0) {
      return "�� � ���...";
    } elseif ($unhealable && $pregn) {
      return "��������� ��������� �� ���������� ���������.";
    } elseif ((!$us['online'] && !$canbeoff) || $us['invis']) {
      return "�������� �� � ����!";
    } elseif ($user['zayavka'] > 0) {
      return "�� �������� ��������...";
    } elseif ($blood && $user["level"]-$us["level"]>1 && $us["level"]<9) {
      return "���� ������ ��������� ���� 9-��, �� �������� ���������� ����� �������� ��������, ������� �� ����� ��� �� 1 ������� ������.";
    } elseif (!$us['battle'] && mqfa("SELECT id FROM `effects` WHERE `owner` = ".$us['id']." AND (type=13 OR type=12 OR  type=14)")) {
      return "�������� ������ �����������...";
    } elseif ($user['room'] != $us['room']) {
      return "�������� � ������ �������!";
    } elseif (in_array($us["room"], $noattackrooms) || in_array($us["room"], $caverooms)) {
      return "��������� � ���� ������� ���������!";
    } elseif ($us['level'] < 1) {
      return "������� ��������� ��� ������� �����������!";
    } elseif ($us['hp'] < $us['maxhp']*0.33  && !$us['battle']) {
      return "������ ������� �����!";
    } elseif ($user['hp'] < $user['maxhp']*0.33) {
      return "�� ������� ��������� ��� ���������!";
    } elseif ($us['hp'] < 1  && $us['battle']) {
      return "�� �� ������ ������� �� ���������!";
    } elseif ($t=mqfa1("select time from effects where owner='$us[id]' and type=".PROTFROMATTACK)) {
      return "���� �������� ������� �� ��������� ��� ".($t-time())." ���.";
    }
  }
?>