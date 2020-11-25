<?
  function wake($userid) {
    global $obshaga;
    if (!$obshaga) $obshaga=mqfa("SELECT * FROM `obshaga` WHERE `pers` = '$userid'");
    $r = db_query("SELECT * FROM `obshagaeffects` WHERE owner = '$userid'");
    while ($it=mysqli_fetch_array($r)) {
      $end_time = time() + $it['time'];
      if ($it["type"]==11 || $it["type"]==12 || $it["type"]==13 || $it["type"]==14 || $it["type"]==4 || $it["type"]==21) {
        getfeatures($user, $userid);
        if ($user["sleep"]) $end_time-=(time()-$obshaga["sleep"])*$user["sleep"]/10;
      }
      db_query("INSERT INTO `effects` (`id`, `type`, `name`, `time`, `sila`, `lovk`, `inta`, `vinos`, `intel`, `mudra`, mf, mfval, mfdmag, mfdhit, `owner`, `lastup`, `stihiya`, ghp, gmana, hpforvinos,  mfdkol, mfdrub, mfdrej, mfddrob, mfdfire, mfdwater, mfdair, mfdearth) 
      VALUES ('','".$it['type']."','".$it['name']."', '".$end_time."','".$it['sila']."','".$it['lovk']."','".$it['inta']."','".$it['vinos']."','".$it['intel']."','".$it['mudra']."','".$it['mf']."','".$it['mfval']."','".$it['mfdmag']."','".$it['mfdhit']."','".$it['owner']."','".$it['lastup']."','".$it['stihiya']."','$it[ghp]','$it[gmana]', '$it[hpforvinos]',  '$it[mfdkol]', '$it[mfdrub]', '$it[mfdrej]', '$it[mfddrob]', '$it[mfdfire]', '$it[mfdwater]', '$it[mfdair]', '$it[mfdearth]')");
    }
    mq("update `obshaga` SET sleep=0 WHERE pers ='$userid'");
    mq("DELETE FROM obshagaeffects WHERE owner='$userid'");
    resetmax($userid);
    updeffects($userid);
  }
?>