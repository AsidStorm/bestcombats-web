<?php
$us=mqfa("SELECT *,(select `id` from `online` WHERE `date` >= ".(time()-60)." AND `id` = users.`id`) as `online`  FROM `users` WHERE `login` = '".mysql_escape_string($_POST['target'])."'");

if ($row["name"]=="�������� �����") {
  $row["gintel"]=10;
  if ($us["id"]!=$user["id"]) $row["gintel"]=6;               
}
if ($row["name"]=="���� ��������") $row["gsila"]=100;
if ($row["name"]=="�����������") $row["ginta"]=100;
if ($row["name"]=="�������� ����") $row["glovk"]=100;
if ($row["name"]=="�������� �����") $row["gmana"]=2000;
if ($row["name"]=="������� ���������") $row["gintel"]=100;

$cond="";
if ($row["gsila"]==100 || $row["ginta"]==100 || $row["glovk"]==100 || $row["gintel"]==100 || $row["gmana"]==2000) {
  $cond.=" and (sila=100 or intel=100 or lovk=100 or inta=100 or gmana=2000) ";
} elseif ($row["gintel"]) $cond.=" and intel>0 and intel<100 ";
$uses_zel=mqfa("SELECT id, name, time FROM `effects` WHERE `owner` = ".$us['id']." and `type`='187' $cond");
$ins_time=floor($magic['time']*60);
$castto=time()+$ins_time;
global $nodrink;
if (in_array($user["room"],$nodrink)) {
  echo "����� ��������� ������������ ������!";
} elseif ($row["present"] && $user["id"]!=$us["id"]) {
  echo "���������� ������ ����� ������������ ������ �� ����.";
} elseif ($us["level"]<$row["nlevel"]) {
  echo "$us[login] ������������ �������� ������!";
} elseif ($user['battle'] > 0) {
  echo "�� � ���...";
} elseif ($user["align"]==4 && $user["id"]!=$us["id"]) {
  echo "���������� �� ����������� ���� ��������� ������������ ������������� ����� �� ������ ����������.";
} elseif ($user['room'] != $us['room']) { 
  echo "�������� � ������ �������!"; 
} elseif (!$us['online']) {
  echo "�������� �� � ����!";
} elseif ($uses_zel && $row['name']!=$uses_zel['name']) {
  echo "��� �� ������ �������� ������� ��������.";
} elseif($uses_zel && $castto-$users_zel["time"]<600) {
  echo "�� ��������� ��� ���� ����� ��������.";
} else {
  $caster=$user["id"];
  if(!$uses_zel){
    mq("INSERT INTO `effects` (`owner`,`name`,`time`,`type`,`sila`,`lovk`,`inta`,`intel`,`gmana`, caster) values ('".$us['id']."','".$row['name']."',".(time()+$ins_time).",'187',".$row['gsila'].",".$row['glovk'].",".$row['ginta'].",".$row['gintel'].",".$row['gmana'].", $caster);");
    if($row['gsila']>0){mysql_query("UPDATE `users` set `sila` =`sila`+ ".$row['gsila']." WHERE `id` = ".$us['id']."");}
    if($row['glovk']>0){mysql_query("UPDATE `users` set `lovk` =`lovk`+ ".$row['glovk']." WHERE `id` = ".$us['id']."");}
    if($row['ginta']>0){mysql_query("UPDATE `users` set `inta` =`inta`+ ".$row['ginta']." WHERE `id` = ".$us['id']."");}
    if($row['gintel']>0){mysql_query("UPDATE `users` set `intel` =`intel`+ ".$row['gintel']." WHERE `id` = ".$us['id']."");}
    if($row['gmudra']>0){
      mysql_query("UPDATE `users` set `mudra` =`mudra`+ ".$row['gmudra']." WHERE `id` = ".$us['id']."");
      resetmax($user["id"]);
    }
    if($row['gmana']>0){
      mq("UPDATE `users` set maxmana=maxmana+ ".$row['gmana'].", fullmptime='".time()."' WHERE `id` = ".$us['id']."");
      resetmax($user["id"]);
    }
  } else {
    mq("UPDATE `effects` set `time` = '".(time()+$ins_time)."', caster='$caster' WHERE id='$uses_zel[id]'");
  }
  echo "<font color=red><b>�� ��������� \"{$_POST['target']}\" �������� �������� \"$row[name]\" </b></font>";
  addch("<img src=i/magic/$row[img]>".($user["invis"]?"���������":"�������� &quot;{$user['login']}&quot;")." ������� �������� \"$row[name]\" �� &quot;".($user["invis"] && $user["login"]==$_POST['target']?"���������":"$_POST[target]")."&quot;, ������ 2 ����.");
  if ($row["name"]=="�������� �����" && 0) {
    mq("update users set mana=if(mana>1000, mana-1000,0), fullmptime=".time()." where id='$user[id]'");
    $user["mana"]-=1000;
    if ($user["mana"]<0) $user["mana"]=0;
  }
  $bet=1;
  updeffects($user["id"]);
}
?>