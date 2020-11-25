<?
  include_once(DOCUMENTROOT."questfuncs.php");
  $r=mq("select distinct users.id, users.login, users.sex, users.klan, users.align, users.level, users.sila, users.hp from questusers left join users on users.id=questusers.user");
  $power=mqfa1("select sum(param) from questusers");
  $cond="0";
  $logins="";
  $log="";
  $cnt=0;
  while ($rec=mysql_fetch_assoc($r)) {
    $cnt++;
    $sex=$rec["sex"];
    $cond.=" or id=$rec[id] ";
    if ($logins) {
      if ($cnt==mysql_num_rows($r)) $logins.=" </b>и<b> ";
      else $logins.="</b>,<b> ";
    }
    $logins.=" $rec[login]";
    if ($log) {
      if ($cnt==mysql_num_rows($r)) $log.=" и ";
      else $log.=", ";
    }
    $log.=fullnick($rec);
  }
  $success=0;
  if ($power>=2000) {
    $success=1;
    sysmsg("<b>$logins</b> принесли магу достаточное количество разрыв-травы, и он успешно взорвал баррикаду, теперь проход вглубь катакомб открыт.");
    mq("update variables set value=1 where var='quest'");
    mq("update variables set value='$logins' where var='questusers'");
  }
  if ($cnt==0) {
    mq("truncate table questusers");
    setvar("queststart", 0);
  } else {
    if ($cnt>1) {
      $e="ись";$e2="ли";$e3="гут";
    } elseif ($sex==1) {
      $e="ся";$e2="";$e3="жет";
    } else {
      $e="ась";$e2="ла";$e3="жет";
    }
    $results=array("усилия мага оказались напрасны", "магу не удалось взорвать баррикаду", "маг в очередной раз неудачно попытался взорвать баррикаду", "баррикада продолжает стоять где стояла");
    shuffle($results);
    $result="принес$e2 слишком мало разрыв-травы, и ".array_pop($results).".";
    mq("update variables set value=concat(value, '\r\n".date("H:i")." $logins ($power)') where var='questlog'");
    $log="<br>".date("H:i")." $log ".($success?" принес$e2 магу достаточное количество разрыв-травы и он успешно взорвал баррикаду.":$result);
    if (!$success) sysmsg("<b>$logins</b> $result");
    mq("update events set log=concat(log, '$log') where id=2");
    if (!$success) mq("truncate table questusers");
    setvar("queststart", 0);
  }
?>