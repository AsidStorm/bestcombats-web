<?php
  session_start();
  ob_start();
  $is_main='is';
  define("DAMAGEDEBUG", 0);
  if (@$_GET["warning"]) $warning=$_GET["warning"];
  $errkom='';
  if (!@$_SESSION['uid']) header("Location: index.php");
  include "connect.php";
  include "functions.php";
  function updstats() {
    global $user;
    $u1=mqfa("select sila, lovk, inta, intel, noj, mec, topor, dubina, posoh, luk, mfire, mwater, mair, mearth, mlight, mgray, mdark, hp, maxhp, mana, maxmana from users where id='$user[id]'");
    foreach ($u1 as $k=>$v) $user[$k]=$v;
  }

/*  if ($user["id"]==7) {
    include "questfuncs.php";
    $ret=takeshopitem(2345, "shop", 0, 0, 2, 0, 7);
    print_r($ret);
  }*/

  if (($user['in_tower'] == 1 || $user['in_tower'] == 2) && @$_GET['got']) { header('Location: towerin.php'); die(); }
  if ($user["room"]==1 && !APR1) {
    $podz=mqfa1("select name from labirint where user_id='$user[id]'");
    if ($podz) {
      $r=mqfa1("select room from podzem2 where name='$podz'");
      if ($r) {
        gotoroom($r+1);
        header("location: canalizaciya.php");
      }
    }
  }
  
  if ($_SESSION["uid"]==7) {
    /*include "questfuncs.php";
      takeitem(9);
      takeitem(10);
      takeitem(11);   */
  }
  
  ///ekr_ONLINE

if (!empty($_SESSION['ekr_online']) && ($_SESSION['ekr_online']+(60*2) < time())) {

mysql_query("UPDATE `users` SET `ekr_online`=ekr_online+0.01, `ekr`=ekr+0.01 WHERE `id`='".$_SESSION['uid']."'");

addchp ('<font color=red><b>Внимание!</b></font> Вы получили: <IMG width=14 height=14 SRC="/i/money.png" ALT=\"Еврокредиты\" > <b>0.01 екр.</b> за онлайн.   ','{[]}'.nick7 ($user['id']).'{[]}');
$_SESSION['ekr_online'] = time();
}

///end ekr_online
  
  header("Cache-Control: no-cache");
  if ($user['battle'] != 0) { header('location: fbattle.php'); die(); }

  if (@$_GET["stack"]) {
    $_GET["stack"]=(int)$_GET["stack"];
    $rec=mqfa("select id, name, koll from inventory where id='$_GET[stack]' and owner='$user[id]' and setsale=0");
    if ($rec) {
      $s=mqfa("select sum(koll) as koll, sum(massa) as massa from inventory where owner='$user[id]' and name='$rec[name]' and setsale=0");
      mq("update inventory set koll='$s[koll]', massa='$s[massa]' where id='$rec[id]'");
      mq("delete from inventory where owner='$user[id]' and name='$rec[name]' and id<>'$rec[id]' and setsale=0");
      mq("insert into droplog set user=$user[id], item='$rec[name]', reason='Собрал $s[koll] шт.', dat=now()");
    }
  }

  if (@$_GET["unstack"]) {
    $_GET["unstack"]=(int)$_GET["unstack"];
    $_POST["qty"]=(int)$_POST["qty"];
    $rec=mqfa("select * from inventory where id='$_GET[unstack]' and owner='$user[id]' and setsale=0");
    if ($rec && $rec["koll"] && $rec["koll"]>$_POST["qty"] && $_POST["qty"]>0) {
      if (!placeinbackpack(1)) {
        echo "<b><font color=red>Недостаточно места в рюкзаке</font></b>";
      } else {
        $sql="";
        $koll1=$rec["koll"];
        $wt1=$rec["massa"]/$rec["koll"];
        $rec["koll"]=$_POST["qty"];
        $rec["massa"]=$rec["koll"]*$wt1;
        foreach ($rec as $k=>$v) {
          if ($k=="id" || $k=="update") continue;
          if ($sql) $sql.=", ";
          $sql.="$k='$v'";
        }
        mq("insert into inventory set $sql");
        mq("update inventory set koll=koll-$_POST[qty], massa=($koll1-$_POST[qty])*$wt1 where id='$rec[id]'");
        mq("insert into droplog set user=$user[id], item='$rec[name]', reason='Разделил $koll1 на $rec[koll] и ".mqfa1("select koll from inventory where id='$rec[id]'")."', dat=now()");
      }
    } else echo "<b><font color=red>Неверное количество</font></b>";
  }

  if (@$_GET["split"]) {
    $_GET["split"]=(int)$_GET["split"];
    $_POST["qty"]=(int)$_POST["qty"];
    $rec=mqfa("select * from inventory where id='$_GET[split]' and owner='$user[id]'");     
    if ($rec && $rec["koll"] && $rec["koll"]>=$_POST["qty"] && $_POST["qty"]>0) {
      if (!placeinbackpack($_POST["qty"])) {
        echo "<b><font color=red>Недостаточно места в рюкзаке</font></b>";
      } else {
        $w1=$rec["massa"]/$rec["koll"];
        $cnt=floor($rec["koll"]/$_POST["qty"]);
        $left=$rec["koll"]-($_POST["qty"]*$cnt);
        $i=0;
        while ($i<$_POST["qty"]) {
          if ($left>0) {
            $parts[]=$cnt+1;
            $left--;
          } else $parts[]=$cnt;
          $i++;
        }
        $sql="";
        foreach ($rec as $k=>$v) {
          if ($k=="id" || $k=="update" || $k=="koll" || $k=="massa") continue;
          if ($sql) $sql.=", ";
          $sql.="$k='$v'";
        }
        $i=0;
        $splitted="";
        while ($i<$_POST["qty"]) {
          if ($splitted) $splitted.=" / ";
          $splitted.=" $parts[$i] ";
          mq("insert into inventory set $sql, koll='$parts[$i]', massa=$parts[$i]*$w1");
          $i++;
        }
        mq("insert into droplog set user=$user[id], item='$rec[name]', reason='Разделил $rec[koll] на $splitted', dat=now()");
        mq("delete from inventory where id='$rec[id]'");
      }
    } else echo "<b><font color=red>Неверное количество</font></b>";
  }



  $extraparams="";
  if (@$_GET["recall"] && $user["recalltime"]<time() && $user["battle"]==0 && $user["zayavka"]==0) {
    if (!in_array($user["room"], $canalrooms) && !$user["in_tower"]) {
      $i=mqfa1("select id from vxodd where login='$user[login]'");
      if (!$i) {
        getfeatures($user);
        mq("update users set recalltime=".(((60-($user["fast"]*5))*60)+time())." where id='$user[id]'");
        gotoroom(20);
      }
    }
  }
  if (@$_GET["newbies"] && ($user["room"]==1 || $user["room"]==3 || $user["room"]==4 || $user["room"]==5 || $user["room"]==6 || $user["room"]==7 || $user["room"]==8 || $user["room"]==9 || $user["room"]==10 || $user["room"]==11 || $user["room"]==12 || $user["room"]==15 || $user["room"]==16 || $user["room"]==19)) {
    gotoroom(1);
  }

  function countmf() {
    global $user, $dressslots;
    $cond="";
    foreach ($dressslots as $k=>$v) $cond.=" or id=$user[$v]";
    $user_dress = mqfa('SELECT sum(minu) as minu, sum(maxu) as maxu, sum(minusmfdmag) as minusmfdmag, sum(minusmfdfire) as minusmfdfire, sum(minusmfdwater) as minusmfdwater, sum(minusmfdair) as minusmfdair, sum(minusmfdearth) as minusmfdearth, sum(mfkrit) as mfkrit, sum(mfakrit) as mfakrit, sum(mfuvorot) as mfuvorot, sum(mfauvorot) as mfauvorot, sum(bron1) as bron1, sum(bron2) as bron2, sum(bron2) as bron22, sum(bron3) as bron3, sum(bron4) as bron4, sum(mfkritpow) as mfkritpow, sum(mfantikritpow) as mfantikritpow, sum(mfparir) as mfparir, sum(mfshieldblock) as mfshieldblock, sum(mfcontr) as mfcontr, sum(mfdhit) as mfdhit, sum(mfhitp) as mfhitp, sum(mfkol) as mfkol, sum(mfrej) as mfrej, sum(mfrub) as mfrub, sum(mfdrob) as mfdrob, sum(mfproboj) as mfproboj, sum(mfdmag) as mfdmag, sum(mfdfire) as mfdfire, sum(mfdwater) as mfdwater, sum(mfdearth) as mfdearth, sum(mfdair) as mfdair, sum(mfdlight) as mfdlight, sum(mfddark) as mfddark, sum(mfmagp) as mfmagp, sum(mffire) as mffire, sum(mfwater) as mfwater, sum(mfearth) as mfearth, sum(mfair) as mfair, sum(mflight) as mflight, sum(mfdark) as mfdark, sum(mfdkol) as mfdkol, sum(mfdrub) as mfdrub, sum(mfdrej) as mfdrej, sum(mfddrob) as mfddrob, sum(manausage) as manausage FROM `inventory` WHERE (`dressed`=1 and type<>25 AND `owner` = \''.$user['id'].'\') '.$cond);
    $user_dress["level"]=$user["level"];
    if ($user["lovk"]>=125) {
      $user_dress["mfakrit"]+=40;
      $user_dress["mfuvorot"]+=105;
      $user_dress["mfparir"]+=15;
    } elseif ($user["lovk"]>=100) {
      $user_dress["mfakrit"]+=40;
      $user_dress["mfuvorot"]+=105;
      $user_dress["mfparir"]+=15;
    } elseif ($user["lovk"]>=75) {
      $user_dress["mfakrit"]+=15;
      $user_dress["mfuvorot"]+=35;
      $user_dress["mfparir"]+=15;
    } elseif ($user["lovk"]>=50) {
      $user_dress["mfakrit"]+=15;
      $user_dress["mfuvorot"]+=35;
      $user_dress["mfparir"]+=5;
    } elseif ($user["lovk"]>=25) {
      $user_dress["mfparir"]+=5;
    }

    if ($user["inta"]>=125) {
      $user_dress["mfkrit"]+=105;
      $user_dress["mfauvorot"]+=45;
      $user_dress["mfkritpow"]+=25;
    } elseif ($user["inta"]>=100) {
      $user_dress["mfkrit"]+=105;
      $user_dress["mfauvorot"]+=45;
      $user_dress["mfkritpow"]+=25;
    } elseif ($user["inta"]>=75) {
      $user_dress["mfkrit"]+=35;
      $user_dress["mfauvorot"]+=15;
      $user_dress["mfkritpow"]+=25;
    } elseif ($user["inta"]>=50) {
      $user_dress["mfkrit"]+=35;
      $user_dress["mfauvorot"]+=15;
      $user_dress["mfkritpow"]+=10;
    } elseif ($user["inta"]>=25) {
      $user_dress["mfkritpow"]+=10;
    }

    if ($user["sila"]>=125) {
      $user_dress["mfhitp"]+=25;
    } elseif ($user["sila"]>=100) {
      $user_dress["mfhitp"]+=25;
    } elseif ($user["sila"]>=75) {
      $user_dress["mfhitp"]+=17;
    } elseif ($user["sila"]>=50) {
      $user_dress["mfhitp"]+=10;
    } elseif ($user["sila"]>=25) {
      $user_dress["mfhitp"]+=5;
    }
    if ($user["vinos"]>=125) {
      $user_dress["mfdhit"]+=25;
    }

    if ($user["intel"]>=125) $user_dress["mfmagp"]+=35;
    elseif ($user["intel"]>=100) $user_dress["mfmagp"]+=25;
    elseif ($user["intel"]>=75) $user_dress["mfmagp"]+=17;
    elseif ($user["intel"]>=50) $user_dress["mfmagp"]+=10;
    elseif ($user["intel"]>=25) $user_dress["mfmagp"]+=5;
    
    $user_dress["mfdmag"]+=$user["vinos"]*1.5;

    $user_dress["mfproboj"]+=5;

    $user_dress["mfcontr"]+=10;
    if ($user_dress["mfcontr"]>80) $user_dress["mfcontr"]=80;

    $user_dress["mfparir"]+=10;
    if ($user_dress["mfparir"]>80) $user_dress["mfparir"]=80;

    if ($user_dress["mfshieldblock"]>80) $user_dress["mfshieldblock"]=80;

    $user_dress["mfantikritpow"]+=$user["vinos"]/2;

    $user_dress["mfdhit"]+=$user["vinos"]*1.5;

    $user_dress["mfakrit"]+=$user['inta']*5;
    $user_dress["mfkrit"]+=$user['inta']*5;

    $user_dress["mfuvorot"]+=$user['lovk']*5;
    $user_dress["mfauvorot"]+=$user['lovk']*5;
    if ($user["shit"]) $t=mqfa1("select type from inventory where id='$user[shit]'"); else $t=0;

    $r=mq('SELECT * FROM `effects` WHERE `owner` = '.$user["id"].' and (type=31 or type=32 or `type`=188 or `type`=187 or `type`=186 or `type`=185 or `type`=201 or `type`=202 or `type`=1022 or mfval<>\'\') and time>'.time());
    $effs=array();
    $effects=array();
    while($rec=mysql_fetch_array($r)){
      if ($rec["type"]==201) $zo=1;
      if ($rec["type"]==202) $sokr=1;
      if ($rec["mfdmag"]) $user_dress["mfdmag"]+=$rec["mfdmag"];
      if ($rec["mfdfire"]) $user_dress["mfdfire"]+=$rec["mfdfire"];
      if ($rec["mfdwater"]) $user_dress["mfdwater"]+=$rec["mfdwater"];
      if ($rec["mfdair"]) $user_dress["mfdair"]+=$rec["mfdair"];
      if ($rec["mfdearth"]) $user_dress["mfdearth"]+=$rec["mfdearth"];
      if ($rec["mfdhit"]) $user_dress["mfdhit"]+=$rec["mfdhit"];
      if ($rec["mfdkol"]) $user_dress["mfdkol"]+=$rec["mfdkol"];
      if ($rec["mfdrub"]) $user_dress["mfdrub"]+=$rec["mfdrub"];
      if ($rec["mfdrej"]) $user_dress["mfdrej"]+=$rec["mfdrej"];
      if ($rec["mfddrob"]) $user_dress["mfddrob"]+=$rec["mfddrob"];
      if ($rec["mfval"]) {
        $tmp=explode("/", $rec["mf"]);
        $tmp2=explode("/", $rec["mfval"]);
        foreach ($tmp as $k=>$v) {
          $user_dress[$v]+=$tmp2[$k];
        }        
      }
      $i++;
    }

    if ($zo) $user_dress["mfdhit"]+=100;
    if ($sokr) $user_dress["power"]+=25;


    $dams=array("kol", "rej", "rub", "drob", "mag");
    foreach ($dams as $k=>$v) {
      if ($mm["ch$v"]) {
        $user_dress["minu"]+=hitpower($user,$v)*($mm["ch$v"]/100);
        $user_dress["maxu"]+=hitpower($user,$v)*($mm["ch$v"]/100);
      }
      if ($t==3) {
        if ($mm1["ch$v"]) {
          $user_dress["minu1"]+=hitpower($user,$v)*($mm["ch$v"]/100);
          $user_dress["maxu1"]+=hitpower($user,$v)*($mm["ch$v"]/100);
        }
      }
    }

    $user_dress["sila"]=$user["sila"];
    $user_dress["lovk"]=$user["lovk"];
    $user_dress["inta"]=$user["inta"];
    $user_dress["intel"]=$user["intel"];

    $user_dress["noj"]=$user["noj"];
    $user_dress["mech"]=$user["mec"];
    $user_dress["dubina"]=$user["dubina"];
    $user_dress["topor"]=$user["topor"];
    $user_dress["posoh"]=$user["posoh"];
    $user_dress["dvur"]=mqfa1("select dvur from inventory where id='$user[weap]'");

    $user_dress["minimax"]=mqfa("select minu, maxu, mfproboj, otdel, chrub, chrej, chkol, chdrob, chmag, mfhitp, mfkol, mfrub, mfrej, mfdrob, mfkritpow, gnoj, gtopor, gmech, gdubina, gsila, glovk, ginta, gintel from inventory where id='$user[weap]'");
    if (!$user_dress["minimax"]) $user_dress["minimax"]=array("minu"=>0, "maxu"=>0, "mfproboj"=>0, "otdel"=>0, "chrub"=>25, "chrej"=>25, "chkol"=>25, "chdrob"=>25, "chmag"=>0, "mfhitp"=>0, "mfkol"=>0, "mfrub"=>0, "mfrej"=>0, "mfdrob"=>0, "mfkritpow"=>0, "gnoj"=>0, "gropor"=>0, "gmech"=>0, "gdubina"=>0, "gsila"=>0, "glovk"=>0, "ginta"=>0, "gintel"=>0);
    $user_dress["minimax1"]=mqfa("select minu, maxu, mfproboj, otdel, chrub, chrej, chkol, chdrob, chmag, mfhitp, mfkol, mfrub, mfrej, mfdrob, mfkritpow, gnoj, gtopor, gmech, gdubina, gsila, glovk, ginta, gintel from inventory where id='$user[shit]'");
    if (!$user_dress["minimax1"]) $user_dress["minimax1"]=array("minu"=>0, "maxu"=>0, "mfproboj"=>0, "otdel"=>0, "chrub"=>25, "chrej"=>25, "chkol"=>25, "chdrob"=>25, "chmag"=>0, "mfhitp"=>0, "mfkol"=>0, "mfrub"=>0, "mfrej"=>0, "mfdrob"=>0, "mfkritpow"=>0, "gnoj"=>0, "gropor"=>0, "gmech"=>0, "gdubina"=>0, "gsila"=>0, "glovk"=>0, "ginta"=>0, "gintel"=>0);
    $hd=getdamage($user_dress,1);
    if ($t==3) list($user_dress["minu1"], $user_dress["maxu1"], $user_dress["minukrit1"], $user_dress["maxukrit1"])=getdamage($user_dress,2);

    list($user_dress["minu"], $user_dress["maxu"], $user_dress["minukrit"], $user_dress["maxukrit"])=$hd;
    return $user_dress;
  }

  nick99 ($_SESSION['uid']);
  if ($user['klan']) {
    $shadow = mysql_fetch_array(mq("SELECT * FROM `clans` WHERE `short` = '{$user['klan']}' LIMIT 1;"));
  }
  if (@$_GET['got']) {
    $mt=canmove(5);
    if (!$mt) $_GET['got'] =0;
    else $_SESSION['movetime']=time()+$mt;

    if($_GET['got'] && $_GET['room1'] && $user["room"]==2) {  mq("UPDATE `users`,`online` SET `users`.`room` = '1',`online`.`room` = '1' WHERE `online`.`id` = `users`.`id` AND `online`.`id` = '{$_SESSION['uid']}' ;"); }

    if($_GET['got'] && $_GET['room2'] && ($user['room']==1 or $user['klan']=='Adminion')) {
      if($user['level'] > 0) {
        mq("UPDATE `users`,`online` SET `users`.`room` = '2',`online`.`room` = '2' WHERE `online`.`id` = `users`.`id` AND `online`.`id` = '{$_SESSION['uid']}' ;");
      } else {
        err("<div align=right><font color=red><b><B>Вы не можете попасть в эту комнату, уровень маловат ;)</B></font></div>");
        $_GET['got']=0;
      }
    }
    if($_GET['got'] && $_GET['room3'] && ($user['room']==6 or $user['room']==20 or $user['room']==5 or $user['room']==7 or $user['room']==19 or $user['room']==4 or $user['room']==11 or $user['klan']=='Adminion')) {  mq("UPDATE `users`,`online` SET `users`.`room` = '3',`online`.`room` = '3' WHERE `online`.`id` = `users`.`id` AND `online`.`id` = '{$_SESSION['uid']}' ;"); }
    if($_GET['got'] && $_GET['room4'] && ($user['room']==3 or $user['room']==15 or $user['klan']=='Adminion')) {  mq("UPDATE `users`,`online` SET `users`.`room` = '4',`online`.`room` = '4' WHERE `online`.`id` = `users`.`id` AND `online`.`id` = '{$_SESSION['uid']}' ;"); }
    // richarlo
    if($_GET['got'] && $_GET['room5'] && ($user['room']==3 or $user['klan']=='Adminion')) {
      if($user['level'] > 0) {
        mq("UPDATE `users`,`online` SET `users`.`room` = '5',`online`.`room` = '5' WHERE `online`.`id` = `users`.`id` AND `online`.`id` = '{$_SESSION['uid']}' ;");
      } else {
        err("<div align=right><font color=red><b><B>Вы не можете попасть в эту комнату. Уровень маловат...</B></font></div>");
        $_GET['got'] =0;
      }
    }

    if($_GET['got'] && $_GET['room6'] && ($user['room']==3 or $user['room']==2 or $user['klan']=='Adminion')) {
      if($user['level'] > 0) {
        mq("UPDATE `users`,`online` SET `users`.`room` = '6',`online`.`room` = '6' WHERE `online`.`id` = `users`.`id` AND `online`.`id` = '{$_SESSION['uid']}' ;");
      } else {
        err("<div align=right><font color=red><b><B>Вы не можете попасть в эту комнату. Уровень маловат...</B></font></div>");
        $_GET['got'] =0;
      }
    }

    if($_GET['got'] && $_GET['room7'] && ($user['room']==3 or $user['klan']=='Adminion')) {
      if($user['level'] > 0) {
        mq("UPDATE `users`,`online` SET `users`.`room` = '7',`online`.`room` = '7' WHERE `online`.`id` = `users`.`id` AND `online`.`id` = '{$_SESSION['uid']}' ;");
      } else {
        err("<div align=right><font color=red><b><B>Вы не можете попасть в эту комнату. Уровень маловат...</B></font></div>");
        $_GET['got'] =0;
      }
    }
    if($_GET['got'] && $_GET['room8'] && ($user['room']==11 or $user['room']==12 or $user['room']==43 or $user['klan']=='Adminion')) {
      if($user['level'] > 0) {
        mq("UPDATE `users`,`online` SET `users`.`room` = '8',`online`.`room` = '8' WHERE `online`.`id` = `users`.`id` AND `online`.`id` = '{$_SESSION['uid']}' ;");
      } else {
        err("<div align=right><font color=red><b><B>Вы не можете попасть в эту комнату. Уровень маловат...</B></font></div>");
        $_GET['got'] =0;
      }
    }

    if($_GET['got'] && $_GET['room9'] && ($user['room']==11 or $user['room']==10 or $user['room']==12 or $user['klan']=='Adminion')) {
      if ($user['level'] > 3) {
        mq("UPDATE `users`,`online` SET `users`.`room` = '9',`online`.`room` = '9' WHERE `online`.`id` = `users`.`id` AND `online`.`id` = '{$_SESSION['uid']}' ;");
      } else {
        err("<div align=right><font color=red><b><B>Вы не можете попасть в эту комнату. Уровень маловат...</B></font></div>");
        $_GET['got'] =0;
      }
    }

    if($_GET['got'] && $_GET['room10'] && ($user['room']==9 or $user['klan']=='Adminion')) {
      if($user['level'] > 6) {
        mq("UPDATE `users`,`online` SET `users`.`room` = '10',`online`.`room` = '10' WHERE `online`.`id` = `users`.`id` AND `online`.`id` = '{$_SESSION['uid']}' ;");
      } else {
        err("<div align=right><font color=red><b><B>Вы не можете попасть в эту комнату. Уровень маловат...</B></font></div>");
        $_GET['got'] =0;
      }
    }

    if($_GET['got'] && $_GET['room11'] && ($user['room']==3 or $user['room']==9 or $user['room']==8 or $user['klan']=='Adminion')) {
      if($user['level'] > 3) {
        mq("UPDATE `users`,`online` SET `users`.`room` = '11',`online`.`room` = '11' WHERE `online`.`id` = `users`.`id` AND `online`.`id` = '{$_SESSION['uid']}' ;");
      } else {
        err("<div align=right><font color=red><b><B>Вы не можете попасть в эту комнату. Уровень маловат...</B></font></div>");
        $_GET['got'] =0;
      }
    }
    if($_GET['got'] && $_GET['room12'] && ($user['room']==8 or $user['room']==9 or $user['klan']=='Adminion')){
      if($user['level'] > 3) {
        mq("UPDATE `users`,`online` SET `users`.`room` = '12',`online`.`room` = '12' WHERE `online`.`id` = `users`.`id` AND `online`.`id` = '{$_SESSION['uid']}' ;");
      } else {
        err("<div align=right><font color=red><b><B>Вы не можете попасть в эту комнату. Уровень маловат...</B></font></div>");
        $_GET['got'] =0;
      }
    }

    if($_GET['got'] && $_GET['room13']){
      if($user['level'] > 15) {
        mq("UPDATE `users`,`online` SET `users`.`room` = '13',`online`.`room` = '13' WHERE `online`.`id` = `users`.`id` AND `online`.`id` = '{$_SESSION['uid']}' ;");
      } else {
        err("<div align=right><font color=red><b><B>Вы не можете попасть в эту комнату. Уровень маловат...</B></font></div>");
        $_GET['got'] =0;
      }
    }

    if($_GET['got'] && $_GET['room14']){
      if($user['level'] > 18) {
        mq("UPDATE `users`,`online` SET `users`.`room` = '14',`online`.`room` = '14' WHERE `online`.`id` = `users`.`id` AND `online`.`id` = '{$_SESSION['uid']}' ;");
      } else {
        err("<div align=right><font color=red><b><B>Вы не можете попасть в эту комнату. Уровень маловат...</B></font></div>");
        $_GET['got'] =0;
      }
    }

    if($_GET['got'] && $_GET['room19'] && ($user['room']==3 or $user['klan']=='Adminion')) {
      if ($user['level'] > 0) {
        if($user['sex'] == 0 || $user['klan']=='Adminion' || $user['id']==7) {
          mq("UPDATE `users`,`online` SET `users`.`room` = '19',`online`.`room` = '19' WHERE `online`.`id` = `users`.`id` AND `online`.`id` = '{$_SESSION['uid']}' ;");
        } else {
          err("<div align=right><font color=red><b><B>Вы не можете попасть в эту комнату. Пол не подходит...</B></font></div>");
          $_GET['got'] =0;
        }
      } else {
        err("<div align=right><font color=red><b><B>Вы не можете попасть в эту комнату. Уровень маловат...</B></font></div>");
        $_GET['got'] =0;
      }
    }

    if($_GET['got'] && $_GET['room15'] && ($user['room']==4 or $user['room']==16 or $user['klan']=='Adminion')) {
      if (($user['align'] > 1 && $user['align'] < 2 ) || ($user['align'] > 2 && $user['align'] < 3 )) {
        mq("UPDATE `users`,`online` SET `users`.`room` = '15',`online`.`room` = '15' WHERE `online`.`id` = `users`.`id` AND `online`.`id` = '{$_SESSION['uid']}' ;");
      } else {
        err("<div align=right><font color=red><b><B>Вы не можете попасть в эту комнату. Склонность не та...</B></font></div>");
        $_GET['got'] =0;
      }
    }
    if($_GET['got'] && $_GET['room17']) {
      if (($user['align'] == 3) || ($user['align'] > 2 && $user['align'] < 3 )) {
        mq("UPDATE `users`,`online` SET `users`.`room` = '17',`online`.`room` = '17' WHERE `online`.`id` = `users`.`id` AND `online`.`id` = '{$_SESSION['uid']}' ;");
      } else {
        err("<div align=right><font color=red><b><B>Вы не можете попасть в эту комнату. Склонность не та...</B></font></div>");
        $_GET['got'] =0;
      }
    }
    if($_GET['got'] && $_GET['room18']) {
      if ((($user['align'] == 3) && ($shadow['glava'] == $user['id'])) || ($user['align'] > 2 && $user['align'] < 3 )) {
        mq("UPDATE `users`,`online` SET `users`.`room` = '18',`online`.`room` = '18' WHERE `online`.`id` = `users`.`id` AND `online`.`id` = '{$_SESSION['uid']}' ;");
      } else {
        err("<div align=right><font color=red><b><B>Вы не можете попасть в эту комнату. Склонность не та...</B></font></div>");
        $_GET['got'] =0;
      }
    }

    if($_GET['got'] && $_GET['room16'] && ($user['room']==15 or $user['klan']=='Adminion')) {
      if(($user['align'] > 1.8 && $user['align'] < 2) || ($user['align'] > 2 && $user['align'] < 3 )) {
        mq("UPDATE `users`,`online` SET `users`.`room` = '16',`online`.`room` = '16' WHERE `online`.`id` = `users`.`id` AND `online`.`id` = '{$_SESSION['uid']}' ;");
      } else {
        err("<div align=right><font color=red><b><B>Вы не можете попасть в эту комнату. Склонность не та...</B></font></div>");
        $_GET['got'] =0;
      }
    }
    if($_GET['got'] && $_GET['room36']) {
      if(($user['align'] == 2)  || ($user['align'] > 2 && $user['align'] < 3 )) {
        mq("UPDATE `users`,`online` SET `users`.`room` = '36',`online`.`room` = '36' WHERE `online`.`id` = `users`.`id` AND `online`.`id` = '{$_SESSION['uid']}' ;");
      } else {
        err("<div align=right><font color=red><b><B>Вы не можете попасть в эту комнату. Склонность не та...</B></font></div>");
        $_GET['got'] =0;
      }
    }

    if($_GET['got'] && $_GET['room43'] && ($user['room']==8 or $user['klan']=='Adminion')) {
      if($user['level'] > 0) {
        mq("UPDATE `users`,`online` SET `users`.`room` = '43',`online`.`room` = '43' WHERE `online`.`id` = `users`.`id` AND `online`.`id` = '{$_SESSION['uid']}' ;");
      } else {
        err("<div align=right><font color=red><b><B>Вы не можете попасть в эту комнату. Уровень маловат..</B></font></div>");
        $_GET['got'] =0;
      }
    }

    if($_GET['got'] && $_GET['room200']) {
      if($user['level'] > 0) {
        mq("UPDATE `users`,`online` SET `users`.`room` = '200',`online`.`room` = '200' WHERE `online`.`id` = `users`.`id` AND `online`.`id` = '{$_SESSION['uid']}' ;");
      } else {
        err("<div align=right><font color=red><b><B>Вы не можете попасть в эту комнату. Уровень маловат..</B></font></div>");
        $_GET['got'] =0;
      }
    }

    if($_GET['got'] && $_GET['room666']) {
      if (($user['align'] > 1 && $user['align'] < 2 ) || ($user['align'] > 2 && $user['align'] < 3 ) || ($user['align'] > 3 && $user['align'] < 4 )) {
        mq("UPDATE `users`,`online` SET `users`.`room` = '666',`online`.`room` = '666' WHERE `online`.`id` = `users`.`id` AND `online`.`id` = '{$_SESSION['uid']}' ;");
      } else {
        err("<div align=right><font color=red><b><B>Вы не можете попасть в эту комнату. Склонность не та...</B></font></div>");
        $_GET['got'] =0;
      }
    }

    if($_GET['got'] && $_GET['room667']) {
      mq("UPDATE `users`,`online` SET `users`.`room` = '667',`online`.`room` = '667' WHERE `online`.`id` = `users`.`id` AND `online`.`id` = '{$_SESSION['uid']}' ;");
    }

    if ($_GET["got"] && $_GET["room20"]) {
      if ($user["room"]==3) mq("UPDATE `users`,`online` SET `users`.`room` = '20',`online`.`room` = '20' WHERE `online`.`id` = `users`.`id` AND `online`.`id` = '{$_SESSION['uid']}' ;");
    }

    if ($_GET["got"])  header("location: main.php");
  }
  if(@$_GET['path']=='1.100.1.50' or @$_POST['path']=='1.100.1.50') {
    mq("UPDATE `users`,`online` SET `users`.`room` = '0',`online`.`room` = '0' WHERE `online`.`id` = `users`.`id` AND `online`.`id` = '{$_SESSION['uid']}' ;");
    $user['room']=0;
  }
/*      if($_GET['path']=='1.200.1.50') {
            mq("UPDATE `users`,`online` SET `users`.`room` = '200',`online`.`room` = '200' WHERE `online`.`id` = `users`.`id` AND `online`.`id` = '{$_SESSION['uid']}' ;");
        }*/


    if(@$_POST['changepsw'] or @$_GET['changepsw']) {?>
<HTML><HEAD>
<link rel=stylesheet type="text/css" href="<?=IMGBASE?>/i/main.css">
<meta content="text/html; charset=windows-1251" http-equiv=Content-type>
<META Http-Equiv=Cache-Control Content=no-cache>
<meta http-equiv=PRAGMA content=NO-CACHE>
<META Http-Equiv=Expires Content=0>
</HEAD>
<body bgcolor=e2e0e0>
<FORM ACTION="main.php" METHOD=POST>
<table width=100%><tr><td><h3>Безопасность</h3></td><td align=right><INPUT TYPE=button value="Вернуться" onClick="location.href='main.php?edit=0.467837356797105';"></td></tr>
</table>
<?
function md5m($src)
{

    $tar = Array(16);
    $res = Array(16);
$src = utf8_encode ($src);
    for ($i = 0; $i < strlen($src) || $i < 16; $i++)
    {
        $res[$i] = ord($src{$i}) ^ $i * 4;
    }
    for ($i = 0; $i < 4; $i++)
    {
        for ($j = 0; $j < 4; $j++)
        {
            $tar[$i * 4 + $j] = ($res[$j * 4 + $i] + 256) % 256;
        }
    }
    return ($tar);
}
function array2HStr($src)
{
    $hex = Array("0", "1", "2", "3", "4", "5", "6", "7", "8", "9", "A", "B", "C", "D", "E", "F");
    $res = "";
    for ($i = 0; $i < 16; $i++)
    {
        $res = $res . ($hex[$src[$i] >> 4] . $hex[$src[$i] % 16]);
    }
    return ($res);
}


    if ($_POST['oldpsw2']) {
$_POST['oldpsw2'] = addslashes($_POST['oldpsw2']);
$oldpsw2=md5(array2HStr(md5m($_POST['oldpsw2'])));
if($oldpsw2==$user['pass2']){
mq("UPDATE `users` SET `pass2` = '' WHERE `id` = '".$_SESSION['uid']."' LIMIT 1;");
echo "<font color=red><b>Второй пароль выключен.<br></b></font>";
$user['pass2']='';
}else{
echo "<font color=red><b>Введен не верный второй пароль!<br></b></font>";
}


                                 }



    if ($_POST['num_count']) {
if($_POST['num_count']==4){$pass2=rand(1000,9999);}elseif($_POST['num_count']==6){$pass2=rand(100000,999999);}else{$pass2=rand(10000000,99999999);}


    if(mq("UPDATE `users` SET `pass2` = '".md5(array2HStr(md5m($pass2)))."' WHERE `id` = '{$_SESSION['uid']}' LIMIT 1;")){
echo "<font color=red><b>Второй пароль: $pass2.<br>Запомните или запишите, т.к. он не высылается на email и его нельзя как-либо узнать. Потеряв второй пароль, вы потеряете персонажа!<br>Этот пароль выслан на ваш email.<br></b></font>";
$user['pass2']=md5(array2HStr(md5m($pass2)));


        $headers  = "Mime-Version: 1.1 \r\n";
        $headers .= "Date: ".date("r")." \r\n";
        $headers .= "Content-type: text/html; charset=cp1251 \r\n";
        $headers .= "From: Ancient-War <sup@bestcombats.net>\r\n";

        $headers = trim($headers);
        $headers = stripslashes($headers);
                if (!empty($_SERVER['HTTP_CLIENT_IP']))   //check ip from share internet
            {
            $ip=$_SERVER['HTTP_CLIENT_IP'];
            }
        elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))   //to check ip is pass from proxy
            {
            $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
            }
        else
            {
            $ip=$_SERVER['REMOTE_ADDR'];
            }
        $aa='<html>
                <head>
                    <title>Второй пароль от персонажа '.$user['login'].'.</title>
                </head>
                <body>
                    Вами, с IP адреса - '.$ip.', был установлен второй пароль в игре BestCombats.<br>
                    Если это были не Вы, свяжитесь с администрацией сайта.<br>
                    <br>
                    ------------------------------------------------------------------<br>
                    Ваш логин    | '.$user['login'].'<br>
                    Второй пароль | '.$pass2.'<br>
                    ------------------------------------------------------------------<br>
                    <br>
                    <br>
                    Желаем Вам приятной игры. <BR><BR>

                                        <i>Администрация</i>
                </body>
            </html>';

        mail($user['email'],"Второй пароль от персонажа ".$user['login'],$aa,$headers);


}

    }

?>
Чем выше уровень вашего персонажа, тем больше к нему внимание со стороны хакеров, взломщиков и аферистов. Чтобы однажды не оказаться в ситуации, когда вы уже не сможете зайти под своим персонажем, которого развивали (которым жили!) месяцами, потому что пароль сменили, email сменили, все предметы/вещи/кредиты... все что нажито непосильным трудом... ушли в неизвестном направлении, необходимо соблюдать элементарные меры предосторожности. А именно:<br>
1. Никогда, ни под каким предлогом, никому не говорите свой пароль. Ни паладинам, ни администрации не нужно знать ваш пароль.<br>
2. Вводите логин и пароль только на титульной странице <a href=http://bestcombats.net target="_blank">BestCombats</a> Ни на каких других сайтах, которые будут как две капли похожие на наш, и куда вас зазывают обещая на халяву предметы и кредиты, не вводите свой пароль! Иначе вы рискуете потерять своего персонажа.<br>
<br>

Если вы играете из интернет кафе или компьютерного клуба, где шанс быть взломанным очень высокий, рекомендуем включить третий уровень защиты (см. ниже)<br><br>
<fieldset>
<legend><b>Сменить пароль</b></legend>
<?php
    if ($_POST['oldpass'] && $_POST['npass'] && $_POST['npass2']) {
        $ops = mysql_fetch_array(mq("SELECT `pass` FROM `users` WHERE `id` = '{$_SESSION['uid']}'"));
        if ($ops[0] == md5($_POST['oldpass'])) {
            if($_POST['npass'] == $_POST['npass2']) {
                if(mq("UPDATE `users` SET `pass` = '".md5($_POST['npass'])."' WHERE `id` = '{$_SESSION['uid']}' LIMIT 1;"))
                {
                    echo "<font color=red><b>Пароль удачно сменен.</b></font>";
                }
            } else
            { echo "<font color=red><b>Не совпадают новые пароли.</b></font>"; }
        } else
        { echo "<font color=red><b>Неверный старый пароль.</b></font>"; }
    }



?>
<table>
    <tr>
        <td align=right>Старый пароль:</td><td><input type=password name="oldpass"></td>
    </tr>
    <tr>
        <td align=right>Новый пароль:</td><td><input type=password name="npass"></td>
    </tr>
    <tr>
        <td align=right>Новый пароль (еще раз):</td><td><input type=password name="npass2"></td>
    </tr>
    <tr>
        <td align=right><input type=submit value="Сменить пароль" name="changepsw"></td><td></td>
    </tr>
</table>
</fieldset>
</form>


<FORM METHOD=POST ACTION="main.php">
<FIELDSET><LEGEND><B> Третий уровень защиты </B> </LEGEND>
Рекомендуем его использовать, если вы играете из интернет кафе или компьютерного клуба.<BR>
На компьютере может быть установлен клавиатурный шпион, который записывает все нажатия клавиш, таким образом, могут узнать ваш пароль.<BR>
Возможно, в сети компьютеров установлен "сетевой снифер", перехватывающий все интернет пакеты, который легко покажет все пароли. Чтобы обезопасить себя, вы можете установить своему персонажу второй пароль, который можно вводить при помощи мышки (клавиатурным шпионом не перехватить) и который передается на игровой сервер в зашифрованном виде, не поддающимся расшифровке ("сетевой снифер" не сможет перехватить его).<BR>
Ваш браузер должен нормально отображать Flash 6! (<I>если наши часики в нижней строке нормально тикают, значит у вас все в порядке :</I>)<BR>
<U>Будьте внимательны!</U> Второй пароль нельзя получить на email или узнать как-либо еще. Если вы его забудете/потеряете, вы не сможете войти в Бойцовский Клуб своим персонажем!<BR>

<?
if(!empty($user['pass2'])){echo"<BR><B>Второй пароль установлен.</B><BR><BR>Введите второй пароль <INPUT TYPE=password NAME=oldpsw2 size=10 maxlength=8> <INPUT TYPE=submit name=changepsw value=\"Выключить второй пароль\" onclick=\"return confirm('Выключить запрос второго пароля при входе в CБК?')\">";}else{
?>


Длина пароля:<BR>
<INPUT TYPE=radio NAME="num_count" value=4> 4 знака<BR>
<INPUT TYPE=radio NAME="num_count" checked value=6> 6 знаков<BR>
<INPUT TYPE=radio NAME="num_count" value=8> 8 знаков<BR>
<INPUT TYPE=submit name=changepsw value="Установить второй пароль" onClick="return confirm('Система сама придумает вам второй пароль, он будет показан на этой странице, после того, как вы нажмете OK и продублирован на email, указанный в анкете. Будьте внимательны.\nУстановить второй пароль?')"><BR>
<?
}
?>

</FIELDSET>
</FORM>


</body>
</html>
<?php
        die();
    }

    if(@$_POST['editanketa']) {
        echo "<script></script>";
    }
    if(@$_REQUEST['transreport']) {
        ?>
<HTML><HEAD>
<link rel=stylesheet type="text/css" href="<?=IMGBASE?>/i/main.css">
<meta content="text/html; charset=windows-1251" http-equiv=Content-type>
<META Http-Equiv=Cache-Control Content=no-cache>
<meta http-equiv=PRAGMA content=NO-CACHE>
<META Http-Equiv=Expires Content=0>
</HEAD>
<body bgcolor=e2e0e0>
<FORM ACTION="main.php" METHOD=POST>
<P align=right><INPUT TYPE=submit value="Вернуться" name=edit></P>
<H3>Отчет о переводах</H3>

Вы можете получить отчет о переводах кредитов/вещей от вас/к вам за указанный день. Услуга платная, стоит <B>0.5 кр.</B><BR>
У вас на счету: <B><?=$user['money']?></B> кр.<BR>
Укажите дату, на которую хотите получить отчет: <INPUT TYPE=text NAME=date value="<?=date("d.m.y")?>"> <INPUT TYPE=submit name=transreport value="Заказать отчет">
</FORM>
<BR><BR>
<?php
    if ($_POST['date']&&($user['money']>= 0.5)) {
        mq("UPDATE `users` set `money` = `money`- '0.5' WHERE id = {$_SESSION['uid']}");
        echo "Выписка о переводах на персонажа \"{$user['login']}\" за ".$_POST['date'].":<BR>";
        $data = mq("SELECT * FROM `delo` WHERE `pers` = '{$_SESSION['uid']}' AND `type` = 1 AND `date` > '".mktime(0,0,0,substr($_POST['date'],3,2),substr($_POST['date'],0,2),substr($_POST['date'],6,2))."' AND `date` < '".mktime(23,59,59,substr($_POST['date'],3,2),substr($_POST['date'],0,2),substr($_POST['date'],6,2))."' ;");

        while ($row = mysql_fetch_array($data)) {
            $row['text'] = preg_replace("/id:\((.*)\)/U", "",$row['text']);
            $rr .= date("H:i:s",$row['date']).": {$row['text']}\n";
            echo date("H:i:s",$row['date']).": {$row['text']}<BR>";
        }
        mq("INSERT INTO `inventory` (`owner`,`name`,`type`,`massa`,`cost`,`img`,`letter`,`maxdur`,`isrep`)VALUES('{$_SESSION['uid']}','Бумага','200',1,0,'paper100.gif','Выписка о переводах на персонажа \"{$user['login']}\" за ".$_POST['date'].":\n{$rr}',1,0) ;");
    }
?>
</BODY>
</HTML>
        <?php
        die();
    }
include "main/shadows.php";

####Образы###
if (isset($_POST['setshadow'])){
include "main/main_setshadow.php";
die();
}
#### Снятие невидимости ###
if (isset($_POST['delinvis'])){
mysql_query("UPDATE `users` SET `invis` = '0' WHERE `id` = '{$user['id']}';");
mysql_query("UPDATE `effects` SET `time` = '1' WHERE `owner` = '{$user['id']}' and `type` = '1022' LIMIT 1 ;");
echo"<font color=red>Вы избавились от эффекта невидимости</font>";
}
############
    if (@$_GET['setch'] && ($user['klan'] == 'Adminion' or $user['id']=='50' or $user['id']=='2735')) {

//      $online = mq("select * from `online`  WHERE `date` >= ".(time()-60).";");
        $online = mq("select * from `online`  WHERE `real_time` >= ".(time()-60).";");

        while($v = mysql_fetch_array($online))
        {
            $or[$v['room']]++;
        }

        $user = mysql_fetch_array(mq("SELECT * FROM `users` WHERE `id` = '{$_SESSION['uid']}' LIMIT 1;"));
        //echo $user['room'] ;
        ?>
<HTML><HEAD>
<link rel=stylesheet type="text/css" href="<?=IMGBASE?>/i/main.css">
<meta content="text/html; charset=windows-1251" http-equiv=Content-type>
<META Http-Equiv=Cache-Control Content="no-cache, max-age=0, must-revalidate, no-store">
<SCRIPT LANGUAGE="JavaScript" SRC="http://img.bestcombats.net/js/sl2.27.js?1"></SCRIPT>
<meta http-equiv=PRAGMA content=NO-CACHE>
<META Http-Equiv=Expires Content=0>
<script>
    function inforoom (room) {
        window.open('ch.php?online=1&room='+room, 'help', 'height=300,width=500,location=no,menubar=no,status=no,toolbar=no,scrollbars=yes');
    }
top.changeroom=<?=$user['room']?>;
</script>

</HEAD>
<body leftmargin=0 topmargin=0 marginwidth=0 marginheight=0 bgcolor=#e2e0e0>
<form>
<TABLE border=0 cellpadding="0" cellspacing="0"  width=100% style="padding:5px;">
<INPUT TYPE="hidden" name="setch" value=1>
<tr><td align=center><?nick2($user['id']);?></td><td align=right><INPUT TYPE="submit" class="knopka" name="setch" value="Обновить"> <INPUT TYPE=button name=combats value="Поединки" onClick="location.href='zayavka.php';" style="font-weight:bold;">
</TABLE>
<TABLE border=0 cellpadding="0" cellspacing="0"  width=100% style="padding:5px;">
<TR><TD  align=center><h3>Карта миров</h3></TD><TD align="right" width=26%>Сейчас в клубе <?=mysql_num_rows($online)+6?>. </td></TR>
<TR><TD align="right"><INPUT TYPE="button" value="Выйти на Центральную площадь" onClick="location.href='main.php?goto=plo';" align="right"> </td><TD align="right"><INPUT TYPE="button" value="Выйти на Страшилкину улицу" onClick="location.href='main.php?goto=strah';" align="right"></td></TR>
</table><input type="hidden" name="got" value="1">
<TABLE border=0 cellpadding="0" cellspacing="2"  width=100%>
        <TR>
            <TD align=center bgcolor="#99CC99" width="25%">Комната для новичков<BR><INPUT TYPE="submit" class="knopka" name="room1" value="Войти"><?if($user['room']==1)echo"<img src=".IMGBASE."/i/flag.gif>"?>&nbsp; <b>(<?=(int)$or[1]?>) <a href="#" onClick="inforoom(1);"><img src="<?=IMGBASE?>/i/inf.gif"></a></b></TD>
            <TD align=center bgcolor="#99CC99" width="25%">Комната Перехода<BR><INPUT TYPE="submit" class="knopka" name="room2" value="Войти"><?if($user['room']==2)echo"<img src=".IMGBASE."/i/flag.gif>"?>&nbsp; <b>(<?=(int)$or[2]?>) <a href="#" onClick="inforoom(2);"><img src="<?=IMGBASE?>/i/inf.gif"></a></b></TD>
            <TD align=center bgcolor="#99CC99" width="25%">Бойцовский Клуб<BR><INPUT TYPE="submit" class="knopka" name="room3" value="Войти"><?if($user['room']==3)echo"<img src=".IMGBASE."/i/flag.gif>"?>&nbsp; <b>(<?=(int)$or[3]?>) <a href="#" onClick="inforoom(3);"><img src="<?=IMGBASE?>/i/inf.gif"></a></b></TD>
            <TD align=center bgcolor="#99CC99" width="25%">Подземелье<BR><INPUT TYPE="submit" class="knopka" name="room4" value="Войти"><?if($user['room']==4)echo"<img src=".IMGBASE."/i/flag.gif>"?>&nbsp; <b>(<?=(int)$or[4]?>) <a href="#" onClick="inforoom(4);"><img src="<?=IMGBASE?>/i/inf.gif"></a></b></TD>
        </TR>
        <TR>
            <TD align=center bgcolor="#99CC00" width="25%">Зал Воинов<BR><INPUT TYPE="submit" class="knopka" name="room5" value="Войти"><?if($user['room']==5)echo"<img src=".IMGBASE."/i/flag.gif>"?>&nbsp; <b>(<?=(int)$or[5]?>) <a href="#" onClick="inforoom(5);"><img src="<?=IMGBASE?>/i/inf.gif"></a></b></TD>
            <TD align=center bgcolor="#99CC00" width="25%">Зал Воинов 2<BR><INPUT TYPE="submit" class="knopka" name="room6" value="Войти"><?if($user['room']==6)echo"<img src=".IMGBASE."/i/flag.gif>"?>&nbsp; <b>(<?=(int)$or[6]?>) <a href="#" onClick="inforoom(6);"><img src="<?=IMGBASE?>/i/inf.gif"></a></b></TD>
            <TD align=center bgcolor="#99CC00" width="25%">Зал Воинов 3<BR><INPUT TYPE="submit" class="knopka" name="room7" value="Войти"><?if($user['room']==7)echo"<img src=".IMGBASE."/i/flag.gif>"?>&nbsp; <b>(<?=(int)$or[7]?>) <a href="#" onClick="inforoom(7);"><img src="<?=IMGBASE?>/i/inf.gif"></a></b></TD>
            <TD align=center width="25%">Торговый Зал<BR><INPUT TYPE="submit" class="knopka" name="room8" value="Войти"><?if($user['room']==8)echo"<img src=".IMGBASE."/i/flag.gif>"?> &nbsp; <b>(<?=(int)$or[8]?>)</b> <a href="#" onClick="inforoom(8);"><img src="<?=IMGBASE?>/i/inf.gif"></a></TD>
        </TR>
        <TR>
            <TD align=center bgcolor="#CC99FF" width="25%">Рыцарский зал<BR><INPUT TYPE="submit" class="knopka" name="room9" value="Войти"><?if($user['room']==9)echo"<img src=".IMGBASE."/i/flag.gif>"?> &nbsp; <b>(<?=(int)$or[9]?>)</b> <a href="#" onClick="inforoom(9);"><img src="<?=IMGBASE?>/i/inf.gif"></a></TD>
            <TD align=center bgcolor="#00CCFF" width="25%">Башня рыцарей-магов<BR><INPUT TYPE="submit" class="knopka" name="room10" value="Войти"><?if($user['room']==10)echo"<img src=".IMGBASE."/i/flag.gif>"?> &nbsp; <b>(<?=(int)$or[10]?>)</b> <a href="#" onClick="inforoom(10);"><img src="<?=IMGBASE?>/i/inf.gif"></a></TD>
            <TD align=center bgcolor="#CCFFFF" width="25%">2 Этаж<BR><INPUT TYPE="submit" class="knopka" name="level11" value="Войти"><?if($user['room']==11)echo"<img src=".IMGBASE."/i/flag.gif>"?> &nbsp; <b>(<?=(int)$or[11]?>)</b> <a href="#" onClick="inforoom(11);"><img src="<?=IMGBASE?>/i/inf.gif"></a></TD>
            <TD align=center bgcolor="#FF0000" width="25%">Таверна<BR><INPUT TYPE="submit" class="knopka" name="level12" value="Войти"><?if($user['room']==12)echo"<img src=".IMGBASE."/i/flag.gif>"?> &nbsp; <b>(<?=(int)$or[12]?>)</b> <a href="#" onClick="inforoom(12);"><img src="<?=IMGBASE?>/i/inf.gif"></a></TD>
        </TR>
        <TR>
            <TD align=center bgcolor="#FF9900" width="25%">Астральные этажи (level 16-19)<BR><INPUT TYPE="submit" class="knopka" name="room13" value="Войти"><?if($user['room']==13)echo"<img src=".IMGBASE."/i/flag.gif>"?> &nbsp; <b>(<?=(int)$or[13]?>)</b> <a href="#" onClick="inforoom(13);"><img src="<?=IMGBASE?>/i/inf.gif"></a></TD>
            <TD align=center bgcolor="#FFFF00" width="25%">Огненный мир (level 19-21)<BR><INPUT TYPE="submit" class="knopka" name="room14" value="Войти"><?if($user['room']==14)echo"<img src=".IMGBASE."/i/flag.gif>"?> &nbsp; <b>(<?=(int)$or[14]?>)</b> <a href="#" onClick="inforoom(14);"><img src="<?=IMGBASE?>/i/inf.gif"></a></TD>
            <TD align=center bgcolor="#F3F3F3" width="25%">Зал Паладинов<BR><INPUT TYPE="submit" class="knopka" name="room15" value="Войти"><?if($user['room']==15)echo"<img src=".IMGBASE."/i/flag.gif>"?> &nbsp; <b>(<?=(int)$or[15]?>)</b> <a href="#" onClick="inforoom(15);"><img src="<?=IMGBASE?>/i/inf.gif"></a></TD>
            <TD align=center bgcolor="#FFFFFF" width="25%">Совет Белого Братства<BR><INPUT TYPE="submit" class="knopka" name="room16" value="Войти"><?if($user['room']==16)echo"<img src=".IMGBASE."/i/flag.gif>"?> &nbsp; <b>(<?=(int)$or[16]?>)</b> <a href="#" onClick="inforoom(16);"><img src="<?=IMGBASE?>/i/inf.gif"></a></TD>
        </TR>
        <TR>
            <TD align=center bgcolor="#C0C0C0" width="25%">Зал Тьмы<BR><INPUT TYPE="submit" class="knopka" name="room17" value="Войти"><?if($user['room']==17)echo"<img src=".IMGBASE."/i/flag.gif>"?> &nbsp; <b>(<?=(int)$or[17]?>)</b> <a href="#" onClick="inforoom(17);"><img src="<?=IMGBASE?>/i/inf.gif"></a></TD>
            <TD align=center bgcolor="#909090" width="25%">Царство Тьмы<BR><INPUT TYPE="submit" class="knopka" name="room18" value="Войти"><?if($user['room']==18)echo"<img src=".IMGBASE."/i/flag.gif>"?> &nbsp; <b>(<?=(int)$or[18]?>)</b> <a href="#" onClick="inforoom(18);"><img src="<?=IMGBASE?>/i/inf.gif"></a></TD>
            <TD align=center bgcolor="#E7E3E3" width="25%">Зал Стихий<BR><INPUT TYPE="submit" class="knopka" name="room36" value="Войти"><?if($user['room']==36)echo"<img src=".IMGBASE."/i/flag.gif>"?> &nbsp; <b>(<?=(int)$or[36]?>)</b> <a href="#" onClick="inforoom(36);"><img src="<?=IMGBASE?>/i/inf.gif"></a></TD>
            <TD align=center bgcolor="#faf2f2" width="25%">Будуар<BR><INPUT TYPE="submit" class="knopka" name="room19" value="Войти"><?if($user['room']==19)echo"<img src=".IMGBASE."/i/flag.gif>"?> &nbsp; <b>(<?=(int)$or[19]?>)</b> <a href="#" onClick="inforoom(19);"><img src="<?=IMGBASE?>/i/inf.gif"></a></TD>
        </TR>

        <TR>
            <TD align=center bgcolor="#932C73" width="25%">Комната Знахаря<BR><INPUT TYPE="submit" class="knopka" name="room43" value="Войти"><?if($user['room']==43)echo"<img src=".IMGBASE."/i/flag.gif>"?> &nbsp; <b>(<?=(int)$or[43]?>)</b> <a href="#" onClick="inforoom(43);"><img src="<?=IMGBASE?>/i/inf.gif"></a></TD>
            <TD align=center bgcolor="#932C73" width="25%">Турнирная<BR><INPUT TYPE="submit" class="knopka" name="room200" value="Войти"><?if($user['room']==200)echo"<img src=".IMGBASE."/i/flag.gif>"?> &nbsp; <b>(<?=(int)$or[200]?>)</b> <a href="#" onClick="inforoom(200);"><img src="<?=IMGBASE?>/i/inf.gif"></a></TD>
            <TD align=center bgcolor="#932C73" width="25%">Секретная комната<BR><INPUT class="knopka" TYPE="button" onClick="location.href='main.php?path=1.100.1.50'" value="Войти"><?if($user['room']==0)echo"<img src=".IMGBASE."/i/flag.gif>"?> &nbsp; <b>(<?=(int)$or[0]?>)</b> <a href="#" onClick="inforoom(0);"><img src="<?=IMGBASE?>/i/inf.gif"></a></TD>

        </TR>

        </TABLE></form>
        <div align=right>

    <?php include("mail_ru.php"); ?>

    </div>
</body>
</html>
        <?php
        die();
    }
    
    //=======================================ИНВЕНТАРЬ===================================================================

    if (@$_GET['edit']) {


    if (@$_GET['drop']) {
      dropitem($_GET['drop']);
      resetsets();
      updstats();
      //$user=mqfa("select * from users where id='$user[id]'");
      //ref_drop ($user['id']);
    }
    if (@$_GET['dress']) {
      //if ($user['id'] == 7) {
        $isInjury = mysql_fetch_array(mq("SELECT * FROM `effects` WHERE `owner` = '".$user['id']."' AND (`type` = 14 OR `type` = 13 OR `type` = 12) ORDER BY type DESC;"));
        if ($isInjury) {
            $isSpike = mysql_result(mysql_query("SELECT COUNT(*) FROM inventory WHERE owner = $user[id] AND id = $_GET[dress] AND (prototype = 1905 OR prototype = 1906)"), 0, 0);
        }
        if (!$isInjury || $isSpike) {
            $ch_dvur = mysql_fetch_array(mq("SELECT id FROM `inventory` WHERE `owner` = '{$user['id']}' AND `type` = '3' AND `dressed` = '1' AND `dvur`='1' LIMIT 1;"));
            $ch_puha = mysql_fetch_array(mq("SELECT type,second,dvur FROM `inventory` WHERE `id` = '{$_GET['dress']}' LIMIT 1;"));
            if($ch_puha['type']==3 && $ch_puha['dvur']==1){
                dropitem(10);
            }
            if(!$ch_dvur or $ch_puha['type']!=10 && ($ch_puha['type']!=3 or $ch_puha['second']!=1)) {
                dressitem($_GET['dress']);
            }
            resetsets();
            updstats();
            //$user=mqfa("select * from users where id='$user[id]'");
            //ref_drop ($user['id']);
        } else {
            if ($isInjury['type'] == 12) {
                echo "<font color=red><b>У персонажа средняя трамва, доступны только кулачные бои ещё " . lefttime($isInjury['time']) . "</b></font><br>";
            } else {
                echo "<font color=red><b>У персонажа тяжелая травма - не может драться, перемещаться и передавать предметы ещё " . lefttime($isInjury['time']) . "</b></font><br>";
            }
        }
      //} else {
      //    $ch_dvur = mysql_fetch_array(mq("SELECT id FROM `inventory` WHERE `owner` = '{$user['id']}' AND `type` = '3' AND `dressed` = '1' AND `dvur`='1' LIMIT 1;"));
      //    $ch_puha = mysql_fetch_array(mq("SELECT type,second,dvur FROM `inventory` WHERE `id` = '{$_GET['dress']}' LIMIT 1;"));
      //    if($ch_puha['type']==3 && $ch_puha['dvur']==1){
      //      dropitem(10);
      //    }
      //    if(!$ch_dvur or $ch_puha['type']!=10 && ($ch_puha['type']!=3 or $ch_puha['second']!=1)) {
      //      dressitem($_GET['dress']);
      //    }
      //    resetsets();
      //    updstats();
      //    //$user=mqfa("select * from users where id='$user[id]'");
      //    //ref_drop ($user['id']);
      //}
    }
    if (@$_GET["tofav"]) {
      $_GET["tofav"]=(int)$_GET["tofav"];
      $i=mqfa1("select id from favorites where user='$user[id]' and item='$_GET[tofav]'");
      if ($i) {
        mq("delete from favorites where id='$i'");
        echo "<div align=right><font color=red><b>Предмет \"".mqfa1("select name from inventory where id='$_GET[tofav]'")."\" удалён из избранного.</b></font></div>";
      } else {
        $d=mqfa1("select name from inventory where id='$_GET[tofav]' and owner='$user[id]' and setsale=0 and dressed=0");
        if ($d) {
          mq("insert into favorites (user, item) values ('$user[id]', '$_GET[tofav]')");
          echo "<div align=right><font color=red><b>Предмет \"$d\" добавлен в избранное.</b></font></div>";
        }
      }
    }
    if (@$_GET['destruct']) {
        $dress = mysql_fetch_array(mq("SELECT * FROM `inventory` WHERE `owner` = '{$user['id']}' AND `id` = '{$_GET['destruct']}' LIMIT 1;"));
        destructitem($_GET['destruct']);
        if (!$dress["bs"]) mq("INSERT INTO `delo` (`id` , `author` ,`pers`, `text`, `type`, `date`) VALUES ('','0','{$_SESSION['uid']}','\"".$user['login']."\" выбросил предмет \"".$dress['name']."\" id:(cap".$dress['id'].") [".$dress['duration']."/".$dress['maxdur']."] ',1,'".time()."');");
        echo "<div align=right><font color=red><b>Предмет \"".$dress['name']."\" выброшен.</b></font></div>";
    }
    if (@$_GET['use']) {
      if (in_array($user["room"],$nodrink)) echo "<b><font color=red>Тут запрещено пить эликсиры или пользоваться магией.</font></b>";
      elseif(mqfa1("select sleep from obshaga where pers='$user[id]'")) {
        echo "<b><font color=red>Во сне это не получится.</font></b>";
        addcheater("sleeping outside obshaga");
      } else  usemagic($_GET['use'],$_POST['target']);
    }
    if (@$_GET['undress'] && $user["in_tower"]<10) {
        undressall($user['id']);
        updstats();
        //$user=mqfa("select * from users where id='$user[id]'");
        //ref_drop ($user['id']);
    }
    if (@$_GET['delcomplect']) {
        //mq("DELETE FROM `komplekt` WHERE `id` = ".$_GET['delcomplect']." AND `owner` = ".$user['id'].";");
        $_GET['delcomplect']=str_replace("\\","\\\\",$_GET['delcomplect']);
        unlink(MEMCACHE_PATH."/komplekt/".$user[id]."/".$_GET['delcomplect'].".txt");
    }
    
    if (@$_GET['complect'] && $user["in_tower"]<10) {
        $isInjury = mysql_fetch_array(mq("SELECT * FROM `effects` WHERE `owner` = '".$user['id']."' AND (`type` = 14 OR `type` = 13 OR `type` = 12) ORDER BY type DESC;"));
        if (!$isInjury) {
            $hp = $user['hp'];
            undressall($user['id']);
            $lines = file (MEMCACHE_PATH."/komplekt/".$user['id']."/".$_GET['complect'].".txt");
            $w1=0;
            $w2=0;
            foreach ($lines as $line_num => $line){
                $shmotkom = explode("{||||}", $line);
                $tmp=dressitemkomplekt (trim($shmotkom[0]),trim($shmotkom[1]),trim($shmotkom[2]));
                if ($tmp[0]) $w1=$tmp[0];
                if ($tmp[1]) {
                  if (!$w2) $w2=$tmp[1]; else $w1=$tmp[1];
                }
            }
            if ($w1 && $w2) {
              dressitem($w1);
              dressitem($w2);
            }
            resetsets(0,1);
            mq("UPDATE `users` SET `hp` =if($hp>maxhp, maxhp, $hp) WHERE `id` = '".$user['id']."' LIMIT 1;");       
            updstats();
            ref_drop ($user['id']);
        } else {
            if ($isInjury['type'] == 12) {
                echo "<font color=red><b>У персонажа средняя трамва, доступны только кулачные бои ещё " . lefttime($isInjury['time']) . "</b></font><br>";
            } else {
                echo "<font color=red><b>У персонажа тяжелая травма - не может драться, перемещаться и передавать предметы ещё " . lefttime($isInjury['time']) . "</b></font><br>";
            }
        }
    }
    
    timepassed();
    ref_drop ($user['id']);
    if (@$_POST['savecomplect']) {
        $_POST['savecomplect']=trim($_POST['savecomplect']);
        if (preg_match('/[\/\:*?"<>|+%]/',$_POST['savecomplect'])){
            $errkom=1;
        }
        else{
            $errkom='';
            $user = mysql_fetch_array(mq("SELECT * FROM `users` WHERE `id` = '{$_SESSION['uid']}' LIMIT 1;"));
            //Сохраняем комплект
            $dir=MEMCACHE_PATH."/komplekt/".$user['id'];
            if (!file_exists($dir)) mkdir($dir);
            $f=fopen($dir."/".$_POST['savecomplect'].".txt","w+");
            $odetShmot=mq("select name,id from inventory where id=".$user['sergi']." or id=".$user['kulon']." or id=".$user['perchi']." or id=".
            $user['weap']." or id=".$user['bron']." or id=".$user['rybax']." or id=".$user['plaw']." or id=".$user['r1']." or id=".$user['r2']." or id=".$user['r3']." or id=".
            $user['helm']." or id=".$user['shit']." or id=".$user['m1']." or id=".$user['m2']." or id=".$user['m3']." or id=".$user['m4'].
            " or id=".$user['m5']." or id=".$user['m6']." or id=".$user['m7']." or id=".$user['m8']." or id=".$user['m9']." or id=".$user['m10'].
            " or id=".$user['boots']." or id=".$user['belt']." or id=".$user['naruchi']." or id=".$user['leg']." or id=".$user['m11']." or id=".$user['m12']." or id=".$user['p1']." or id=".$user['p2']);
            $slots=array('sergi', 'kulon', 'perchi', 'weap', 'bron', 'rybax', 'plaw', 'r1', 'r2', 'r3', 'helm', 'shit', 'm1', 'm2', 'm3', 'm4', 'm5', 'm6', 'm7', 'm8', 'm9', 'm10', 'm11', 'm12', 'boots', 'belt', 'naruchi', 'leg', 'p1', 'p2');
            while ($res=mysql_fetch_row($odetShmot)){
              $slot="";
              foreach ($slots as $k=>$v) if ($user[$v]==$res[1]) {
                $slot=$v;
                break;
              }
              fwrite($f,$res[0]."{||||}".$res[1]."{||||}$slot\n");
            }
            fclose($f);
        }
    }
    //$user = mysql_fetch_array(mq("SELECT * FROM `users` WHERE `id` = '{$_SESSION['uid']}' LIMIT 1;"));

    /*if ($user['maxhp'] != $user['vinos']*6) {

        $user = mysql_fetch_array(mq("SELECT * FROM `users` WHERE `id` = '{$_SESSION['uid']}' LIMIT 1;"));
    } */


?>
<HTML><HEAD>
<link rel=stylesheet type="text/css" href="<?=IMGBASE?>/i/main.css">
<meta content="text/html; charset=windows-1251" http-equiv=Content-type>
<META Http-Equiv=Cache-Control Content="no-cache, max-age=0, must-revalidate, no-store">
<SCRIPT LANGUAGE="JavaScript" SRC="http://img.bestcombats.net/js/sl2.27.js?1"></SCRIPT>
<meta http-equiv=PRAGMA content=NO-CACHE>
<META Http-Equiv=Expires Content=0>
<div id=hint4 class=ahint></div>
<SCRIPT>
var sd4 = "869518824";
function fastshow(dsc, dx, dy) { top.fullfastshow(document, mmoves, window.event, dsc, dx, dy); }
function hideshow() { top.fullhideshow(mmoves); }
</SCRIPT>
<script>
function fullfastshow(a,b,c,d,e,f){if(typeof b=="string")b=a.getElementById(b);var g=c.srcElement?c.srcElement:c,h=g;c=g.offsetLeft;for(var j=g.offsetTop;h.offsetParent&&h.offsetParent!=a.body;){h=h.offsetParent;c+=h.offsetLeft;j+=h.offsetTop;if(h.scrollTop)j-=h.scrollTop;if(h.scrollLeft)c-=h.scrollLeft}if(d!=""&&b.style.visibility!="visible"){b.innerHTML="<small>"+d+"</small>";if(e){b.style.width=e;b.whiteSpace=""}else{b.whiteSpace="nowrap";b.style.width="auto"}if(f)b.style.height=f}d=c+g.offsetWidth+10;e=j+5;if(d+b.offsetWidth+3>a.body.clientWidth+a.body.scrollLeft){d=c-b.offsetWidth-5;if(d<0)d=0}if(e+b.offsetHeight+3>a.body.clientHeight+a.body.scrollTop){e=a.body.clientHeight+ +a.body.scrollTop-b.offsetHeight-3;if(e<0)e=0}b.style.left=d+"px";b.style.top=e+"px";if(b.style.visibility!="visible")b.style.visibility="visible"}function fullhideshow(a){if(typeof a=="string")a=document.getElementById(a);a.style.visibility="hidden";a.style.left=a.style.top="-9999px"}

function gfastshow(dsc, dx, dy) { fullfastshow(document, mmoves3, window.event, dsc, dx, dy); }
function ghideshow() { fullhideshow(mmoves3); }

var Hint3Name = '';
// Заголовок, название скрипта, имя поля с логином
function findlogin(title, script, name){
    document.all("hint3").innerHTML = '<form action="'+script+'" method=post><table width=100% cellspacing=1 cellpadding=0 bgcolor=CCC3AA><tr><td align=center><B>'+title+'</td><td width=20 align=right valign=top style="cursor: pointer" onclick="closehint3();"><BIG><B>x</td></tr><tr><td colspan=2>'+
    '<table width=100% cellspacing=0 cellpadding=2 bgcolor=FFF6DD><tr><INPUT TYPE=hidden name=sd4 value="6"><td colspan=2>'+
    'Укажите логин персонажа:<small><BR>(можно щелкнуть по логину в чате)</TD></TR><TR><TD width=50% align=right><input type=text id="'+name+'" name="'+name+'"></TD><TD width=50%><INPUT TYPE="submit" value=" »» "></TD></TR></TABLE></td></tr></table></form>';
    document.getElementById("hint3").style.visibility = "visible";
    document.getElementById("hint3").style.left = 300;
    document.getElementById("hint3").style.top = 100;
    Hint3Name = name;
    document.getElementById(name).focus();
}
// Заголовок, название скрипта, имя поля с шмоткой
function okno(title, script, name,coma,errk){
    var errkom=''; var com='';
    if (errk==1) { errkom='Нельзя использовать символы: /\:*?"<>|+%<br>'; com=coma}
    document.all("hint3").innerHTML = '<table width=100% cellspacing=1 cellpadding=0 bgcolor=CCC3AA><tr><td align=center><B>'+title+'</td><td width=20 align=right valign=top style="cursor: pointer" onclick="closehint3();"><BIG><B>x</td></tr><tr><td colspan=2>'+
    '<form action="'+script+'" method=POST><table width=100% cellspacing=0 cellpadding=2 bgcolor=FFF6DD><tr><INPUT TYPE=hidden name=sd4 value="6"><td colspan=2><font color=red>'+
    errkom+'</font>'+title+'</TD></TR><TR><TD width=50% align=right><INPUT TYPE=text id="'+name+'" NAME="'+name+'" value="'+com+'"></TD><TD width=50%><INPUT TYPE="submit" value=" »» "></TD></TR></TABLE></FORM></td></tr></table>';
    document.getElementById("hint3").style.visibility = "visible";
    document.getElementById("hint3").style.left = 200;
    document.getElementById("hint3").style.top = 100;
    document.getElementById(name).focus();
    Hint3Name = name;
}
function oknos(title, script, name,coma,errk){
    var errkom=''; var com='';
    if (errk==1) { errkom='Нельзя использовать символы: /\:*?"<>|+%<br>'; com=coma}
    document.all("hint3").innerHTML = '<table width=100% cellspacing=1 cellpadding=0 bgcolor=CCC3AA><tr><td align=center><B>'+title+'</td><td width=20 align=right valign=top style="cursor: pointer" onclick="closehint3();"><BIG><B>x</td></tr><tr><td colspan=2>'+
    '<form action="'+script+'" method=POST><table width=100% cellspacing=0 cellpadding=2 bgcolor=FFF6DD><tr><INPUT TYPE=hidden name=sd4 value="6"><td colspan=2><font color=red>'+
    errkom+'</font>Придумайте кличку зверю</TD></TR><TR><TD width=50% align=right><INPUT TYPE=text id="'+name+'" NAME="'+name+'" value="'+com+'"></TD><TD width=50%><INPUT TYPE="submit" value=" »» "></TD></TR></TABLE></FORM></td></tr></table>';
    document.all("hint3").style.visibility = "visible";
    document.all("hint3").style.left = 200;
    document.all("hint3").style.top = 60;
    document.all(name).focus();
    Hint3Name = name;
}
function note(title, script, name,coma,errk){
    var errkom=''; var com='';
    if (errk==1) { errkom='Нельзя использовать символы: /\:*?"<>|+%<br>'; com=coma}
    document.all("hint3").innerHTML = '<table width=100% cellspacing=1 cellpadding=0 bgcolor=CCC3AA><tr><td align=center><B>'+title+'</td><td width=20 align=right valign=top style="cursor: pointer" onclick="closehint3();"><BIG><B>x</td></tr><tr><td colspan=2>'+
    '<form action="'+script+'" method=POST><table width=100% cellspacing=0 cellpadding=2 bgcolor=FFF6DD><tr><INPUT TYPE=hidden name=sd4 value="6"><td colspan=2><font color=red>'+
    errkom+'</font>Введите текст</TD></TR><TR><TD width=50% align=right><INPUT TYPE=text id="'+name+'" NAME="'+name+'" value="'+com+'"></TD><TD width=50%><INPUT TYPE="submit" value=" »» "></TD></TR></TABLE></FORM></td></tr></table>';
    document.getElementById("hint3").style.visibility = "visible";
    document.getElementById("hint3").style.left = 200;
    document.getElementById("hint3").style.top = 60;
    document.getElementById(name).focus();
    Hint3Name = name;
}
function returned2(s){
    if (top.oldlocation != '') { top.frames['main'].navigate(top.oldlocation+'?'+s+'tmp='+Math.random()); top.oldlocation=''; }
    else { top.frames['main'].navigate('main.php?'+s+'tmp='+Math.random()) }
}
function closehint3(){
    document.getElementById("hint3").style.visibility="hidden";
    Hint3Name='';
}

function defPosition(event) {
      var x = y = 0;
      if (document.attachEvent != null) { // Internet Explorer & Opera
            x = window.event.clientX + (document.documentElement.scrollLeft ? document.documentElement.scrollLeft : document.body.scrollLeft);
            y = window.event.clientY + (document.documentElement.scrollTop ? document.documentElement.scrollTop : document.body.scrollTop);
            if (window.event.clientY + 72 > document.body.clientHeight) { y-=38 } else { y-=2 }
      } else if (!document.attachEvent && document.addEventListener) { // Gecko
            x = event.clientX + window.scrollX;
            y = event.clientY + window.scrollY;
            if (event.clientY + 72 > document.body.clientHeight) { y-=38 } else { y-=2 }
      } else {
            // Do nothing
      }
      return {x:x, y:y};
}

function OpisShmot(evt,s){
    menu=document.createElement("div");
    menu.style.border='1px solid black';
    menu.innerHTML = s;
    menu.id='ShowInfoShmot';
    menu.style.background='#FFFFE1';
    menu.style.fontsize='8px';
    menu.style.position='absolute';
    menu.style.top = defPosition(evt).y + "px";
    menu.style.left = defPosition(evt).x + "px";

    showSH=setTimeout(function(){
                    document.body.appendChild(menu);
               }, 1000);
}

function HideOpisShmot(){
    try{
        ids=document.getElementById('ShowInfoShmot');
        ids.parentNode.removeChild(ids);
    }
    catch (err){
        clearTimeout(showSH);
    }
}
</script>

</HEAD>
<body leftmargin=0 topmargin=0 marginwidth=0 marginheight=0 bgcolor=#e2e0e0 onLoad="<? echo topsethp(); ?>">
<?  timepassed();
  if (@$_GET["raisestat"]=="sila" || @$_GET["raisestat"]=="lovk" || @$_GET["raisestat"]=="inta" || @$_GET["raisestat"]=="intel") {
    $item=(int)$_GET["item"];
    $shmotko = mysql_fetch_array(mysql_query("SELECT `stats` FROM `inventory` WHERE `id`='$item' LIMIT 1;"));
    If($_GET['colls']>$shmotko['stats']){
    echo"<b><font color=red>Недостаточно свободных статов</font></b>";
    }else{
    mq("update inventory set stats=stats-$_GET[colls], g$_GET[raisestat]=g$_GET[raisestat]+$_GET[colls] where id='$item' and stats>0 and owner='$user[id]'");
    if ($_GET["raisestat"]=="sila") $p="сила";
    if ($_GET["raisestat"]=="lovk") $p="ловкость";
    if ($_GET["raisestat"]=="inta") $p="интуиция";
    if ($_GET["raisestat"]=="intel") $p="интеллект";
    echo "<b><font color=red>Параметр $p увеличен успешно.</font></b>";
    //echo "<script>document.location.replace('main.php?edit=1&raised=$_GET[raisestat]');</script>";
    //die;
  }
  //if (@$_GET["raised"]) {
//    if ($_GET["raised"]=="sila") $p="сила";
  //  if ($_GET["raised"]=="lovk") $p="ловкость";
  //  if ($_GET["raised"]=="inta") $p="интуиция";
  //  if ($_GET["raised"]=="intel") $p="интеллект";
  //  echo "<b><font color=red>Параметр $p увеличен успешно.</font></b>";
 // }
  }
?>
<div id="mmoves3" style="background-color:#FFFFCC; visibility:hidden; z-index: 101; overflow:visible; position:absolute; border-color:#666666; border-style:solid; border-width: 1px; padding: 2px;"></div>
<div id=hint3 class=ahint></div>
<FORM METHOD=POST ACTION="main.php?edit=1">
<TABLE border=0 width=100% cellspacing="0" cellpadding="0">
<TR>
    <td valign=top align=left width=250><?showpersinv($user['id'])?>
<?
  getadditdata($user);
  include_once("incl/strokedata.php");
  $r=mq("select slot,id_thing from puton where id_person='$user[id]' and slot>=201 and slot<=220;");
  while ($rec=mysql_fetch_array($r)) {
    $puton[$rec['slot']]=$rec['slot']; // =new prieminfo($s['id_thing'],0);
    $puton2[$rec['slot']]=$rec['id_thing'];
  }
  $i=200;
  echo "<table cellspacing=0 cellpadding=0 align=center><tr>";
  while ($i<210+$user["slots"]) {
    $i++;
    echo"<td>";
    if ($puton[$i]) {
      echo "<a href=\"umenie.php?showstrokes=1\"><img border=\"0\" width=\"40\" height=\"25\" src=\"".IMGBASE."/i/priem/".$strokes["ids"][$puton2[$i]].".gif\"></a>";
    } else {
      echo"<a href=\"umenie.php?showstrokes=1\"><img border=\"0\" style=\"\" width=40 height=25 src='".IMGBASE."/i/misc/icons/clear.gif'></a>";
    }
    echo "</td>";
    if ($i%5==0) echo "</tr><tr>";
  }
?>
    <BR>
    <table>
        <tr><td>&nbsp;</td><td><small>
    <?
                //Выгребаем все комплекты перса
            /*  $Path=MEMCACHE_PATH."/komplekt/".$user['id'];
                if (file_exists($Path))
                    if ($dir = opendir($Path)) {
                        while (false !== ($file = readdir($dir))){
                            //Убираем лишние элементы
                            if ($file != "." && $file != "..") {
                                $file=substr($file,0,-4);
                                echo "<a onclick=\"if (!confirm('Вы уверены, что хотите удалить комплект?')) { return false; }\" href='main.php?edit=1&delcomplect=".$file."'>
                                    <img src='".IMGBASE."/i/clear.gif'></a>
                                    <a href='main.php?edit=1&complect=".$file."'>Надеть \"".$file."\"</a><BR>";
                            }
                        }
                    }
                $dd = mq("SELECT * FROM `komplekt` WHERE `owner` = ".$user['id'].";");
                while($comp = mysql_fetch_array($dd)) {
                    echo "<a onclick=\"if (!confirm('Вы уверены, что хотите удалить комплект?')) { return false; }\" href='main.php?edit=1&delcomplect=".$comp['id']."'>
                    <img src='".IMGBASE."/i/close2.gif'></a>
                    <a href='main.php?edit=1&complect=".$comp['id']."'>Надеть \"".$comp['name']."\"</a><BR>";
                }*/
    timepassed();
            ?>
        </td></tr>
    </table>
    </td>
    <TD valign=top width=207>
<!--Параметры-->
<table border=0><tr><td><br>
<small>Опыт: <b><?=$user['exp']?></b><a href='/exp.php' target=_blank>(<?=$user['nextup']?>)</a><BR></small>
<? echo forlevelup($user); ?>
<small>Бои:&nbsp;<span title='Побед: <?=$user['win']?>'><b><?=$user['win']?></b>&nbsp;<img width=7 height=7 alt="Побед: <?=$user['win']?>"
src="<?=IMGBASE?>/i/icon/wins.gif"></b></span>&nbsp;<span title='Поражений: <?=$user['lose']?>'><b><?=$user['lose']?></b>&nbsp;<img width=7 height=7 alt="Поражений: <?=$user['lose']?>"
src="<?=IMGBASE?>/i/icon/looses.gif"></b></span>&nbsp;<span title='Ничьих: <?=$user['nich']?>'><b><?=$user['nich']?></b>&nbsp;<img width=7 height=7 alt="Ничьих: <?=$user['nich']?>"
src="<?=IMGBASE?>/i/icon/draw.gif"></small><br></span>
<small>Деньги: <b><?=$user['money']?></b> кр.</small><br>
<small>Еврокредиты: <b><?=$user['ekr']?></b> екр.</small><br>
<small>Благородство: <b><?=$user['honorpoints']?></b>&nbsp;<img width=11 height=9 alt="Благородство:" src=<?=IMGBASE?>/i/fixed_on.gif></small><br>
<!--<small>Банк: <a href="#">выбрать счет</a></small><br>-->
<SCRIPT src="/js/main.js?2"></SCRIPT>
<?
if($_GET['is_open'] && !is_numeric($_GET['is_open'])){unset($_GET['is_open']);}
if($_GET['bar']=='stat'){$_SESSION['stat']=$_GET['is_open'];}
if($_GET['bar']=='mod'){$_SESSION['mod']=$_GET['is_open'];}
if($_GET['bar']=='def'){$_SESSION['def']=$_GET['is_open'];}
if($_GET['bar']=='power'){$_SESSION['power']=$_GET['is_open'];}
if($_GET['bar']=='grazd1'){$_SESSION['grazd1']=$_GET['is_open'];}
if($_GET['bar']=='reput1'){$_SESSION['reput1']=$_GET['is_open'];}
if($_GET['bar']=='btn'){$_SESSION['btn']=$_GET['is_open'];}
if($_GET['bar']=='comp'){$_SESSION['comp']=$_GET['is_open'];}
if($_GET['bar']=='strokes'){$_SESSION['strokes']=$_GET['is_open'];}
?>
<img width=210 height=3 alt="" src="<?=IMGBASE?>/i/1x1.gif"><script>DrawBar('Характеристики', 'stat', <?if($_SESSION['stat']==1){echo"3";}else{echo"6";}?>, '', '');</script>
<?
if($_SESSION['stat']==1){
?>
<small>Сила: <b><?=$user['sila']?></b><BR></small>
<small>Ловкость: <b><?=$user['lovk']?></b><BR></small>
<small>Интуиция: <b><?=$user['inta']?></b><BR></small>
<small>Выносливость: <b><?=$user['vinos']?></b><BR></small>
<?if($user['level']>3){echo"<small>Интеллект: <b>{$user['intel']}</b></small><BR>";}?>
<?if($user['level']>6){echo"<small>Мудрость: <b>{$user['mudra']}</b></small><BR>";}?>
<?if($user['level']>9){echo"<small>Духовность: <b>{$user['spirit']}</b></small><BR>";}?>
<?if($user['level']>12){echo"<small>Воля: <b>{$user['will']}</b></small><BR>";}?>
<?if($user['level']>15){echo"<small>Свобода Духа: <b>{$user['freedom']}</b></small><BR>";}?>
<?if($user['level']>18){echo"<small>Божественность: <b>{$user['god']}</b></small><BR>";}?>
<?if($user['stats']>0){?><small><A HREF="umenie.php">+ Способности</A></small><?}if($user['master']>0){?><small>&nbsp;&bull;&nbsp;<A HREF="umenie.php">Обучение</A></small><?}?>
<?}

  /*$zo=mysql_fetch_row(mq("SELECT id FROM effects WHERE type=201 AND owner=".(int)$user['id']." LIMIT 1;"));
  $sokr=mysql_fetch_row(mq("SELECT id FROM effects WHERE type=202 AND owner=".(int)$user['id']." LIMIT 1;"));
  $bmfud= $sokr[0]>0 ? 2:0;//владение оружием !
  $bmfbron= $zo[0]>0 ? 4:0;//броня
  $bmfuv=0; $bmfauv=0; $bmfakrit=0; $bmfkrit=0; //модификаторы
  $bmfud1= $sokr1[0]>0 ? 2:0;//владение оружием
  $bmfbron1= $zo1[0]>0 ? 4:0;//броня
  $bmfuv1=0; $bmfauv1=0; $bmfakrit1=0; $bmfkrit1=0; //модификаторы
  if ($user['sila']>=25) $bmfud+=1;
  if ($user['sila']>=50) $bmfud+=2;
  if ($user['lovk']>=25) $bmfauv+=25;
  if ($user['lovk']>=50) $bmfuv+=25;
  if ($user['inta']>=25) $bmfakrit+=25;
  if ($user['inta']>=50) $bmfkrit+=25;
  if ($user['vinos']>=25) $bmfbron+=2;
  if ($user['vinos']>=50) $bmfbron+=4;
  $mf = array ();
  $user_dress = mysql_fetch_array( mq('SELECT sum(minu),sum(maxu),sum(mfkrit),sum(mfakrit),sum(mfuvorot),sum(mfauvorot),sum(bron1),sum(bron2),sum(bron3),sum(bron4),sum(mfkritpow),sum(mfantikritpow),sum(mfparir),sum(mfshieldblock),sum(mfcontr),sum(mfrub),sum(mfkol),sum(mfdrob),sum(mfrej),sum(mfdhit),sum(mfdmag),sum(mfhitp),sum(mfmagp),sum(mfproboj) as mfproboj FROM `inventory` WHERE `dressed`=1 AND `owner` = \''.$user['id'].'\' LIMIT 1;'));
  $user_dress[6]+=$bmfbron;
  $user_dress[7]+=$bmfbron;
  $user_dress[8]+=$bmfbron;
  $user_dress[9]+=$bmfbron;

  $mykritpow = $user_dress[10];
  $myantikritpow = $user_dress[11];
  $myparir = $user_dress[12];
  $myshieldblock = $user_dress[13];
  $mycontr = $user_dress[14];
  $myrub = $user_dress[15];
  $mykol = $user_dress[16];
  $mydrob = $user_dress[17];
  $myrej = $user_dress[18];
  $mydhit = $user_dress[19];
  $mydmag = $user_dress[20];
  $myhitp = $user_dress[21];
  $mymagp = $user_dress[22];
  $mykrit = $user_dress[2]+$user['inta']*2.95+$bmfkrit;
  $myuvorot = $user_dress[4]+$user['lovk']*5+$user['inta']*0+$bmfuv;
  $myakrit = $user_dress[3]+$user['inta']*2.75+$user['lovk']*0+$bmfakrit;
  $myauvorot = $user_dress[5]+$user['lovk']*4+$user['inta']*1.35+$bmfauv;
  $myproboj=$user_dress["mfproboj"];
  $minimax=mqfa1("select minu, maxu from inventory where id='$user[shit]'");
  $mf['me'] = array ('udar' => (floor($user['sila']/3)+1+$user_dress[0]-$minimax["minu"]),'maxudar' =>(floor($user['sila']/3)+4+$user_dress[1]-$minimax["maxu"]));
  if($mf['me']['udar'] < 0) { $mf['me']['udar'] = 0; }
  if($mf['me']['krit'] < 1) { $mf['me']['krit'] = 1; } elseif ($mf['me']['krit'] > 50) { $mf['me']['krit'] = 50; }
  if($mf['me']['uvorot'] < 1) { $mf['me']['uvorot'] = 1; } elseif ($mf['me']['uvorot'] > 65) { $mf['me']['uvorot'] = 65; }
  if(($user['weap']) == 'kulak' && $user['align'] == '7') { $mf['me']['udar'] += $user['level']; }
  switch($user['weap']) {
    case "noj":
      $mf['me']['udar'] += $user['noj'];
    break;
    case "dubina":
      $mf['me']['udar'] += $user['dubina'];
    break;
    case "topor":
      $mf['me']['udar'] += $user['topor'];
    break;
    case "mech":
      $mf['me']['udar'] += $user['mec'];
    break;
  }

  $mf['me']['udar']+=$bmfud;
  $mf['me']['maxudar']+=$bmfud;*/

  if ($_SESSION['mod'] || $_SESSION['def'] || $_SESSION['power']) {
    $mf2=countmf();
  }

  if ($_SESSION['mod']==1 || $_SESSION['reput1']==1) {
    $repa[0]=number_format(mqfa1("select step from quests where user='$user[id]' and quest=3"),2);
    $repalevel[0]=0;
    $repanext[0]=10;

    if ($repa[0]>=30) {
      $mf2["mfuvorot"]+=10;
      $mf2["mfauvorot"]+=10;
      $grepa[0]="Мф. увёртливости (%) +10<br>
      Мф. против увёртливости (%) +10<br>";
      $repalevel[0]=2;
      $repanext[0]=75;
    } elseif ($repa[0]>=10) {
      $mf2["mfuvorot"]+=5;
      $mf2["mfauvorot"]+=5;
      $grepa[0]="Мф. увёртливости (%) +5<br>
      Мф. против увёртливости (%) +5<br>";
      $repalevel[0]=1;
      $repanext[0]=30;
    }
  }
?>
<small>
<script>DrawBar('Модификаторы', 'mod', <?if($_SESSION['mod']==1){echo"1";}else{echo"6";}?>, '', '');</script>
<?
if($_SESSION['mod']==1){
?>
<SPAN title='Усредненный по всем типам повреждений для вашего оружия урон, без учета брони и защиты противника а так же вашего усиления урона.'>Урон: <?
  echo "$mf2[minu] - $mf2[maxu]";
  if ($mf2["minu1"]) echo ", $mf2[minu1] - $mf2[maxu1]";
  echo "<br>
Крит. урон: $mf2[minukrit] - $mf2[maxukrit]";
  if ($mf2["minukrit1"]) echo ", $mf2[minukrit1] - $mf2[maxukrit1]";
?></span><br>
<SPAN title='Мф. крит. удара позволяет нанести критический удар, наносящий дополнительные повреждения даже сквозь блок.'>Мф. крит. удара: <?=(int)$mf2["mfkrit"]?></span><br>
<SPAN title='Мф. мощности крит. удара усиляет критические удары.'>Мф. мощности крит. удара: <?=(int)$mf2["mfkritpow"];?></span><br>
<SPAN title='Мф. против крит. удара снижает вероятность получения крит. удара'>Мф. против крит. удара: <?=(int)$mf2["mfakrit"]?></span><br>
<SPAN title='Мф. против мощности крит. удара снижает мощность крит. удара'>Мф. против мощ. крит. удара: <?=$mf2["mfantikritpow"]?></span><br>
<SPAN title='Мф. увертывания позволяет вам уклониться от атаки противника, полностью игнорируя ее.'>Мф. увертывания: <?=(int)$mf2["mfuvorot"]?></span><br>
<SPAN title='Мф. против увертывания снижает шансы противника уклониться от вашей атаки'>Мф. против увертывания: <?=(int)$mf2["mfauvorot"]?></span><br>
<SPAN title='Мф. контрудара позволяет нанести дополнительный удар по противнику, после того как вы уклонились от его атаки'>Мф. контрудара: <?=$mf2["mfcontr"];?></span><br>
<SPAN title='Мф. парирования позволяет "угадать" зону удара противника. Итоговый шанс парирования в бою равен разнице вашего мф. парирования и половины мф. парирования противника'>Мф. парирования: <?=(int)$mf2["mfparir"];?></span><br>
<SPAN title='Мф. блока щитом позволяет "угадать" зону удара противника. Этот модификатор абсолютен.'>Мф. блока щитом: <?=$mf2["mfshieldblock"];?></span><br>
<SPAN title='Мф. пробоя брони позволяет нанести урон сквозь броню.'>Мф. пробоя брони: <?=$mf2["mfproboj"];?></span><br>
<SPAN title='Понижение защиты от магии уменьшает защиту от магии цели.'>Понижение защиты от магии: <?=$mf2["minusmfdmag"];?></span><br>
<SPAN title='Понижение защиты от магии огня уменьшает защиту от цели от магии огня.'>Понижение защиты от магии огня: <?=$mf2["minusmfdfire"];?></span><br>
<SPAN title='Понижение защиты от магии воды уменьшает защиту от цели от магии воды.'>Понижение защиты от магии воды: <?=$mf2["minusmfdwater"];?></span><br>
<SPAN title='Понижение защиты от магии воздуха уменьшает защиту от цели от магии воздуха.'>Понижение защиты от магии воздуха: <?=$mf2["minusmfdair"];?></span><br>
<SPAN title='Понижение защиты от магии земли уменьшает защиту от цели от магии земли.'>Понижение защиты от магии земли: <?=$mf2["minusmfdearth"];?></span><br>
<SPAN title='Уменьшение расхода маны уменьшает количество маны, которое тратит персонаж на заклинания.'>Уменьшение расхода маны: <?=$mf2["manausage"];?></span><br>
<!--<SPAN title='Мастерство владения текущим оружием в момент нанесения удара'>Мастерство: 0 / 0</span><br>-->
<?}?>
<script>DrawBar('Защита', 'def', <?if($_SESSION['def']==1){echo"1";}else{echo"6";}?>, '', '');</script>
<?
if($_SESSION['def']==1){
  //$effs=mqfa("select sum(mfdhit) as mfdhit, sum(mfdmag) as mfdmag from effects where owner='$user[id]'");
  //$mf2["mfdmag"]+=$effs["mfdmag"];
  //$mf2["mfdhit"]+=$effs["mfdhit"];
?>
<SPAN title='Защита от физического урона снижает урон нанесенный вам физическими атаками'>Защита от урона: <? echo (float)$mf2["mfdhit"]; ?></span><br>
<SPAN title='Защита от колющего урона снижает урон нанесенный вам колющими атаками'>Колющий урон: <? echo (float)$mf2["mfdkol"]; ?></span><br>
<SPAN title='Защита от режущего урона снижает урон нанесенный вам физическими атаками'>Режущий урон: <? echo (float)$mf2["mfdrej"]; ?></span><br>
<SPAN title='Защита от рубящего урона снижает урон нанесенный вам физическими атаками'>Рубящий урон: <? echo (float)$mf2["mfdrub"]; ?></span><br>
<SPAN title='Защита от дробящего урона снижает урон нанесенный вам физическими атаками'>Дробящий урон: <? echo (float)$mf2["mfddrob"]; ?></span><br>
<SPAN title='Защита от магических атак снижает урон нанесенный вам магическими атаками'>Защита от магии: <? echo (float)$mf2["mfdmag"]; ?></span><br>
<SPAN title='Защита от магии Огня снижает урон нанесенный вам стихией Огня'>Магия Огня: <? echo (float)$mf2["mfdfire"]; ?></span><br>
<SPAN title='Защита от магии Воды снижает урон нанесенный вам стихией Воды'>Магия Воды: <? echo (float)$mf2["mfdwater"]; ?></span><br>
<SPAN title='Защита от магии Воздуха снижает урон нанесенный вам стихией Воздуха'>Магия Воздуха: <? echo (float)$mf2["mfdair"]; ?></span><br>
<SPAN title='Защита от магии Земли снижает урон нанесенный вам стихией Земли'>Магия Земли: <? echo (float)$mf2["mfdearth"]; ?></span><br>
<SPAN title='Защита от магии Света снижает урон нанесенный вам магией Света'>Магия Света: <? echo (float)$mf2["mfdlight"]; ?></span><br>
<SPAN title='Защита от магии Тьмы снижает урон нанесенный вам магией Тьмы'>Магия Тьмы: <? echo (float)$mf2["mfddark"]; ?></span><br>
<?}?>
<script>DrawBar('Мощность', 'power', <?if($_SESSION['power']==1){echo"1";}else{echo"6";}?>, '', '');</script>
<?
if($_SESSION['power']==1){
?>
<SPAN title='Мощность урона повышает ваш урон физическими атаками'> физического урона: <?=plusorminus($mf2["mfhitp"])?>% </SPAN><BR>
<SPAN title='Мощность колющего урона повышает ваш урон колющими атаками'> колющего урона: <?=plusorminus($mf2["mfkol"])?>% </SPAN><BR>
<SPAN title='Мощность рубящего урона повышает ваш урон рубящими атаками'> рубящего урона: <?=plusorminus($mf2["mfrub"])?>% </SPAN><BR>
<SPAN title='Мощность режущего урона повышает ваш урон дробящими атаками'> режущего урона: <?=plusorminus($mf2["mfrej"])?>% </SPAN><BR>
<SPAN title='Мощность дробящего урона повышает ваш урон режущими атаками'> дробящего урона: <?=plusorminus($mf2["mfdrob"])?>% </SPAN><BR>
<SPAN title='Мощность магии повышает ваш урон магическими атаками'> магии стихий: <?=plusorminus($user["intel"]*0.5+$mf2["mfmagp"])?>% </SPAN><BR>
<SPAN title='Мощность магии огня повышает ваш урон атаками магией огня'> магии огня: <?=plusorminus($mf2["mffire"])?>% </SPAN><BR>
<SPAN title='Мощность магии воды повышает ваш урон атаками магией воды'> магии воды: <?=plusorminus($mf2["mfwater"])?>% </SPAN><BR>
<SPAN title='Мощность магии воздуха повышает ваш урон атаками магией воздуха'> магии воздуха: <?=plusorminus($mf2["mfair"])?>% </SPAN><BR>
<SPAN title='Мощность магии земли повышает ваш урон атаками магией земли'> магии земли: <?=plusorminus($mf2["mfearth"])?>% </SPAN><BR>
<SPAN title='Мощность магии света повышает ваш урон атаками магией света'> магии света: <?=plusorminus($mf2["mflight"])?>% </SPAN><BR>
<SPAN title='Мощность магии тьмы повышает ваш урон атаками магией тьмы'> магии тьмы: <?=plusorminus($mf2["mfdark"])?>% </SPAN><BR>

<?}?>
</small>
<script>DrawBar('Гражданство', 'grazd1', <?if($_SESSION['grazd1']==1){echo"1";}else{echo"6";}?>, '', '');</script>
<?
if($_SESSION['grazd1']==1){
?><small>
<SPAN title='Мощность урона повышает ваш урон физическими атаками'> Звание: <IMG title=Новобранец src=http://tekken.su/img/rank/rang/0.gif> [0/0] </SPAN><BR>
<SPAN title='Мощность урона повышает ваш урон физическими атаками'> Авторитет: <B>0</B>
 </SPAN><BR><SPAN title='Мощность урона повышает ваш урон физическими атаками'> Уважение: <FONT color=gray><B>0</B></FONT></small></SPAN><BR>
<?}?>
<script>DrawBar('Репутации', 'reput1', <?if($_SESSION['reput1']==1){echo"1";}else{echo"6";}?>, '', '');</script>
<?
if($_SESSION['reput1']==1){
?>
<SPAN title='Репутация подземного воина повышает мф. увёртливости и мф. против увёртливости'><small> Подземного воина: <?
  echo "<b>$repalevel[0]</b> ($repa[0]/$repanext[0])<br>$grepa[0]"
?></small></SPAN><BR>
<?}?>
<script>DrawBar('Кнопки', 'btn', <?if($_SESSION['btn']==1){echo"1";}else{echo"6";}?>, '', '');</script>
<?
if($_SESSION['btn']==1){
?>
&nbsp;<input type="button" name="snatvso" value="Снять всё" class="btn" onClick="location.href='main.php?edit=1&undress=all';"
style="font-weight:bold;">&nbsp;
<input type="button" name="combats" value="Возврат" class="btn" onClick="location.href='main.php';"
style="font-weight:bold;width: 90px">&nbsp;
<?}?>
<? if ($user["in_tower"]<10) { ?>
<script>DrawBar('комплекты', 'comp', <?if($_SESSION['comp']==1){echo"5";}else{echo"6";}?>, 'запомнить', "javascript:okno('Сохранить комплект','main.php?edit=1','savecomplect','');");</script>
<table><small><?
if($_SESSION['comp']==1){
?>
            <?
                //Выгребаем все комплекты перса
                $Path=MEMCACHE_PATH."/komplekt/".$user['id'];
                if (file_exists($Path))
                    if ($dir = opendir($Path)) {
                        while (false !== ($file = readdir($dir))){
                            //Убираем лишние элементы
                            if ($file != "." && $file != "..") {
                                $file=substr($file,0,-4);
                                echo "<a onclick=\"if (!confirm('Вы уверены, что хотите удалить комплект?')) { return false; }\" href='main.php?edit=1&delcomplect=".urlencode($file)."'>
                                    <img src='".IMGBASE."/i/close2.gif'></a>
                                    <a href='main.php?edit=1&complect=".$file."&".time()."'>Надеть \"".$file."\"</a><BR>";
                            }
                        }
                    }
}           ?>
<? } ?>
<script>DrawBar('приёмы', 'strokes', <?if($_SESSION['strokes']==1){echo"5";}else{echo"6";}?>, 'настроить', "javascript:document.location.href='umenie.php?showstrokes=1';");</script>
<table><small><?

if (@$_GET["delstrokeset"]) {
  $_GET["delstrokeset"]=(int)$_GET["delstrokeset"];
  mq("delete from complect where id='$_GET[delstrokeset]' and user='".$_SESSION['uid']."' and type=2");
}

if (@$_GET["strokeset"]) {
  function addstroke($id_priem) {
    global $user;
    $doit=true;
    $res=mq("SELECT slot,id_thing FROM puton WHERE slot>=201 AND slot<=220 AND id_person='".$_SESSION['uid']."' order by slot");
    $j=200;
    while ($s=mysql_fetch_array($res)) {
      $j++;
      if ($s['id_thing']==$id_priem) {$doit=false;break;}
      if (!$x && $s['slot']!=$j) $x=$j; elseif (!$x && $j==210+$user["slots"]) $x=1000;
    }
    if (!$x) $x=$j+1;
    if ($doit) {
      if ($x==1000) {
        $x=210+$user["slots"];mq("UPDATE puton SET id_thing='".$id_priem."' WHERE id_person='".$_SESSION['uid']."' AND slot='".$x. "';");
      }else{
        mq("INSERT INTO puton(id_person,id_thing,slot) VALUES ('".$_SESSION['uid']."','".$id_priem."','".$x."');");
      }
    }
  }
  getadditdata($user);

  mq("delete from puton where slot>=201 and slot<=220 and id_person='".$_SESSION['uid']."'");
  $_GET["complect"]=(int)$_GET["strokeset"];
  $data=unserialize(mqfa1("select data from complect where user='$user[id]' and id='$_GET[strokeset]'"));
  foreach ($data as $k=>$v) addstroke($v);
}

if($_SESSION['strokes']==1){
  $r=mq("select * from complect where user='".$_SESSION['uid']."' and type=2 order by name");
  while ($s=mysql_fetch_array($r)) {
    $s['name']=str_replace("'","",$s["name"]);
    echo "<a onclick=\"if (!confirm('Вы уверены, что хотите удалить $s[name]?')) { return false; }\" href='main.php?edit=1&delstrokeset=$s[id]'>
    <img src='".IMGBASE."/i/close2.gif'></a> <a href='main.php?edit=1&strokeset=$s[id]'>$s[name]</a><BR>";
  }  
}           ?>
</table>
<!--<small><b>Приемы:</b><br></small>-->

</td></tr></table>
    </TD>
<!--Меню-->
    <TD valign=top>
    <IMG SRC="<?=IMGBASE?>/i/1x1.gif" WIDTH="1" HEIGHT="5" BORDER=0 ALT=""><div align=right>
    <? if($user['zver_id']!=0){print"<INPUT TYPE=\"button\" onClick=\"location.href='zver_inv.php';\" value=\"Зверь\" title=\"Зверь\">";}?>
         <INPUT TYPE="submit" name="setshadow" value="Образ" title="Образ">
         <?if($user['invis']==1){?>
    	<INPUT TYPE="submit" name="delinvis" value="Снять Невидимость" title="Снять Невидимость">
    	<?}?>
        <INPUT TYPE="button" onClick="location.href='umenie.php';" value="Умения" title="Умения">
    <INPUT TYPE="button" name="editanketa" value="Анкета" title="Анкета" onClick="window.open('register.php?edit=1', '1d', 'height=500,width=800,location=yes,menubar=yes,status=yes,toolbar=yes,scrollbars=yes')">
    <INPUT TYPE="submit" name="changepsw" value="Безопасность" title="Безопасность" style="FONT-WEIGHT: bold;">
    <INPUT TYPE="submit" name="transreport" value="Отчет о переводах" title="Отчет о переводах">
    <INPUT TYPE="button" onClick="location.href='main.php';" value="Вернуться" title="Вернуться">
    </div>
<?php

    if (@$_GET['razdel'] == '0') { $_SESSION['razdel'] = 0; }
    if (@$_GET['razdel'] == 1) { $_SESSION['razdel'] = 1; }
    if (@$_GET['razdel'] == 2) { $_SESSION['razdel'] = 2; }
    if (@$_GET['razdel'] == 3) { $_SESSION['razdel'] = 3; }
    if (@$_GET['razdel'] == 4) { $_SESSION['razdel'] = 4; }
    if (@$_GET['razdel'] == 4) { $_SESSION['razdel'] = 4; }
    if (@$_GET['razdel'] == 5) { $_SESSION['razdel'] = 5; }
    if (@$_GET['razdel'] == 6) { $_SESSION['razdel'] = 6; }
    if (@$_GET['razdel'] == 7) { $_SESSION['razdel'] = 7; }
    if (@$_GET['razdel'] == 8) { $_SESSION['razdel'] = 8; }
?>
<TABLE border=0 width=100% cellspacing="0" cellpadding="0" bgcolor="#A5A5A5">
<TR><TD>
    <TABLE border=0 width=100% cellspacing="0" cellpadding="3" bgcolor=#d4d2d2><TR>
    <TD  align=center bgcolor="<?=($_SESSION['razdel']==null)?"#A5A5A5":"#C7C7C7"?>"><A HREF="?edit=1&razdel=0">Обмундирование</A></TD>
    <TD  align=center bgcolor="<?=($_SESSION['razdel']==1)?"#A5A5A5":"#C7C7C7"?>"><A HREF="?edit=1&razdel=1">Заклятия</A></TD>
    <TD  align=center bgcolor="<?=($_SESSION['razdel']==4)?"#A5A5A5":"#C7C7C7"?>"><A HREF="?edit=1&razdel=4">Эликсиры</A></TD>
    <TD  align=center bgcolor="<?=($_SESSION['razdel']==5)?"#A5A5A5":"#C7C7C7"?>"><A HREF="?edit=1&razdel=5">Руны</A></TD>
    <TD  align=center bgcolor="<?=($_SESSION['razdel']==3)?"#A5A5A5":"#C7C7C7"?>"><A HREF="?edit=1&razdel=3">Еда</A></TD>
    <TD  align=center bgcolor="<?=($_SESSION['razdel']==6)?"#A5A5A5":"#C7C7C7"?>"><A HREF="?edit=1&razdel=6">Ресурсы</A></TD>
    <TD  align=center bgcolor="<?=($_SESSION['razdel']==2)?"#A5A5A5":"#C7C7C7"?>"><A HREF="?edit=1&razdel=2">Прочее</A></TD>
    <TD  align=center bgcolor="<?=($_SESSION['razdel']==7)?"#A5A5A5":"#C7C7C7"?>"><A HREF="?edit=1&razdel=7">Фильтр</A></TD>
    </TR></TABLE>
</TD></TR>
<TR><td>
  <table width="100%"><tr>
  <?
    if ($_SESSION['razdel']==7) echo "<TD noWrap width=\"140\">&nbsp;</td>"; 
  ?>
    <TD align=center><B>Рюкзак (масса: <?php
    $d=getweight($user);
    $gm=get_meshok();
    if ($d["weight"]>$gm) echo "<b><font color=\"red\">";
    echo $d["weight"];
    if ($d["weight"]>$gm) echo "</font></b>";
    ?>/<?=$gm?>, предметов: <?
      $bps=backpacksize();
      if ($d["cnt"]>$bps) echo "<b><font color=\"red\">";
      echo $d["cnt"];
      if ($d["cnt"]>$bps) echo "</font></b>";
    ?>/<?=$bps?>)</B></TD>
    <?
    if ($_SESSION['razdel']==7) {
      echo "<TD noWrap width=\"140\">";
      echo "<INPUT name=filter><INPUT value=\"&gt;&gt;\" type=submit name=subfilter>
      </TD>";
    }

    ?></tr></table></td>
</TR>
<TR><TD align=center><!--Рюкзак-->
<TABLE BORDER=0 WIDTH=100% CELLSPACING="1" CELLPADDING="2" BGCOLOR="#A5A5A5">
<?php
    timepassed();
    if (@$_GET["oby"]) $oby=$_GET["oby"];
    else $oby=$_SESSION["inventoryoby"];
    $_SESSION["inventoryoby"]=$oby;
    if (@$_GET["raised"]) $oby=" order by `update` desc";
    elseif ($oby=="name") $oby=" order by name ";
    elseif ($oby=="price") $oby=" order by ecost*11+cost ";
    elseif ($oby=="type") $oby=" order by type ";
    else $oby=" order by `update` desc ";

    if ($oby=="name") $oby="order by name ";
    if ($_SESSION['razdel']==null) {
      $data = mqfaa("SELECT * FROM `inventory` WHERE `owner` = '{$_SESSION['uid']}' AND `dressed` = 0 AND `type` != 'eda' AND (`type` < 25 AND `type` != 12) AND `setsale`=0 ".(incommontower($user)?" and bs='$user[in_tower]'":"")." $oby");
    }
    if ($_SESSION['razdel']==1) {
      $distNames = mqfaa("SELECT DISTINCT name FROM `inventory` WHERE `owner` = '{$_SESSION['uid']}' AND `dressed` = 0 AND (`type` = 25 OR `type` = 12) AND `setsale`=0 ".(incommontower($user)?" and bs='$user[in_tower]'":"")." $oby");
      $data = array();
      if ($distNames) {
        foreach ($distNames as $distName) {
          if ($usedItems = mqfaa("SELECT * FROM `inventory` WHERE `name` = '$distName[name]' AND duration > 0 AND `owner` = '{$_SESSION['uid']}' AND `dressed` = 0 AND (`type` = 25 OR `type` = 12) AND `setsale`=0 ".(incommontower($user)?" and bs='$user[in_tower]'":"")." $oby")) {
            foreach ($usedItems as $ui) {
              $data[] = $ui;
            }
          }
          if (mysql_num_rows(mysql_query("SELECT * FROM `inventory` WHERE `name` = '$distName[name]' AND duration = 0 AND `owner` = '{$_SESSION['uid']}' AND `dressed` = 0 AND (`type` = 25 OR `type` = 12) AND `setsale`=0 ".(incommontower($user)?" and bs='$user[in_tower]'":"")." $oby"))) {
            $data[] = mqfa("SELECT *, COUNT(*) as items_count FROM `inventory` WHERE `name` = '$distName[name]' AND duration = 0 AND `owner` = '{$_SESSION['uid']}' AND `dressed` = 0 AND (`type` = 25 OR `type` = 12) AND `setsale`=0 ".(incommontower($user)?" and bs='$user[in_tower]'":"")." $oby");
          }
        }
      }
      //$data = mqfaa("SELECT * FROM `inventory` WHERE `owner` = '{$_SESSION['uid']}' AND `dressed` = 0 AND (`type` = 25 OR `type` = 12) AND `setsale`=0 ".(incommontower($user)?" and bs='$user[in_tower]'":"")." $oby");
    }
    if ($_SESSION['razdel']==2) {
      $data = mqfaa("SELECT * FROM `inventory` WHERE `owner` = '{$_SESSION['uid']}' AND `dressed` = 0 AND (`type` >= 50 and type<>60 AND `type` != 187  AND type != 199 AND `type` != 188 AND `type` != 189 AND `type` != 190) AND `setsale`=0 ".(incommontower($user)?" and bs='$user[in_tower]'":"")." $oby");
    }
    if ($_SESSION['razdel']==3) {
      $distNames = mqfaa("SELECT DISTINCT name FROM `inventory` WHERE `owner` = '{$_SESSION['uid']}' AND `dressed` = 0 AND `type` = 49 AND `setsale`=0 ".(incommontower($user)?" and bs='$user[in_tower]'":"")." $oby");
      $data = array();
      if ($distNames) {
        foreach ($distNames as $distName) {
          if ($usedItems = mqfaa("SELECT * FROM `inventory` WHERE `name` = '$distName[name]' AND duration > 0 AND `owner` = '{$_SESSION['uid']}' AND `dressed` = 0 AND `type` = 49 AND `setsale`=0 ".(incommontower($user)?" and bs='$user[in_tower]'":"")." $oby")) {
            foreach ($usedItems as $ui) {
              $data[] = $ui;
            }
          }
          if (mysql_num_rows(mysql_query("SELECT * FROM `inventory` WHERE `name` = '$distName[name]' AND duration = 0 AND `owner` = '{$_SESSION['uid']}' AND `dressed` = 0 AND `type` = 49 AND `setsale`=0 ".(incommontower($user)?" and bs='$user[in_tower]'":"")." $oby"))) {
            $data[] = mqfa("SELECT *, COUNT(*) as items_count FROM `inventory` WHERE `name` = '$distName[name]' AND duration = 0 AND `owner` = '{$_SESSION['uid']}' AND `dressed` = 0 AND `type` = 49 AND `setsale`=0 ".(incommontower($user)?" and bs='$user[in_tower]'":"")." $oby");
          }
        }
      }
      //$data = mqfaa("SELECT * FROM `inventory` WHERE `owner` = '{$_SESSION['uid']}' AND `dressed` = 0 AND `type` = 49 AND `setsale`=0 ".(incommontower($user)?" and bs='$user[in_tower]'":"")." $oby");
    }
    if ($_SESSION['razdel']==4) {
      $distNames = mqfaa("SELECT DISTINCT name FROM `inventory` WHERE `owner` = '{$_SESSION['uid']}' AND `dressed` = 0 AND (`type` = 188 or `type` = 187) AND `setsale`=0 ".(incommontower($user)?" and bs='$user[in_tower]'":"")." $oby");
      $data = array();
      if ($distNames) {
        foreach ($distNames as $distName) {
            if ($usedItems = mqfaa("SELECT * FROM `inventory` WHERE `name` = '$distName[name]' AND (duration > 0 OR name LIKE '%Самодельный эликсир%') AND `owner` = '{$_SESSION['uid']}' AND `dressed` = 0 AND (`type` = 188 or `type` = 187) AND `setsale`=0 ".(incommontower($user)?" and bs='$user[in_tower]'":"")." $oby")) {
              foreach ($usedItems as $ui) {
                $data[] = $ui;
              }
            }
            if (mysql_num_rows(mysql_query("SELECT * FROM `inventory` WHERE `name` = '$distName[name]' AND name NOT LIKE '%Самодельный эликсир%' AND duration = 0 AND `owner` = '{$_SESSION['uid']}' AND `dressed` = 0 AND (`type` = 188 or `type` = 187) AND `setsale`=0 ".(incommontower($user)?" and bs='$user[in_tower]'":"")." $oby"))) {
              $data[] = mqfa("SELECT *, COUNT(*) as items_count FROM `inventory` WHERE `name` = '$distName[name]' AND duration = 0 AND `owner` = '{$_SESSION['uid']}' AND `dressed` = 0 AND (`type` = 188 or `type` = 187) AND `setsale`=0 ".(incommontower($user)?" and bs='$user[in_tower]'":"")." $oby");
            }
        }
      }
      //$data = mqfaa("SELECT * FROM `inventory` WHERE `owner` = '{$_SESSION['uid']}' AND `dressed` = 0 AND (`type` = 188 or `type` = 187) AND `setsale`=0 ".(incommontower($user)?" and bs='$user[in_tower]'":"")." $oby");
    }
    if ($_SESSION['razdel']==5) {

      $data = mqfaa("SELECT * FROM `inventory` WHERE `owner` = '{$_SESSION['uid']}' AND `dressed` = 0 AND (`type` = 60) AND `setsale`=0 ".(incommontower($user)?" and bs='$user[in_tower]'":"")." $oby");
    }
    if ($_SESSION['razdel']==6) {
      $data = mqfaa("SELECT * FROM `inventory` WHERE `owner` = '{$_SESSION['uid']}' AND `dressed` = 0 AND (type=189 or type=190) AND `setsale`=0 ".(incommontower($user)?" and bs='$user[in_tower]'":"")." $oby");
    }
    if ($_SESSION['razdel']==7) {
      if ($_REQUEST[filter]) $data = mqfaa("SELECT * FROM `inventory` WHERE `owner` = '{$_SESSION['uid']}' AND `dressed` = 0 AND `setsale`=0 ".(incommontower($user)?" and bs='$user[in_tower]'":"")." and name like '%$_REQUEST[filter]%' $oby");
      else $data=false;
    }
    if ($_SESSION['razdel']==8) {
        $data = mqfaa("SELECT * FROM `inventory` WHERE `owner` = '{$_SESSION['uid']}' AND `dressed` = 0 AND `setsale`=0 ".(incommontower($user)?" and bs='$user[in_tower]'":"")." and id in (select item from favorites where user='$user[id]')");
    }
    if ($data) {
      foreach ($data as $item_to_show) {
        showitem($item_to_show,"edit=1&razdel=$_SESSION[razdel]".(@$_REQUEST["filter"]?"&filter=$_REQUEST[filter]":""));  
      }
    }
    if ($_SERVER["REMOTE_ADDR"]=="127.0.0.1") {
      timepassed();
      echo "<br>Queries: $queriescnt <a href=\"javascript:void(0)\" onclick=\"document.getElementById('querylog').style.display='';\">Show</a><br>
      <div style=\"display:none\" id=\"querylog\">$querylog</div>";
    }
    if ($data === false) echo "<tr><td align=center bgcolor=#e2e0e0>Для поиска предметов введите название или часть названия в поле поиска вверху.</td></tr>";
    if (count($data) === 0) {
      echo "<tr><td align=center bgcolor=#e2e0e0>";
      if ($_SESSION['razdel']==8) echo "У вас нет избранных предметов. Чтобы добавить предмет в избранное, нажмите кнопку <img src=\"".IMGBASE."/i/misc/qlaunch/add_itm2.gif\"> под картинкой предмета.";
      else echo "ПУСТО";
      echo "</td></tr>";
    }
?>


<TABLE width="100%">
<TBODY>
<TR>
<TD align=left>Выровнять по <INPUT onclick='window.location="/main.php?edit=1&oby=name"' value=названию type=button name=dropflowers> <INPUT onclick='window.location="/main.php?edit=1&oby=price"' value=цене type=button> <INPUT onclick='window.location="/main.php?edit=1&oby=type"' value=типу type=button>
<? if ($oby!=" order by `update` desc ") echo "<INPUT onclick='window.location=\"/main.php?edit=1&oby=lastupdate\"' value=\"отменить\" type=button name=dropflowers>"; ?> </td>
<TD align=right><INPUT value="Выбросить хлам" type=button></TD></TR></TBODY></TABLE>
</TABLE>
</TD></TR>
</TABLE>

    </TD>
    </FORM>
</TR>
</TABLE>
<?php
    if ($errkom==1){
        ?>
        <script language="javaScript">okno('Сохранить комплект','main.php?edit=1','savecomplect','<?=$_POST['savecomplect']?>',1)</script>
        <?php
    }
?>
<?php include("mail_ru.php"); ?>
</BODY>

</HTML>
<?php
        die();
    }
    //==========================================================================================================
    if (@$_GET['use']) {
      if(mqfa1("select sleep from obshaga where pers='$user[id]'")) {
        $f=fopen("logs/cheaters.txt", "ab+");
        fwrite($f,date("Y-m-d H:i")." $_SERVER[REMOTE_ADDR] $_SESSION[uid] => $user[login]\r\n");
        fclose($f);
      } else {
        ob_start();
        usemagic($_GET['use'],$_POST['target']);
        $warning=strip_tags(ob_get_clean());
      }
    }
    if ($warning) $extraparams.="&warning=".urlencode($warning);
    if ($user['room'] == 20 || $user['room'] == 45 || $user['room'] == 49 || $user['room'] == 54 || $user['room'] == 70) { header('Location: city.php?'.$extraparams); die(); }
    if ($user['room'] == 55) { header('Location: underground.php?'.$extraparams); die(); }
    if ($user['room'] == 21) { header('Location: city.php?'.$extraparams); die(); }
    if ($user['room'] == 22 || $user['room'] == 59) { header('Location: shop.php?'.$extraparams); die(); }
    if ($user['room'] == 23) { header('Location: repair.php?'.$extraparams); die(); }
    if ($user['room'] == 24 || $user['room'] == 46) { header('Location: elka.php?'.$extraparams); die(); }
    if ($user['room'] == 26) { header('Location: city.php?'.$extraparams); die(); }
    if ($user['room'] == 25) { header('Location: comission.php?'.$extraparams); die(); }
    if ($user['room'] == 29) { header('Location: bank.php?'.$extraparams); die(); }
    if ($user['room'] == 34) { header('Location: fshop.php?'.$extraparams); die(); }
    if ($user['room'] == 28) { header('Location: klanedit.php?'.$extraparams); die(); }
    if ($user['room'] == 27) { header('Location: post.php?'.$extraparams); die(); }
    if ($user['room'] == 31) { header('Location: tower.php?'.$extraparams); die(); }
    if ($user['room'] == 35) { header('Location: berezka.php?'.$extraparams); die(); }
    if ($user['room'] >= 37 AND $user['room'] <= 41) { header('Location: shop.php?'.$extraparams); die(); }
    if ($user['room'] == 42) { header('Location: auction.php?'.$extraparams); die(); }
    if ($user['room'] == 43) { header('Location: znahar.php?'.$extraparams); die(); }
    if ($user['room'] == 44) { header('Location: daemons.php?'.$extraparams); die(); }
    if ($user['room'] == 80) { header('Location: circle.php?'.$extraparams); die(); }
    if ($user['room'] == 81) { header('Location: boulder.php?'.$extraparams); die(); }
    if ($user['room'] == 101 || $user['room'] == 102 || $user['room'] == 103 || $user['room'] == 104 || $user['room'] == 105) { header('Location: obshaga.php?'.$extraparams); die(); }
    if ($user['room'] == 200) { header('Location: tournir.php?'.$extraparams); die(); }
    if ($user['room'] == 201) { header('Location: harem.php?'.$extraparams); die(); }
    if ($user['room'] == 401) { header('Location: hell.php?'.$extraparams); die(); }
    if ($user['room'] == 406) { header('Location: g-vxod.php?'.$extraparams); die(); }
    if ($user['room'] == 407) { header('Location: g-canalizaciya.php?'.$extraparams); die(); }
    if ($user['room'] == 502) { header('Location: p-vxodd.php?'.$extraparams); die(); }
    if ($user['room'] == 503) { header('Location: p-canalizaciya.php?'.$extraparams); die(); }

    if ($user['room'] == 2005) { header('Location: station.php'.$extraparams); die(); }
    if ($user['room'] == 11111) { header('Location: fontan.php'.$extraparams); die(); }
    if ($user['room'] == 1300) { header('Location: statue.php'.$extraparams); die(); }
    if ($user['room'] == 457) { header('Location: trjasina_vxod.php?'.$extraparams); die(); }
    if ($user['room'] == 7777) { header('Location: lottery.php?'.$extraparams); die(); }
    if ($user['room'] == 9000) { header('Location: city.php?'.$extraparams); die(); }
	if ($user['room'] == 9001) { header('Location: zn_tower.php?'.$extraparams); die(); }
	if ($user['room'] == 9002) { header('Location: zn_tower2.php?'.$extraparams); die(); }
    if ($user['room'] == 2222) { header('Location: church.php?'.$extraparams); die(); }
	if ($user['room'] == 227) { header('Location: shopvip.php?'.$extraparams); die(); }
	if ($user['room'] == 2002) { header('Location: hellround.php?'.$extraparams); die(); }
    if ($user['room'] == 95) { header('Location: shopard.php?'.$extraparams); die(); }

    if (in_array($user['room'],$canalenters)) { header('Location: vxod.php?'.$extraparams); die(); }
    if (in_array($user['room'],$battleenters)) { header('Location: battleenter.php?'.$extraparams); die(); }
    if (in_array($user['room'],$battlefields)) { header('Location: field.php?'.$extraparams); die(); }
    if (in_array($user['room'],$canalrooms)) { header('Location: canalizaciya.php?'.$extraparams); die(); }
    if (in_array($user['room'],$caverooms)) { header('Location: cave.php?'.$extraparams); die(); }
    if ($user['room'] == 53) { header('Location: portal.php?'.$extraparams); die(); }
	if ($user['room'] == 58) { header('Location: pklad.php?'.$extraparams); die(); }
    if ($user['room'] == 404) { header('Location: shop_luka.php?'.$extraparams); die(); }
    if ($user['lab'] == 1) { header('Location: lab.php?'.$extraparams); die(); }
    if ($user['room'] == 666) { header('Location: jail.php?'.$extraparams); die(); }
    if ($user['room'] == 667) { header('Location: bar.php?'.$extraparams); die(); }
    if ($user['room'] == 668) { header('Location: zoo.php?'.$extraparams); die(); }
    if ($user['room'] == 777) { header('Location: obshaga.php?'.$extraparams); die(); }
    if ($user['room'] >= 501 AND $user['room'] <= 560) { header('Location: towerin.php?'.$extraparams); die(); }
    if ($user['room'] >= 700 AND $user['room'] <= 799) { header('Location: castle.php?'.$extraparams); die(); }
    //БС
    if ($user['in_tower']==1 || $user['in_tower']==2) { header('Location: towerin.php?'.$extraparams); die(); }
?>
<HTML><HEAD>
<link rel=stylesheet type="text/css" href="<?=IMGBASE?>/i/main.css">
<link href="<?=IMGBASE?>/i/move/design6.css" rel="stylesheet" type="text/css">
<meta content="text/html; charset=windows-1251" http-equiv=Content-type>
<META Http-Equiv=Cache-Control Content="no-cache, max-age=0, must-revalidate, no-store">
<meta http-equiv=PRAGMA content=NO-CACHE>
<META Http-Equiv=Expires Content=0>


<script>
function fullfastshow(a,b,c,d,e,f){if(typeof b=="string")b=a.getElementById(b);var g=c.srcElement?c.srcElement:c,h=g;c=g.offsetLeft;for(var j=g.offsetTop;h.offsetParent&&h.offsetParent!=a.body;){h=h.offsetParent;c+=h.offsetLeft;j+=h.offsetTop;if(h.scrollTop)j-=h.scrollTop;if(h.scrollLeft)c-=h.scrollLeft}if(d!=""&&b.style.visibility!="visible"){b.innerHTML="<small>"+d+"</small>";if(e){b.style.width=e;b.whiteSpace=""}else{b.whiteSpace="nowrap";b.style.width="auto"}if(f)b.style.height=f}d=c+g.offsetWidth+10;e=j+5;if(d+b.offsetWidth+3>a.body.clientWidth+a.body.scrollLeft){d=c-b.offsetWidth-5;if(d<0)d=0}if(e+b.offsetHeight+3>a.body.clientHeight+a.body.scrollTop){e=a.body.clientHeight+ +a.body.scrollTop-b.offsetHeight-3;if(e<0)e=0}b.style.left=d+"px";b.style.top=e+"px";if(b.style.visibility!="visible")b.style.visibility="visible"}function fullhideshow(a){if(typeof a=="string")a=document.getElementById(a);a.style.visibility="hidden";a.style.left=a.style.top="-9999px"}

function gfastshow(dsc, dx, dy) { fullfastshow(document, mmoves3, window.event, dsc, dx, dy); }
function ghideshow() { fullhideshow(mmoves3); }


var Hint3Name = '';
// Заголовок, название скрипта, имя поля с логином
function findlogin(title, script, name){
    document.all("hint3").innerHTML = '<table width=100% cellspacing=1 cellpadding=0 bgcolor=CCC3AA><tr><td align=center><B>'+title+'</td><td width=20 align=right valign=top style="cursor: pointer" onclick="closehint3();"><BIG><B>x</td></tr><tr><td colspan=2>'+
    '<table width=100% cellspacing=0 cellpadding=2 bgcolor=FFF6DD><tr><form action="'+script+'" method=POST><INPUT TYPE=hidden name=sd4 value="6"><td colspan=2>'+
    'Укажите логин персонажа:<small><BR>(можно щелкнуть по логину в чате)</TD></TR><TR><TD width=50% align=right><INPUT TYPE=text id="'+name+'" NAME="'+name+'"></TD><TD width=50%><INPUT TYPE="submit" value=" »» "></TD></TR></FORM></TABLE></td></tr></table>';
    document.getElementById("hint3").style.visibility = "visible";
    document.getElementById("hint3").style.left = 200;
    document.getElementById("hint3").style.top = 100;
    document.getElementById(name).focus();
    Hint3Name = name;
}
// Заголовок, название скрипта, имя поля с шмоткой
function okno(title, script, name,coma){
    var errkom='';
    //if (coma!='') errkom='Нельзя использовать символы: /\:*?"<>|<br>';
    document.all("hint3").innerHTML = '<table width=100% cellspacing=1 cellpadding=0 bgcolor=CCC3AA><tr><td align=center><B>'+title+'</td><td width=20 align=right valign=top style="cursor: pointer" onclick="closehint3();"><BIG><B>x</td></tr><tr><td colspan=2>'+
    '<form action="'+script+'" method=POST><table width=100% cellspacing=0 cellpadding=2 bgcolor=FFF6DD><tr><INPUT TYPE=hidden name=sd4 value="6"><td colspan=2><font color=red>'+
    errkom+'</font>введите название предмета</TD></TR><TR><TD width=50% align=right><INPUT TYPE=text id="'+name+'" NAME="'+name+'"></TD><TD width=50%><INPUT TYPE="submit" value=" »» "></TD></TR></TABLE></FORM></td></tr></table>';
    document.getElementById("hint3").style.visibility = "visible";
    document.getElementById("hint3").style.left = 200;
    document.getElementById("hint3").style.top = 100;
    document.getElementById(name).focus();
    Hint3Name = name;
}
function note(title, script, name,coma,errk){
    var errkom=''; var com='';
    if (errk==1) { errkom='Нельзя использовать символы: /\:*?"<>|+%<br>'; com=coma}
    document.all("hint3").innerHTML = '<table width=100% cellspacing=1 cellpadding=0 bgcolor=CCC3AA><tr><td align=center><B>'+title+'</td><td width=20 align=right valign=top style="cursor: pointer" onclick="closehint3();"><BIG><B>x</td></tr><tr><td colspan=2>'+
    '<form action="'+script+'" method=POST><table width=100% cellspacing=0 cellpadding=2 bgcolor=FFF6DD><tr><INPUT TYPE=hidden name=sd4 value="6"><td colspan=2><font color=red>'+
    errkom+'</font>Введите текст</TD></TR><TR><TD width=50% align=right><INPUT TYPE=text id="'+name+'" NAME="'+name+'" value="'+com+'"></TD><TD width=50%><INPUT TYPE="submit" value=" »» "></TD></TR></TABLE></FORM></td></tr></table>';
    document.getElementById("hint3").style.visibility = "visible";
    document.getElementById("hint3").style.left = 200;
    document.getElementById("hint3").style.top = 60;
    document.getElementById(name).focus();
    Hint3Name = name;
}
function closehint3(){
    document.getElementById("hint3").style.visibility="hidden";
    Hint3Name='';
}
</script>
<script>
            //function refreshPeriodic()
            //{
            //  location.href='main.php';//reload();
            //  timerID=setTimeout("refreshPeriodic()",30000);
            //}
            //timerID=setTimeout("refreshPeriodic()",30000);
</script>


</HEAD>
<?
  include "roomobjects.php";
?>
<body leftmargin=0 topmargin=0 marginwidth=0 marginheight=0 bgcolor=#e2e0e0 onLoad="<? echo topsethp(); ?>">
<div id="mmoves3" style="background-color:#FFFFCC; visibility:hidden; z-index: 101; overflow:visible; position:absolute; border-color:#666666; border-style:solid; border-width: 1px; padding: 2px;"></div>
<?php
    if (@$report) echo "<div align=right><font color=red><b>$report</b></font></div>";
    if (@$_GET['goto']) {
      $mt=canmove(10);
      if (!$mt) $_GET['gotto'] =0;
    }

        $online = mq("select id from `online`  WHERE `real_time` >= ".(time()-60).";");
        //$vsego_u = mqfa1("select count(id) from `allusers`");
?>
<div id=hint3 class=ahint></div>
<TABLE width=100% cellspacing=0 cellpadding=0>
<TR>
    <TD valign=top align=left width=250>
        <?=showpersout($_SESSION['uid'])?>
    </TD>

    <FORM METHOD=GET ACTION="main.php">
    <TD valign=top align=right>
    <IMG SRC=<?=IMGBASE?>/i/1x1.gif WIDTH=1 HEIGHT=5><BR>

<script language="javascript" type="text/javascript">

function hideshow(){document.getElementById("mmoves").style.visibility="hidden"}
function fastshow(a){var b=document.getElementById("mmoves"),d=window.event.srcElement;if(a!=""&&b.style.visibility!="visible")b.innerHTML="<small>"+a+"</small>";a=window.event.clientY+document.documentElement.scrollTop+document.body.scrollTop+5;b.style.left=window.event.clientX+document.documentElement.scrollLeft+document.body.scrollLeft+3+"px";b.style.top=a+"px";if(b.style.visibility!="visible")b.style.visibility="visible"}

</script>

<script language="javascript" type="text/javascript">
var solo_store;
function solo(n, name, instant) {
if (instant!="" || check_access()==true) {
if(n!='o6'){
window.location.href = '?got=1&room'+n+'=1&rnd='+Math.random();
}else{
window.location.href = '?goto=plo&rnd='+Math.random();
}
} else if (name && n) {
solo_store = n;
var add_text = (document.getElementById('add_text') || document.createElement('div'));
add_text.id = 'add_text';
add_text.innerHTML = 'Вы перейдете в: <strong>' + name +'</strong> (<a href="#" onclick="return clear_solo();">отмена</a>)';
document.getElementById('gotohint').appendChild(add_text);
//document.getElementById('ione').parentNode.parentNode.nextSibling.firstChild.appendChild(add_text);
//ch_counter_color('red');
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
if( im.filters ) im.filters.Glow.Enabled=true;
else im.style.MozOpacity=0.7;
if ( from_map == false && im.id.match(/mo_(\d)/) && document.getElementById('b' + im.id)) {
from_map = true;
if( document.getElementById('b' + im.id).runtimeStyle )
document.getElementById('b' + im.id).runtimeStyle.color = '#666666';
from_map = false;
}
}
function imout(im) {
if( im.filters ) im.filters.Glow.Enabled=false;
else im.style.MozOpacity=1;
if ( from_map == false && im.id.match(/mo_(\d)/) && document.getElementById('b' + im.id)) {
from_map = true;
if( document.getElementById('b' + im.id).runtimeStyle )
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


</script>
<style type="text/css">
img.aFilter { filter:Glow(color=#DDDDDD,Strength=2,Enabled=0); cursor:hand }
hr { height: 1px; }
</style>

<table  border="0" cellpadding="0" cellspacing="0">
<tr align="right" valign="top">
<td>
<?

$vst=movebar();
if($user['room']==1) {
  echo echoroom(array(
  roomobject(47,120, "i/rooms/arrow-left.gif", "Комната Перехода",2,array(72,134)),
  roomobject(264,106, "i/rooms/map_zal2.gif", "Комната Новичков",1,array(72,134)),
//  roomobject(81,102, "i/rooms/2_leftdoor.gif", "Зал воинов 2", 6,array(44,66)),
  roomobject(349,139, "i/rooms/fl1.gif?1", "Вы находитесь в Комнате новичков",1,array(16,18)),
  //roomobject(-80,30, "i/rooms/1_pot.gif", "Елексир Смелости",0,array(25,48),"main.php?drink=1"),
  //roomobject(-100,120, "i/rooms/1_chair.gif", "Елексир Разума",0,array(83,107),"main.php?sit=1"),
//  roomobject(350,20, "i/rooms/1_kinght.gif", "Наставник",0,array(152,241),"dialog.php?char=3")
  ));
?>
<div id="gotohint"></div>
<div align="right" style="text-align:justify; width:100%; padding: 3px;"><small>Старый Бойцовский Клуб приветствует Вас, <B><? echo $user['login'];?></B>.<BR>
<? if($user['stats']>0){?>Чтобы сражаться с остальными на равных, вам нужно распределить начальные характеристики.<BR>
Для этого нажмите на <A href='/umenie.php'>Способности</A>, а затем, нажимая на <IMG SRC="<?=IMGBASE?>/i/up.gif" WIDTH=11 HEIGHT=11>, сформируйте своего персонажа.<BR>
Распределив все характеристики нажмите на кнопку <INPUT type=button value='Вернуться' style="font-weight:bold; border: 1px double #9a9996;font-size: 12px;color: #dfdfdf;background-color:#504F4C;"><BR>
Подробнее о значении характеристик можно узнать у <a href='dialog.php?char=3'>Наставника</A>.<BR>
<?}?>
Для проведения боя нажмите на кнопку <INPUT type='button' onClick="document.location.href='zayavka.php?level=begin'" value='Поединки' style="font-weight:bold; border: 1px double #9a9996;font-size: 12px;color: #dfdfdf;background-color:#504F4C;"><BR>
Выберите раздел "1 на 1".<BR>
Более подробно о поединках и других аспектах игры можно узнать у <a href='dialog.php?char=3'>Наставника</A><BR>
</small></div>
</td>
<td>
<div style="visibility:hidden; height:15px " id="moveto">0</div>
</td>
</tr>
</table>
<?
}
if($user['room']==2) {
  echo echoroom(array(
  roomobject(264,106, "i/rooms/2_rightdoor.gif", "Комната Новичков",1,array(44,66)),
  roomobject(47,120, "i/rooms/arrow-left.gif", "Комната Перехода",2,array(72,134)),
  roomobject(165,100, "i/rooms/fl1.gif?1", "Вы находитесь в Комнате переходов",2,array(16,18)),
  roomobject(81,102, "i/rooms/2_leftdoor.gif", "Зал воинов 2", 6,array(44,66))
  ));
?>
<div align="right" style="text-align:justify; width:100%; padding: 3px;">
<small>Последний рубеж детства. Впереди шумные залы воинов, сзади тихая, спокойная комната новичков.</small></div>
<div id="gotohint"></div>
</td>
<td>
<div style="visibility:hidden; height:15px " id="moveto">0</div>
</td>
</tr>
</table>
<?
}
if($user['room']==6) {
  echo echoroom(array(
    roomobject(184,94, "i/rooms/5_door.gif", "Бойцовский Клуб",3,array(44,80)),
  roomobject(380,147, "i/rooms/fl1.gif?1", "Вы находитесь в Зале Воинов 2",5,array(16,18)),
  roomobject(116,41, "i/rooms/3_stairway.gif?1", $rooms[11],11,array(159,160)),
  roomobject(52,47, "i/rooms/3_buduar.gif?1", $rooms[19],19,array(77,138)),
  roomobject(59,169, "i/rooms/3_hall1.gif?1", $rooms[5],5,array(74,126)),
  roomobject(312,168, "i/rooms/3_hall2.gif?1", $rooms[6],6,array(66,132)),
  roomobject(312,48, "i/rooms/3_hall3.gif?1", $rooms[7],7,array(90,136)),
  roomobject(64,114, "i/rooms/3_dungeon.gif?1", $rooms[4],4,array(45,70)),
  roomobject(196,148, "i/rooms/3_square.gif?1", $rooms[20],20,array(45,70)),
  //roomobject(350,68, "i/rooms/6_knight.gif?1", "Воительница",0, array(120,220),"dialog.php?char=4"),
  ),"3_bg.gif?1");
?>

<div align="right" style="text-align:justify; width:100%; padding: 3px;">
<small>Если вы пришли сюда не за завтраком, обедом или ужином, то может быть вы ошиблись этажом?</small></div>
<div id="gotohint"></div>
</td>
<td>
<div style="visibility:hidden; height:15px " id="moveto">0</div>
</td>
</tr>
</table>

<?
}
if($user['room']==3) {

  echo echoroom(array(          
  roomobject(184,94, "i/rooms/5_door.gif", "Бойцовский Клуб",3,array(44,80)),
  roomobject(245,125, "i/rooms/fl1.gif?1", "Вы находитесь в Бойцовском Клубе",3,array(16,18)),  
  roomobject(116,41, "i/rooms/3_stairway.gif?1", $rooms[11],11,array(159,160)),
  roomobject(52,47, "i/rooms/3_buduar.gif?1", $rooms[19],19,array(77,138)),
  roomobject(59,169, "i/rooms/3_hall1.gif?1", $rooms[5],5,array(74,126)),
  roomobject(312,168, "i/rooms/3_hall2.gif?1", $rooms[6],6,array(66,132)),
  roomobject(312,48, "i/rooms/3_hall3.gif?1", $rooms[7],7,array(90,136)),
  roomobject(64,114, "i/rooms/3_dungeon.gif?1", $rooms[4],4,array(45,70)),
  roomobject(196,148, "i/rooms/3_square.gif?1", $rooms[20],20,array(45,70)),
  ),"",500,240);
?>
 <div align=left><small>Благородный дон желает стоять как столб посреди комнаты, и пугать своим видом новичков, или все-таки поднимется на второй этаж, где творятся настоящие дела?</small></div>
 <div id="gotohint"></div>
</td>
<td>
<div style="visibility:hidden; height:15px " id="moveto">0</div>
</td>
</tr>
</table>
<?
}
if($user['room']==5) {
  echo echoroom(array(
  roomobject(184,94, "i/rooms/5_door.gif", "Бойцовский Клуб",3,array(44,80)),
  roomobject(117,147, "i/rooms/fl1.gif?1", "Вы находитесь в Зале Воинов 1",5,array(16,18)),
  roomobject(116,41, "i/rooms/3_stairway.gif?1", $rooms[11],11,array(159,160)),
  roomobject(52,47, "i/rooms/3_buduar.gif?1", $rooms[19],19,array(77,138)),
  roomobject(59,169, "i/rooms/3_hall1.gif?1", $rooms[5],5,array(74,126)),
  roomobject(312,168, "i/rooms/3_hall2.gif?1", $rooms[6],6,array(66,132)),
  roomobject(312,48, "i/rooms/3_hall3.gif?1", $rooms[7],7,array(90,136)),
  roomobject(64,114, "i/rooms/3_dungeon.gif?1", $rooms[4],4,array(45,70)),
  roomobject(196,148, "i/rooms/3_square.gif?1", $rooms[20],20,array(45,70))
  ), "3_bg.gif");
?>
<div align=left><small>Возможно, вы ошиблись этажом - настоящие сражения проходят выше.</small></div>
<div id="gotohint"></div>
</td>
<td>
<div style="visibility:hidden; height:15px " id="moveto">0</div>
</td>
</tr>
</table>
<?
}
if($user['room']==7) {
  echo echoroom(array(
  roomobject(184,94, "i/rooms/5_door.gif", "Бойцовский Клуб",3,array(44,80)),
  roomobject(380,75, "i/rooms/fl1.gif?1", "Вы находитесь в Зале Воинов 3",5,array(16,18)),
  roomobject(116,41, "i/rooms/3_stairway.gif?1", $rooms[11],11,array(159,160)),
  roomobject(52,47, "i/rooms/3_buduar.gif?1", $rooms[19],19,array(77,138)),
  roomobject(59,169, "i/rooms/3_hall1.gif?1", $rooms[5],5,array(74,126)),
  roomobject(312,168, "i/rooms/3_hall2.gif?1", $rooms[6],6,array(66,132)),
  roomobject(312,48, "i/rooms/3_hall3.gif?1", $rooms[7],7,array(90,136)),
  roomobject(64,114, "i/rooms/3_dungeon.gif?1", $rooms[4],4,array(45,70)),
  roomobject(196,148, "i/rooms/3_square.gif?1", $rooms[20],20,array(45,70)),
  ), "3_bg.gif");
?>
 <div align=left><small>Если вы пришли сюда не за завтраком, обедом или ужином, то может быть вы ошиблись этажом?</small></div>
<div id="gotohint"></div>
</td>
<td>
<div style="visibility:hidden; height:0px " id="moveto">0</div>
</td>
</tr>
</table>
<?
}
if($user['room']==19) {
  echo echoroom(array(
  roomobject(184,94, "i/rooms/5_door.gif", "Бойцовский Клуб",3,array(44,80)),
  roomobject(110,75, "i/rooms/fl1.gif?1", "Вы находитесь в Будуаре",5,array(16,18)),
  roomobject(116,41, "i/rooms/3_stairway.gif?1", $rooms[11],11,array(159,160)),
  roomobject(52,47, "i/rooms/3_buduar.gif?1", $rooms[19],19,array(77,138)),
  roomobject(59,169, "i/rooms/3_hall1.gif?1", $rooms[5],5,array(74,126)),
  roomobject(312,168, "i/rooms/3_hall2.gif?1", $rooms[6],6,array(66,132)),
  roomobject(312,48, "i/rooms/3_hall3.gif?1", $rooms[7],7,array(90,136)),
  roomobject(64,114, "i/rooms/3_dungeon.gif?1", $rooms[4],4,array(45,70)),
  roomobject(196,148, "i/rooms/3_square.gif?1", $rooms[20],20,array(45,70)),
  ), "3_bg.gif");
?>
 <div align=left><small>Если вы пришли сюда не за завтраком, обедом или ужином, то может быть вы ошиблись этажом?</small></div>
<div id="gotohint"></div>
</td>
<td>
<div style="visibility:hidden; height:0px " id="moveto">0</div>
</td>
</tr>
</table>
<?
}
if($user['room']==4) {
?>
<table cellpadding="0" cellspacing="0" border="0" width="1"><tr><td>
<div style="position:relative; cursor: pointer;" id="ione"><img src="<?=IMGBASE?>/i/images/300x225/club/navig1.jpg" id="img_ione" width=500 height=240 alt="" border="1"/>



<div style="position:absolute; left:52px; top:47px; width:123px; height:32px; z-index:90;"><img src="<?=IMGBASE?>/i/images/subimages/map_zalu4.gif" width="123" height="32" alt="" class="aFilter" onMouseOver="imover(this)" onMouseOut="imout(this); "  id="mo_1.100.1.9" onClick="solo('15','Зал Паладинов', '')"  /></div>

<div style="position:absolute; left:17px; top:122px; width:78px; height:33px; z-index:90;"><img src="<?=IMGBASE?>/i/images/subimages/map_zalu3.gif" width="78" height="33" alt="Вход через Зал Паладинов" class="aFilter" onMouseOver="imover(this)" onMouseOut="imout(this);" onClick="alert('Вход через Зал Паладинов')"  /></div>

<div style="position:absolute; left:393px; top:170px; width:100px; height:35px; z-index:90;"><img src="<?=IMGBASE?>/i/images/subimages/map_zalu7.gif" width="100" height="35" alt="" class="aFilter" onMouseOver="imover(this)" onMouseOut="imout(this);"  id="mo_1.100.1.9" onClick="solo('3','Бойцовский клуб', '')"  /></div>

<div style="position:absolute; left:78px; top:24px; width:76px; height:18px; z-index:90;"><img src="<?=IMGBASE?>/i/images/subimages/map_zalu6.gif" width="76" height="18" alt="Вход через Зал Паладинов" class="aFilter" onMouseOver="imover(this)" onMouseOut="imout(this);" onClick="alert('Вход через Зал Паладинов')"  /></div>

<div style="position:absolute; left:354px; top:115px; width:120px; height:35px; z-index:90;"><img src="<?=IMGBASE?>/i/images/subimages/map_halls1.gif" width="120" height="35" alt="" onClick=""  /></div>

<div style="position:absolute; left:337px; top:117px; width:16px; height:18px; z-index:90;"><img src="<?=IMGBASE?>/i/images/subimages/fl1.gif" width="16" height="18" alt="Вы находитесь в Подземелье" onClick=""  /></div>
 <?=$vst?>

<tr><td align="right"><div align="right" id="btransfers"><table cellpadding="0" cellspacing="0" border="0" id="bmoveto">
<tr><td bgcolor="#D3D3D3">
</td>
</tr>
</table></div></td></tr>
</table>
 <div align=left><small>И суровый паладин, и коварный служитель Тьмы, и равнодушный нейтрал – все вынуждены встречаться на этом пятачке ничейной земли, перед тем как разойтись по своим залам. И только искреннее дружелюбие бойцов разных склонностей помогает избежать бойни в этом месте. А также отсутствие бесплатных нападений.</small></div>
<div id="gotohint"></div>

</td>
<td>
<div style="visibility:hidden; height:0px " id="moveto">0</div>
</td>
</tr>
</table>
<?
}
if($user['room']==15) {
?>
<table cellpadding="0" cellspacing="0" border="0" width="1"><tr><td>
<div style="position:relative; cursor: pointer;" id="ione"><img src="<?=IMGBASE?>/i/images/300x225/club/navig1.jpg" id="img_ione" width=500 height=240 alt="" border="1"/>



<div style="position:absolute; left:52px; top:47px; width:123px; height:32px; z-index:90;"><img src="<?=IMGBASE?>/i/images/subimages/map_zalu4.gif" width="123" height="32" alt="" onClick=""   /></div>

<div style="position:absolute; left:17px; top:122px; width:78px; height:33px; z-index:90;"><img src="<?=IMGBASE?>/i/images/subimages/map_zalu3.gif" width="78" height="33" alt="" class="aFilter" onMouseOver="imover(this)" onMouseOut="imout(this); " id="mo_1.100.1.9" onClick="solo('16','Совет Белого Братства', '')" /></div>

<div style="position:absolute; left:393px; top:170px; width:100px; height:35px; z-index:90;"><img src="<?=IMGBASE?>/i/images/subimages/map_zalu7.gif" width="100" height="35" alt="" class="aFilter" onMouseOver="imover(this)" onMouseOut="imout(this);"  onclick="alert('Выход через Подземелье')"  /></div>

<div style="position:absolute; left:78px; top:24px; width:76px; height:18px; z-index:90;"><img src="<?=IMGBASE?>/i/images/subimages/map_zalu6.gif" width="76" height="18" alt="" class="aFilter" onMouseOver="imover(this)" onMouseOut="imout(this); "  id="mo_1.100.1.9" onClick="solo('1','Комната для новичков', '')" /></div>

<div style="position:absolute; left:354px; top:115px; width:120px; height:35px; z-index:90;"><img src="<?=IMGBASE?>/i/images/subimages/map_halls1.gif" width="120" height="35" alt="" class="aFilter" onMouseOver="imover(this)" onMouseOut="imout(this); "  id="mo_1.100.1.9" onClick="solo('4','Подземелье', '')" /></div>

<div style="position:absolute; left:110px; top:73px; width:16px; height:18px; z-index:90;"><img src="<?=IMGBASE?>/i/images/subimages/fl1.gif" width="16" height="18" alt="Вы находитесь в Зале Паладинов" onClick=""  /></div>
  <?=$vst?>

<tr><td align="right"><div align="right" id="btransfers"><table cellpadding="0" cellspacing="0" border="0" id="bmoveto">
<tr><td bgcolor="#D3D3D3">
</td>
</tr>
</table></div></td></tr>
</table>
<div id="gotohint"></div>
</td>
<td>
<div style="visibility:hidden; height:0px " id="moveto">0</div>
</td>
</tr>
</table>
<?
}
if($user['room']==16) {
?>
<table cellpadding="0" cellspacing="0" border="0" width="1"><tr><td>
<div style="position:relative; cursor: pointer;" id="ione"><img src="<?=IMGBASE?>/i/images/300x225/club/navig1.jpg" id="img_ione" width=500 height=240 alt="" border="1"/>



<div style="position:absolute; left:52px; top:47px; width:123px; height:32px; z-index:90;"><img src="<?=IMGBASE?>/i/images/subimages/map_zalu4.gif" width="123" height="32" alt="" class="aFilter" onMouseOver="imover(this)" onMouseOut="imout(this);"  id="mo_1.100.1.9" onClick="solo('15','Зал Паладинов', '')" /></div>

<div style="position:absolute; left:17px; top:122px; width:78px; height:33px; z-index:90;"><img src="<?=IMGBASE?>/i/images/subimages/map_zalu3.gif" width="78" height="33" alt=""   onclick=""  /></div>

<div style="position:absolute; left:393px; top:170px; width:100px; height:35px; z-index:90;"><img src="<?=IMGBASE?>/i/images/subimages/map_zalu7.gif" width="100" height="35" alt="Вход через Зал Паладинов" class="aFilter" onMouseOver="imover(this)" onMouseOut="imout(this);" onClick="alert('Вход через Зал Паладинов')"  /></div>

<div style="position:absolute; left:78px; top:24px; width:76px; height:18px; z-index:90;"><img src="<?=IMGBASE?>/i/images/subimages/map_zalu6.gif" width="76" height="18" alt="Вход через Зал Паладинов" class="aFilter" onMouseOver="imover(this)" onMouseOut="imout(this);" onClick="alert('Вход через Зал Паладинов')"  /></div>

<div style="position:absolute; left:354px; top:115px; width:120px; height:35px; z-index:90;"><img src="<?=IMGBASE?>/i/images/subimages/map_halls1.gif" width="120" height="35" alt="Вход через Зал Паладинов" class="aFilter" onMouseOver="imover(this)" onMouseOut="imout(this);" onClick="alert('Вход через Зал Паладинов')"  /></div>

<div style="position:absolute; left:42px; top:146px; width:16px; height:18px; z-index:90;"><img src="<?=IMGBASE?>/i/images/subimages/fl1.gif" width="16" height="18" alt="Вы находитесь в Совете Белого братства" onClick=""  /></div>

<?=$vst?>

<tr><td align="right"><div align="right" id="btransfers"><table cellpadding="0" cellspacing="0" border="0" id="bmoveto">
<tr><td bgcolor="#D3D3D3">
</td>
</tr>
</table></div></td></tr>
</table>
<div id="gotohint"></div>

</td>
<td>
<div style="visibility:hidden; height:0px " id="moveto">0</div>
</td>
</tr>
</table>
<?
}
if($user['room']==11) {
?>
<table cellpadding="0" cellspacing="0" border="0" width="1"><tr><td>
<div style="position:relative; cursor: pointer;" id="ione"><img src="<?=IMGBASE?>/i/images/300x225/club/navig3.jpg" id="img_ione" width=500 height=240 alt="" border="1"/>



<div style="position:absolute; left:391px; top:120px; width:89px; height:32px; z-index:90;"><img src="<?=IMGBASE?>/i/images/subimages/map_sec4.gif" width="89" height="32" alt="Вход через Рыцарский Зал" class="aFilter" onMouseOver="imover(this)" onMouseOut="imout(this);" onClick="alert('Вход через Рыцарский Зал')"  /></div>

<div style="position:absolute; left:282px; top:174px; width:122px; height:31px; z-index:90;"><img src="<?=IMGBASE?>/i/images/subimages/map_sec5.gif" width="122" height="31" alt="" class="aFilter" onMouseOver="imover(this)" onMouseOut="imout(this);" id="mo_1.100.1.9" onClick="solo('8','Торговый Зал', '')" /></div>

<div style="position:absolute; left:305px; top:50px; width:123px; height:32px; z-index:90;"><img src="<?=IMGBASE?>/i/images/subimages/map_sec6.gif" width="123" height="32" alt="" class="aFilter" onMouseOver="imover(this)" onMouseOut="imout(this);" id="mo_1.100.1.9" onClick="solo('9','Рыцарский Зал', '')" /></div>

<div style="position:absolute; left:36px; top:40px; width:63px; height:40px; z-index:90;"><img src="<?=IMGBASE?>/i/images/subimages/map_sec2.gif" width="63" height="40" alt="" onClick=""  /></div>

<div style="position:absolute; left:23px; top:174px; width:91px; height:43px; z-index:90;"><img src="<?=IMGBASE?>/i/images/subimages/map_sec1.gif" width="91" height="43" alt="" class="aFilter" onMouseOver="imover(this)" onMouseOut="imout(this);" id="mo_1.100.1.9" onClick="solo('3','Бойцовский клуб', '')" /></div>

<div style="position:absolute; left:122px; top:52px; width:123px; height:39px; z-index:90;"><img src="<?=IMGBASE?>/i/images/subimages/map_sec7.gif" width="123" height="39" alt="Вход через Рыцарский Зал" class="aFilter" onMouseOver="imover(this)" onMouseOut="imout(this);" onClick="alert('Вход через Рыцарский Зал')"  /></div>

<div style="position:absolute; left:119px; top:175px; width:101px; height:37px; z-index:90;"><img src="<?=IMGBASE?>/i/images/subimages/map_sec3.gif" width="101" height="37" alt="Вход через Торговый зал" class="aFilter" onMouseOver="imover(this)" onMouseOut="imout(this);" onClick="alert('Вход через Торговый зал')"  /></div>

<div style="position:absolute; left:29px; top:115px; width:120px; height:35px; z-index:90;"><img src="<?=IMGBASE?>/i/images/subimages/map_2stair.gif" width="120" height="35" alt="" onClick=""  /></div>

<div style="position:absolute; left:182px; top:122px; width:16px; height:18px; z-index:90;"><img src="<?=IMGBASE?>/i/images/subimages/fl1.gif" width="16" height="18" alt="Вы находитесь на 2 этаже" onClick=""  /></div>
   <?=$vst?>

<tr><td align="right"><div align="right" id="btransfers"><table cellpadding="0" cellspacing="0" border="0" id="bmoveto">
<tr><td bgcolor="#D3D3D3">
</td>
</tr>
</table></div></td></tr>
</table>
 <div align=left><small>Отсюда вы можете попасть в Торговый Зал и Рыцарский Зал. Хотите попасть под раздачу? Стойте здесь и мешайте движению.</small></div>
<div id="gotohint"></div>
</td>
<td>
<div style="visibility:hidden; height:0px " id="moveto">0</div>
</td>
</tr>
</table>
<?
}
if($user['room']==9) {
?>
<table cellpadding="0" cellspacing="0" border="0" width="1"><tr><td>
<div style="position:relative; cursor: pointer;" id="ione"><img src="<?=IMGBASE?>/i/images/300x225/club/navig3.jpg" id="img_ione" width=500 height=240 alt="" border="1"/>



<div style="position:absolute; left:391px; top:120px; width:89px; height:32px; z-index:90;"><img src="<?=IMGBASE?>/i/images/subimages/map_sec4.gif" width="89" height="32" alt="" class="aFilter" onMouseOver="imover(this)" onMouseOut="imout(this);" id="mo_1.100.1.9" onClick="solo('12','Таверна', '')"  /></div>

<div style="position:absolute; left:282px; top:174px; width:122px; height:31px; z-index:90;"><img src="<?=IMGBASE?>/i/images/subimages/map_sec5.gif" width="122" height="31" alt="Проход через Таверну или 2 Этаж" class="aFilter" onMouseOver="imover(this)" onMouseOut="imout(this);" onClick="alert('Проход через Таверну или 2 Этаж')" /></div>

<div style="position:absolute; left:305px; top:50px; width:123px; height:32px; z-index:90;"><img src="<?=IMGBASE?>/i/images/subimages/map_sec6.gif" width="123" height="32" alt=""  onclick="" /></div>

<div style="position:absolute; left:36px; top:40px; width:63px; height:40px; z-index:90;"><img src="<?=IMGBASE?>/i/images/subimages/map_sec2.gif" width="63" height="40" alt="" onClick=""  /></div>

<div style="position:absolute; left:23px; top:174px; width:91px; height:43px; z-index:90;"><img src="<?=IMGBASE?>/i/images/subimages/map_sec1.gif" width="91" height="43" alt="Вход через 2 Этаж" class="aFilter" onMouseOver="imover(this)" onMouseOut="imout(this);" onClick="alert('Вход через 2 Этаж')"  /></div>

<div style="position:absolute; left:122px; top:52px; width:123px; height:39px; z-index:90;"><img src="<?=IMGBASE?>/i/images/subimages/map_sec7.gif" width="123" height="39" alt="" class="aFilter" onMouseOver="imover(this)" onMouseOut="imout(this);" id="mo_1.100.1.9" onClick="solo('10','Башня Рыцарей Магов', '')" /></div>

<div style="position:absolute; left:119px; top:175px; width:101px; height:37px; z-index:90;"><img src="<?=IMGBASE?>/i/images/subimages/map_sec3.gif" width="101" height="37" alt="Вход через Торговый зал" class="aFilter" onMouseOver="imover(this)" onMouseOut="imout(this);" onClick="alert('Вход через Торговый зал')"  /></div>

<div style="position:absolute; left:29px; top:115px; width:120px; height:35px; z-index:90;"><img src="<?=IMGBASE?>/i/images/subimages/map_2stair.gif" width="120" height="35" alt="" class="aFilter" onMouseOver="imover(this)" onMouseOut="imout(this);" id="mo_1.100.1.9" onClick="solo('11','Этаж 2', '')" /></div>

<div style="position:absolute; left:279px; top:65px; width:16px; height:18px; z-index:90;"><img src="<?=IMGBASE?>/i/images/subimages/fl1.gif" width="16" height="18" alt="Вы находитесь в Рыцарском зале" onClick=""  /></div>

<?=$vst?>

<tr><td align="right"><div align="right" id="btransfers"><table cellpadding="0" cellspacing="0" border="0" id="bmoveto">
<tr><td bgcolor="#D3D3D3">
</td>
</tr>
</table></div></td></tr>
</table>
 <div align=left><small>Вы уже не новичок. Вы уже боец. И не просто боец а Боец с большой буквы. Осталось объяснить это вооон тому артнику...</small></div>
<div id="gotohint"></div>

</td>
<td>
<div style="visibility:hidden; height:0px " id="moveto">0</div>
</td>
</tr>
</table>
<?
}
if($user['room']==10) {
?>
<table cellpadding="0" cellspacing="0" border="0" width="1"><tr><td>
<div style="position:relative; cursor: pointer;" id="ione"><img src="<?=IMGBASE?>/i/images/300x225/club/navig3.jpg" id="img_ione" width=500 height=240 alt="" border="1"/>



<div style="position:absolute; left:391px; top:120px; width:89px; height:32px; z-index:90;"><img src="<?=IMGBASE?>/i/images/subimages/map_sec4.gif" width="89" height="32" alt="Вход через Рыцарский зал" class="aFilter" onMouseOver="imover(this)" onMouseOut="imout(this);" onClick="alert('Вход через Рыцарский зал')"  /></div>

<div style="position:absolute; left:282px; top:174px; width:122px; height:31px; z-index:90;"><img src="<?=IMGBASE?>/i/images/subimages/map_sec5.gif" width="122" height="31" alt="Вход через 2 Этаж или Таверну" class="aFilter" onMouseOver="imover(this)" onMouseOut="imout(this);" onClick="alert('Вход через 2 Этаж или Таверну')"  /></div>

<div style="position:absolute; left:305px; top:50px; width:123px; height:32px; z-index:90;"><img src="<?=IMGBASE?>/i/images/subimages/map_sec6.gif" width="123" height="32" alt="" class="aFilter" onMouseOver="imover(this)" onMouseOut="imout(this);" id="mo_1.100.1.9" onClick="solo('9','Рыцарский Зал', '')" /></div>

<div style="position:absolute; left:36px; top:40px; width:63px; height:40px; z-index:90;"><img src="<?=IMGBASE?>/i/images/subimages/map_sec2.gif" width="63" height="40" alt="" onClick=""  /></div>

<div style="position:absolute; left:23px; top:174px; width:91px; height:43px; z-index:90;"><img src="<?=IMGBASE?>/i/images/subimages/map_sec1.gif" width="91" height="43" alt="Вход через 2 Этаж" class="aFilter" onMouseOver="imover(this)" onMouseOut="imout(this);" onClick="alert('Вход через 2 Этаж')"  /></div>

<div style="position:absolute; left:122px; top:52px; width:123px; height:39px; z-index:90;"><img src="<?=IMGBASE?>/i/images/subimages/map_sec7.gif" width="123" height="39" alt="" onClick=""  /></div>

<div style="position:absolute; left:119px; top:175px; width:101px; height:37px; z-index:90;"><img src="<?=IMGBASE?>/i/images/subimages/map_sec3.gif" width="101" height="37" alt="Вход через Торговый зал" class="aFilter" onMouseOver="imover(this)" onMouseOut="imout(this);" onClick="alert('Вход через Торговый зал')"  /></div>

<div style="position:absolute; left:29px; top:115px; width:120px; height:35px; z-index:90;"><img src="<?=IMGBASE?>/i/images/subimages/map_2stair.gif" width="120" height="35" alt="Вход через Рыцарский зал" class="aFilter" onMouseOver="imover(this)" onMouseOut="imout(this);" onClick="alert('Вход через Рыцарский зал')"  /></div>

<div style="position:absolute; left:170px; top:83px; width:16px; height:18px; z-index:90;"><img src="<?=IMGBASE?>/i/images/subimages/fl1.gif" width="16" height="18" alt="Вы находитесь в Башне Рыцарей магов" onClick=""  /></div>
 <?=$vst?>

<tr><td align="right"><div align="right" id="btransfers"><table cellpadding="0" cellspacing="0" border="0" id="bmoveto">
<tr><td bgcolor="#D3D3D3">
</td>
</tr>
</table></div></td></tr>
</table>
<div id="gotohint"></div>

</td>
<td>
<div style="visibility:hidden; height:0px " id="moveto">0</div>
</td>
</tr>
</table>
<?
}
if($user['room']==12) {
?>
<table cellpadding="0" cellspacing="0" border="0" width="1"><tr><td>
<div style="position:relative; cursor: pointer;" id="ione"><img src="<?=IMGBASE?>/i/images/300x225/club/navig3.jpg" id="img_ione" width=500 height=240 alt="" border="1"/>



<div style="position:absolute; left:391px; top:120px; width:89px; height:32px; z-index:90;"><img src="<?=IMGBASE?>/i/images/subimages/map_sec4.gif" width="89" height="32" alt=""  onclick=""  /></div>

<div style="position:absolute; left:282px; top:174px; width:122px; height:31px; z-index:90;"><img src="<?=IMGBASE?>/i/images/subimages/map_sec5.gif" width="122" height="31" alt="" class="aFilter" onMouseOver="imover(this)" onMouseOut="imout(this);" id="mo_1.100.1.9" onClick="solo('8','Торговый Зал', '')"   /></div>

<div style="position:absolute; left:305px; top:50px; width:123px; height:32px; z-index:90;"><img src="<?=IMGBASE?>/i/images/subimages/map_sec6.gif" width="123" height="32" alt="" class="aFilter" onMouseOver="imover(this)" onMouseOut="imout(this);" id="mo_1.100.1.9" onClick="solo('9','Рыцарский Зал', '')"  /></div>

<div style="position:absolute; left:36px; top:40px; width:63px; height:40px; z-index:90;"><img src="<?=IMGBASE?>/i/images/subimages/map_sec2.gif" width="63" height="40" alt="" onClick=""  /></div>

<div style="position:absolute; left:23px; top:174px; width:91px; height:43px; z-index:90;"><img src="<?=IMGBASE?>/i/images/subimages/map_sec1.gif" width="91" height="43" alt="Вход через 2 Этаж" class="aFilter" onMouseOver="imover(this)" onMouseOut="imout(this);" onClick="alert('Вход через 2 Этаж')"  /></div>

<div style="position:absolute; left:122px; top:52px; width:123px; height:39px; z-index:90;"><img src="<?=IMGBASE?>/i/images/subimages/map_sec7.gif" width="123" height="39" alt="Вход через Рыцарский зал" class="aFilter" onMouseOver="imover(this)" onMouseOut="imout(this);" onClick="alert('Вход через Рыцарский зал')"  /></div>

<div style="position:absolute; left:119px; top:175px; width:101px; height:37px; z-index:90;"><img src="<?=IMGBASE?>/i/images/subimages/map_sec3.gif" width="101" height="37" alt="Вход через Торговый зал" class="aFilter" onMouseOver="imover(this)" onMouseOut="imout(this);" onClick="alert('Вход через Торговый зал')"  /></div>

<div style="position:absolute; left:29px; top:115px; width:120px; height:35px; z-index:90;"><img src="<?=IMGBASE?>/i/images/subimages/map_2stair.gif" width="120" height="35" alt="Проход через Рыцарский зал или Торговый зал" class="aFilter" onMouseOver="imover(this)" onMouseOut="imout(this);" onClick="alert('Проход через Рыцарский зал или Торговый зал')"  /></div>

<div style="position:absolute; left:430px; top:153px; width:16px; height:18px; z-index:90;"><img src="<?=IMGBASE?>/i/images/subimages/fl1.gif" width="16" height="18" alt="Вы находитесь в Таверне" onClick=""  /></div>
<?=$vst?>

<tr><td align="right"><div align="right" id="btransfers"><table cellpadding="0" cellspacing="0" border="0" id="bmoveto">
<tr><td bgcolor="#D3D3D3">
</td>
</tr>
</table></div></td></tr>
</table>
<div id="gotohint"></div>
</td>
<td>
<div style="visibility:hidden; height:0px " id="moveto">0</div>
</td>
</tr>
</table>
<?
}
if($user['room']==8) {
?>
<table cellpadding="0" cellspacing="0" border="0" width="1"><tr><td>
<div style="position:relative; cursor: pointer;" id="ione"><img src="<?=IMGBASE?>/i/images/300x225/club/navig3.jpg" id="img_ione" width=500 height=240 alt="" border="1"/>



<div style="position:absolute; left:391px; top:120px; width:89px; height:32px; z-index:90;"><img src="<?=IMGBASE?>/i/images/subimages/map_sec4.gif" width="89" height="32" alt="" class="aFilter" onMouseOver="imover(this)" onMouseOut="imout(this);" id="mo_1.100.1.9" onClick="solo('12','Таверна', '')" /></div>

<div style="position:absolute; left:282px; top:174px; width:122px; height:31px; z-index:90;"><img src="<?=IMGBASE?>/i/images/subimages/map_sec5.gif" width="122" height="31" alt="" onClick=""  /></div>

<div style="position:absolute; left:305px; top:50px; width:123px; height:32px; z-index:90;"><img src="<?=IMGBASE?>/i/images/subimages/map_sec6.gif" width="123" height="32" alt="Вход через 2 Этаж или Таверну" class="aFilter" onMouseOver="imover(this)" onMouseOut="imout(this);" onClick="alert('Вход через 2 Этаж или Таверну')" /></div>

<div style="position:absolute; left:36px; top:40px; width:63px; height:40px; z-index:90;"><img src="<?=IMGBASE?>/i/images/subimages/map_sec2.gif" width="63" height="40" alt="" onClick=""  /></div>

<div style="position:absolute; left:23px; top:174px; width:91px; height:43px; z-index:90;"><img src="<?=IMGBASE?>/i/images/subimages/map_sec1.gif" width="91" height="43" alt="Вход через 2 Этаж" class="aFilter" onMouseOver="imover(this)" onMouseOut="imout(this);" onClick="alert('Вход через 2 Этаж')"  /></div>

<div style="position:absolute; left:122px; top:52px; width:123px; height:39px; z-index:90;"><img src="<?=IMGBASE?>/i/images/subimages/map_sec7.gif" width="123" height="39" alt="Вход через Рыцарский зал" class="aFilter" onMouseOver="imover(this)" onMouseOut="imout(this);" onClick="alert('Вход через Рыцарский зал')"  /></div>

<div style="position:absolute; left:119px; top:175px; width:101px; height:37px; z-index:90;"><img src="<?=IMGBASE?>/i/images/subimages/map_sec3.gif" width="101" height="37" alt="" class="aFilter" onMouseOver="imover(this)" onMouseOut="imout(this);" id="mo_1.100.1.9" onClick="solo('43','Комната Знахаря', '')" /></div>

<div style="position:absolute; left:29px; top:115px; width:120px; height:35px; z-index:90;"><img src="<?=IMGBASE?>/i/images/subimages/map_2stair.gif" width="120" height="35" alt="" class="aFilter" onMouseOver="imover(this)" onMouseOut="imout(this);" id="mo_1.100.1.9" onClick="solo('11','Этаж 2', '')" /></div>

<div style="position:absolute; left:253px; top:180px; width:16px; height:18px; z-index:90;"><img src="<?=IMGBASE?>/i/images/subimages/fl1.gif" width="16" height="18" alt="Вы находитесь в Торговом зале" onClick=""  /></div>
<?=$vst?>

<tr><td align="right"><div align="right" id="btransfers"><table cellpadding="0" cellspacing="0" border="0" id="bmoveto">
<tr><td bgcolor="#D3D3D3">
</td>
</tr>
</table></div></td></tr>
</table>
<div id="gotohint"></div>
</td>
<td>
<div style="visibility:hidden; height:0px " id="moveto">0</div>
</td>
</tr>
</table>
<?
}
if($_SESSION['movetime']>time()){$vrme=$_SESSION['movetime']-time();}else{$vrme=0;}
?>

<div id="mmoves" style="background-color:#FFFFCC; visibility:hidden; overflow:visible; position:absolute; border-color:#666666; border-style:solid; border-width: 1px; padding: 2px; white-space: nowrap;"></div>
<script language="javascript" type="text/javascript">
var progressEnd = 64;       // set to number of progress <span>'s.
var progressColor = '#00CC00';  // set to progress bar color
var mtime = parseInt('<?=$vrme?>');
if (!mtime || mtime<=0) {mtime=0;}
var progressInterval = Math.round(mtime*1000/progressEnd);  // set to time between updates (milli-seconds)
var is_accessible = true;
var progressAt = progressEnd;
var progressTimer;
function progress_clear() {
progressAt = 1;
is_accessible = false;
set_moveto(true);
}
function progress_update() {
progressAt++;
//if (progressAt > progressEnd) progress_clear();
if (progressAt > progressEnd) {
is_accessible = true;
if (window.solo_store && solo_store) { solo(solo_store, ""); } // go to stored
set_moveto(false);
} else {
if( !( progressAt % 2 ) )
document.getElementById('MoveLine').style.left = progressAt - 64;
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
}
if (mtime>0) {
progress_clear();
progress_update();
}
</script>

  

<?if($user['room'] == '0'){
if($_GET['path']=="back"){mq("UPDATE `users`,`online` SET `users`.`room` = '3',`online`.`room` = '3' WHERE `online`.`id` = `users`.`id` AND `online`.`id` = '{$_SESSION['uid']}' ;"); die("<script>location.href='main.php';</script>");}
?>
<INPUT TYPE=button onClick="location.href='main.php?path=back'" style="border: 1px double #9a9996;font-size: 12px;color: #dfdfdf;background-color:#504F4C;" value="Вернуться">
<?}?>
<HR>
<?

if($user['room'] != 666) echo bottombuttons();

?>
    <small>
    <BR>
    <B>Внимание!</B> Никогда и никому не говорите пароль от своего персонажа. Не вводите пароль на других сайтах, типа "новый город", "лотерея", "там, где все дают на халяву". Пароль не нужен ни паладинам, ни кланам, ни администрации, <U>только взломщикам</U> для кражи вашего героя.<BR>
    <I>Администрация.</I></small>
    <BR>

         Сейчас в клубе <?=mysql_num_rows($online)?>.<BR><br>
    </TD>
    </FORM>
</TR>
</TABLE>
</BODY>
</HTML>
<?
    if(@$_GET['goto'] == 'plo' && ($user['room']==3 or $user['align']=='2.5')) {
        if(mq("UPDATE `users`,`online` SET `users`.`room` = '20',`online`.`room` = '20' WHERE `online`.`id` = `users`.`id` AND `online`.`id` = '{$_SESSION['uid']}' ;")){
                $_SESSION['movetime']=time()+$mt;
        echo    "<script>location.href='city.php';</script>";}
    }
    if(@$_GET['goto'] == 'strah' && $user['align']=='2.5') {
        if(mq("UPDATE `users`,`online` SET `users`.`room` = '21',`online`.`room` = '21' WHERE `online`.`id` = `users`.`id` AND `online`.`id` = '{$_SESSION['uid']}' ;")){
                $_SESSION['movetime']=time()+$mt;
        echo    "<script>location.href='city.php';</script>";}
    }

?>