<?php
  if ($user["battle"]) {
    $i=$fbattle->getid($_POST['target']);
    if ($i) {
      $target=array("id"=>$i, "online"=>1, "battle"=>$user["battle"], "online"=>1);
    }
  } else {
    $target=mqfa("SELECT *,(select `id` from `online` WHERE `date` >= ".(time()-60)." AND `id` = users.`id`) as `online`  FROM `users` WHERE `login` = '".mysql_escape_string($_POST['target'])."'");
    $ins_time = floor($magic['time']*60);
  }
  global $nodrink;
  $negative=0;
  if ($row["prototype"]==1888) {$mf="mffire";$mfval=min(33, round($user["intel"]/10+$user["mfire"]+2.25));}
  if ($row["prototype"]==1889) {$mf="mfwater";$mfval=min(33, round($user["intel"]/10+$user["mwater"]+2.25));}
  if ($row["prototype"]==1890) {$mf="mfair";$mfval=min(33, round($user["intel"]/10+$user["mair"]+2.25));}
  if ($row["prototype"]==1891) {$mf="mfearth";$mfval=min(33, round($user["intel"]/10+$user["mearth"]+2.25));}
  if ($row["prototype"]==1892) {$mf="mfdfire";$mfval=100;}
  if ($row["prototype"]==1893) {$mf="mfdwater";$mfval=100;}
  if ($row["prototype"]==1894) {$mf="mfdair";$mfval=100;}
  if ($row["prototype"]==1895) {$mf="mfdearth";$mfval=100;}
  if ($row["name"]=="Неуязвимость Оружию") {$mf="mfdhit";$mfval=250;}
  if ($row["name"]=="Неуязвимость Стихиям") {$mf="mfdmag";$mfval=250;}
  if ($row["prototype"]=="1996") {$mf="mfdmag";$mfval=-125;$negative=1;}
  if ($row["prototype"]=="2064") {$mf="mfdhit";$mfval=-250;$negative=1;}
  if ($row["prototype"]=="2065") {$mf="mfhitp";$mfval=-30;$negative=1;}
  if ($negative) $ins_time=$ins_time/2;
  if ($mf=="mfdmag" || $mf=="mfdhit") $uses_zel = mqfa("SELECT id, name, time FROM `effects` WHERE `owner` = '".$target['id']."' and $mf".($negative?"<":">")."0 and `type`=187");
  else $uses_zel = mqfa("SELECT id, name, time, mfval FROM `effects` WHERE `owner` = ".$target['id']." and mf='$mf' and mfval".($negative?"<":">")."0 and `type`=187");

  if (!$negative) $caster=$user["id"]; else $caster=0;
  if ($target["battle"]!=$user["battle"]) {
    echo "Персонаж $_POST[target] вне пределов досягаемости!";
  } elseif (in_array($user["room"],$nodrink)) {
    echo "Здесь запрещено пить эликсиры или пользоваться магией!";
  } elseif ($user["align"]==4 && $user["id"]!=$target["id"] && !$negative) {
    echo "Персонажам со склонностью хаос запрещено использовать положительную магию на других персонажей.";
  } elseif ($row["present"] && $user["id"]!=$target["id"]) {
    echo "Подарочные свитки можно использовать только на себя.";
  } elseif (!$target) {
    echo "Персонаж $_POST[target] не найден.";
  } elseif (!$target["online"]) {
    echo "Персонаж не в игре.";
  } elseif ($target["room"]!=$user["room"] && !$user["battle"]) {
    echo "Персонаж в другой комнате.";
  } elseif (in_array($target["room"], $noattackrooms) && $negative) {
    echo "В этой локации отрицательная магия запрещена.";
  } elseif (($user['battle'] > 0 || $target['battle'] > 0) && !$negative) {
    echo "Не в бою...";
  } elseif($uses_zel && ($row['name']!=$uses_zel['name'] || $user["battle"] || $mfval<$uses_zel["mfval"])) {
    echo "Еще не прошло действие старого заклятия.";
  } elseif(!$negative && time()+$ins_time-$uses_zel["time"]<600) {
    echo "На персонаже уже есть такое заклятие.";
  } elseif ($user['battle'] && in_array($target['id'],$fbattle->team_mine) && $user["id"]!=7) {
    echo "Нельзя проклинать союзников!"; 
  } else {
    if(!$uses_zel && !$user["battle"]){
      if ($mf=="mfdmag" || $mf=="mfdhit") mq("INSERT INTO `effects` (`owner`,`name`,`time`,`type`, caster, $mf) values ('".$target['id']."','".$row['name']."',".(time()+$ins_time).",187, '$caster', '$mfval')");
      else mq("INSERT INTO `effects` (`owner`,`name`,`time`,`type`, mf, mfval, caster) values ('".$target['id']."','".$row['name']."',".(time()+$ins_time).",187, '$mf', '$mfval', '$caster')");
      $effid=mysql_insert_id();
    } elseif($uses_zel) {
      mq("UPDATE `effects` set `time` = '".(time()+$ins_time)."', mfval='$mfval', caster='$caster' WHERE `id` = $uses_zel[id]");
    }
    if ($user["battle"]) {
      $effid=$row["prototype"];
      $fbattle->getbu($target["id"]);
      $effid=$row["prototype"];
      if ($uses_zel || $fbattle->battleunits[$target["id"]]["effects"][$effid]) {
        echo "Еще не прошло действие старого заклятия.";
      } else {
        $fbattle->toupdatebu[$target["id"]][$mf]+=$mfval;
        $fbattle->toupdatebu[$target["id"]]["effects"]=1;
        $fbattle->needupdatebu=1;
        $fbattle->getbu($target["id"]);
        $fbattle->battleunits[$target["id"]]["effects"]["$effid"]["img"]=IMGBASE."/i/misc/icon_$row[img]";
        $fbattle->battleunits[$target["id"]]["effects"]["$effid"]["name"]="<b>$row[name]</b> (заклятие)";
        $fbattle->battleunits[$target["id"]]["effects"]["$effid"]["bad"]=1;
        $fbattle->battleunits[$target["id"]]["effects"]["$effid"]["mf"]=$mf;
        $fbattle->battleunits[$target["id"]]["effects"]["$effid"]["val"]=$mfval;
        $fbattle->battleunits[$target["id"]]["effects"]["$effid"]["type"]=1;
        $fbattle->add_log('<span class=date>'.date("H:i").'</span> '.nick5($user['id'],$fbattle->my_class).' использовал'.($user["sex"]==1?"":"а").' заклятие <b>'.$row["name"].'</b> на '.nick5($target['id'],$fbattle->en_class).' <BR>');
        $fbattle->write_log ();
        echo "Успнешно наложено заклятие $row[name]."; 
        $bet=1;
      }
    } else {
      echo "<font color=red><b>На персонажа \"{$_POST['target']}\" наложено заклятие \"$row[name]\" </b></font>";
      addch("<img src=i/magic/$row[img]>".($user["invis"]?"Невидимка":"Персонаж &quot;{$user['login']}&quot;")." наложил заклятие \"$row[name]\" на &quot;".($user["invis"] && $user["login"]==$_POST['target']?"Невидимка":"$_POST[target]")."&quot;, сроком ".($negative?"1 час":"2 часа").".");
      $bet=1;
    }
  }

?>