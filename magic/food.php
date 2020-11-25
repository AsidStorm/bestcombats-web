<?php

$uses_zel = mysql_fetch_array(mysql_query("SELECT id, name FROM `effects` WHERE `owner` = ".$user['id']." and `type`=49"));
global $nodrink;
if (in_array($user["room"],$nodrink)) {
  echo "Здесь запрещено это делать!";
} elseif ($user['battle'] > 0) {
    echo "Не в бою...";
} elseif($uses_zel && $row['name']!=$uses_zel['name']) {
    echo "Еще не прошло действие старой еды.";
} else {
  if(!$uses_zel){
    mysql_query("INSERT INTO `effects` (`owner`,`name`,`time`,`type`, `ghp`) values ('".$user['id']."','".$row['name']."',".(time()+(3600*6)).",49,".$row['ghp'].");");
    $user["maxhp"]+=$row['ghp'];
    mq("update users set fullhptime=".time()." where id='$user[id]'");
  } else {
    mysql_query("UPDATE `effects` set `time` = '".(time()+(3600*6))."' WHERE id='$uses_zel[id]'");
  }
  resetmax($user["id"]);
  echo "Вы съели &quot;".$row['name']."&quot;.";
  $bet=1;
  updeffects($user["id"]);
}
?>