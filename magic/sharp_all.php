<?php
  if ($_SESSION['uid'] == null) header("Location: index.php");
  include "config/weptypes.php";

  if ($twohanded) {
    $dress = mysql_fetch_array(mysql_query("SELECT * FROM `inventory` WHERE  `type` = '3' AND `dvur` = '1' AND `owner` = '{$_SESSION['uid']}' AND `name` = '{$_POST['target']}' AND `sharped` = 0 LIMIT 1;"));
    //$svitok = mysql_fetch_array(mysql_query("SELECT * FROM `inventory` WHERE `name` = 'Заточка на +$sharpamount: двуручное оружие' AND `owner` = '{$_SESSION['uid']}' LIMIT 1;"));
    $sharpamountd=$sharpamount*2;
  } else {
    $dress = mysql_fetch_array(mysql_query("SELECT * FROM `inventory` WHERE  `type` = '3' AND (`dvur` = '0' or otdel=30 or otdel=52) AND `owner` = '{$_SESSION['uid']}' AND `name` = '{$_POST['target']}' AND `sharped` = 0 LIMIT 1;"));
    //$svitok = mysql_fetch_array(mysql_query("SELECT * FROM `inventory` WHERE `name` = 'Заточка на +$sharpamount: оружие' AND `owner` = '{$_SESSION['uid']}' LIMIT 1;"));
    $sharpamountd=$sharpamount;
  }       // && $svitok
  if ($dress) {
    if ($row["ecost"]) $sharpamountr=0;
    else $sharpamountr=$sharpamount;
    $weptype=$weptypes[$dress["otdel"]];
    if ($weptype) {
      if ($weptype=="posoh") {
        if (mysql_query("UPDATE `inventory` SET `sharped` = 1, `name` = CONCAT(`name`,' +$sharpamount'), `mfmagp` = `mfmagp`+($sharpamount*2), nintel=nintel+$sharpamountr, nmudra=nmudra+$sharpamountr, `cost` = `cost`+(6*$sharpamount) WHERE `id` = {$dress['id']} LIMIT 1;")) {
          echo "<font color=red><b>Предмет \"{$_POST['target']}\" удачно заговорен +$sharpamount.</b></font> ";
          $bet=1;
        } else {
          echo "<font color=red><b>Произошла ошибка!</b></font>";
        }
      } else {
        $raisestats["nsila"]=($dress["nsila"]>=$dress["nlovk"]?1:0)+($dress["nsila"]>=$dress["ninta"]?1:0)+($dress["nsila"]>=$dress["nvinos"]?1:0);
        $raisestats["nlovk"]=($dress["nlovk"]>=$dress["nsila"]?1:0)+($dress["nlovk"]>=$dress["ninta"]?1:0)+($dress["nlovk"]>=$dress["nvinos"]?1:0);
        $raisestats["ninta"]=($dress["ninta"]>=$dress["nsila"]?1:0)+($dress["ninta"]>=$dress["nlovk"]?1:0)+($dress["ninta"]>=$dress["nvinos"]?1:0);
        $raisestats["nvinos"]=($dress["nvinos"]>=$dress["nsila"]?1:0)+($dress["nvinos"]>=$dress["ninta"]?1:0)+($dress["nvinos"]>=$dress["nlovk"]?1:0);
        $s1="";
        $s2="";
        foreach ($raisestats as $k=>$v) {
          if ($v>=2) {
            if (!$s1) $s1=$k;
            elseif (!$s2) $s2=$k;
          }
        }
        if (mq("UPDATE `inventory` SET `sharped` = 1, $s1=$s1+$sharpamountr, $s2=$s2+$sharpamountr, `name` = CONCAT(`name`,' +$sharpamount'), `minu` = `minu`+$sharpamountd, `maxu`=`maxu`+$sharpamountd".($weptype!="tool"?", `n$weptype` = `n$weptype`+$sharpamountr":"").", `cost` = `cost`+(6*$sharpamount) WHERE `id` = {$dress['id']} LIMIT 1;")) {
          echo "<font color=red><b>Предмет \"{$_POST['target']}\" удачно заточен +$sharpamount.</b></font> ";
          $bet=1;
        } else {
          echo "<font color=red><b>Произошла ошибка!<b></font>";
        }
      }
    } else "<font color=red><b>Этот предмет нельзя заточить</b></font>";
  } else {
    echo "<font color=red><b>Неправильное имя предмета или неправильный свиток</b></font>";
  }
?>