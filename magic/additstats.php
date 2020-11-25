<?php

$uses_zel = mqfa("SELECT id, name, sila, lovk, inta, intel FROM `effects` WHERE `owner` = ".$user['id']." AND `type`=188 and (sila>0 or lovk>0 or inta>0 or intel>0)");
echo mysql_error();
$ins_time = floor($magic['time']*60);
$rightel=1;
if ($uses_zel) {
  foreach ($uses_zel as $k=>$v) {
    if ($k=="name" || $k=="id") continue;
    if (($v && !$row["g$k"]) || (!$v && $row["g$k"])) {
      $rightel=0;
    }
  }
}
global $nodrink;
if (in_array($user["room"],$nodrink)) {
  echo "Здесь запрещено пить эликсиры!";
} elseif ($user['battle'] > 0) {
    echo "Не в бою...";
} elseif(!$rightel || $row["name"]==$uses_zel["name"]) {
    echo "Еще не прошло действие старого эликсира.";
} else {
  if($row['gsila']>0){mysql_query("UPDATE `users` set `sila` =`sila`+ ".$row['gsila']." WHERE `id` = ".$user['id']."");}
  if($row['glovk']>0){mysql_query("UPDATE `users` set `lovk` =`lovk`+ ".$row['glovk']." WHERE `id` = ".$user['id']."");}
  if($row['ginta']>0){mysql_query("UPDATE `users` set `inta` =`inta`+ ".$row['ginta']." WHERE `id` = ".$user['id']."");}
  if($row['gintel']>0){mysql_query("UPDATE `users` set `intel` =`intel`+ ".$row['gintel']." WHERE `id` = ".$user['id']."");}
  if(!$uses_zel){
  mysql_query("INSERT INTO `effects` (`owner`,`name`,`time`,`type`,`sila`,`lovk`,`inta`,`intel`) values ('".$user['id']."','".$row['name']."',".(time()+$ins_time).",188,".$row['gsila'].",".$row['glovk'].",".$row['ginta'].",".$row['gintel'].");");
  } else {
    mq("UPDATE `effects` set name='$row[name]', `time` = '".(time()+$ins_time)."', sila=sila+'$row[gsila]', lovk=lovk+'$row[glovk]', inta=inta+'$row[ginta]', intel=intel+'$row[gintel]' WHERE `owner` = ".$user['id']." AND `type`=188 and id='$uses_zel[id]'");
  }
  echo "Выпит эликсир &quot;".$row['name']."&quot;.";
  $bet=1;
}
?>