<?php
$target=mqfa("SELECT users.id, users.level, users.room, users.login, users.vinos, users.mudra, users.battle,(select `id` from `online` WHERE `date` >= ".(time()-60)." AND `id` = users.`id`) as `online`  FROM `users` WHERE `login` = '".mysql_escape_string($_POST['target'])."'");
$plus=0;
global $nodrink;
$todispell=mqfa("select * from effects where owner='$target[id]' and (name='Уязвимость оружию' or name='Уязвимость стихиям' or name='Слабость') order by rand()");
if ($user["battle"] && !$todispell) {
  $fbattle->getbu($target["id"]);
  foreach ($fbattle->battleunits[$target["id"]]["effects"] as $k=>$v) {
    if ($v["type"]==1 && @$v["bad"]) {
      $v["name"]=str_replace("(заклятие)","",$v["name"]);
      $todispell=array("id"=>$k, "mf"=>$v["mf"], "mfval"=>$v["val"], "name"=>$v["name"]);
      break;
    }
  }
}
if (in_array($user["room"],$nodrink)) {
  echo "Здесь запрещено пользоваться магией!";
} elseif (!$target["online"] || $target["invis"]) {
  echo "Персонаж \"$_POST[target]\" не в игре.";
} elseif ($target["room"]!=$user["room"] || $target["battle"]!=$user["battle"]) {
  echo "Персонаж \"$_POST[target]\" вне пределов досягаемости.";
} elseif(!$todispell) {
  echo "На персонаже нет заклинаний, которые можно рассеять.";
} elseif ($user['battle'] && !in_array($target['id'],$fbattle->team_mine)) {
  echo "Это заклятие можно исопльзовать только на союзников!"; 
} else {
  if (!$user["battle"]) {
    echo "У персонажа \"$target[login]\" успешно рассеяно заклятие $todispell[name].";
    addch("<img src=i/magic/$row[img]>".($user["invis"]?"Невидимка":"Персонаж &quot;<b>{$user['login']}</b>&quot;")." наложил заклятие \"$row[name]\" на &quot;<b>".($user["invis"] && $user["login"]==$_POST['target']?"Невидимка":"$_POST[target]")."</b>&quot; рассеяв заклятие <b>$todispell[name]</b>.");
  } else {
    if ($todispell["mfdhit"]) {
      $mf="mfdhit";
      $mfval=$todispell["mfdhit"];
    } elseif ($todispell["mfdmag"]) {
      $mf="mfdmag";
      $mfval=$todispell["mfdmag"];
    } else {
      $mf=$todispell["mf"];
      $mfval=$todispell["mfval"];
    }
    $fbattle->toupdatebu[$target["id"]][$mf]-=$mfval;
    $fbattle->toupdatebu[$target["id"]]["effects"]=1;
    $fbattle->needupdatebu=1;
    $fbattle->getbu($target["id"]);
    unset($fbattle->battleunits[$target["id"]]["effects"][$todispell["id"]]);
    $fbattle->add_log('<span class=date>'.date("H:i").'</span> '.nick5($user['id'],$fbattle->my_class).' использовал'.($user["sex"]==1?"":"а").' заклятие '.$row["name"].' на '.nick5($target['id'],$fbattle->my_class).' рассеяв заклятие <b>'.$todispell["name"].'</b>.<BR>');
    $fbattle->write_log ();
    echo "Успнешно наложено заклятие $row[name], рассеяно заклятие $todispell[name]."; 
  }
  mq("delete from effects where id='$todispell[id]'");
  $bet=1;
}
?>