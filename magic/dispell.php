<?php
$target=mqfa("SELECT users.id, users.level, users.room, users.login, users.vinos, users.mudra, users.battle,(select `id` from `online` WHERE `date` >= ".(time()-60)." AND `id` = users.`id`) as `online`  FROM `users` WHERE `login` = '".mysql_escape_string($_POST['target'])."'");
$plus=0;
global $nodrink;
$todispell=mqfa("select * from effects where owner='$target[id]' and (name='���������� ������' or name='���������� �������' or name='��������') order by rand()");
if ($user["battle"] && !$todispell) {
  $fbattle->getbu($target["id"]);
  foreach ($fbattle->battleunits[$target["id"]]["effects"] as $k=>$v) {
    if ($v["type"]==1 && @$v["bad"]) {
      $v["name"]=str_replace("(��������)","",$v["name"]);
      $todispell=array("id"=>$k, "mf"=>$v["mf"], "mfval"=>$v["val"], "name"=>$v["name"]);
      break;
    }
  }
}
if (in_array($user["room"],$nodrink)) {
  echo "����� ��������� ������������ ������!";
} elseif (!$target["online"] || $target["invis"]) {
  echo "�������� \"$_POST[target]\" �� � ����.";
} elseif ($target["room"]!=$user["room"] || $target["battle"]!=$user["battle"]) {
  echo "�������� \"$_POST[target]\" ��� �������� ������������.";
} elseif(!$todispell) {
  echo "�� ��������� ��� ����������, ������� ����� ��������.";
} elseif ($user['battle'] && !in_array($target['id'],$fbattle->team_mine)) {
  echo "��� �������� ����� ������������ ������ �� ���������!"; 
} else {
  if (!$user["battle"]) {
    echo "� ��������� \"$target[login]\" ������� �������� �������� $todispell[name].";
    addch("<img src=i/magic/$row[img]>".($user["invis"]?"���������":"�������� &quot;<b>{$user['login']}</b>&quot;")." ������� �������� \"$row[name]\" �� &quot;<b>".($user["invis"] && $user["login"]==$_POST['target']?"���������":"$_POST[target]")."</b>&quot; ������� �������� <b>$todispell[name]</b>.");
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
    $fbattle->add_log('<span class=date>'.date("H:i").'</span> '.nick5($user['id'],$fbattle->my_class).' �����������'.($user["sex"]==1?"":"�").' �������� '.$row["name"].' �� '.nick5($target['id'],$fbattle->my_class).' ������� �������� <b>'.$todispell["name"].'</b>.<BR>');
    $fbattle->write_log ();
    echo "�������� �������� �������� $row[name], �������� �������� $todispell[name]."; 
  }
  mq("delete from effects where id='$todispell[id]'");
  $bet=1;
}
?>