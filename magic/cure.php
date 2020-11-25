<?php
if ($row["prototype"]==97) $ghp=15;
if ($row["prototype"]==98) $ghp=30;
if ($row["prototype"]==99) $ghp=45;
if ($row["prototype"]==100) $ghp=60;
if ($row["prototype"]==2262) $ghp=600;

if ($row["prototype"]==100001) $ghp=60;
if ($row["prototype"]==100004 || $row["prototype"]==101771) $ghp=1500;
if ($row["prototype"]==100613) $ghp=600;

if ($_SESSION['uid'] == null) header("Location: index.php");
  if ($user["battle"]) {
    global $report, $scrollresult;
    foreach ($fbattle->userdata as $k=>$v) {
      if ($v["login"]==$_POST['target'] || ($_POST['target']==$user['login'] && $k==$user["id"])) {
        $us["id"]=$k;
        $us["battle"]=$user["battle"];
        $us["hp"]=$fbattle->userdata[$k]["hp"];
        $us["login"]=$v["login"];
      }
    }
  } else {
    $us = mysql_fetch_array(mysql_query("SELECT *, (select `id` from `online` WHERE `date` >= ".(time()-60)." AND `id` = users.`id`) as `online` FROM `users` WHERE `login` = '{$_POST['target']}' LIMIT 1;"));
  }

  if ($us["id"]>_BOTSEPARATOR_) { $report="Нельзя лечить ботов!"; }
  elseif ($us['battle'] != $user['battle']) { $report="Персонаж находится в поединке!";}
  elseif ($user['room'] != $us['room'] && !$us['battle']) { $report="Персонаж в другой комнате!"; }
  elseif ($us['battle'] && !in_array($us['id'],$fbattle->team_mine)) { $report="Нельзя лечить противников!";}
  elseif ($us['battle'] && $us["hp"]<=0) { $report="Нельзя лечить мёртвых!"; }
  else {
    if ($user['sex'] == 1) $action=""; else $action="а";
    if ($user['battle'] > 0) {
      $scrollresult=array();
      $scrollresult["target"]=$us["id"];
      $scrollresult["deltahp"]=$ghp;
      //mysql_query('UPDATE `logs` SET `log` = CONCAT(`log`,\'<span class=date>'.date("H:i").'</span> '.nick5($user['id'],$fbattle->my_class).' использовал заклятие восстановления энергии '.(($us['id']!=$user['id'])?"на ".nick5($us['id'],$fbattle->my_class):"").' и восстановил уровень жизни <B>+60</B> ['.($hp).'/'.$us['maxhp'].']<BR>\') WHERE `id` = '.$us['battle'].'');
      //$fbattle->add_log('');
    } else {
      mq("UPDATE `users` SET `hp` = if (hp+$ghp>maxhp,maxhp,hp+$ghp) WHERE `id` = ".$us['id'].";");
      $user["hp"]=min($user["hp"]+$ghp, $user["maxhp"]);
    }
    //global $updatebattleunit;
    //$updatebattleunit=$us['id'];
    $report="Вы восстановили $ghp НР персонажу ".$us['login']."!";
    $bet=1;  
  }
  if (!$user["battle"]) echo "<font color=red><B>$report</B></FONT>";
  else $scrollresult["report"]=$report;

?>