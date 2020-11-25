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

if ($row["name"]=="Жажда жизни +6") {$target=$user;$hfv=6;$mana=0;}
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
  echo "Здесь запрещено пользоваться магией!";
} elseif ($user['battle'] > 0) {
  echo "Не в бою...";
//} elseif($target["id"]==$user["id"] && $row["name"]!="Жажда жизни +6") {
//  echo "Это заклятие нельзя использовать на себя.";
} elseif (!$target["online"] && $row["name"]!="Жажда жизни +6") {
  echo "Персонаж \"$_POST[target]\" не в игре.";
} elseif ($target["room"]!=$user["room"]) {
  echo "Персонаж \"$_POST[target]\" вне пределов досягаемости.";
} elseif ($user["level"]-$target["level"]>2 && $user["id"]!=7) {
  echo "Это заклятие нельзя использовать на персонажей более чем на 2 уровня младше.";
} elseif (in_array($target["room"], $noattackrooms) && $hfv<0) {
  echo "В этой локации отрицательная магия запрещена.";
} elseif(($plus && $hfv>0 && $plus["name"]!=$row["name"]) || ($minus && $hfv<0 && $minus["name"]!=$row["name"])) {
  echo "Еще не прошло действие старого заклятия.";
} elseif(($plus && $hfv<0 && $plus["hpforvinos"]>-$hfv) || ($minus && $hfv>0 && -$minus["hpforvinos"]>$hfv)) {
  echo "На персонажа наложено более сильное противоположное заклинание.";
} elseif(($hfv<0 && $castto-$minus["time"]<600) || ($hfv>0 && $castto-$plus["time"]<600)) {
  echo "На персонажа наложено более сильное противоположное заклинание.";
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
  if ($row["name"]!="Жажда жизни +6")  {
    echo "На персонажа \"$target[login]\" наложено заклятие $row[name].";
    addch("<img src=i/magic/$row[img]>".($user["invis"]?"Невидимка":"Персонаж &quot;{$user['login']}&quot;")." наложил заклятие \"$row[name]\" на &quot;".($user["invis"] && $user["login"]==$_POST['target']?"Невидимка":"$_POST[target]")."&quot;, сроком $hrs часа.");
  } else echo "Успешно использован свиток $row[name].";
  $bet=1;
}
?>