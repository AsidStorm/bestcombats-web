<?
  $rec=mqfa("select id from effects where owner='$user[id]' and type=54");
  if ($rec) {
    echo "Вы уже изучаете книгу.";
  } else {
    global $testusers;
    if (in_array($user["id"],$testusers) || $user["id"]==2372) mq("INSERT INTO `effects` (`owner`,`name`,`time`,`type`) values ('".$user['id']."','".$row['name']."',".(time()+3).",54)");
    else mq("INSERT INTO `effects` (`owner`,`name`,`time`,`type`) values ('".$user['id']."','".$row['name']."',".(time()+60*60*24).",54)");
    mq("delete from inventory where owner='$user[id]' and id='$row[id]'");
    echo "Вы начали изучать \"$row[name]\".";
  }
?>