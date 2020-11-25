<?php
if ($row["prototype"]==1971) $et=28;
if ($row["prototype"]==1972) $et=29;
$elix=mqfa("select id, name, time from effects where owner=$user[id] and type=$et");
$efftime=$magic["time"]*60;

global $nodrink;
if (in_array($user["room"],$nodrink)) {
  echo "Здесь запрещено пить эликсиры!";
} elseif ($user["battle"]>0) {
  echo "Не в бою...";
} elseif($elix && $row["name"]!=$elix["name"]) {
  echo "Еще не прошло действие старого эликсира.";
} else {
  if(!$elix){
    mq("INSERT INTO `effects` (`owner`,`name`,`time`,`type`) values ('$user[id]','$row[name]', ".(time()+$efftime).",$et)");
  } else {
    updeffect($user["id"], $elix, $efftime, $row, 1);
  }
  mq("delete from effects where owner='$user[id]' and type=".($et==28?HPADDICTIONEFFECT:MANAADDICTIONEFFECT));
  echo "Выпит эликсир &quot;".$row['name']."&quot;.";
  updeffects();
  $bet=1;
}
?>