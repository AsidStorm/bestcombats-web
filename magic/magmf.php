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
  if ($row["name"]=="������������ ������") {$mf="mfdhit";$mfval=250;}
  if ($row["name"]=="������������ �������") {$mf="mfdmag";$mfval=250;}
  if ($row["prototype"]=="1996") {$mf="mfdmag";$mfval=-125;$negative=1;}
  if ($row["prototype"]=="2064") {$mf="mfdhit";$mfval=-250;$negative=1;}
  if ($row["prototype"]=="2065") {$mf="mfhitp";$mfval=-30;$negative=1;}
  if ($negative) $ins_time=$ins_time/2;
  if ($mf=="mfdmag" || $mf=="mfdhit") $uses_zel = mqfa("SELECT id, name, time FROM `effects` WHERE `owner` = '".$target['id']."' and $mf".($negative?"<":">")."0 and `type`=187");
  else $uses_zel = mqfa("SELECT id, name, time, mfval FROM `effects` WHERE `owner` = ".$target['id']." and mf='$mf' and mfval".($negative?"<":">")."0 and `type`=187");

  if (!$negative) $caster=$user["id"]; else $caster=0;
  if ($target["battle"]!=$user["battle"]) {
    echo "�������� $_POST[target] ��� �������� ������������!";
  } elseif (in_array($user["room"],$nodrink)) {
    echo "����� ��������� ���� �������� ��� ������������ ������!";
  } elseif ($user["align"]==4 && $user["id"]!=$target["id"] && !$negative) {
    echo "���������� �� ����������� ���� ��������� ������������ ������������� ����� �� ������ ����������.";
  } elseif ($row["present"] && $user["id"]!=$target["id"]) {
    echo "���������� ������ ����� ������������ ������ �� ����.";
  } elseif (!$target) {
    echo "�������� $_POST[target] �� ������.";
  } elseif (!$target["online"]) {
    echo "�������� �� � ����.";
  } elseif ($target["room"]!=$user["room"] && !$user["battle"]) {
    echo "�������� � ������ �������.";
  } elseif (in_array($target["room"], $noattackrooms) && $negative) {
    echo "� ���� ������� ������������� ����� ���������.";
  } elseif (($user['battle'] > 0 || $target['battle'] > 0) && !$negative) {
    echo "�� � ���...";
  } elseif($uses_zel && ($row['name']!=$uses_zel['name'] || $user["battle"] || $mfval<$uses_zel["mfval"])) {
    echo "��� �� ������ �������� ������� ��������.";
  } elseif(!$negative && time()+$ins_time-$uses_zel["time"]<600) {
    echo "�� ��������� ��� ���� ����� ��������.";
  } elseif ($user['battle'] && in_array($target['id'],$fbattle->team_mine) && $user["id"]!=7) {
    echo "������ ���������� ���������!"; 
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
        echo "��� �� ������ �������� ������� ��������.";
      } else {
        $fbattle->toupdatebu[$target["id"]][$mf]+=$mfval;
        $fbattle->toupdatebu[$target["id"]]["effects"]=1;
        $fbattle->needupdatebu=1;
        $fbattle->getbu($target["id"]);
        $fbattle->battleunits[$target["id"]]["effects"]["$effid"]["img"]=IMGBASE."/i/misc/icon_$row[img]";
        $fbattle->battleunits[$target["id"]]["effects"]["$effid"]["name"]="<b>$row[name]</b> (��������)";
        $fbattle->battleunits[$target["id"]]["effects"]["$effid"]["bad"]=1;
        $fbattle->battleunits[$target["id"]]["effects"]["$effid"]["mf"]=$mf;
        $fbattle->battleunits[$target["id"]]["effects"]["$effid"]["val"]=$mfval;
        $fbattle->battleunits[$target["id"]]["effects"]["$effid"]["type"]=1;
        $fbattle->add_log('<span class=date>'.date("H:i").'</span> '.nick5($user['id'],$fbattle->my_class).' �����������'.($user["sex"]==1?"":"�").' �������� <b>'.$row["name"].'</b> �� '.nick5($target['id'],$fbattle->en_class).' <BR>');
        $fbattle->write_log ();
        echo "�������� �������� �������� $row[name]."; 
        $bet=1;
      }
    } else {
      echo "<font color=red><b>�� ��������� \"{$_POST['target']}\" �������� �������� \"$row[name]\" </b></font>";
      addch("<img src=i/magic/$row[img]>".($user["invis"]?"���������":"�������� &quot;{$user['login']}&quot;")." ������� �������� \"$row[name]\" �� &quot;".($user["invis"] && $user["login"]==$_POST['target']?"���������":"$_POST[target]")."&quot;, ������ ".($negative?"1 ���":"2 ����").".");
      $bet=1;
    }
  }

?>