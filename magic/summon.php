<?php
// magic идентификацыя
if ($_SESSION['uid'] == null) header("Location: index.php");
if ($user['battle'] == 0) {
  echo "Это боевая магия...";
} else {
  $int=100;
  if (rand(1,100) < $int) {
    if ($row["magic"]==207) {
      $name="Отморозок";
      if ($user["level"]>=9) $prototype=4030;
      elseif ($user["level"]>=7) $prototype=4029;
      elseif ($user["level"]>=5) $prototype=4028;
      else $prototype=3946;
      $hp=5000;
      $action="призвал".($user["sex"]?"":"а")." в бой отморозка";
    }
    $nb = mysqli_fetch_array(db_query("SELECT count(`id`) FROM `bots` WHERE `name` LIKE '$name (%';"));
    db_query("INSERT INTO `bots` (`name`,`prototype`,`battle`,`hp`) values ('$name (".($nb[0]+1).")','$prototype','".$user['battle']."','$hp');");
    $bot = db_insert_id();

    $bd = mysqli_fetch_array(db_query ('SELECT * FROM `battle` WHERE `id` = '.$user['battle'].' LIMIT 1;'));
    $battle = unserialize($bd['teams']);
    $battle[$bot] = $battle[$user['id']];
    foreach($battle[$bot] as $k => $v) {
      $battle[$k][$bot] = array(0,0,time());
    }
    $t1 = explode(";",$bd['t1']);
    // проставляем кто-где
    if (in_array ($user['id'],$t1)) {
      $ttt = 1;
    } else {
      $ttt = 2;
    }
    //db_query('UPDATE `logs` SET `log` = CONCAT(`log`,\'<span class=date>'.date("H:i").'</span> '.nick5($user['id'],"B".$ttt).' породил своего клона '.nick5($bot,"B".$ttt).'<BR>\') WHERE `id` = '.$user['battle'].';');
    addlog($user['battle'],'<span class=date>'.date("H:i").'</span> '.nick5($user['id'],"B".$ttt).' '.$action.' '.nick5($bot,"B".$ttt).'<BR>');

    db_query('UPDATE `battle` SET `teams` = \''.serialize($battle).'\', `t'.$ttt.'`=CONCAT(`t'.$ttt.'`,\';'.$bot.'\')  WHERE `id` = '.$user['battle'].' ;');

    db_query("UPDATE `battle` SET `to1` = '".time()."', `to2` = '".time()."' WHERE `id` = ".$user['battle']." LIMIT 1;");

    $bet=1;
    echo "$name призван в бой.";
  } else {
    echo "Свиток рассыпался в ваших руках...";
    $bet=1;
  }
}

?>