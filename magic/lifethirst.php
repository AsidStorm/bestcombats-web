<?php
$target=mqfa("SELECT users.id, users.level, users.room, users.login, users.vinos, users.mudra,(select `id` from `online` WHERE `date` >= ".(time()-60)." AND `id` = users.`id`) as `online`  FROM `users` WHERE `login` = '".mysql_escape_string($_POST['target'])."'");
$plus=0;
$minus=0;
$castto=time()+7200;
$hrs=2;
if ($user["intel"]>=100) {
  $castto=time()+10800;
  $hrs=3;
}

if ($row["name"]=="����� ����� +6") {$target=$user;$hfv=6;$mana=0;}
$r=mq("SELECT id, name, hpforvinos, time FROM `effects` WHERE `owner` = ".$target['id']." and hpforvinos<>0");
while ($rec=mysql_fetch_assoc($r)) {
  if ($rec["hpforvinos"]<0) $minus=$rec;
  else $plus=$rec;
}
global $nodrink;
if ($row["prototype"]==1960) $hfv=1;
if ($row["prototype"]==1961) $hfv=2;
if ($row["prototype"]==1962) $hfv=3;
if ($row["prototype"]==1963) $hfv=4;
if ($row["prototype"]==1964) $hfv=5;
if ($row["prototype"]==1969) $hfv=-1;
if ($row["prototype"]==1968) $hfv=-2;
if ($row["prototype"]==1967) $hfv=-3;
if ($row["prototype"]==1966) $hfv=-4;
if ($row["prototype"]==1965) $hfv=-5;

if (in_array($user["room"],$nodrink)) {
  echo "����� ��������� ������������ ������!";
} elseif ($user['battle'] > 0) {
  echo "�� � ���...";
//} elseif($target["id"]==$user["id"] && $row["name"]!="����� ����� +6") {
//  echo "��� �������� ������ ������������ �� ����.";
} elseif (!$target["online"] && $row["name"]!="����� ����� +6") {
  echo "�������� \"$_POST[target]\" �� � ����.";
} elseif ($target["room"]!=$user["room"]) {
  echo "�������� \"$_POST[target]\" ��� �������� ������������.";
} elseif ($user["level"]-$target["level"]>2 && $user["id"]!=7) {
  echo "��� �������� ������ ������������ �� ���������� ����� ��� �� 2 ������ ������.";
} elseif (in_array($target["room"], $noattackrooms) && $hfv<0) {
  echo "� ���� ������� ������������� ����� ���������.";
} elseif(($plus && $hfv>0 && $plus["name"]!=$row["name"]) || ($minus && $hfv<0 && $minus["name"]!=$row["name"])) {
  echo "��� �� ������ �������� ������� ��������.";
} elseif(($plus && $hfv<0 && $plus["hpforvinos"]>-$hfv) || ($minus && $hfv>0 && -$minus["hpforvinos"]>$hfv)) {
  echo "�� ��������� �������� ����� ������� ��������������� ����������.";
} elseif(($hfv<0 && $castto-$minus["time"]<600) || ($hfv>0 && $castto-$plus["time"]<600)) {
  echo "�� ��������� �������� ����� ������� ��������������� ����������.";
} else {
  if ($hfv>0) $caster=$user["id"];
  else $caster=0;
  if((!$plus && $hfv>0) || (!$minus && $hfv<0)){    
    mq("INSERT INTO `effects` (`owner`,`name`,`time`,`type`, `hpforvinos`, caster) values ('$target[id]', '$row[name]', $castto, 26, $hfv, '$caster');");
  } else {
    if ($hfv>0) mq("UPDATE `effects` set `time`= '$castto', caster='$caster' WHERE id='$plus[id]'");
    else mq("UPDATE `effects` set `time`='$castto' WHERE id='$minus[id]'");
  }
  resetmax($target["id"]);
  if ($row["name"]!="����� ����� +6")  {
    echo "�� ��������� \"$target[login]\" �������� �������� $row[name].";
    addch("<img src=i/magic/$row[img]>".($user["invis"]?"���������":"�������� &quot;{$user['login']}&quot;")." ������� �������� \"$row[name]\" �� &quot;".($user["invis"] && $user["login"]==$_POST['target']?"���������":"$_POST[target]")."&quot;, ������ $hrs ����.");
  } else echo "������� ����������� ������ $row[name].";
  $bet=1;
}
?>