<?php
$_POST['target']=db_escape_string($_POST['target']);
$us = mysqli_fetch_array(db_query("SELECT *,(select `id` from `online` WHERE `real_time` >= ".(time()-60)." AND `id` = users.`id`) as `online`  FROM `users` WHERE `login` = '{$_POST['target']}' LIMIT 1;"));
$battle = mysqli_fetch_array(db_query("SELECT `closed` FROM `battle` WHERE `id` = '{$us['battle']}' ;"));
$owntravma=mqfa("SELECT id FROM `effects` WHERE `owner` = '".$us['id']."' AND (type=13 OR type=12 OR type=14)");
if (!$us["online"]) {
  $us=mqfa("select * from bots where battle='$user[battle]' and name='$_POST[target]'");
  if ($us) {
    $us["online"]=1;
    $us['room']=$user["room"];
    $us["level"]=1;
    $us["maxhp"]=mqfa1("select maxhp from users where id='$us[prototype]'");
  }
}
if (!$us['online'] || $us["invis"]) {
    echo "Персонаж не в игре!";
} elseif ($owntravma['id'] && !$us['battle']) {
  echo "Персонаж тяжело травмирован...";
} elseif ($user['klan'] != '' && ($user['klan'] == $us['klan'])) {
  echo "Чтите честь ваших сокланов.";
} elseif ($user['align'] >1 && $user['align'] <2 && $us['align'] >1 && $us['align'] <2) {
  echo "Чтите честь братьев.";
} elseif ($user['room'] != $us['room']) {
  echo "Персонаж в другой комнате!";
} elseif ($us['level'] < 1) {
  echo "Новички находятся под защитой мироздателя!";
} elseif ($us['hp'] < $us['maxhp']*0.33  && !$us['battle']) {
  echo "Жертва слишком слаба!";
} elseif ($user['hp'] < $user['maxhp']*0.33 && !$user["battle"]) {
  echo "Вы слишком слабы!";
} elseif ($us['hp'] < 1  && $us['battle']) {
  echo "Вы не можете кидать снежки в погибшего!";
} else {
  if ($user["battle"]) {
    global $fbattle, $report, $scrollresult;
    $target=$fbattle->findlogin($_POST["target"]);
    if (!$target) {
      echo "Цель не найдена.";
    } elseif ($target["team"]==$fbattle->myteam) {
      echo "Нельзя кидать снежки в товарищей по команде.";
    } elseif ($fbattle->userdata[$target["id"]]["hp"]<=0) {
      echo "Не стоит глумиться над трупами.";
    } else {
      $fbattle->getbu($target["id"]);
      if ($fbattle->battleunits[$target["id"]]["prototype"]==3946) {
        if ($fbattle->userdata[$target["id"]]["maxhp"]-$fbattle->userdata[$target["id"]]["hp"]>21) {
          $dam=mt_rand(1980, 2000);
        } else $dam=1;
      } elseif ((strpos($_POST["target"], "Отморозок")===0 && $target["id"]>_BOTSEPARATOR_)) {
        $dam=mt_rand(1980, 2000);        
      } else {
        $dam=rand(10,20);
      }

      $res=$fbattle->checkpriems2(0,$fbattle->en_class,$target["id"]);
      $dam=$fbattle->processstrokeeffect2($res, $dam);
      $dam=$fbattle->takehp($dam, $target["id"], 0, 1, $user["id"], 0, SNOWBALL);
      $fbattle->adddamage($user["id"], $dam, $target["id"]);

      $scrollresult=array();
      $scrollresult["action"]="кинул".($user["sex"]==1?"":"а")." снежок по";
      $scrollresult["target"]=$target["id"];
      $scrollresult["logtype"]=1;
      $scrollresult["damage"]=$dam;
      $bet=1;
    }
  } else {
    if ($user['sex'] == 1) {$action="кинул";}   else {$action="кинула";}
    if ($user['align'] > '2' && $user['align'] < '3')  {
      $angel="Ангел";
    } elseif ($user['align'] > '1' && $user['align'] < '2') {
      $angel="Персонаж";
    }

    $jert = $us;
    if ($jert["id"]!=$user["id"]) {
      $minhp=rand(5,10);
      $jert["hp"]-=$minhp;
      if ($jert["hp"]<0) $jert["hp"]=0;
      if ($user['invis']==1) {
        addch("<img src=i/magic/snowball2.gif> <B>невидимка</B> ".$action." снежок в &quot;{$_POST['target']}&quot; <b>-$minhp</b> [$jert[hp]/$jert[maxhp]].");
        addchp ('<font color=red>Внимание!</font> По вам '.$action.' снежок <B>невидимка</B> '."<b>-$minhp</b> [$jert[hp]/$jert[maxhp]]".'.<BR>\'; var z = \'   ','{[]}'.nick7 ($jert['id']).'{[]}');
      } else {
        addch("<img src=i/magic/snowball2.gif> <b>{$user['login']}</b> ".$action." снежок в &quot;{$_POST['target']}&quot; <b>-$minhp</b> [$jert[hp]/$jert[maxhp]].<br>");
        addchp ('<font color=red>Внимание!</font> По вам '.$action.' снежок <B>'.$user['login'].'</B> '."<b>-$minhp</b> [$jert[hp]/$jert[maxhp]]".'.<BR>\'; var z = \'   ','{[]}'.nick7 ($jert['id']).'{[]}');
      }
      //addqueststep($user["id"],5);
      //addqueststep($jert["id"],6);
      mq("update users set fullhptime=".time().", hp=hp-$minhp where id='$jert[id]'");
      echo '<font color=red>Вы кинули снежок в '.$_POST['target'].'.</font>';
      $bet=1;
    } else {
      echo '<font color=red>Мазохист?...</font>';
    }
  }
  //$bet=1;
} //else {
//      echo "Свиток рассыпался в ваших руках...";
//  }
?>