<?php
if ($row["prototype"]==1971) $et=28;
if ($row["prototype"]==1972) $et=29;
$elix=mqfa("select id, name, time from effects where owner=$user[id] and type=$et");
$efftime=$magic["time"]*60;

global $nodrink;
if (in_array($user["room"],$nodrink)) {
  echo "����� ��������� ���� ��������!";
} elseif ($user["battle"]>0) {
  echo "�� � ���...";
} elseif($elix && $row["name"]!=$elix["name"]) {
  echo "��� �� ������ �������� ������� ��������.";
} else {
  if(!$elix){
    mq("INSERT INTO `effects` (`owner`,`name`,`time`,`type`) values ('$user[id]','$row[name]', ".(time()+$efftime).",$et)");
  } else {
    updeffect($user["id"], $elix, $efftime, $row, 1);
  }
  mq("delete from effects where owner='$user[id]' and type=".($et==28?HPADDICTIONEFFECT:MANAADDICTIONEFFECT));
  echo "����� ������� &quot;".$row['name']."&quot;.";
  updeffects();
  $bet=1;
}
?>