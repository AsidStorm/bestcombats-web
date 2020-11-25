<?
  $uses_zel = mqfa("SELECT name FROM `effects` WHERE `owner` = ".$user['id']." AND `type`=".FORGOTTENMASTERS);
  $ins_time = floor($magic['time']*60);

  global $nodrink;
  if (in_array($user["room"],$nodrink)) {
    echo "Здесь запрещено пить эликсиры!";
  } elseif ($user['battle'] > 0) {
    echo "Не в бою...";
  } elseif($uses_zel) {
    echo "Еще не прошло действие старого эликсира.";
  } else {
    mysql_query("INSERT INTO `effects` (`owner`,`name`,`time`, type, `mf`,`mfval`) values ('".$user['id']."','".$row['name']."',".(time()+$ins_time).",".FORGOTTENMASTERS.", 'mfhitp/mfmagp/minu/maxu', '30/30/25/50');");
    echo "Выпит эликсир &quot;".$row['name']."&quot;.";
    $bet=1;
  }
?>